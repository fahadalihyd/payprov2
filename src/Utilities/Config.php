<?php

namespace Fahadalihyd\Payprov2\Utilities;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

trait Config
{
    protected $url;
    protected $merchant;
    protected $client;

    public function __construct()
    {
        $this->url = config('payprov2.baseUrl');
        $this->merchant = config('payprov2.merchantId');
        $this->client = Http::withHeaders([
            'token' => $this->getAccessToken()
        ]);
    }

    /**
     * Check if config uses wild card search.
     *
     * @return bool
     */
    public function clientId()
    {
        return config('payprov2.clientId');
    }

    /**
     * Check if config uses wild card search.
     *
     * @return bool
     */
    public function clientSecretId()
    {
        return config('payprov2.clientSecretId');
    }


    public function baseUrl()
    {
        return config('payprov2.base_url');
    }

    /**
     * Return Access Token 
     * 
     *  @return string
     *  @throws Exception
     */

    public function getAccessToken()
    {
        $form_data = [
            "clientid" => $this->clientId(),
            "clientsecret" => $this->clientSecretId()
        ];
        $response = Http::post($this->url . "/auth", $form_data)->throw();

        if ($response->successful()) {
            $headers = $response->getHeaders();
            Cookie::queue('token', $headers['Token'][0], (int)$headers['TokenExpiry'][0]);
            return $headers['Token'][0];
        }
    }


    /**
     * Validate order required params
     * 
     * @param array $order_data
     * @param int $index
     * @throws Exception
     */

    public  function validateParams(Array $params_keys ,  Array $data , $index = null)
    {
        foreach ($params_keys as $key => $value) {
            if (!array_key_exists($value , $data)) {
                $index_text = isset($index) ? "at the index[{$index}]" : '';
                throw new Exception("Order key is missing $value {$index_text}");
            }
        }        
    }
}
