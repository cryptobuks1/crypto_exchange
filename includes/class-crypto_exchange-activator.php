<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/manishankarvakta
 * @since      1.0.0
 *
 * @package    Crypto_exchange
 * @subpackage Crypto_exchange/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Crypto_exchange
 * @subpackage Crypto_exchange/includes
 * @author     Manishankar Vakta <manishankarvakta@gmail.com>
 */
class Crypto_exchange_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {
		require_once(ABSPATH."wp-admin/includes/upgrade.php");

		global $wpdb;

		// Check table
		if( $wpdb->get_var("SHOW tables like '".$this->table_name('crypto_exchange')."'") != $this->table_name('crypto_exchange')){
			
			//Create Dynamic Table
			$table_query = "CREATE TABLE ".$this->table_name('crypto_exchange')."(
							ID   INT  NOT NULL AUTO_INCREMENT,
							api_key VARCHAR (150)     NOT NULL,
							api_secret VARCHAR (150)    NULL,
							api_site  VARCHAR (150)     NOT NULL,
							users  INT   NOT NULL,
							status  INT   NOT NULL DEFAULT 0,
							created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
							PRIMARY KEY (ID)
							) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	
			dbDelta($table_query);

		}


	}

	public function table_name($name){
		global $wpdb;
		return $wpdb->prefix.''.$name;
	}

}
