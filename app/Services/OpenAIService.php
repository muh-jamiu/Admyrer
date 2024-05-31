<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenAIService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY') ?? "sk-proj-EDVHe3lQEmZjROcHRACVT3BlbkFJewfFvBccAYZP4LihY7xs";
    }

    public function generateChatResponse($messages)
    {
        $response = $this->client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => $messages,
                'max_tokens' => 150,
            ],
        ]);

        $body = $response->getBody();
        return json_decode($body, true);
    }
}
