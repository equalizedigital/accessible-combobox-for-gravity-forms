<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://equalizedigital.com
 * @since      1.0.0
 *
 * @package    Accessible_Combobox_Gravity_Forms
 * @subpackage Accessible_Combobox_Gravity_Forms/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Accessible_Combobox_Gravity_Forms
 * @subpackage Accessible_Combobox_Gravity_Forms/admin
 * @author     Equalize Digital <dev@equalizedigital.com>
 */
class Accessible_Combobox_Gravity_Forms_Admin {

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
		 * defined in Accessible_Combobox_Gravity_Forms_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Accessible_Combobox_Gravity_Forms_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/accessible-combobox-gravity-forms-admin.css', array(), $this->version, 'all' );

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
		 * defined in Accessible_Combobox_Gravity_Forms_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Accessible_Combobox_Gravity_Forms_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/accessible-combobox-gravity-forms-admin.js', array( 'jquery' ), $this->version, false );

	}

    public function hook_gravity_form_dropdown_field_css( $classes, $field, $form ) {
        if ( $field->type === 'select' && (int)$field->enableEnhancedUI ) {
            $classes .= ' gfield--accessible-combobox';
        }

        return $classes;
    }

    public function hook_gravity_form_dropdown_field( $input, $field, $value, $lead_id, $form_id )
    {

        if ( $field->type !== 'select' ) {
            return $input;
        }

        if ( ! (int)$field->enableEnhancedUI ) {
            return $input;
        }

        $field->enableEnhancedUI = false;

        $choices = $this->acgf_get_choices_from_field( $field->choices );

        $input = '
            <div class="usa-combo-box">
              <select name="input_'.$field->id.'" id="input_'.$form_id.'_'.$field->id.'" class="usa-select">
                <option value class="gf_placeholder">'.$field->placeholder.'</option>
                '. $choices .'
              </select>
            </div>
        ';

        return $input;
    }

    /**
     * @param $choices
     * @return string
     */
    private function acgf_get_choices_from_field( $choices ): string
    {
        $options = "";

        foreach( $choices as $choice ) {
            $options .= "<option value=\"{$choice['value']}\">{$choice['text']}</option>";
        }

        return $options;
    }
}
