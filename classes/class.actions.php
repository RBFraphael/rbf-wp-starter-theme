<?php if(!defined('ABSPATH')){ exit; }

if(!class_exists("RBFWpStarterTheme_Actions")){
    class RBFWpStarterTheme_Actions
    {
        private $use_jquery = true;

        public function load_textdomain()
        {
            load_theme_textdomain("rbf-wp-starter-theme", RBFWPSTARTERTHEME_PATH."/lang");
        }

        public function theme_support()
        {
            add_theme_support("automatic-feed-links");
            add_theme_support("html5");
            add_theme_support("menus");
            add_theme_support("post-thumbnails");
            add_theme_support("responsive-embeds");
            add_theme_support("title-tag");
        }

        public function register_menus()
        {
            register_nav_menu("header", __("Header Menu", "rbf-wp-starter-theme"));
            register_nav_menu("footer", __("Footer Menu", "rbf-wp-starter-theme"));
        }

        public function register_css()
        {
            wp_register_style("theme-main", RBFWPSTARTERTHEME_URL."/assets/css/release.min.css", [], RBFWPSTARTERTHEME_VERSION);
        }

        public function enqueue_css()
        {
            wp_enqueue_style("theme-main");
        }

        public function register_js()
        {
            wp_register_script("theme-main", RBFWPSTARTERTHEME_URL."/assets/js/release.min.js", [], RBFWPSTARTERTHEME_VERSION, true);
        }

        public function enqueue_js()
        {
            if($this->use_jquery){ wp_enqueue_script("jquery"); }
            wp_enqueue_script("theme-main");
        }

        public function wp_head()
        {
            ?>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

            <script type="text/javascript">
                const IS_FRONT_PAGE = <?= is_front_page() ? "true" : "false"; ?>
            </script>

            <style>
                #loader{
                    position: fixed;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    right: 0;
                    z-index: 9999;
                    background-color: #FFF;
                }
                
                #loader #wrapper{
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform-origin: 50% 50%;
                    transform: translate(-50%, -50%);
                    animation: 1s intro forwards;
                }

                @keyframes intro{
                    0%{
                        transform: scale(1.5) translate(-50%, -50%);
                        opacity: 0;
                    }

                    100%{
                        transform: scale(1) translate(-50%, -50%);
                        opacity: 1;
                    }
                }
            </style>
            <?php
        }

        public function wp_footer()
        {
            ?>
            <?php
        }

        public function header_menu_desktop()
        {
            echo apply_filters("header-menu-desktop-filter", $this->menu_content("header"));
        }

        public function header_menu_mobile()
        {
            echo apply_filters("header-menu-mobile-filter", $this->menu_content("header"));
        }

        public function footer_menu_desktop()
        {
            echo apply_filters("footer-menu-desktop-filter", $this->menu_content("footer"));
        }

        public function footer_menu_mobile()
        {
            echo apply_filters("footer-menu-mobile-filter", $this->menu_content("footer"));
        }

        public function menu_content($menu)
        {
            $menus = get_nav_menu_locations();
            if(isset($menus[$menu]) && $menu_data = $menus[$menu]){
                $menu_content = wp_nav_menu([
                    'menu' => $menu_data,
                    'echo' => false
                ]);
                return $menu_content;
            }
        }

        public function register_cpts()
        {
            include_once RBFWPSTARTERTHEME_PATH."/classes/providers/provider.customposttypes.php";
            $cpts = new RBFWpStarterTheme_ProviderCustomPostTypes();

            $cpts->my_cpt();
        }

        public function options_pages()
        {
            include_once RBFWPSTARTERTHEME_PATH."/classes/providers/provider.optionspages.php";
            $options_pages = new RBFWpStarterTheme_ProviderOptionsPages();

            $options_pages->options_page();
            $options_pages->general_subpage();
            $options_pages->header_subpage();
            $options_pages->footer_subpage();
            $options_pages->additional_code_subpage();
        }

        public function custom_fields()
        {
            include_once RBFWPSTARTERTHEME_PATH."/classes/providers/provider.fields.php";
            $fields = new RBFWpStarterTheme_ProviderFields();

            $fields->general_options();
            $fields->header_options();
            $fields->footer_options();
            $fields->additional_code();

            $fields->cpt_mycpt();

            $fields->block_container();
        }

        public function theme_blocks()
        {
            include_once RBFWPSTARTERTHEME_PATH."/classes/providers/provider.blocks.php";
            $blocks = new RBFWpStarterTheme_ProviderBlocks();

            $blocks->container();
        }

        public function acf_favicon($post_id)
        {
            if($post_id == "options"){
                $favicon_id = get_field("favicon", "options");
                update_option("site_icon", $favicon_id);
            }
        }

        public function custom_code_head_open()
        {
            $code = get_field("head-open", "options");
            echo $code;
        }

        public function custom_code_head_close()
        {
            $code = get_field("head-close", "options");
            echo $code;
        }

        public function custom_code_body_open()
        {
            $code = get_field("body-open", "options");
            echo $code;
        }

        public function custom_code_body_close()
        {
            $code = get_field("body-close", "options");
            echo $code;
        }
    }
}
