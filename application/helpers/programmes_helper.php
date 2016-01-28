<?php
/**
 * Created by PhpStorm.
 * User: phemmy
 * Date: 22/12/15
 * Time: 5:38 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');;

if(!function_exists('getProgramOccurence') ) {

    function getProgramOccurence() {
        $data = array(
            'one-off' => 'One-off',
            'daily' => 'Daily',
            'weekly' => 'Weekly',
            'monthly' => 'Monthly',
            'yearly' => 'Yearly'
        );
        return $data;
    }

}

?>
