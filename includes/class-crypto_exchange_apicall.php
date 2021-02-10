<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/manishankarvakta
 * @since      1.0.0
 *
 * @package    Crypto_exchange
 * @subpackage Crypto_exchange/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Crypto_exchange
 * @subpackage Crypto_exchange/includes
 * @author     Manishankar Vakta <manishankarvakta@gmail.com>
 */
class Crypto_exchange_Apicall {
   
    public function get_api_key(){
        //get api data form database
    global $wpdb;

    // get api 
    $api = $wpdb->get_row(
        $wpdb->prepare("SELECT * FROM ".$this->prefix."crypto_exchange WHERE status = 1")
    );
    
    print_r($api);
	
    }
}
