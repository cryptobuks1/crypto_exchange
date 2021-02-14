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
							('90cfef0b-6b58-4768-ac3b-cddf200f5867', 'api_secret', 'Coin Market Cap', 1)";

			$wpdb->query($insert_query);

			// Create page on plugin activation

			// Chaek if page exists
			$page_exists = $wpdb->get_row(
				$wpdb->prepare(
					"SELECT * FROM ".$wpdb->prefix."posts WHERE post_name = %s", array('crypto-exchange','coin-list')
				)
			);

			if(!empty($page_exists)){
				// Do Nothing
			}else{
				$crypto_exchange = array(
					'post_title' => 'Crypto Exchange',
					'post_name' => 'crypto-exchange',
					'post_status' => 'publish',
					'post_author' => 1,
					'post_content' => 'Crypto Exchange page content will be update here',
					'post_type' => 'page'
				);

				wp_insert_post($crypto_exchange, $wp_error);

				$coin_list = array(
					'post_title' => 'Coin List Page',
					'post_name' => 'coin-list',
					'post_status' => 'publish',
					'post_author' => 1,
					'post_content' => 'Crypto Exchange page content will be update here',
					'post_type' => 'page'
				);

				wp_insert_post($coin_list, $wp_error);

				$coin_view = array(
					'post_title' => 'Coin View Page',
					'post_name' => 'coin-view',
					'post_status' => 'publish',
					'post_author' => 1,
					'post_content' => 'Crypto Exchange page content will be update here',
					'post_type' => 'page'
				);

				wp_insert_post($coin_view, $wp_error);

				$coin_exchange = array(
					'post_title' => 'Coin Exchange Page',
					'post_name' => 'coin-exchange',
					'post_status' => 'publish',
					'post_author' => 1,
					'post_content' => 'Crypto Exchange page content will be update here',
					'post_type' => 'page'
				);

				wp_insert_post($coin_exchange, $wp_error);

				$activity = array(
					'post_title' => 'Activity',
					'post_name' => 'activity',
					'post_status' => 'publish',
					'post_author' => 1,
					'post_content' => 'Crypto Exchange page content will be update here',
					'post_type' => 'page'
				);

				wp_insert_post($activity, $wp_error);

				$my_account = array(
					'post_title' => 'My Account',
					'post_name' => 'my-account',
					'post_status' => 'publish',
					'post_author' => 1,
					'post_content' => 'Crypto Exchange page content will be update here',
					'post_type' => 'page'
				);

				wp_insert_post($my_account, $wp_error);
			}
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
