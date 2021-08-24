<?php if(!defined('ABSPATH')){ exit; }

if(!class_exists("RBFWpStarterTheme_ProviderCustomPostTypes")){
    class RBFWpStarterTheme_ProviderCustomPostTypes
    {
        public function my_cpt()
        {
            register_post_type("my_cpt", [
                'label' => __("My Custom Post Type", "rbf-wp-starter-theme"),
                'public' => true,
                'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
                'exclude_from_search' => false,
                'show_in_rest' => true,
                'rest_base' => 'product',
                'menu_icon' => "dashicons-screenoptions"
            ]);
        }
    }
}
