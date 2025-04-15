<?php

namespace App\Services;

use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InputValidator
{

    public function cardLengthCheck($requestData)
    {
        $cleanedCardNumber = str_replace(' ', '', $requestData);
        $cardLength = strlen($cleanedCardNumber);
        if ($cardLength < 15) {
            $errors = array('error' => '401', 'reason' => 'Invalid CardNumber Length, It should be minimum 15 Numbers');
            return $errors;
        }
        return null;
    }

    public function cardTypeCheck($requestData)
    {
        $cleanedCardNumber = str_replace(' ', '', $requestData);

        $cards = array(
            "visa" => "(4\d{12}(?:\d{3})?)",
            "amex" => "(3[47]\d{13})",
            "jcb" => "(35[2-8][89]\d\d\d{10})",
            "maestro" => "((?:5020|5038|6304|6579|6761)\d{12}(?:\d\d)?)",
            "solo" => "((?:6334|6767)\d{12}(?:\d\d)?\d?)",
            "mastercard" => "(5[1-5]\d{14})",
            "switch" => "(?:(?:(?:4903|4905|4911|4936|6333|6759)\d{12})|(?:(?:564182|633110)\d{10})(\d\d)?\d?)",
        );
        $names = array("Visa", "American Express", "JCB", "Maestro", "Solo", "Mastercard", "Switch");
        $matches = array();
        $pattern = "#^(?:" . implode("|", $cards) . ")$#";
        $result = preg_match($pattern, str_replace(" ", "", $cleanedCardNumber), $matches);

        $cardType = ($result > 0) ?: false;

        if ($result > 0) {
            $cardType = $names[sizeof($matches) - 2];
            return $cardType;
        } else {
            throw new \Exception('Unsupported or invalid card type.');
        }
    }

    public function maskCardNumber($cardNumber)
    {

        // Remove spaces and non-digits
        $cardNumber = preg_replace('/\D/', '', $cardNumber);

        $length = strlen($cardNumber);

        if ($length < 8) {
            // Not enough digits to mask safely
            return str_repeat('#', $length);
        }

        $start = substr($cardNumber, 0, 4);
        $end = substr($cardNumber, -4);
        $masked = str_repeat('#', $length - 8);

        return $start . $masked . $end;
    }

    public function cityCheck($requestData)
    {
        $cityValue = $requestData->city;

        if ($cityValue == '') {
            $errors = array('error' => '406', 'reason' => 'City Field should not be blank');
            return $errors;
        }
    }

    public function index($requestData)
    {

        $validations = [
            'cardLengthCheck',
            // 'cardTypeCheck',
            'cityCheck',
        ];

        foreach ($validations as $method) {
            $error = $this->$method($requestData);
            if ($error) {
                return $error; // Immediately return if any validation fails
            }
        }
    }
}
