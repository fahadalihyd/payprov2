<?php

namespace Fahadalihyd\Payprov2;

use Exception;
use Fahadalihyd\Payprov2\Utilities\Config;
use Illuminate\Support\Facades\Http;

class Order
{
    use Config;

    private  $order_params = [
        "OrderNumber",
        "OrderAmount",
        "OrderDueDate",
        "OrderType",
        "IssueDate",
        "OrderExpireAfterSeconds",
        "CustomerName",
        "CustomerMobile",
        "CustomerEmail",
        "CustomerAddress"
    ];

    /**
     *  Create Single Order
     * 
     *  @param array $order ["OrderNumber", "OrderAmount", "OrderDueDate", "OrderType", "IssueDate", "OrderExpireAfterSeconds", "CustomerName", "CustomerMobile", "CustomerEmail", "CustomerAddress"]
     *  @throws Exception
     */

    public function create($order = [])
    {
        $form_data = [
            ['MerchantId' => $this->merchant]
        ];

        $this->validateParams($this->order_params , $order);

        $form_data[] = $order;

        $response = $this->client->post($this->url."/co" , $form_data)->throw();
        
        if ($response->successful()) {
            return json_encode($response->json());
        }
    }

    /**
     *  Create Multiple Orders
     *  @
     *  @param array $orders [["OrderNumber", "OrderAmount", "OrderDueDate", "OrderType", "IssueDate", "OrderExpireAfterSeconds", "CustomerName", "CustomerMobile", "CustomerEmail", "CustomerAddress"]]
     *  @throws Exception
     */

    public function createMultiple($orders = [])
    {

        if (!isset($orders[0])) {
            throw new Exception("Invalid data!");
        }

        $form_data = [
            ['MerchantId' => $this->merchant]
        ];

        foreach ($orders as $key => $order) {
            $this->validateParams($this->order_params , $order , $key);
            $form_data[] = $order;
        }

        
        $response = $this->client->post($this->url."/cmo" , $form_data)->throw();
        if ($response->successful()) {
            return json_decode($response->json());
        }
    }


    /**
     *  Mark Order Paid
     *  
     *  @param mixed $order_id
     *  @throws Exception
     */

    public function markPaid($order_id)
    {

        $form_data = ['Username' => $this->merchant , 'CsvOrderNumbers' => $order_id];
        
        $response = $this->client->post($this->url."/moap" , $form_data)->throw();
        if ($response->successful()) {
            return json_decode($response->json());
        }
    }

    /**
     *  Mark Multiple Order Paid
     *  
     *  @param Array $order_ids ["Test-802","Test-802"]
     *  @throws Exception
     */

    public function markMultiplePaid(Array $order_ids)
    {
        $csv_order_numbers = implode(',' , $order_ids);
        $form_data = ['Username' => $this->merchant , 'CsvOrderNumbers' => $csv_order_numbers];
        
        $response = $this->client->post($this->url."/moap" , $form_data)->throw();
        if ($response->successful()) {
            return json_decode($response->json());
        }
    }

    /**
     *  Block Order
     *  
     *  @param mixed $order_id
     *  @throws Exception
     */

    public function block($order_id)
    {

        $form_data = ['Username' => $this->merchant , 'CsvOrderNumbers' => $order_id];
        
        $response = $this->client->get($this->url."/moab" , $form_data)->throw();
        if ($response->successful()) {
            return json_decode($response->json());
        }
    }


     /**
     *  Multiple Order Block
     *  
     *  @param Array $order_ids ["Test-802","Test-802"]
     *  @throws Exception
     */

    public function blockMultiple(Array $order_ids)
    {
        $csv_order_numbers = implode(',' , $order_ids);
        $form_data = ['Username' => $this->merchant , 'CsvOrderNumbers' => $csv_order_numbers];
        
        $response = $this->client->get($this->url."/moab" , $form_data)->throw();
        
        if ($response->successful()) {
            return json_decode($response->json());
        }
    }

     /**
     *  Get Order Status
     *  
     *  @param mixed $cpay_id 
     *  @throws Exception
     */

    public function status(Array $cpay_id)
    {
        $form_data = ['userName' => $this->merchant , 'cpayId' => $cpay_id];
        
        $response = $this->client->get($this->url."/ggos" , $form_data)->throw();

        if ($response->successful()) {
            return json_decode($response->json());
        }
    }
    
     /**
     *  Get Paid Orders
     *  
     *  @param date $start
     *  @param date $end 
     *  @throws Exception
     */

    public function getPaid($start , $end)
    {
        $form_data = ['Username' => $this->merchant , 'startDate' => $start , 'endDate' => $end];
        
        $response = $this->client->get($this->url."/gpo" , $form_data)->throw();

        if ($response->successful()) {
            return json_decode($response->json());
        }
    }

}
