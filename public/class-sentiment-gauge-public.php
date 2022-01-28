<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.github.com/richpeck
 * @since      1.0.0
 *
 * @package    Sentiment_Gauge
 * @subpackage Sentiment_Gauge/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Sentiment_Gauge
 * @subpackage Sentiment_Gauge/public
 * @author     Richard Peck <rpeck@frontlineutilities.co.uk>
 */
class Sentiment_Gauge_Public {

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
		 * defined in Sentiment_Gauge_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sentiment_Gauge_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sentiment-gauge-public.css', array(), $this->version, 'all' );

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
		 * defined in Sentiment_Gauge_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sentiment_Gauge_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sentiment-gauge-public.js', array( 'jquery' ), $this->version, false );

	}
	
	// Shortcode For Sentiment Gauges
	// Allows us to publish the sentiment gauges on the front-end using the
	public function sentiment_gauge($atts){ 
	    
	    // Attributes
        $a = shortcode_atts( array(
            'title' => '',
            'percent' => '50',
            'color' => 'red'
        ), $atts );
        
        // Partial
        // Pulls in the public partial 
        include( plugin_dir_path( __FILE__ ) . 'partials/sentiment-gauge-public-display.php' );
        
    }

}
