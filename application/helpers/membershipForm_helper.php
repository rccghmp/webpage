<?php
/**
 * Created by PhpStorm.
 * User: phemmy
 * Date: 22/12/15
 * Time: 5:38 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');;

if(!function_exists('say_hello') ) {

    function say_hello( $name = 'world' ) {
        return 'Hello ' . $name;
    }

}

if(!function_exists('getAgeGroup') ) {

    function getAgeGroup() {
        $data = array(
            'age_grp1' => 'Day Old - 2 years',
            'age_grp2' => '3 years - 8 years',
            'age_grp3' => '9 years - 12 years',
            'age_grp4' => '13 years - 19 years'
        );
        return $data;
    }

}


if(!function_exists('getMaritalStatus') ) {

    function getMaritalStatus() {
        $data = array(
            'marital01' => 'Single',
            'marital02' => 'Engaged',
            'marital03' => 'Married',
            'marital04' => 'Single Parent',
            'marital05' => 'Divorced',
            'marital06' => 'Separated',
            'marital07' => 'Widow',
            'marital08' => 'Widower',
            'marital09' => 'Not Stated'
        );
        return $data;
    }

}

if(!function_exists('getDobMonths') ) {
    function getDobMonths() {
        $months = ['1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June',
            '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November',
            '12' => 'December'];
        return $months;
    }
}

if(!function_exists('getDobDays') ) {
    function getDobDays() {
        $days = range(1,31);
        return $days;
    }
}

?>
