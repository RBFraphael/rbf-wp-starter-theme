<?php if(!defined('ABSPATH')){ exit; }

if(!class_exists("RBFWpStarterTheme_ProviderOptionsPages")){
    class RBFWpStarterTheme_ProviderOptionsPages
    {
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
        }
    }
}
