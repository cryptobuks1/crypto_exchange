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
							api_key VARCHAR (150)     NULL,
							api_secret VARCHAR (150)    NULL,
							api_site  VARCHAR (150)     NOT NULL,
							users  INT   NOT NULL,
							status  INT   NOT NULL DEFAULT 0,
							created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
							PRIMARY KEY (ID)
							) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	
			dbDelta($table_query);

			// Insert data on activation
			$insert_query = "INSERT into ".$this->table_name('crypto_exchange')." (api_key, api_secret, api_site, users) VALUES 
							('sdgjknfds;gijafsdo', 'fdadjghf;ghad;fi', 'coinmarketcap', 1),
							('sdgjknfds;gijafsdo', 'fdadjghf;ghad;fi', 'Binance API', 1),
							('sdgjknfds;gijafsdo', 'fdadjghf;ghad;fi', 'Bittrex API', 1),
							('sdgjknfds;gijafsdo', 'fdadjghf;ghad;fi', 'Poloniex API', 1),
							('sdgjknfds;gijafsdo', 'fdadjghf;ghad;fi', 'Coinbase API', 1),
							('sdgjknfds;gijafsdo', 'fdadjghf;ghad;fi', 'Hitbtc API', 1)";

			$wpdb->query($insert_query);
		}


		// Check table user_setting
		if( $wpdb->get_var("SHOW tables like '".$this->table_name('crypto_exchange_setting')."'") != $this->table_name('crypto_exchange_setting')){
			
			//Create Dynamic Table
			$table_query = "CREATE TABLE ".$this->table_name('crypto_exchange_setting')."(
							ID   INT  NOT NULL AUTO_INCREMENT,
							currency VARCHAR (150)     NOT NULL,
							currency_icon VARCHAR (150)  NOT  NULL,
							currency_position INT    NULL,
							time_zone VARCHAR (150)    NULL,
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
