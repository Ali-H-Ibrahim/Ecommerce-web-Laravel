<?php


namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

//use http\Client;

class FatoorahService
{

    protected $base_url;

    protected $headers;

    protected $request_client;

    public function __construct(Client $request_client)
    {
        $this->request_client = $request_client;
        $this->base_url = env('fatoorah_base_url');

        $this->headers = [
            'Accept'       => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('fatoorah_token')
        ];
    }


    public function buildRequest($url, $method, $body = [])
    {
        //try {
        $request = new Request($method, $this->base_url . $url, $this->headers);

        //if (!$body)
           // return false;
        $response = $this->request_client->send($request, [
            'JSON' => $body,
            'verify'  => false,
        ]);
    // } catch (\Exception $ex) {
    //     echo $ex->getMessage()." ".$ex->getLine()." ".$ex->getFile();
    // }

        if ($response->getStatusCode() != 200){
            //return false;
        }

        $response = json_decode($response->getBody(), true);

        return $response;

    }

    public function sendPayment($data)
    {
        return $response = $this->buildRequest('/v2/SendPayment', 'POST', $data);
	}


}
