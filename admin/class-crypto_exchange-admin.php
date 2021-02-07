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

		$valid_page = array("crypto-exchange-dashboard", "crypto-exchange-setting");
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";


		if(in_array($page, $valid_page)){
			wp_enqueue_style( 'ce_bootstrap', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/css/bootstrap.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'ce_data_table', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/css/dataTables.bootstrap4.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'ce_sweet_alert', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/css/sweetalert.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'ce_font_awesome', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/css/font-awesome.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/crypto_exchange-admin.css', array(), $this->version, 'all' );
		}


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

		$valid_page = array("crypto-exchange-dashboard", "crypto-exchange-setting");
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";


		if(in_array($page, $valid_page)){

			wp_enqueue_script( 'ce_bootstrap_jquery_js', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'ce_jquery_data_table_js', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/js/jquery.dataTables.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'ce_bootstrap_data_table_js', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/js/dataTables.bootstrap4.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'ce_sweet_alert_js', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/js/sweetalert.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/crypto_exchange-admin.js', array( 'jquery' ), $this->version, false );

			wp_localize_script($this->plugin_name, 'ce_local', array(
				'name' =>'Crypto Exchange',
				'aouthor' =>'Manishankar Vakta',
				'phone' =>'+880 1683 723969',
				'email' =>'manishankarvakta@gmail.com',
				'ajax_url' => admin_url('admin-ajax.php')
			));
		}

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
		$name =  $wpdb->get_var("SELECT display_name from wp_users");

		// $user_data = $wpdb->get_row(
		// 	"SELECT * from wp_users WHERE ID=1",
		// 	ARRAY_A
		// );
		// echo "<pre>";
		// print_r($user_data);
		// echo "</pre>";
		echo "<h2>Hello ".$name." ! Welcome to Crypto Exchange Deshboard<h2> <hr>	";
		
		$wp_post = $wpdb->get_col(
			$wpdb->prepare(
				"SELECT post_title FROM wp_posts WHERE post_type = %s",
				'page'
			)
		);

		echo "<pre>";
		print_r($wp_post);
		echo "</pre>";
	}

	// Setting menu Callbsck Function
	public function crypto_exchange_setting(){
		global $wpdb;
		$wp_post = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM wp_crypto_exchange"
			)
		);

		

		ob_start(); //start Buffer
		
		require_once(CRYPTO_EXCHANGE_PLUGIN_PATH.'admin/partials/ce_setting.php'); //include template

		$view = ob_get_contents(); // reading content

		ob_end_clean(); // end | close buffer

		echo $view;
	}


	// handel_ajax_request_ajax
	public function handel_ajax_request_admin(){
		$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : "";
		
		if(!empty($param)){
			if($param == 'First_Ajax'){
				echo json_encode(array(
					'api_site' => 'Coin Market Cap',
					'api_key' => 'LSFOIHJSFFSMCSIJ56468SFSf546',
					'api_secret' => 'Coin Market Cap',
					'status' => '1',

				));
			}
		}

		wp_die();
	}

}
