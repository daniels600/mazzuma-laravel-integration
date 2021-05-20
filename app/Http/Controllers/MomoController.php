<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MomoController extends Controller
{
    //A function to make the payment request 
    function makePayment(Request $request){
        $sender_num = $request->input('sender_number');
        $recipient_num = $request->input('recipient_number');
        $price = $request->input('price');
        $sender_network = $request->input('sender_network', 'mtn');
        $orderID = $request->input('orderID');
        $option = 'rmtv';
        $apiKey = "b0e73bf80fc4ce6093f7842baf25af23ebf97431";

        $response = 
                    Http::post('https://client.teamcyst.com/api_call.php', [
                            'price' => $price,
                            'network' => $sender_network,
                            'recipient_number' => $recipient_num,
                            'sender' => $sender_num,
                            'option' => $option,
                            'apikey' => $apiKey,
                            'orderID' => $orderID
                    ]);
        return $response;

    }


    function checkTransaction(){
        
    }
}
