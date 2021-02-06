<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/manishankarvakta
 * @since      1.0.0
 *
 * @package    Crypto_exchange
 * @subpackage Crypto_exchange/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Crypto_exchange
 * @subpackage Crypto_exchange/admin
 * @author     Manishankar Vakta <manishankarvakta@gmail.com>
 */
class Crypto_exchange_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Crypto_exchange_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Crypto_exchange_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/crypto_exchange-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Crypto_exchange_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Crypto_exchange_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/crypto_exchange-admin.js', array( 'jquery' ), $this->version, false );

	}

	// Create Manu
	public function exchange_menu(){
		add_menu_page( 
			"Crypto Exchange", 
			"Crypto Exchange", 
			"manage_options", 
			"crypto-exchange-dashboard", 
			array($this, "crypto_exchange_dashboard"),
			"dashicons-money-alt", 
			20
		);
		add_submenu_page(
			"crypto-exchange-dashboard", 
			"Dashboard", 
			"Dashboard", 
			"manage_options", 
			"crypto-exchange-dashboard", 
			array($this, "crypto_exchange_dashboard"),
			"dashicons-admin-generic",
			0 
		);
		// add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null )
		add_submenu_page(
			"crypto-exchange-dashboard", 
			"Setting", 
			"Setting", 
			"manage_options", 
			"crypto-exchange-setting", 
			array($this, "crypto_exchange_setting"),
			"dashicons-admin-generic",
			1 
		);
	}

	// dashboard menu Callbsck Function
	public function crypto_exchange_dashboard(){
		global $wpdb;
		// $name =  $wpdb->get_var("SELECT display_name from wp_users");

		// $user_data = $wpdb->get_row(
		// 	"SELECT * from wp_users WHERE ID=1",
		// 	ARRAY_A
		// );
		// echo "<pre>";
		// print_r($user_data);
		// echo "</pre>";
		// echo "<h2>Hello ".$user_data['display_name']."!</h2><hr><h3>Welcome to Crypto Exchange Deshboard<h3>";

		$wp_post = $wpdb->get_col(
			$wpdb->prepare(
				"SELECT post_title FROM wp_posts WHERE post_type = %s",
				'post'
			)
		);

		echo "<pre>";
		print_r($wp_post);
		echo "</pre>";
	}

	// Setting menu Callbsck Function
	public function crypto_exchange_setting(){
		echo "<h3>Welcome to Crypto Exchange Setting<h3>";
	}

}
