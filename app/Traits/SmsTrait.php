<?php

namespace App\Traits;  // Correct namespace for traits

use AfricasTalking\SDK\AfricasTalking;
use Exception;

trait SmsTrait 
{
    public function sendText($message, $phone)
    {
        $username = config("africastalking.username_sandbox");
        $apiKey = config("africastalking.api_key_sandbox");

        $AT = new AfricasTalking($username, $apiKey);
        
        $sms = $AT->sms();
    
        try {
            $result = $sms->send([
                'to'      => $phone,
                'message' => $message
            ]);
                
            print_r($result);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        return "I am done";
    }
}
