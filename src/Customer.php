<?php

namespace Fahadalihyd\Payprov2;

use Exception;
use Fahadalihyd\Payprov2\Utilities\Config;
use Illuminate\Support\Facades\Http;

class Customer
{
    use Config;

    private  $customer_params = [
        "ConsumerID",
        "Name",
        "Mobile",
        "Email",
        "Address"
    ];


    /**
     *  Create Multiple Customer
     * 
     *  @param array $customer [["ConsumerID", "Name", "Mobile", "Email", "Address"]]
     *  @throws Exception
     */

    public function createMultiple($customers = [])
    {

        if (!isset($customers[0])) {
            throw new Exception("Invalid data!");
        }

        $form_data = [
            ['MerchantId' => $this->merchant]
        ];

        foreach ($customers as $key => $customer) {
            $this->validateParams($this->customer_params , $customer);
            $form_data[] = $customer;
        }

        $response = $this->client->post($this->url."/cmc" , $form_data)->throw();
        if ($response->successful()) {
            return $response->object();
        }
    }


      /**
     *  Update Single Customer
     * 
     *  @param array $customer ["ConsumerID", "Name", "Mobile", "Email", "Address"]
     *  @throws Exception
     */

    public function update($customer = [])
    {
        $form_data = [
            ['MerchantId' => $this->merchant]
        ];

        $this->validateParams($this->customer_params , $customer);
        $form_data[] = $customer;

        $response = $this->client->post($this->url."/uc" , $form_data)->throw();

        if ($response->successful()) {
            return $response->object();
        }
    }


    /**
     *  Update Multiple Customer
     *  
     *  @param array $customers [["ConsumerID", "Name", "Mobile", "Email", "Address"]]
     *  @throws Exception
     */

    public function updateMultiple($customers = [])
    {

        if (!isset($customers[0])) {
            throw new Exception("Invalid data!");
        }

        $form_data = [
            ['MerchantId' => $this->merchant]
        ];

        foreach ($customers as $key => $customer) {
            $this->validateParams($this->customer_params , $customer);
            $form_data[] = $customer;
        }

        $response = $this->client->post($this->url."/umc" , $form_data)->throw();
        if ($response->successful()) {
            return $response->object();
        }
    }

}