<?php if(!defined('ABSPATH')){ exit; }

use StoutLogic\AcfBuilder\FieldsBuilder;

if(!class_exists("RBFWpStarterTheme_ProviderFields")){
    class RBFWpStarterTheme_ProviderFields
    {
        public function general_options()
        {
            $general = new FieldsBuilder("general-options", ['style' => "seamless"]);
            $general
                ->addImage("favicon", ['label' => __("Site favicon", "rbf-wp-starter-theme"), 'return_format' => "id"])
                ->addTrueFalse("enable-loader", ['label' => __("Enable site loader", "rbf-wp-starter-theme")])
                ->addImage("loader-image", ['label' => __("Site loader image", "rbf-wp-starter-theme"), 'return_format' => "url"])
                    ->conditional("enable-loader", "==", "1")
                ->setLocation("options_page", "==", "theme-options-general");
            
            $this->add_field_group($general);
        }

        public function header_options()
        {
            $header = new FieldsBuilder("header-options", ['style' => "seamless"]);
            $header
                ->addImage("header-logo", ['label' => __("Header logo", "rbf-wp-starter-theme"), 'return_format' => "url"])
                ->setLocation("options_page", "==", "theme-options-header");
            
            $this->add_field_group($header);
        }

        public function footer_options()
        {
            $footer = new FieldsBuilder("footer-options", ['style' => "seamless"]);
            $footer
                ->addImage("footer-logo", ['label' => __("Footer logo", "rbf-wp-starter-theme"), 'return_format' => "url"])
                ->addText("footer-copyright", ['label' => __("Copyright line", "rbf-wp-starter-theme")])
                ->addRepeater("footer-social", ['label' => __("Social Networks", "rbf-wp-starter-theme")])
                    ->addText("label", ['label' => __("Name", "rbf-wp-starter-theme")])
                    ->addField("icon", "font-awesome", ['label' => __("Icon", "rbf-wp-starter-theme")])
                    ->addUrl("url", ['label' => __("Link", "rbf-wp-starter-theme")])
                    ->endRepeater()
                ->setLocation("options_page", "==", "theme-options-footer");
            
            $this->add_field_group($footer);
        }

        public function additional_code()
        {
            $addcode = new FieldsBuilder("additional-code", ['style' => "seamless"]);
            $addcode
                ->addTextarea("head-open", ['label' => __("After opening &lt;head&gt;", "rbf-wp-starter-theme")])
                ->addTextarea("head-close", ['label' => __("Before closing &lt;/head&gt;", "rbf-wp-starter-theme")])
                ->addTextarea("body-open", ['label' => __("After opening &lt;body&gt;", "rbf-wp-starter-theme")])
                ->addTextarea("body-close", ['label' => __("Before closing &lt;/body&gt;", "rbf-wp-starter-theme")])
                ->setLocation("options_page", "==", "theme-options-additional-code");
            
            $this->add_field_group($addcode);
        }

        public function block_container()
        {
            $fields = new FieldsBuilder("block-container", ['style' => "seamless"]);
            $fields
                ->addTrueFalse("horizontal-padding", ['label' => __("Enable H padding", "rbf-wp-starter-theme")])
                ->addTrueFalse("vertical-padding", ['label' => __("Enable V padding?", "rbf-wp-starter-theme")])
                ->setLocation("block", "==", "acf/rbf-container");

            $this->add_field_group($fields);
        }

        public function cpt_example_cpt()
        {
            $fields = new FieldsBuilder("cpt-my-cpt", ['style' => "seamless", 'title' => __("Example post type fields", "rbf-wp-starter-theme")]);
            $fields
                ->addText("text-field", ['label' => __("Short Text Field", "rbf-wp-starter-theme")])
                ->addTextarea("textarea", ['label' => __("Long Text Field", "rbf-wp-starter-theme")])
                ->setLocation("post_type", "==", "example_cpt");
            
            $this->add_field_group($fields);
        }

        private function add_field_group(FieldsBuilder $group)
        {
            if(function_exists("acf_add_local_field_group")){
                acf_add_local_field_group($group->build());
            }
        }
    }
}
