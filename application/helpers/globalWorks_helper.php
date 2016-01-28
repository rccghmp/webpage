<?php
/**
 * Created by PhpStorm.
 * User: phemmy
 * Date: 24/12/15
 * Time: 8:59 PM
 */

if(!function_exists('getCurDateStamp') ) {

    function getCurDateStamp() {

        return date("d:m:Y h:i:sa");

    }

}

if(!function_exists('getRandomString') ) {

    function getRandomString($length) {

        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;

    }

}


/**
 * This strip out all trailing spaces and also fomrat the phone numbers suppliesd
 * i.e 08091234567 changes to 2348091234567
 *
 */
if(!function_exists('phoneNumberValidation')) {

    function phoneNumberValidation($data) {

        if (strpos($data, ',') !== FALSE) {

            $result = array();

            $phoneNumbers = explode(',', $data);

            foreach($phoneNumbers as $key => $value) {
                $number =  trim($value);

                if (preg_match("/^[0-9]{11}$/", $number)) {
                    $result[$key] = "234". substr($number, 1);
                } else {
                    continue;
                }
            }

        } elseif(strlen(trim($data)) == 11) {

            $data = "234". substr($data, 1);
            $result[] = $data;

        } else {
            $result = null;
        }

        return $result;
    }

}
?>