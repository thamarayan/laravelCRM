<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class BankConnector
{
    public function connectToAkuratecko($post)
    {

        $merchantKey = env('MERCHANT_KEY'); // Need to create
        $merchantPassword = env('MERCHANT_PASSWORD'); // Need to create
        $ip = Session::get('ipValue');
        $url = 'https://api.payit123.com/post';
        // $authorization = 'bearer S7ZKMwKVojAtdSBJ484z0GO5vHuT15yv'; // Need to ask

        foreach ($post as $key => $value) {
            $$key = $value;
        }



        // Processing Expiry Month / Date
        if ($expiry) {
            $expExplode = explode("/", $expiry);
            $expMonth = $expExplode[0];
            $expYear = $expExplode[1];
            $post['expMonth'] = $expMonth;
            $post['expYear'] = $expYear;
        }

        if (strlen($expYear) == 2) $expYear = substr(date("Y"), 0, 2) . $expYear;
        if (strlen($expMonth) == 1) $expMonth = '0' . $expMonth;

        // dd($expYear);

        $names = explode(' ', $name);

        // dd($names);

        // dd($names);

        // This format is for Paymaxis
        // $requestFields = array(
        //     'referenceId' => base64_encode("cruisepay" . '###' . $iNumber), // Need to ask
        //     'description' => 'platform automate buy credits - ' . $amount,
        //     'currency' => $currency,
        //     'paymentType' => 'DEPOSIT',
        //     'paymentMethod' => 'BASIC_CARD',
        //     'amount' => $amount,
        //     'card' => array(
        //         'cardNumber' => $cardNumber,
        //         'cardholderName' => $names[0] . ' ' . $names[1],
        //         'expiryMonth' => $expMonth,
        //         'expiryYear' => $expYear,
        //         'cardSecurityCode' => $cvv,
        //     ),
        //     'customer' => array(
        //         'referenceId' => base64_encode('customer_' . $iNumber),
        //         'firstName' => $names[0],
        //         'lastName' => $names[1],
        //         'email' => $email,
        //     ),
        //     'billingAddress' => array(
        //         'addressLine1' => $street,
        //         'city' => $city,
        //         'state' => $state,
        //         'countryCode' => $country,
        //         'postalCode' => $postal,
        //     ),
        //     'ipaddress' => $ip, // Need to ask
        //     'returnUrl' => 'https://www.cruisepay.finance/transactionStatus', // Need to ask
        //     'webhookUrl' => 'https://www.cruisepay.finance/transactionStatus', // Need to ask
        //     'additionalParameters' => array(
        //         'userIp' => $ip, // Need to ask
        //     ),
        //     'terminalName' => 'automate' // Need to ask
        // );

        // dd($requestFields);

        $payload = [
            'action' => 'SALE',
            'client_key' => $merchantKey,
            'hash' => md5(strtoupper(strrev($post['email']) . $merchantPassword . strrev(substr($post['cardNumber'], 0, 6) . substr($post['cardNumber'], -4)))),
            'order_id' => $post['iNumber'],
            'order_amount' => number_format($post['amount'], 2, '.', ''),
            'order_currency' => $post['currency'],
            'order_description' => 'Deposit',
            'card_number' => $post['cardNumber'],
            'card_exp_month' => $expMonth,
            'card_exp_year' => $expYear,
            'card_cvv2' => $post['cvv'],
            'payer_first_name' => $names[0],
            'payer_last_name' => $names[1] ?? null,
            'payer_address' => $post['street'],
            'payer_country' => $post['country'],
            'payer_state' => $post['state'],
            'payer_city' => $post['city'],
            'payer_zip' => $post['postal'],
            'payer_email' => $post['email'],
            'payer_phone' => $post['phone'],
            'payer_ip' => $ip,
            'term_url_3ds' => 'https://cruisepay.finance/crm2024/catchup_3dsResponse'
        ];

        // dd($payload);

        $response = Http::asMultipart()->post($url, $payload);

        Log::info("acku response");
        Log::info($response);

        $returnResponse['transid'] = '';
        $returnResponse['code'] = 1;
        $returnResponse['3dsurl'] = '';
        $returnResponse['message'] = '';
        if ($response['result'] == 'SUCCESS') {
            $returnResponse['code'] = 0;
            $returnResponse['transid'] = $response['trans_id'];
            $returnResponse['descriptor'] = $response['descriptor'];
        } else if ($response['result'] == 'REDIRECT') {
            $returnResponse['message'] = 'Transaction requires 3ds verification';
            $returnResponse['descriptor'] = $response['descriptor'];
            $returnResponse['transid'] = $response['trans_id'];
            $returnResponse['3dsurl'] = $response['redirect_url'];
        } else if ($response['result'] == 'DECLINED') {
            $returnResponse['message'] = $response['decline_reason'];
            $returnResponse['transid'] = $response['trans_id'];
        } else if ($response['result'] == 'ERROR') {
            if (is_array($response['errors']) && count($response['errors']) > 0) {
                $returnResponse['message'] = $response['errors'][0]['error_message'];
            } else {
                $returnResponse['message'] = $response['error_message'];
            }
        }
        return json_encode($returnResponse);
    }
}
