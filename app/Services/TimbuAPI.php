<?php
namespace App\Services;

use App\Concerns\Services\Cpm\Api;
use App\Traits\ApiResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TimbuAPI 
{
    private $API_URL;
    private $client;

    public function __construct(string $url = '')
    {
        $this->API_URL = strlen($url) == 0 ? config('timbu.api_url') : $url;
        $this->client = new Client(['base_uri' => $this->API_URL]);
    }


	/**
	 * Default header for request
	 */
	protected static function header(): array
	{

		return [
			'Content-Type' => 'application/json',
		];
	}

    /**
	 * Formats data if form is multipart
	 */
	protected static function formatMultipartData($body): array
	{
		$options['multipart'] = $body['multipart'];
		$header = self::header();
		unset($header['Content-Type']);
		$options['headers'] = $header;

		return $options;
	}

    public function get(string $url, array $params = [], array $header = null): ApiResponse
    {
        try {
            $param = [
                'query' => array_merge($params, ['Apikey' => config('timbu.api_key'), 'Appid' => config('timbu.app_id')])
            ];

            $response = $this->client->get($url, $param);

            return new ApiResponse($response);
        } catch (GuzzleException $ex) {
            return new ApiResponse($ex);
        }
    }


	


    /**
	 * Submit post request to API
	 * @param string $path
	 * @param array $body
	 * @return ApiResponse
	 */
	public function post(string $path, array $body, array $header = null): ApiResponse
	{
		try {

			if (isset($body['multipart'])) {
				$options = self::formatMultipartData($body);
				$options['query'] = ['email' => config('timbu.api_email'), 'password' => config('timbu.api_pass')];
			} else {
				$options['json'] = $body;
				$options['headers'] = $header ?? self::header();
				$options['query'] = ['Apikey' => config('timbu.api_key'), 'Appid' => config('timbu.app_id')];
			}

			$response = $this->client->post($path, $options);
			return new ApiResponse($response);
		} catch (GuzzleException  $e) {
			return new ApiResponse($e);
		} catch (\Exception $e) {
			return new ApiResponse($e);
		}
	}



	/**
	 * Submit put request to API
	 * @param string $path
	 * @param array $body
	 * @return ApiResponse
	 */
	public function put(string $path, array $body, array $header = null)
	{
		try {

			if (isset($body['multipart'])) {
				$options = self::formatMultipartData($body);
				$options['query'] = ['email' => config('timbu.api_email'), 'password' => config('timbu.api_pass')];
			} else {
				$options['json'] = $body;
				$options['headers'] = $header ?? self::header();
				$options['query'] = ['Apikey' => config('timbu.api_key'), 'Appid' => config('timbu.app_id')];
			}

			$response = $this->client->put($path, $options);
			return new ApiResponse($response);
		} catch (GuzzleException  $e) {
			return new ApiResponse($e);
		} catch (\Exception $e) {
			return new ApiResponse($e);
		}
	}


	/**
	 * Submit delete request to API
	 * @param string $path
	 * @param array $body
	 * @return ApiResponse
	 */
	public function delete(string $path, array $body, $params,array $header = null): ApiResponse
	{
		try {

			if (isset($body['multipart'])) {
				$options = self::formatMultipartData($body);
				$options['query'] = ['email' => config('timbu.api_email'), 'password' => config('timbu.api_pass')];
			} else {
				$options['json'] = $body;
				$options['headers'] = $header ?? self::header();
				$options['query'] = ['Apikey' => config('timbu.api_key'), 'Appid' => config('timbu.app_id')];
			}

			$response = $this->client->delete($path, $options);
			return new ApiResponse($response);
		} catch (GuzzleException  $e) {
			return new ApiResponse($e);
		} catch (\Exception $e) {
			return new ApiResponse($e);
		}
	}
}