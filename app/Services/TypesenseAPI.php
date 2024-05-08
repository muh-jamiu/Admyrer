<?php

namespace App\Services;

use App\Traits\ApiResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class TypesenseAPI
{

    private mixed $apiUrl;
    private mixed $apiKey;
    private Client $client;

    public function __construct()
    {
        $this->apiUrl = env("TYPESENSE_URL") ?? "http://balancer.timbu.cloud:8108/";
        $this->apiKey = env("TYPESENSE_API_KEY") ?? "4S6xm5lisA1i5b7t63rT9qRRe1PowaiR";
        $this->client = new Client();
    }

    public function post($index, $data)
    {
        $url = "{$this->apiUrl}/collections{$index}/documents/search";

        $headers = [
            'Content-Type' => 'application/json',
            'X-TYPESENSE-API-KEY' => $this->apiKey,
        ];

        try {
            $response = $this->client->post($url, [
                'headers' => $headers,
                'json' => $data,
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return $e->getMessage();
            // Handle the exception, e.g., log or rethrow
            Log::error('Request failed: ' . $e->getMessage());
            abort(500);
        } catch (GuzzleException $e) {
            Log::error('Request failed: ' . $e->getMessage());
            // Provide user-friendly error message
            abort(500);
        }
    }

    public function get($index, $queryParams = [])
    {
        $url = "{$this->apiUrl}/collections/{$index}/documents/search";

        $headers = [
            'Content-Type' => 'application/json',
            'X-TYPESENSE-API-KEY' => $this->apiKey,
        ];

        $retryCount = 3;
        for ($i = 0; $i < $retryCount; $i++) {
            try {
                // Make the request
                $response = $this->client->get($url, [
                    'headers' => $headers,
                    'query' => $queryParams,
                ]);

                // Handle successful response
                return new ApiResponse($response);
            } catch (RequestException $e) {
                // Handle Guzzle exceptions
                if ($i < $retryCount - 1) {
                    // Wait for a moment before retrying
                    usleep(500000); // 0.5 seconds
                } else {
                    // Max retries reached, handle the error
                    Log::error('Request failed: ' . $e->getMessage());
                    // Provide user-friendly error message
                    abort(500);
                }
            } catch (GuzzleException $e) {
                Log::error('Request failed: ' . $e->getMessage());
                // Provide user-friendly error message
                abort(500);
            }
        }

    }

}
