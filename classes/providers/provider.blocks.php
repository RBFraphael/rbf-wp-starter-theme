<?php if(!defined('ABSPATH')){ exit; }

include_once RBFWPSTARTERTHEME_PATH."/classes/providers/provider.blocksrenderer.php";
include_once RBFWPSTARTERTHEME_PATH."/classes/providers/provider.fields.php";

if(!class_exists("RBFWpStarterTheme_ProviderBlocks")){
    class RBFWpStarterTheme_ProviderBlocks
    {
        private $renderers;
        private $fields;

        public function __construct()
        {
            $this->renderers = new RBFWpStarterTheme_ProviderBlocksRenderer();
            $this->fields = new RBFWpStarterTheme_ProviderFields();

            $this->container();
        }

        public function container()
        {
            $this->register_block([
                'name' => "rbf-container",
                'title' => __("Container", "rbf-wp-starter-theme"),
                'description' => __("Container", "rbf-wp-starter-theme"),
                'category' => "rbf-wp-starter-theme",
                'icon' => "grid-view",
                'render_callback' => [$this->renderers, "container"],
                'mode' => "preview",
                'supports' => [
                    'align' => true,
                    'mode' => false,
                    'jsx' => true
                ],
                'enqueue_assets' => function(){
                    wp_enqueue_style("theme-main");
                }
            ]);
            
            $this->fields->block_container();
        }

        public function register_block($arguments)
        {
            if(function_exists("acf_register_block_type")){
                acf_register_block_type($arguments);
            } else {
                die("Function acf_register_block_type not found");
            }
        }
    }
}
