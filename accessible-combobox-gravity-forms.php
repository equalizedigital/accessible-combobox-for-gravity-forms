<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://equalizedigital.com
 * @since             1.0.0
 * @package           Accessible_Combobox_Gravity_Forms
 *
 * @wordpress-plugin
 * Plugin Name:       Accessible ComboBox for Gravity Forms
 * Plugin URI:        https://equalizedigital.com/plugins
 * Description:       This plugin adds the ability to have an accessible, searchable dropdown field (combo box) in forms built with Gravity Forms.
 * Version:           1.0.0
 * Author:            Equalize Digital
 * Author URI:        https://equalizedigital.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       accessible-combobox-gravity-forms
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ACCESSIBLE_COMBOBOX_GRAVITY_FORMS_VERSION', '1.0.0' );

add_action( 'gform_loaded', 'run_accessible_combobox_gravity_forms', 5 );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-accessible-combobox-gravity-forms-activator.php
 */
function activate_accessible_combobox_gravity_forms() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-accessible-combobox-gravity-forms-activator.php';
	Accessible_Combobox_Gravity_Forms_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-accessible-combobox-gravity-forms-deactivator.php
 */
function deactivate_accessible_combobox_gravity_forms() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-accessible-combobox-gravity-forms-deactivator.php';
	Accessible_Combobox_Gravity_Forms_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_accessible_combobox_gravity_forms' );
register_deactivation_hook( __FILE__, 'deactivate_accessible_combobox_gravity_forms' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-accessible-combobox-gravity-forms.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_accessible_combobox_gravity_forms() {
    if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
        return;
    }

	$plugin = new Accessible_Combobox_Gravity_Forms();
	$plugin->run();
}
