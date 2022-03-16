<?php

namespace Fahadalihyd\Payprov2;

use Fahadalihyd\Payprov2\Utilities\Config;
use Illuminate\Support\Facades\Http;

class Payprov2
{
    use Config;


    /**
     *  Create Single Order
     * 
     *  @param array $order_data ["OrderNumber", "OrderAmount", "OrderDueDate", "OrderType", "IssueDate", "OrderExpireAfterSeconds", "CustomerName", "CustomerMobile", "CustomerEmail", "CustomerAddress"]
     *  @return Array|Object
     *  @throws Exception
     */


    public static function orderCreate()
    {

     $order_data =   [
            "OrderNumber" => "Test-804",
            "OrderAmount" => "200",
            "OrderDueDate" => "25/10/2021",
            "OrderType" => "Service",
            "IssueDate" => "05/05/2021",
            "OrderExpireAfterSeconds" => "0",
            "CustomerName" => "Fahad",
            "CustomerMobile" => "",
            "CustomerEmail" => "",
            "CustomerAddress" => ""
        ];

        (new Order())->create($order_data);
    }

    /**
     *  Create Multiple Orders
     * 
     *  @param array $order_data [
     *      ["OrderNumber", "OrderAmount", "OrderDueDate", "OrderType", "IssueDate", "OrderExpireAfterSeconds", "CustomerName", "CustomerMobile", "CustomerEmail", "CustomerAddress"]
     * ]
     * 
     *  @return Array|Object
     *  @throws Exception
     */


    public static function orderCreateMultiple()
    {

     $order_data =   [
            [
            "OrderNumber" => "Test-804",
            "OrderAmount" => "200",
            "OrderDueDate" => "25/10/2021",
            "OrderType" => "Service",
            "IssueDate" => "05/05/2021",
            "OrderExpireAfterSeconds" => "0",
            "CustomerName" => "Fahad",
            "CustomerMobile" => "",
            "CustomerEmail" => "",
            "CustomerAddress" => ""
            ],
            [
            "OrderNumber" => "Test-804",
            "OrderAmount" => "200",
            "OrderDueDate" => "25/10/2021",
            "OrderType" => "Service",
            "IssueDate" => "05/05/2021",
            "OrderExpireAfterSeconds" => "0",
            "CustomerName" => "Fahad",
            "CustomerMobile" => "",
            "CustomerEmail" => "",
            "CustomerAddressX" => ""
            ],
        ];

        (new Order())->createMultiple($order_data);
    }

    /**
     *  Paid Order
     * 
     *  @param mixed $order_id 
     * 
     *  @return Array|Object
     *  @throws Exception
     */


    public static function orderPaid($order_id)
    {
        (new Order())->markPaid($order_id);
    }

    /**
     *  Paid Multiple Order
     * 
     *  @param Array $order_ids  ["Test-802","Test-802"] 
     * 
     *  @return Array|Object
     *  @throws Exception
     */


    public static function orderPaidMultiple($order_ids)
    {
        (new Order())->markPaid($order_ids);
    }


    /**
     *  Block Order
     * 
     *  @param mixed $order_id 
     * 
     *  @return Array|Object
     *  @throws Exception
     */


    public static function orderBlock($order_id)
    {
        (new Order())->block($order_id);
    }

    /**
     *  Block Multiple Order
     * 
     *  @param Array $order_ids  ["Test-802","Test-802"]
     * 
     *  @return Array|Object
     *  @throws Exception
     */


    public static function orderBlockMultiple($order_ids)
    {
        (new Order())->blockMultiple($order_ids);
    }


    /**
     *  Get Order Status
     * 
     *  @param mixed $cpay_id  
     * 
     *  @return Array|Object
     *  @throws Exception
     */


    public static function orderStatus($cpay_id)
    {
        (new Order())->status($cpay_id);
    }

    /**
     *  Get Paid Orders
     * 
     *  @param date $start_date  
     *  @param date $end_date
     * 
     *  @return Array|Object
     *  @throws Exception
     */


    public static function getPaidOrders($start_date  , $end_date)
    {
        (new Order())->getPaid($start_date , $end_date);
    }


    /**
     *  Create Multiple Customers
     * 
     *  @param array $customer_data [
     *     ["ConsumerID", "Name", "Mobile", "Email", "Address"]
     * ]
    *   @return Array|Object
     *  @throws Exception
     */


    public static function customerCreateMultiple()
    {

     $customer_data =   [
            [
                "ConsumerID" => "7867861",
                "Name" => "Userone",
                "Mobile" => "03001234567",
                "Email" => "abcde@paypro.com.pk",
                "Address" => "Address"
            ],
        ];

        (new Customer())->createMultiple($customer_data);
    }


    /**
     *  Update Multiple Customers
     * 
     *  @param array $customer_data [
     *          ["ConsumerID", "Name", "Mobile", "Email", "Address"]
     *  ]
     * 
     *  @return Array|Object
     *  @throws Exception
     */


    public static function customerUpdateMultiple()
    {

     $customer_data =   [
            [
                "ConsumerID" => "7867861",
                "Name" => "Userone",
                "Mobile" => "03001234567",
                "Email" => "abcde@paypro.com.pk",
                "Address" => "Address"
            ],
        ];

        (new Customer())->updateMultiple($customer_data);
    }


    /**
     *  Update Customer
     * 
     *  @param array $customer_data ["ConsumerID", "Name", "Mobile", "Email", "Address"]]
     *  
     * 
     *  @return Array|Object
     *  @throws Exception
     */


    public static function customerUpdate()
    {

     $customer_data =   [
            [
                "ConsumerID" => "7867861",
                "Name" => "Userone",
                "Mobile" => "03001234567",
                "Email" => "abcde@paypro.com.pk",
                "Address" => "Address"
            ],
        ];

        (new Customer())->update($customer_data);
    }
}
