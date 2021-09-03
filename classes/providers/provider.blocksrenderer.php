<?php if(!defined('ABSPATH')){ exit; }

if(!class_exists("RBFWpStarterTheme_ProviderBlocksRenderer")){
    class RBFWpStarterTheme_ProviderBlocksRenderer
    {
        public function container()
        {
            $px = get_field("horizontal-padding") ? "px-2 px-lg-5" : "";
            $py = get_field("vertical-padding") ? "py-2 py-lg-5" : "";
            ob_start();
            include(RBFWPSTARTERTHEME_PATH."/resources/blocks/container.php");
            ob_end_flush();
        }
    }
}