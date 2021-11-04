<?php if(!defined('ABSPATH')){ exit; }

include_once RBFWPSTARTERTHEME_PATH."/classes/providers/provider.fields.php";

if(!class_exists("RBFWpStarterTheme_ProviderCustomPostTypes")){
    class RBFWpStarterTheme_ProviderCustomPostTypes
    {
        private $fields;

        public function __construct()
        {
            $this->fields = new RBFWpStarterTheme_ProviderFields();

            $this->example_cpt();
        }

        public function example_cpt()
        {
            register_post_type("example_cpt", [
                'label' => __("Example", "rbf-wp-starter-theme"),
                'public' => true,
                'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
                'exclude_from_search' => false,
                'show_in_rest' => true,
                'rest_base' => 'product',
                'menu_icon' => "dashicons-screenoptions"
            ]);
            
            $this->fields->cpt_example_cpt();
        }
    }
}
