<?php if(!defined('ABSPATH')){ exit; }

include_once RBFWPSTARTERTHEME_PATH."/classes/providers/provider.fields.php";

if(!class_exists("RBFWpStarterTheme_ProviderOptionsPages")){
    class RBFWpStarterTheme_ProviderOptionsPages
    {
        private $fields;

        public function __construct()
        {
            $this->fields = new RBFWpStarterTheme_ProviderFields();

            $this->options_page();
            $this->general_subpage();
            $this->header_subpage();
            $this->footer_subpage();
            $this->additional_code_subpage();
        }

        public function options_page()
        {
            if(function_exists("acf_add_options_page")){
                acf_add_options_page([
                    'page_title' => __("Theme options", "rbf-wp-starter-theme"),
                    'menu_title' => __("Theme options", "rbf-wp-starter-theme"),
                    'menu_slug' => "theme-options",
                    'icon_url' => "dashicons-admin-customizer",
                    'update_button' => __("Update settings", "rbf-wp-starter-theme")
                ]);
            }
        }

        public function general_subpage()
        {
            if(function_exists("acf_add_options_sub_page")){
                acf_add_options_sub_page([
                    'page_title' => __("Theme general options", "rbf-wp-starter-theme"),
                    'menu_title' => __("General", "rbf-wp-starter-theme"),
                    'menu_slug' => "theme-options-general",
                    'parent_slug' => "theme-options",
                    'update_button' => __("Update settings", "rbf-wp-starter-theme")
                ]);
            }

            $this->fields->general_options();
        }

        public function header_subpage()
        {
            if(function_exists("acf_add_options_sub_page")){
                acf_add_options_sub_page([
                    'page_title' => __("Header options", "rbf-wp-starter-theme"),
                    'menu_title' => __("Header", "rbf-wp-starter-theme"),
                    'menu_slug' => "theme-options-header",
                    'parent_slug' => "theme-options",
                    'update_button' => __("Update settings", "rbf-wp-starter-theme")
                ]);
            }

            $this->fields->header_options();
        }

        public function footer_subpage()
        {
            if(function_exists("acf_add_options_sub_page")){
                acf_add_options_sub_page([
                    'page_title' => __("Footer options", "rbf-wp-starter-theme"),
                    'menu_title' => __("Footer", "rbf-wp-starter-theme"),
                    'menu_slug' => "theme-options-footer",
                    'parent_slug' => "theme-options",
                    'update_button' => __("Update settings", "rbf-wp-starter-theme")
                ]);
            }

            $this->fields->footer_options();
        }

        public function additional_code_subpage()
        {
            if(function_exists("acf_add_options_sub_page")){
                acf_add_options_sub_page([
                    'page_title' => __("Additional code", "rbf-wp-starter-theme"),
                    'menu_title' => __("Additional code", "rbf-wp-starter-theme"),
                    'menu_slug' => "theme-options-additional-code",
                    'parent_slug' => "theme-options",
                    'update_button' => __("Update settings", "rbf-wp-starter-theme")
                ]);
            }

            $this->fields->additional_code();
        }
    }
}
