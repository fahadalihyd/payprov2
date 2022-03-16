<?php

/*
 * PayPro Basic Configurations.
 */
return [
        // PayPro Client Id        
        'clientId' => env('PAYPRO_CLIENT_ID', null),

        // PayPro Client Secret Id
        'clientSecretId' => env('PAYPRO_CLIENT_SECRET', null),

        // PayPro API Url
        'baseUrl' => env('PAYPRO_BASE_URL', "https://demoapi.paypro.com.pk/v2/ppro"),

        //PayPro Merchant Id
        'merchantId' => env('PAYPRO_MERCHANT_ID', null),
];