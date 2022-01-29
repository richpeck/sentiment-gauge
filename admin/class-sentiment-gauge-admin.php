<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.github.com/richpeck
 * @since      1.0.0
 *
 * @package    Sentiment_Gauge
 * @subpackage Sentiment_Gauge/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sentiment_Gauge
 * @subpackage Sentiment_Gauge/admin
 * @author     Richard Peck <rpeck@frontlineutilities.co.uk>
 */
class Sentiment_Gauge_Admin {

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
		 * defined in Sentiment_Gauge_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sentiment_Gauge_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        wp_enqueue_style( $this->plugin_name, SENTIMENT_PLUGIN_DIR . 'public/css/sentiment-gauge-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sentiment-gauge-admin.css', array(), $this->version, 'all' );

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
		 * defined in Sentiment_Gauge_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sentiment_Gauge_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sentiment-gauge-admin.js', array( 'jquery' ), $this->version, false );
		
		// Gutenberg Editor
	    wp_enqueue_script(
    		'sentiment-gauge-gutenberg-0', // Handle.
    		plugins_url( 'js/block.js', __FILE__ ), // Block.js: We register the block here.
    		array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies, defined above.
    		filemtime( plugin_dir_path( __FILE__ ) . 'js/block.js' ) // filemtime — Gets file modification time.
	    );
	    
	}
	
	/** RPECK 26/01/2022 **/
	/** Admin Settings Page **/
	public function settings_page() {
        add_submenu_page(
            'options-general.php',
            apply_filters( $this->plugin_name . '-settings-page-title', esc_html__( '⚡ Sentiment Gauge (Shortcode Settings)', 'sentiment-gauge' )),
            apply_filters( $this->plugin_name . '-settings-menu-title', esc_html__( '⚡ Sentiment Gauge', 'sentiment-gauge' )),
            'manage_options',
			$this->plugin_name . '-settings',
            array($this, 'admin_settings_page')
        );
	}
	
	/** RPECK 26/01/2022 **/
	/** Admin Settings Page **/
	public function admin_settings_page() {
		include( plugin_dir_path( __FILE__ ) . 'partials/sentiment-gauge-admin-display.php' );
	} // page_help()
	
	/** RPECK 26/01/2022 **/
	/** Plugin Page Settings Link **/
	public function plugin_page_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'options-general.php?page=' . $this->plugin_name . '-settings' ) .
		'">' . __('Settings') . '</a>';
	    return $links;
    }
    
    /** RPECK 27/01/2022 **/
    /** Plugin Sections (admin page) **/
    /**
     * Register the setting parameters
     *
     * @since  	1.0.0
     * @access 	public
    */
    public function register_plugin_sections() {
        // Add a General section
		add_settings_section(
			'sentiment_gauge_general',
			__( 'Introduction', 'sentiment-gauge' ),
			array( $this, 'sentiment_gauge_intro_section' ),
			$this->plugin_name
		);
		
		// Options section
		add_settings_section(
            'sentiment_gauge_options',
            __( 'Options', 'sentiment-gauge' ),
            array( $this, 'sentiment_gauge_options_section' ),
            $this->plugin_name
	    );
	    
		// Options section
		add_settings_section(
            'sentiment_gauge_gutenberg',
            __( 'Gutenberg', 'sentiment-gauge' ),
            array( $this, 'sentiment_gauge_gutenberg_section' ),
            $this->plugin_name
	    );
	    
	} 
	
	/**
     * Render the text for the general section
     *
     * @since  	1.0.0
     * @access 	public
    */
    public function sentiment_gauge_intro_section() {
        include( plugin_dir_path( __FILE__ ) . 'partials/sentiment-gauge-admin-options-section-intro.php' );
	} 
	
	/**
     * Render the text for the general section
     *
     * @since  	1.0.0
     * @access 	public
    */
    public function sentiment_gauge_options_section() {
        include( plugin_dir_path( __FILE__ ) . 'partials/sentiment-gauge-admin-options-section-options.php' );
	} 
		
	/**
     * Render the text for the general section
     *
     * @since  	1.0.0
     * @access 	public
    */
    public function sentiment_gauge_gutenberg_section() {
        include( plugin_dir_path( __FILE__ ) . 'partials/sentiment-gauge-admin-options-section-gutenberg.php' );
	} 

}
