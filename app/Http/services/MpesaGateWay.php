<?php

namespace App\Http\services;

class MpesaGateWay
{
    public $shortcode1;
    public $InitiatorName;
    public $SecurityCredential;
    public $shortcode2;
    public $TestMSISDN;
    public $shortcode;
    public $LipaNaMpesaOnlinePassKey;
    public $LipaNaMpesaOnlineShortcode;
    public function __construct()
    {
        $this->shortcode1 = "600231";
        $this->InitiatorName = "testapi0231"; //shortcode 1
        $this->SecurityCredential  = "Safcom231!"; //shortcode1
        $this->shortcode2 = "600231"; //shortcode 2
        $this->TestMSISDN = "254708374149";
        $this->shortcode = "174379"; //Lipa Na Mpesa Online Shortcode://4037673
        $this->LipaNaMpesaOnlinePassKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    }
    public function get_access_token()
    {

        $Consumer_Key = "GHulCJ02hggdHDdxNRNeMblel7qc2pHk";
        $Consumer_Secret = "POJIuUjb6Zhfs3Zw";
        $key_sec = $Consumer_Key . ":" . $Consumer_Secret;
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $headers = ['Content-Type: application/json;charset=UTF-8'];
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_USERPWD, $key_sec);



        $result = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($result);
        $access_token = $result->access_token;
        return $access_token;
    }



    public function lipaNaMPesaOnlineAPI($phoneNumber, $amount)
    {
        $phoneNumber = intval($phoneNumber);
        // check if the phone number is valid as 254 if not add it .eng 254707585566
        if (strlen($phoneNumber) == 10) {
            $phoneNumber = "254" . substr($phoneNumber, 1);
        }
        if (strlen($phoneNumber) == 9) {
            $phoneNumber = "254" . $phoneNumber;
        }


        $api_url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
        $access_token = $this->get_access_token();
        $time = date('YmdHis');
        $shortcode = $this->shortcode;
        $LipaNaMpesaOnlinePassKey =   $this->LipaNaMpesaOnlinePassKey;
        $SecurityCredential  = base64_encode($shortcode . $LipaNaMpesaOnlinePassKey . $time);
        $client = new \GuzzleHttp\Client();



        $headers = [
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ];


        $data = [
            "BusinessShortCode" => $shortcode,
            "Password" => $SecurityCredential,
            "Timestamp" => $time,
            "TransactionType" => "CustomerPayBillOnline",
            "Amount" => $amount,
            "PartyA" => $phoneNumber,
            "PartyB" => $shortcode,
            "PhoneNumber" => $phoneNumber,
            // "CallBackURL" => route('handle_onlinepayment_result_api') ,
            // "QueueTimeOutURL" => "https://peternjeru.co.ke",// route('handle_QueueTimeOutURL') ,
            "CallBackURL" =>  "https://lagaster.org",
            "QueueTimeOutURL" => "https://lagaster.org",

            "AccountReference" => "Deposite to Wallet",
            "TransactionDesc" => "Deposite to Wallet"
        ];

        try {
            $request = $client->request('POST', $api_url, [
                'headers' => $headers,
                'json' => $data,
            ]);
            $response = $request->getBody()->getContents();
            $response = json_decode($response, true);
            return  $response;
        } catch (\Throwable $th) {

            return $th->getMessage();
        }
    }
}
