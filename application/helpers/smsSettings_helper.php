<?php
/**
 * Created by PhpStorm.
 * User: phemmy
 * Date: 22/12/15
 * Time: 5:38 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');;

/**
 * This is meant to encode in base64 the SMS settings for infobip
 * @param array
 * @response array
 */
/*if(!function_exists('setEncodedString') ) {

    function setEncodedString($data) {
        $data['status'] = false;

        if($data['username'] && $data['password']) {

            $username  = $data['username'];
            $password  = $data['password'];
            $string = $username .":". $password;
            $encodedString = base64_encode($string);
            $decoded = base64_decode($encodedString);

            $data = array(
                'status' => true,
                'response' => $encodedString
            );
        }

        return $data;
    }

}*/


/**
 * This is meant to encode in base64 the SMS settings for infobip
 * @param string
 * @response string
 */
if(!function_exists('getEncodedCredentials') ) {

    function getEncodedCredentials($data) {
        $encodedString = null;

        if($data) {

            $string = $data['username'] .":". $data['password'];
            $encodedString = "Basic ". base64_encode($string);
        }

        return $encodedString;
    }

}

/**
 * This is meant to decode in base64 the SMS settings for infobip
 * @param array
 * @response array
 */
if(!function_exists('getSmsBalance')) {

    function getSmsBalance() {
        $CI =& get_instance();

        $smsConfig = getSmsConfig();

        if(isset($smsConfig['no_sms_config_settings']) && $smsConfig['no_sms_config_settings']) {
            $demo_config_settings = $smsConfig['demo_config_settings'];

            $username  = $demo_config_settings['username'];
            $password  = $demo_config_settings['password'];
            $url  = $demo_config_settings['url'];
        } else {
            $username = $smsConfig['config_settings']->account_holder;
            $password = $CI->encrypt->decode(trim($smsConfig['config_settings']->account_password));
            $url = $smsConfig['config_settings']->api_base_url.''.$smsConfig['config_settings']->account_balance_url;
        }

        $encodedString = getEncodedCredentials(array(
            'username' => $username,
            'password' => $password
        ));

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'authorization: ' . $encodedString
            )
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string

        try {
            // Send the request
            $result = curl_exec($curl);
        } catch (Exception $ex) {
             $result['status'] = 'failure';
        }

        if (!empty($result)) {
            $result = json_decode($result);

            if(isset($result->requestError)) {
                $responseArray = false;
            } else {
                $responseArray = $result;
            }

        } else {
            $responseArray = false;
        }

        // Free up the resources $curl is using
        curl_close($curl);

        return $responseArray;
    }

}


/**
 * This is meant to decode in base64 the SMS settings for infobip
 * @param array
 * @response array
 */
if(!function_exists('sendSms')) {

    function sendSms($data) {
        $CI =& get_instance();

        $smsConfig = getSmsConfig();

        if(isset($smsConfig['no_sms_config_settings']) && $smsConfig['no_sms_config_settings']) {
            $demo_config_settings = $smsConfig['demo_config_settings'];

            $username  = $demo_config_settings['username'];
            $password  = $demo_config_settings['password'];
            $url  = $demo_config_settings['url'];
        } else {
            $username = $smsConfig['config_settings']->account_holder;
            $password = $CI->encrypt->decode(trim($smsConfig['config_settings']->account_password));
            $url = $smsConfig['config_settings']->api_base_url.''.$smsConfig['config_settings']->single_sms_url;
        }

        $string = $username .":". $password;
        $encodedString = "Basic ". base64_encode($string);

        $payload = json_encode(array(
            'from'  => $data['sender'],
            'to'    => $data['recipient'],
            'text'  => $data['message']
        ));

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Accept: application/json',
                'authorization: ' . $encodedString
            )
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string

        try {
            // Send the request
            $result = curl_exec($curl);
        } catch (Exception $ex) {
            $result['status'] = 'failure';
        }

        if (!empty($result)) {
            $responseArray = json_decode($result);
            //$responseArray = $responseArray['balance'];
        } else {
            $responseArray = false;
        }

        // Free up the resources $curl is using
        curl_close($curl);

        return $responseArray;
    }

}


if(!function_exists('getSmsConfig') ) {

    function getSmsConfig() {
        $CI =& get_instance();
        $CI->load->model('smsconfig_model');

        $configSettings = $CI->smsconfig_model->get_config_settings();

        if(!empty($configSettings)) {
            $response['config_settings'] = $configSettings[0];
        } else {
            $response['no_sms_config_settings'] = true;
            $response['demo_config_settings'] = array(
                'username' => 'adexphem',
                'password' => '123@kongA',
                'url' => 'https://api.infobip.com/sms/1/text/single'
            );
        }

        return $response;
    }

}



?>
