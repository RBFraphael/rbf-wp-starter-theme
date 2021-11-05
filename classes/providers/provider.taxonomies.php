<?php if(!defined('ABSPATH')){ exit; }

include_once RBFWPSTARTERTHEME_PATH."/classes/providers/provider.fields.php";

if(!class_exists("RBFWpStarterTheme_ProviderTaxonomies")){
    class RBFWpStarterTheme_ProviderTaxonomies
    {
        private $fields;

        public function __construct()
        {
            $this->fields = new RBFWpStarterTheme_ProviderFields();

            $this->example_taxonomy();
        }

        public function example_taxonomy()
        {
            $intl = [
                'name' => __("Examples", "rbf-wp-starter-theme"),
                'singular_name' => __("Example", "rbf-wp-starter-theme"),
                'search_items' => __("Search examples", "rbf-wp-starter-theme"),
                'all_items' => __("All examples", "rbf-wp-starter-theme"),
                'parent_item' => __("Parent example", "rbf-wp-starter-theme"),
                'parent_item_colon' => __("Parent example:", "rbf-wp-starter-theme"),
                'edit_item' => __("Edit example", "rbf-wp-starter-theme"),
                'update_item' => __("Update example", "rbf-wp-starter-theme"),
                'add_new_item' => __("Add new example", "rbf-wp-starter-theme"),
                'new_item_name' => __("New example", "rbf-wp-starter-theme"),
                'menu_name' => __("Example", "rbf-wp-starter-theme"),
            ];
         
            $settings = [
                'hierarchical' => false,
                'labels' => $intl,
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => ['slug' => 'example'],
            ];
         
            register_taxonomy("example_taxonomy", ['example_cpt'], $settings);
        }
    }
}