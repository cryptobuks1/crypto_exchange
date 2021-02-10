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
class Crypto_exchange_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	private $table_activator;

	public function __construct($activator){
		$this->table_activator = $activator;
	}

	public function deactivate() {
		global $wpdb;

		// Drop table on uninstall
		$wpdb->query("DROP TABLE IF EXISTS ".$this->table_activator->table_name('crypto_exchange'));
		$wpdb->query("DROP TABLE IF EXISTS ".$this->table_activator->table_name('crypto_exchange_setting'));

		$pages = array('crypto-exchange', 'coin-list', 'coin-view', 'coin-exchange', 'activity', 'my-account');
		
		foreach($pages as $page){
			$page_id = $this::page_id($page);
			if($page_id > 0){
				wp_delete_post($page_id, true);
			}
		}

	}

	public function page_id($slug=NULL){
		global $wpdb;

		$page_id =  $wpdb->get_var(
			$wpdb->prepare(
				"SELECT ID FROM wp_posts WHERE post_name = %s",
				$slug
			)
		);

		return $page_id;
	}

}
