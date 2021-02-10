<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/manishankarvakta
 * @since      1.0.0
 *
 * @package    Crypto_exchange
 * @subpackage Crypto_exchange/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Crypto_exchange
 * @subpackage Crypto_exchange/public
 * @author     Manishankar Vakta <manishankarvakta@gmail.com>
 */
class Crypto_exchange_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/crypto_exchange-public.css', array(), $this->version, 'all' );
		
		$valid_page = array('crypto-exchange', 'coin-list', 'coin-view', 'coin-exchange', 'activity', 'my-account');
		$page = basename(get_permalink());


		if(in_array($page, $valid_page)){
			wp_enqueue_style( 'ce_bootstrap', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/css/bootstrap.min.css', array(), $this->version, 'all' );
			// wp_enqueue_style( 'ce_data_table', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/css/dataTables.bootstrap4.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'ce_sweet_alert', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/css/sweetalert.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'ce_font_awesome', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/css/font-awesome.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/crypto_exchange-public.css', array(), $this->version, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		$valid_page = array('crypto-exchange', 'coin-list', 'coin-view', 'coin-exchange', 'activity', 'my-account');
		;
		$page = basename(get_permalink());


		if(in_array($page, $valid_page)){
			wp_enqueue_script( 'ce_bootstrap_jquery_js', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'ce_bootstrap_poppr_js', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/js/popper.min.js', array( 'jquery' ), $this->version, false );
			// wp_enqueue_script( 'ce_jquery_data_table_js', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/js/jquery.dataTables.min.js', array( 'jquery' ), $this->version, false );
			// wp_enqueue_script( 'ce_bootstrap_data_table_js', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/js/dataTables.bootstrap4.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'ce_sweet_alert_js', CRYPTO_EXCHANGE_PLUGIN_URL. 'assest/js/sweetalert.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/crypto_exchange-public.js', array( 'jquery' ), $this->version, false );

		}
	}


	public function ce_page_template(){
		global $post;

		if($post->post_name == 'crypto-exchange'){
			$page_template = CRYPTO_EXCHANGE_PLUGIN_PATH.'public/partials/crypto_exchange.php';
		}
		return $page_template;
	}

	public function crypto_exchange_page_contant(){
		echo 'This shortcode will load coin info';
	}

}
