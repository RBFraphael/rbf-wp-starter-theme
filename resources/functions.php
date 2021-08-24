<?php if(!defined('ABSPATH')){ exit; }

$theme_dir = get_template_directory()."/..";
$theme_url = get_template_directory_uri()."/..";

defined("RBFWPSTARTERTHEME_PATH") or define("RBFWPSTARTERTHEME_PATH", $theme_dir);
defined("RBFWPSTARTERTHEME_URL") or define("RBFWPSTARTERTHEME_URL", $theme_url);
defined("RBFWPSTARTERTHEME_VERSION") or define("RBFWPSTARTERTHEME_VERSION", "1.0.0");

include_once RBFWPSTARTERTHEME_PATH."/classes/class.main.php";

$wptheme = new RBFWpStarterTheme_Main();
