<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/schiriacrobert/
 * @since      1.0.0
 *
 * @package    Reviews_Gravity_Forms_Addon
 * @subpackage Reviews_Gravity_Forms_Addon/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Reviews_Gravity_Forms_Addon
 * @subpackage Reviews_Gravity_Forms_Addon/admin
 * @author     Dan & Robert <dan.ichim@assist.ro>
 */
class Reviews_Gravity_Forms_Addon_Admin {

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
		 * defined in Reviews_Gravity_Forms_Addon_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Reviews_Gravity_Forms_Addon_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/reviews-gravity-forms-addon-admin.css', array(), $this->version, 'all' );

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
		 * defined in Reviews_Gravity_Forms_Addon_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Reviews_Gravity_Forms_Addon_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/reviews-gravity-forms-addon-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function rgfa_reviews_admin_menu () {
		add_submenu_page(
			'options-general.php',
			'Reviews Gravity',
            'Reviews Gravity',
            'manage_options',
            'reviews-gravity-addon',
            array (
                $this,
                'rgfa_admin_settings_page'
            ),
            ''
		);
		
		add_action(
			'admin_init',
			array(
				$this,
				'rgfa_register_settings'
			)
		);
	}

	public function rgfa_register_settings() {
		$this->register_api_section();
	}

	public function register_api_section () {
		// register group
		register_setting( 
			'rgfa-settings-group',
			'api_key'
		);

		// section of settings :)
		add_settings_section(
			'rgfa-gravity-api-options',
			'Gravity API Details',
			array (
				$this,
				'rgfa_public_key_section'
			),
			'options-general.php'
		);

		// add fields
		add_settings_field( 
			'api-key',
			'Public Key',
			array (
				$this,
				'rgfa_public_key_field'
			),
			'options-general.php',
			'rgfa-gravity-api-options'
		);
		
		//Private Key
		register_setting( 
			'rgfa-settings-group',
			'private_key'
		);

		add_settings_field( 
			'private-api-key',
			'Private Key',
			array (
				$this,
				'rgfa_private_key_field'
			),
			'options-general.php',
			'rgfa-gravity-api-options'
		);


		// Endpoint
		register_setting( 
			'rgfa-settings-group',
			'api_endpoint'
		);

		// add fields
		add_settings_field( 
			'api-endpoint',
			'Endpoint',
			array (
				$this,
				'rgfa_api_endpoint_field'
			),
			'options-general.php',
			'rgfa-gravity-api-options'
		);
	}

	public function rgfa_admin_settings_page () {
		require_once( plugin_dir_path( __FILE__ ) . 'partials/reviews-gravity-forms-addon-admin-display.php' );
	}

	public function rgfa_public_key_section () { echo ''; }

	public function rgfa_public_key_field () {
		echo '<input type="text" name="api_key" value="' . esc_attr(get_option( 'api_key' )) . '" placeholder="Enter Public Key"/>';
	}

	public function rgfa_private_key_field () {
		echo '<input type="text" name="private_key" value="' . esc_attr(get_option( 'private_key' )) . '" placeholder="Enter Private Key"/>';
	}

	public function rgfa_api_endpoint_field () {
		echo '<input type="text" name="api_endpoint" value="' . esc_attr(get_option( 'api_endpoint' )) . '" placeholder="Enter API Endpoint"/>';
	}

}
