<?php




if(!class_exists('WP_Plugin_Template_Settings'))
{
	class WP_Plugin_Template_Settings
	{

		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// register actions
            add_action('admin_init', array(&$this, 'admin_init'));
        	add_action('admin_menu', array(&$this, 'add_menu'));
		} // END public function __construct

        /**
         * hook into WP's admin_init action hook
         */
        public function admin_init()
        {
        	// register your plugin's settings
        	register_setting('wp_plugin_template-group', 'setting_a');
        	register_setting('wp_plugin_template-group', 'setting_b');

        	// add your settings section


        	add_settings_section(
        	    'wp_plugin_template-section',
        	    'WP Plugin Template Settings',
        	    array(&$this, 'settings_section_wp_plugin_template'),
        	    'wp_plugin_template'
        	);

        	// add your setting's fields
            add_settings_field(
                'wp_plugin_template-setting_a',
                'Setting A',
                array(&$this, 'settings_field_input_text'),
                'wp_plugin_template',
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_a'
                )
            );
            add_settings_field(
                'wp_plugin_template-setting_b',
                'Setting B',
                array(&$this,'create_section_for_category_select'),
                    'wp_plugin_template',
                    'wp_plugin_template-section',
                    array(
                        'field' => 'setting_b'
                    )
            );


            // Possibly do additional admin_init tasks
        } // END public static function activate

        public function settings_section_wp_plugin_template()
        {
            // Think of this as help text for the section.
            echo 'These settings do things for the WP Plugin Template.';
        }

        /**
         * This function provides text inputs for settings fields
         */
        public function settings_field_input_text($my)
        {

            // Get the field name from the $args array
            $field = $my['field'];


            // Get the value of this setting
            $value = get_option($field);
            // echo a proper input type="text"
            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
        } // END public function settings_field_input_text($args)


        function create_section_for_category_select($param)
        {


            $field = $param['field'];

            $value = get_option($field);


            $number = array(1, 2, 3);



            echo "<select id='{$field}'  name='{$field}'>";
            echo "<option>- select -</option>";




            foreach($number as $option){

                $selected = $option == $value ? "selected='selected'" : "";
                echo "<option $selected value='{$option}'> $option </option>";
            }


            echo "</select>";

        }




        /**
         * add a menu
         */
        public function add_menu()
        {
            // Add a page to manage this plugin's settings
        	add_options_page(
        	    'WP Plugin Template Settings',
        	    'WP Plugin Template',
        	    'manage_options',
        	    'wp_plugin_template',
        	    array(&$this, 'plugin_settings_page')
        	);
        } // END public function add_menu()

        /**
         * Menu Callback
         */
        public function plugin_settings_page()
        {
        	if(!current_user_can('manage_options'))
        	{
        		wp_die(__('You do not have sufficient permissions to access this page.'));
        	}

        	// Render the settings template
        	include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
        } // END public function plugin_settings_page()
    } // END class WP_Plugin_Template_Settings
} // END if(!class_exists('WP_Plugin_Template_Settings'))



