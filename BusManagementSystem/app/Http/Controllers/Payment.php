<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Payment extends Controller
{

    public function payshow(){
        return view('Admin.paytest');
    }

    public function makePayment(Request $request)
    {
        $client = new Client();

        $response = $client->request('POST', 'https://api.chapa.co/v1/transaction/initialize', [
            'headers' => [
                'Authorization' => 'Bearer CHASECK_TEST-iiGeV0fYgDesVt4GZb0BXUtvuyhjdVBh',
                'Content-Type' => 'application/json',
            ],
            'json' => [
                "amount" => $request->amount,
                "currency" =>'ETB',
                "email" => $request->email,
                "first_name" => $request->name,
                "last_name" => $request->lname,
                "phone_number" => $request->phone,
                "tx_ref" => 'anbessa-' . uniqid(),
                "callback_url" => "https://webhook.site/077164d6-29cb-40df-ba29-8a00e59a7e60",
                "return_url" => "",
                "customization" => [
                    "title" => "Payment",
                    "description" => "I love online payments."
                ]
                // Add more fields here using $request->input('field_name')
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $responseData = json_decode($body, true);

        // if (isset($responseData['data']['checkout_url'])) {
        //     // Redirect to the checkout URL
        //     return redirect()->away($responseData['data']['checkout_url']);
        // } else {
        //     // Handle error if checkout_url is not present in the response
        //     return response()->json(['error' => 'checkout_url not found in response'], 500);
            
        // }

        //dd($body);
        return $body;
    }

}
