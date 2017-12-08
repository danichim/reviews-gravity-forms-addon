<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/schiriacrobert/
 * @since             1.0.0
 * @package           Reviews_Gravity_Forms_Addon
 *
 * @wordpress-plugin
 * Plugin Name:       Reviews Gravity Forms Addon
 * Plugin URI:        https://github.com/danichim/reviews-gravity-forms-addon
 * Description:       Use shortcode [gravity_reviews] attributes are form_id(number), type(page or widget), nav(true or false), per_page(number), feedback(link)
 * Version:           1.0.0
 * Author:            Dan & Robert
 * Author URI:        https://www.linkedin.com/in/schiriacrobert/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       reviews-gravity-forms-addon
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently pligin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-reviews-gravity-forms-addon-activator.php
 */
function activate_reviews_gravity_forms_addon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-reviews-gravity-forms-addon-activator.php';
	Reviews_Gravity_Forms_Addon_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-reviews-gravity-forms-addon-deactivator.php
 */
function deactivate_reviews_gravity_forms_addon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-reviews-gravity-forms-addon-deactivator.php';
	Reviews_Gravity_Forms_Addon_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_reviews_gravity_forms_addon' );
register_deactivation_hook( __FILE__, 'deactivate_reviews_gravity_forms_addon' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-reviews-gravity-forms-addon.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_reviews_gravity_forms_addon() {
	if ( ! class_exists( 'GFAPI' ) ) {
		die('Please install Gravity Forms first!');
	}
	$plugin = new Reviews_Gravity_Forms_Addon();
	$plugin->run();

}
run_reviews_gravity_forms_addon();
