<?php
namespace App\Traits;

use Illuminate\Support\Facades\Log;

class ApiResponse
{

    protected string $statusCode;

    protected string $message = '';

    protected string $response;

    public function __construct($request)
    {
        $this->response = "{}";
        $this->statusCode = method_exists($request, 'getCode') ? $request->getCode() : $request->getStatusCode();

        if ($this->statusCode >= 300 || $this->statusCode == 0) {

            switch (get_class($request)) {

                case "GuzzleHttp\Exception\ServerException":
                    $this->handleServerException($request);
                    break;

                case "GuzzleHttp\Exception\ClientException":
                    $this->handleClientException($request);
                    break;

                case "GuzzleHttp\Exception\ConnectException":
                    $this->handleConnectException($request);
                    break;

                default:
                    $this->handleException($request);
                    break;
            }
        } else {
            $this->handleSuccess($request);
        }
    }

    private function handleSuccess($request)
    {
        $this->response = $request->getBody();
    }

    private function handleClientException(\GuzzleHttp\Exception\ClientException $request)
    {

        $response = json_decode($request->getResponse()->getBody()->getContents(), true);
        if (isset($response['detail'])) {
            $this->response = gettype($response['detail']) === 'string' ?
                $response['detail'] : json_encode($response['detail']);
            $this->message = gettype($response['detail']) === 'string' ?
                $response['detail'] : json_encode($response['detail']);
        } elseif (isset($response['message'])) {
            $this->response = $response['message'];
            $this->message = $response['message'];
        } elseif (isset($response['error'])) {
            // dd($response);
            $this->response = $response['error'];
            $this->message = $response['error'];
        } else {
            $this->response = "Default Validation Error";
            $this->message = "Default Validation Error";
        }

        Log::error((string) $request->getRequest()->getUri() . " " . $this->message);
    }


    private function handleException(\Exception $request)
    {
        $this->message = (string) $request->getMessage();
        Log::error($this->message);
    }

    private function handleConnectException(\GuzzleHttp\Exception\ConnectException $request)
    {
        $this->message = "We could not connect to the server";
        Log::error((string) $request->getRequest()->getUri() . " " . $this->message);
    }


    //
    private function handleServerException(\GuzzleHttp\Exception\ServerException $request)
    {
        $error = json_decode($request->getResponse()->getBody()->getContents());

        $this->message = $error->message ??
            $error->detail
            ?? "Something went wrong, kindly try again";

        Log::error((string) $request->getRequest()->getUri() . " " . $this->message);

        return (string) $this->message;
    }


    /**
     * Returns true if a requests was successful
     */
    public function isSuccessful(): bool
    {
        return !(($this->statusCode >= 300 || $this->statusCode == 0));
    }


    /**
     * Returns response status code
     */
    public function getStatusCode(): string
    {
        return $this->statusCode;
    }


    /**
     * Returns response message
     */
    public function getMessage(): string
    {
        return $this->message;
    }

  

    /**
     * Returns a JSON response from the API
     * @param bool $decode - Specifies if response should be converted to JSON format. True by default
     * @param bool $assoc
     */
    public function getResponse(bool $decode = true, bool $assoc = false)
    {
        return $decode ? json_decode($this->response, $assoc) : $this->response;
    }

    
}