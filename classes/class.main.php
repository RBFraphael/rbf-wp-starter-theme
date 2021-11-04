<?php if(!defined('ABSPATH')){ exit; }

include_once RBFWPSTARTERTHEME_PATH."/vendor/autoload.php";

define('RBFWPSTARTERTHEME_ACF_PATH', RBFWPSTARTERTHEME_PATH.'/includes/plugins/advanced-custom-fields/');
define('RBFWPSTARTERTHEME_ACF_URL', RBFWPSTARTERTHEME_URL.'/includes/plugins/advanced-custom-fields/');

include_once RBFWPSTARTERTHEME_ACF_PATH."acf.php";
include_once RBFWPSTARTERTHEME_PATH."/includes/plugins/pro-features-for-acf/pro-features-for-acf.php";
include_once RBFWPSTARTERTHEME_PATH."/includes/plugins/advanced-custom-fields-font-awesome/acf-font-awesome.php";

include_once RBFWPSTARTERTHEME_PATH."/helpers/helper.utils.php";

if(!class_exists("RBFWpStarterTheme_Main")){
    class RBFWpStarterTheme_Main
    {
        public function __construct()
        {
            $this->init();
        }

        public function init()
        {
            $this->register_actions();
            $this->register_filters();
        }

        public function register_actions()
        {
            include_once RBFWPSTARTERTHEME_PATH."/classes/class.actions.php";
            $actions = new RBFWpStarterTheme_Actions();

            add_action("after_setup_theme", [$actions, "load_textdomain"]);
            add_action("after_setup_theme", [$actions, "theme_support"]);
            add_action("after_setup_theme", [$actions, "register_menus"]);
            add_action("init", [$actions, "register_cpts"]);
            add_action("init", [$actions, "register_css"]);
            add_action("init", [$actions, "register_js"]);
            add_action("rest_api_init", [$actions, "register_rest_api"]);
            add_action("wp_enqueue_scripts", [$actions, "enqueue_css"]);
            add_action("wp_enqueue_scripts", [$actions, "enqueue_js"]);
            add_action("wp_head", [$actions, "wp_head"]);
            add_action("wp_footer", [$actions, "wp_footer"], PHP_INT_MAX);

            add_action("wp_head", [$actions, "custom_code_head_open"], 0);
            add_action("wp_head", [$actions, "custom_code_head_close"], PHP_INT_MAX);
            add_action("wp_body_open", [$actions, "custom_code_body_open"], 0);
            add_action("wp_footer", [$actions, "custom_code_body_close"], PHP_INT_MAX);

            add_action("acf/init", [$actions, "options_pages"]);
            add_action("acf/init", [$actions, "theme_blocks"]);
            add_action("acf/init", [$actions, "custom_fields"]);
            add_action("acf/save_post", [$actions, "acf_favicon"]);

            add_action("header-menu-desktop", [$actions, "header_menu_desktop"]);
            add_action("header-menu-mobile", [$actions, "header_menu_mobile"]);
            add_action("footer-menu-desktop", [$actions, "footer_menu_desktop"]);
            add_action("footer-menu-mobile", [$actions, "footer_menu_mobile"]);
        }

        public function register_filters()
        {
            include_once RBFWPSTARTERTHEME_PATH."/classes/class.filters.php";
            $filters = new RBFWpStarterTheme_Filters();

            add_filter("the_content", [$filters, "responsive_images"]);
            add_filter("the_content", [$filters, "responsive_iframes"]);
            add_filter("the_content", [$filters, "lazyload_images"]);
            add_filter("the_content", [$filters, "lazyload_iframes"]);
            add_filter("the_content", [$filters, "fix_content"]);
            add_filter("excerpt_length", [$filters, "excerpt_length"]);
            add_filter("excerpt_more", [$filters, "excerpt_ending"]);
            add_filter("block_categories_all", [$filters, "gutenberg_categories"], 10, 2);
            add_filter("login_enqueue_scripts", [$filters, "login_css"]);

            add_filter("acf/settings/url", [$filters, "embedded_acf_url"]);
            add_filter("acf/settings/show_admin", "__return_false");

            add_filter("header-menu-desktop-filter", [$filters, "header_menu_desktop"], 1, 2);
            add_filter("header-menu-mobile-filter", [$filters, "header_menu_mobile"], 1, 1);
            add_filter("footer-menu-desktop-filter", [$filters, "footer_menu_desktop"], 1, 2);
            add_filter("footer-menu-mobile-filter", [$filters, "footer_menu_mobile"], 1, 2);
        }
    }
}
