<?php

namespace App\Http\Controllers;

use App\Models\Countrie;
use App\Models\Currencies;
use App\Models\PayOrdersModel;
use App\Services\BankConnector;
use App\Services\InputValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PaymentProcessController extends Controller
{
    public function index()
    {
        $countries = Countrie::get();
        $currencies = Currencies::get();
        $ip = request()->ip();
        return view('paymentProcess.newPayment', compact('countries', 'currencies', 'ip'));
    }

    public function store(Request $request)
    {
        $postValue = $request->all();
        $ip = $request->ip();



        Session::put("ipValue", $ip);
        $invoiceNumber = $request->iNumber;

        foreach ($postValue as $key => $value) {
            $$key = $value;
        }

        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'required|digits_between:10,15',
            'amount'      => 'required|numeric|min:1',
            'currency'    => 'required|string',
            'street'      => 'required|string|max:255',
            'city'        => 'required|string|max:100',
            'state'       => 'required|string|max:100',
            'country'     => 'required|string|max:100',
            'postal'      => ['required', 'regex:/^[0-9A-Za-z\-\s]{3,10}$/'],
            'cardNumber'  => ['required', 'regex:/^[0-9\s]{13,19}$/'],
            'expiry'      => ['required', 'regex:/^(0[1-9]|1[0-2])\/\d{2}$/'],
            'cvv'         => 'required|digits_between:3,4',
            'iNumber'     => 'required|string|max:50',
        ], [
            'name.required'        => 'Full Name is required.',
            'email.required'       => 'Email is required.',
            'email.email'          => 'Please enter a valid email address.',
            'phone.required'       => 'Phone number is required.',
            'phone.digits_between' => 'Phone number must be between 10 and 15 digits.',
            'amount.required'      => 'Amount is required.',
            'amount.numeric'       => 'Amount must be a valid number.',
            'amount.min'           => 'Amount must be at least 1.',
            'currency.required'    => 'Currency selection is required.',
            'street.required'      => 'Street address is required.',
            'city.required'        => 'City is required.',
            'state.required'       => 'State is required.',
            'country.required'     => 'Country is required.',
            'postal.required'      => 'Postal code is required.',
            'postal.regex'         => 'Postal code format is invalid.',
            'cardNumber.required'  => 'Card number is required.',
            'cardNumber.regex'     => 'Card number format is invalid.',
            'expiry.required'      => 'Expiry date is required.',
            'expiry.regex'         => 'Expiry date must be in MM/YY format.',
            'cvv.required'         => 'CVV is required.',
            'cvv.digits_between'   => 'CVV must be 3 or 4 digits.',
            'iNumber.required'     => 'Invoice number is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            Log::info("No Errors");
        }

        $inputValidator = new InputValidator();

        $card = $request->input('cardNumber');

        try {

            $cardLength = $inputValidator->cardLengthCheck($card);

            if ($cardLength == null) {
                $card_type = $inputValidator->cardTypeCheck($card);
                $maskedCardNum = $inputValidator->maskCardNumber($card);
            } else {
                throw ValidationException::withMessages([
                    'cardNumber' => $cardLength['reason'],
                ]);
            }
        } catch (\Exception $e) {
            // Re-throw it as a Laravel ValidationException
            throw ValidationException::withMessages([
                'cardNumber' => [$e->getMessage()],
            ]);
        }

        $result = DB::table('transactions')->insert([
            'fullName'     => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'amount'        => $request->amount,
            'currency'      => $request->currency,
            'street1'       => $request->street1,
            'city'          => $request->city,
            'state'         => $request->state,
            'country'       => $request->country,
            'postal_code'   => $request->postal,
            'cardnum'       => $maskedCardNum,
            'invoiceNumber' => $request->iNumber,
            'card_type'     => $card_type,
            'orderDate'     => now(),
            'created_at'    => now(),
            'updated_at'    => now(),
            'ip_address'    => Session::get('ip'),
        ]);

        if ($result) {
            $connecttoBank = new BankConnector();
            $returnResponse = $connecttoBank->connectToAkuratecko($postValue);

            Log::info("Return Response");
            Log::info($returnResponse);

            $decodedReturnResponse = json_decode($returnResponse, true);

            Log::info($decodedReturnResponse);

            $transaction_id = 0;
            if (!empty($decodedReturnResponse['transid'])) {
                $transaction_id = $decodedReturnResponse['transid'];
            }

            if (!$decodedReturnResponse['code'] && $transaction_id) {

                if ($decodedReturnResponse['code'] == 0) {

                    $message = 'The transaction has been completed successfully (PAYMENT SUCCESSFUL)!';
                    $descriptor = $decodedReturnResponse['descriptor'];
                    $this->updateOrderStatus('Success', $request->iNumber, $message, $transaction_id, $descriptor, "Moriihub");
                    // if (!empty($return_url)) {
                    //     if (strpos($return_url, 'http://') === false && strpos($return_url, 'https://') === false) {
                    //         $return_url = 'https://' . $return_url;
                    //     }
                    return view('paymentProcess.success');
                    // }
                }
            } elseif (strpos($decodedReturnResponse['3dsurl'], 'http') !== false) {
                return redirect($decodedReturnResponse['3dsurl']);
                exit;
            } else {
                Log::info("Here...");
                LOg::info($decodedReturnResponse['message']);
                $this->updateOrderStatus('Failed', $invoiceNumber, $decodedReturnResponse['message'], $transaction_id, '', "Moriihub");
                return view('paymentProcess.fail');
            }
        }
    }

    public function updateOrderStatus($orderStatus, $invoiceNumber, $message, $transid, $descriptor, $bankName)
    {

        if ($orderStatus == 'Success') {
            try {
                payOrdersModel::where('invoiceNumber', $invoiceNumber)->update([
                    'orderPaid' => now(),
                    'orderStatus' => "200",
                    'orderMessage' => $message,
                    'descriptor' => $descriptor,
                    'transactionID' => $transid
                ]);
            } catch (\Throwable $th) {
                Log::info($th);
            }
        } else {
            if ($orderStatus != 'Pending')
                $orderStatusCode = '400';
            try {
                payOrdersModel::where('invoiceNumber', $invoiceNumber)->update([
                    'orderPaid' => now(),
                    'orderStatus' => $orderStatusCode,
                    'orderMessage' => $message,
                    'descriptor' => $descriptor,
                    'transactionID' => $transid
                ]);
            } catch (\Throwable $th) {
                Log::info($th);
            }
        }
    }

    public function akuroCBResponse(Request $request)
    {

        Log::info("Acku CB Response");
        Log::info($request);
        $data = $request->getContent();
        $decodedData = json_decode($data, true);

        // $bankname = $decodedData['mid_name'];

        $invoice = $decodedData['order_id'];
        if (isset($decodedData['extended_data']['charge_id'])) {
            $chargeID = $decodedData['extended_data']['charge_id'];
        } else {
            $chargeID = '';
        }
        $gatewayID = $decodedData['gateway_id'];
        $extragatewayID = $decodedData['extra_gateway_id'];

        $status = $decodedData['status'];

        Log::info("Aku Status");
        Log::info($status);


        $message = '';
        $orderStatus = '';
        $orderPaid = null;
        if ($status === 'DECLINED') {
            // Store the decline reason if the status is declined
            $declineReason = $decodedData['decline_reason'];
            $message = addslashes($declineReason);
            $orderStatus = '400';
        } elseif ($status === 'SETTLED') {
            // Store the success message if the status is settled
            $message = 'The transaction has been completed successfully (PAYMENT SUCCESSFUL)';
            $orderStatus = '200';
            $descriptor = $decodedData['descriptor'];
            $orderPaid = now();
        } elseif ($status === '3DS') {
            $message = 'Payment Requires 3ds verification';
            $orderStatus = '1000';
        }


        PayOrdersModel::where('invoiceNumber', $invoice)->update([
            'descriptor' => $descriptor ?? [],
            'gatewayID' => $gatewayID,
            'extra_gatewayID' => $extragatewayID,
            'chargeID' => $chargeID,
            'orderStatus' => $orderStatus,
            'orderPaid' => $orderPaid,
            'orderMessage' => $message,
        ]);
    }

    public function catchup_3dsResponse(Request $response)
    {
        Log::info("catchup");
        Log::info($response);

        usleep(300 * 1000);

        $latestTransaction = PayOrdersModel::latest()->first();
        if ($latestTransaction && $latestTransaction->orderStatus == '200') {
            return view('paymentProcess.success');
        } else {
            return view('paymentProcess.fail');
        }
    }

    public function successPage()
    {
        return view('paymentProcess.success');
    }

    public function failPage()
    {
        return view('paymentProcess.fail');
    }
}
