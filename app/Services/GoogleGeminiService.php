<?php

namespace App\Services;

use GuzzleHttp\Client;

class GoogleGeminiService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'timeout'  => 60,  // 60 seconds timeout
        ]);
        $this->apiKey = env('GOOGLE_GEMINI_API_KEY') ?? "AIzaSyAF3l3ODTEHgGnhqf6Il4D9tPo-MrwuKaI";
    }

    public function generateChatResponse($messages)
    {
        $response = $this->client->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=$this->apiKey", [
            'headers' => [
                'Authorization' => $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'gemini-1.5', // Use the appropriate model name
                'contents' => $messages,
            ],
        ]);

        $body = $response->getBody();
        return json_decode($body, true);
    }
}
