<?php

namespace App\Services;

use App\Concerns\Services\Cpm\Api;
use App\Traits\ApiResponse;
use CURLFile;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Multipart
{

    private $API_URL;
    private $client;
    protected $config;
    protected mixed $organization_id;

    public function __construct(string $url = '')
    {
        $this->API_URL = strlen($url) == 0 ? config('timbu.api_url') : $url;
        $this->client = new Client(['base_uri' => $this->API_URL]);
        $this->config = config('siteConfig.sitewide');
        $this->organization_id = $this->config['ORGANIZATION_ID'];
    }

    public function formatMultipartForm($path, $body = [], $method)
    {
        $queryParameters = http_build_query([
            'Apikey' => config('timbu.api_key'),
            'Appid' => config('timbu.app_id'),
            "organization_id" =>  $this->organization_id
        ]);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.timbu.cloud/$path?" . $queryParameters,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data"
            ),
        ));

        // Execute the cURL request
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // Handle cURL error
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }


}
