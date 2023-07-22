<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://equalizedigital.com
 * @since      1.0.0
 *
 * @package    Accessible_Combobox_Gravity_Forms
 * @subpackage Accessible_Combobox_Gravity_Forms/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Accessible_Combobox_Gravity_Forms
 * @subpackage Accessible_Combobox_Gravity_Forms/includes
 * @author     Equalize Digital <dev@equalizedigital.com>
 */
class Accessible_Combobox_Gravity_Forms_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'accessible-combobox-gravity-forms',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
