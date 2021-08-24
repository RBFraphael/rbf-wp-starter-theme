<?php
/*
Plugin Name: Pro Features for ACF
Plugin URI: https://github.com/rbfraphael/pro-features-for-acf
Description: Free pro resources for Advanced Custom Fields
Version: 1.0.0
Author: RBFraphael
Author URI: https://github.com/rbfraphael
*/

if(!defined('ABSPATH')) exit;

if(!class_exists("FreeAcfProFeatures")){
    class FreeAcfProFeatures
    {

        function __construct()
        {
            define("FREEACFPROFEATURES_URL", RBFWPSTARTERTHEME_URL."/includes/plugins/pro-features-for-acf/");
            define("FREEACFPROFEATURES_PATH", RBFWPSTARTERTHEME_PATH."/includes/plugins/pro-features-for-acf/");
            define("FREEACFPROFEATURES_VERSION", "1.0.0");
            define("FREEACFPROFEATURES_COMPONENTS_VERSION", "5.9.5");

            $this->plugin_init();
            $this->plugin_actions();
        }

        function plugin_init()
        {
            include_once(FREEACFPROFEATURES_PATH."/components/blocks.php");
            include_once(FREEACFPROFEATURES_PATH."/components/options-page.php");

            if(is_admin()){
                include_once(FREEACFPROFEATURES_PATH."/components/admin/admin-options-page.php");
            }
        }

        function plugin_actions()
        {
            add_action("init", [$this, "register_assets"]);
            add_action("acf/include_field_types", [$this, "include_field_types"], 5);
            add_action("acf/include_location_rules", [$this, "include_location_rules"], 5);
            // add_action("admin_enqueue_scripts", [$this, "input_admin_enqueue_scripts"]);
            // add_action("admin_enqueue_scripts", [$this, "field_group_admin_enqueue_scripts"]);
            add_action("acf/input/admin_enqueue_scripts", [$this, "input_admin_enqueue_scripts"]);
            add_action("acf/field_group/admin_enqueue_scripts", [$this, "field_group_admin_enqueue_scripts"]);
        }

        function register_assets()
        {
            wp_register_script("acf-pro-input", FREEACFPROFEATURES_URL."/components/assets/js/acf-pro-input.min.js", ['acf-input'], FREEACFPROFEATURES_COMPONENTS_VERSION);
            wp_register_script("acf-pro-field-group", FREEACFPROFEATURES_URL."/components/assets/js/acf-pro-field-group.min.js", ['acf-field-group'], FREEACFPROFEATURES_COMPONENTS_VERSION);

            wp_register_style("acf-pro-input", FREEACFPROFEATURES_URL."/components/assets/css/acf-pro-input.css", ['acf-input'], FREEACFPROFEATURES_COMPONENTS_VERSION); 
		    wp_register_style("acf-pro-field-group", FREEACFPROFEATURES_URL."/components/assets/css/acf-pro-field-group.css", ['acf-input'], FREEACFPROFEATURES_COMPONENTS_VERSION); 
        }

        function include_field_types()
        {
            include_once(FREEACFPROFEATURES_PATH."/components/fields/class-acf-field-repeater.php");
		    include_once(FREEACFPROFEATURES_PATH."/components/fields/class-acf-field-flexible-content.php");
		    include_once(FREEACFPROFEATURES_PATH."/components/fields/class-acf-field-gallery.php");
		    include_once(FREEACFPROFEATURES_PATH."/components/fields/class-acf-field-clone.php");
        }

        function include_location_rules()
        {
            include_once(FREEACFPROFEATURES_PATH."/components/locations/class-acf-location-block.php");
		    include_once(FREEACFPROFEATURES_PATH."/components/locations/class-acf-location-options-page.php");
        }

        function input_admin_enqueue_scripts()
        {
            wp_enqueue_script("acf-pro-input");
		    wp_enqueue_style("acf-pro-input");
        }

        function field_group_admin_enqueue_scripts()
        {
            wp_enqueue_script("acf-pro-field-group");
		    wp_enqueue_style("acf-pro-field-group");
        }
    }
}

new FreeAcfProFeatures();