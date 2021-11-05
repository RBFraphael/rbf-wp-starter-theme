<?php if(!defined('ABSPATH')){ exit; }

include_once RBFWPSTARTERTHEME_PATH."/classes/providers/provider.fields.php";

if(!class_exists("RBFWpStarterTheme_ProviderPostTypes")){
    class RBFWpStarterTheme_ProviderPostTypes
    {
        private $fields;

        public function __construct()
        {
            $this->fields = new RBFWpStarterTheme_ProviderFields();

            $this->example_cpt();
        }

        public function example_cpt()
        {
            $intl = [
                'name' => __("Examples", "rbf-wp-starter-theme"),
                'singular_name' => __("Example", "rbf-wp-starter-theme"),
                'menu_name' => __("Examples", "rbf-wp-starter-theme"),
                'name_admin_bar' => __("Example", "rbf-wp-starter-theme"),
                'add_new' => __("Add new", "rbf-wp-starter-theme"),
                'add_new_item' => __("Add new example", "rbf-wp-starter-theme"),
                'new_item' => __("New example", "rbf-wp-starter-theme"),
                'edit_item' => __("Edit example", "rbf-wp-starter-theme"),
                'view_item' => __("View example", "rbf-wp-starter-theme"),
                'all_items' => __("All examples", "rbf-wp-starter-theme"),
                'search_items' => __("Search examples", "rbf-wp-starter-theme"),
                'parent_item_colon' => __("Parent example:", "rbf-wp-starter-theme"),
                'not_found' => __("No examples found", "rbf-wp-starter-theme"),
                'not_found_in_trash' => __("No examples found in trash", "rbf-wp-starter-theme"),
                'featured_image' => __("Example cover image", "rbf-wp-starter-theme"),
                'set_featured_image' => __("Set cover image", "rbf-wp-starter-theme"),
                'remove_featured_image' => __("Remove cover image", "rbf-wp-starter-theme"),
                'use_featured_image' => __("Use as cover image", "rbf-wp-starter-theme"),
                'archives' => __("Example archives", "rbf-wp-starter-theme"),
                'insert_into_item' => __("Insert into example", "rbf-wp-starter-theme"),
                'uploaded_to_this_item' => __("Upload to this example", "rbf-wp-starter-theme"),
                'filter_items_list' => __("Filter examples list", "rbf-wp-starter-theme"),
                'items_list_navigation' => __("Examples list navigation", "rbf-wp-starter-theme"),
                'items_list' => __("Examples list", "rbf-wp-starter-theme"),
            ];

            $settings = [
                'labels' => $intl,
                'description' => __("Example custom post type", "rbf-wp-starter-theme"),
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => [
                    'slug' => "example-post"
                ],
                'capability_type' => "post",
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => [
                    "title",
                    "editor",
                    "author",
                    "thumbnail",
                    "excerpt",
                    "comments"
                ],
                'taxonomies' => [
                    "category",
                    "example_taxonomy"
                ],
                'show_in_rest' => true
            ];

            register_post_type("example_cpt", $settings);
            
            $this->fields->cpt_example_cpt();
        }
    }
}
