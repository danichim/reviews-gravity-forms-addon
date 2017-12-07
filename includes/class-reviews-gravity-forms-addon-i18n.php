<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.linkedin.com/in/schiriacrobert/
 * @since      1.0.0
 *
 * @package    Reviews_Gravity_Forms_Addon
 * @subpackage Reviews_Gravity_Forms_Addon/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Reviews_Gravity_Forms_Addon
 * @subpackage Reviews_Gravity_Forms_Addon/includes
 * @author     Dan & Robert <dan.ichim@assist.ro>
 */
class Reviews_Gravity_Forms_Addon_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'reviews-gravity-forms-addon',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
