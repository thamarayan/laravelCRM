<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ReportMainHelper
{
    public static function processTransactionData(array $data, string $currency, string $clientName)
    {
        // Log::info($currency);

        $agentsArray = json_decode(Session::get('agentsData'), true) ?? [];
        $pspsArray = json_decode(Session::get('pspsData'), true) ?? [];

        $agentFees = [];

        foreach ($agentsArray as $agent) {
            $name = $agent['agent'];

            if (!isset($agentFees[$name])) {
                $agentFees[$name] = 0; // Ensure it starts at 0
            }
        }

        $totalPYYShare[$currency] = 0;
        $totalLimeGroveShare[$currency] = 0;

        // Extract unique bank names from $data collection
        $bankNamesInData = array_unique(array_map(function ($item) {
            return $item->bank_name;
        }, $data));

        // Filter PSPs whose names appear in the data collection
        $matchingPsps = array_filter($pspsArray, function ($psp) use ($bankNamesInData) {
            return in_array($psp['pspName'], $bankNamesInData);
        });

        $matchingPsps = array_values($matchingPsps);

        $totalTrxFeeValue = 0;

        return collect($data)
            ->where('currency', $currency)
            ->filter(function ($item) {
                return $item !== null;
            })
            ->map(function ($item, $index) use ($agentsArray, &$agentFees, $matchingPsps, $currency, &$totalPYYShare, &$totalTrxFeeValue, &$totalLimeGroveShare) {

                $orderStatusMap = [
                    200 => "Success",
                    2001 => "Refunded",
                    2005 => "Fraud Warning",
                    2007 => "Ethoca CB",
                    2008 => "Chargeback",
                    2009 => "High Risk",
                    2025 => "Partial Refund",
                ];
                $row = [];
                $row = [
                    'No' => $index + 1,
                    'Transaction ID' => $item->transactionID,
                    'Order Date' => $item->orderDate,
                    'Order Status' => $orderStatusMap[$item->orderStatus] ?? '',
                    'Currency' => $item->currency,
                    'Acquirer_Status' => '',
                    'Amount' => $item->amount,
                    'Fee (MDR - ' . Session::get('clientMDRValue') . ')' => '',
                    'Before RR - TRX Fee ( ' . Session::get('clientTrxValue') . $item->currency . ' )' => '',
                    'RR - ' . Session::get('clientRollingReserve') . '%' => '',
                    'Payable To Client - Final' => '',
                    'Invoice Number' => $item->invoiceNumber,
                ];


                if (!empty($agentsArray) && is_array($agentsArray)) {
                    foreach ($agentsArray as $agent) {
                        // Check if 'Fee' is in the agent's name, case-insensitive
                        if (stripos($agent['agent'], 'USDT Fee') !== false) {
                            continue; // Skip this agent
                        }
                        $row[$agent['agent'] . ' - ' . $agent['share']] = round(((float) $item->amount * (float) $agent['share']) / 100, 2);
                    }
                }

                // MDR Value
                $tempMDRValue = ($item->amount * Session::get('clientMDRValue')) / 100;

                // Trx Fee Sum
                $totalTrxFeeValue += round((float) Session::get('clientTrxValue'), 2);
                Session::put("totalTrxFeeValue", $totalTrxFeeValue);

                //Total Agent Fee
                $totalAgentFee = 0;

                foreach ($agentsArray as $agent) {
                    if (stripos($agent['agent'], 'USDT Fee') !== false) {
                        continue; // Skip this agent
                    }

                    $totalAgentFee += round(((float) $item->amount * (float) $agent['share']) / 100, 2);
                }

                $agentFeeVal = 0;
                foreach ($agentsArray as $agent) {
                    if (stripos($agent['agent'], 'USDT Fee') !== false) {
                        continue; // Skip this agent
                    }
                    $agentFeeVal = round(((float) $item->amount * (float) $agent['share']) / 100, 2);
                    $name = $agent['agent'];
                    $agentFees[$name] += round($agentFeeVal, 2);
                }


                // Total PSP Fee
                $totalPSPFee = 0;
                $currency = strtolower($currency);
                $currencyCaps = strtoupper($currency);

                foreach ($matchingPsps as $psp) {
                    if ($psp['pspName'] == $item->bank_name) {
                        $pspFee = (float) $psp[$currency];
                        if ($pspFee > 0) {
                            $tempPSPFee = round(((float) ($item->amount ?? 0) * ($pspFee ?? 0)) / 100, 2);
                            $totalPSPFee += $tempPSPFee ?? 0;
                        }
                    }
                }

                $netAfter = $tempMDRValue - $totalAgentFee - $totalPSPFee;

                $limegrove = round((float) $netAfter / 2, 2);
                $pyyShare = round((float) $netAfter / 2, 2);

                $totalPYYShare[$currencyCaps] += (float) $pyyShare ?? 0;
                $totalLimeGroveShare[$currencyCaps] += (float) $limegrove ?? 0;

                $row += [
                    'Net after PSP & Client' => $netAfter,
                    'Limegrove 50%' => $limegrove,
                    'PYY Share' => $pyyShare,
                    'Bank Name' => $item->bank_name,
                ];

                $hasMatch = false;
                if (!empty($matchingPsps) && is_array($matchingPsps)) {

                    foreach ($matchingPsps as $psp) {
                        $currencyVal = strtolower($currency);
                        $pspFee = (float) ($psp[$currencyVal] ?? 0);
                        if ($psp['pspName'] == $item->bank_name) {
                            $row[$psp['pspName'] . ' - ' . $pspFee] = round(((float) $item->amount * $pspFee) / 100, 2);
                            $hasMatch = true;
                        } else {
                            $row[$psp['pspName'] . ' - ' . $pspFee] = 0.00;
                        }
                    }
                }

                // Log::info('Has Match: ' . ($hasMatch ? 'true' : 'false'));

                if ($hasMatch == false) {
                    if ($hasMatch == false) {
                        // Log::info("No PSP Match for: " . $item->bank_name);
                        $columnName = $item->bank_name . ' - ' . strtoupper($currency);
                        // Log::info("Column Name:" . $columnName);
                        $row[$columnName] = 0.00; // Add the column explicitly
                    }
                };

                $row += [
                    'Total PSP Fee' => $totalPSPFee,
                ];

                Session::put('totalPyyShare-' . $currencyCaps, $totalPYYShare[$currencyCaps]);
                Session::put('totalLimeGroveShare-' . $currencyCaps, $totalLimeGroveShare[$currencyCaps]);
                Session::put('agent_fees', $agentFees);

                return $row;
            });
    }
}
