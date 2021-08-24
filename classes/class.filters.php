<?php if(!defined('ABSPATH')){ exit; }

include_once RBFWPSTARTERTHEME_PATH."/includes/SimpleHtmlDom-1.9.1/simple_html_dom.php";

if(!class_exists("RBFWpStarterTheme_Filters")){
    class RBFWpStarterTheme_Filters
    {
        public function embedded_acf_url($url)
        {
            return RBFWPSTARTERTHEME_ACF_URL;
        }

        public function responsive_images($content)
        {
            if($html = str_get_html($content)){
                foreach($html->find("img") as $img){
                    if(!$img->hasClass("img-fluid") && !$img->hasClass("no-fluid")){
                        $img->addClass("img-fluid");
                    }
                }
                return $html;
            }
            return $content;
        }

        public function responsive_iframes($content)
        {
            if($html = str_get_html($content)){
                foreach($html->find("iframe") as $iframe){
                    if(!$iframe->hasClass("embed-responsive-item")){
                        $iframe->addClass("embed-responsive-item");
                        $iframe->outertext = "<div class=\"embed-responsive embed-responsive-16by9\">".$iframe->outertext."</div>";
                    }
                }
                return $html;
            }
            return $content;
        }

        public function lazyload_images($content)
        {
            if($html = str_get_html($content)){
                foreach($html->find("img") as $img){
                    if(!$img->hasAttribute("data-src") && !$img->hasClass("lazy")){
                        $src = $img->getAttribute("src");
                        $img->setAttribute("src", "");
                        $img->setAttribute("data-src", $src);
                        $img->addClass("lazy");
                    }
                }
                return $html;
            }
            return $content;
        }

        public function lazyload_iframes($content)
        {
            if($html = str_get_html($content)){
                foreach($html->find("iframe") as $iframe){
                    if(!$iframe->hasAttribute("data-src") && !$iframe->hasClass("lazy")){
                        $src = $iframe->getAttribute("src");
                        $iframe->setAttribute("src", "");
                        $iframe->setAttribute("data-src", $src);
                        $iframe->addClass("lazy");
                    }
                }
                return $html;
            }
            return $content;
        }

        public function excerpt_length($length)
        {
            return 30;
        }

        public function excerpt_ending($ending)
        {
            return "...";
        }

        public function gutenberg_categories($categories, $post)
        {
            $categories[] = [
                'slug' => 'rbf-wp-starter-theme',
                'title' => __("RBF Wordpress Starter Theme", "rbf-wp-starter-theme"),
                'icon' => 'dashicons-admin-customizer'
            ];
            return $categories;
        }

        public function header_menu_desktop($menu)
        {
            if($html = str_get_html($menu)){
                foreach($html->find("a") as $link){
                    $link->addClass("text-decoration-none text-dark text-uppercase fw-light");
                }

                foreach($html->find("ul.menu") as $menu){
                    $menu->addClass("list-inline mb-0");
                    $menu->setAttribute("id", "header-navlinks");
                }

                foreach($html->find("ul.menu > li") as $menu_item){
                    $menu_item->addClass("list-inline-item mx-3");
                }

                foreach($html->find("ul.sub-menu") as $sub_menu){
                    $sub_menu->addClass("dropdown-menu");
                }

                foreach($html->find("ul.sub-menu li") as $sub_menu_item){
                    $sub_menu_item->addClass("dropdown-item");
                }

                foreach($html->find("ul.menu > li.menu-item-has-children") as $menu_item_with_children){
                    $menu_item_with_children->addClass("dropdown");
                }

                foreach($html->find("ul.menu > li.menu-item-has-children li.menu-item-has-children") as $sub_menu_item_with_children){
                    $sub_menu_item_with_children->addClass("dropdown-submenu");
                }

                foreach($html->find("ul.menu > li.menu-item-has-children > a") as $link){
                    $link->addClass("dropdown-toggle");
                }

                foreach($html->find("ul.sub-menu > li.menu-item-has-children > a") as $sub_menu_link){
                    $sub_menu_link->addClass("dropdown-toggle");
                }

                return $html;
            }

            return $menu;
        }

        public function header_menu_mobile($menu)
        {
            if($html = str_get_html($menu)){
                foreach($html->find("ul") as $menu){
                    $menu->addClass("list-unstyled p-0 m-0");
                }

                foreach($html->find("ul.sub-menu") as $menu){
                    $menu->addClass("pl-3");
                }

                foreach($html->find("a") as $link){
                    $link->addClass("btn btn-light btn-block text-start");
                }

                $collapse_link = 1;
                foreach($html->find("li.menu-item-has-children > a") as $submenu_link){
                    $submenu_link->addClass("dropdown-toggle");
                    $submenu_link->setAttribute("data-toggle", "collapse");
                    $submenu_link->setAttribute("data-target", "#collapse-".$collapse_link);
                    $collapse_link++;
                }

                $collapse_menu = 1;
                foreach($html->find("li.menu-item-has-children > ul.sub-menu") as $submenu_link){
                    $submenu_link->addClass("collapse");
                    $submenu_link->setAttribute("id", "collapse-".$collapse_menu);
                    $collapse_menu++;
                }

                return $html;
            }
            
            return $menu;
        }

        public function footer_menu_desktop($menu)
        {
            if($html = str_get_html($menu)){
                foreach($html->find("a") as $link){
                    $link->addClass("text-decoration-none fw-light text-uppercase");
                }

                foreach($html->find("ul.menu") as $menu){
                    $menu->addClass("list-inline m-0 d-flex align-items-start justify-content-end list-unstyled");
                }

                foreach($html->find("ul.menu > li") as $menu_item){
                    $menu_item->addClass("list-inline-item mx-3 col");
                }

                foreach($html->find("ul.menu > li > a") as $menu_link){
                    $menu_link->addClass("d-block border-bottom border-info text-info");
                }

                foreach($html->find("ul.sub-menu") as $submenu){
                    $submenu->addClass("m-0 px-0 pt-2 list-unstyled");
                }

                foreach($html->find("ul.sub-menu a") as $submenu){
                    $submenu->addClass("text-light small");
                }

                return $html;
            }
            
            return $menu;
        }

        public function footer_menu_mobile($menu)
        {
            if($html = str_get_html($menu)){
                foreach($html->find("a") as $link){
                    $link->addClass("text-decoration-none fw-light text-uppercase");
                }

                foreach($html->find("ul.menu") as $menu){
                    $menu->addClass("col list-inline align-items-start");
                    $menu->addClass("justify-content-end");
                }

                foreach($html->find("ul.menu > li") as $menu_item){
                    $menu_item->addClass("list-inline-item mx-3 col");
                }

                foreach($html->find("ul.menu > li > a") as $menu_link){
                    $menu_link->addClass("d-block border-bottom border-info text-info");
                }

                foreach($html->find("ul.sub-menu") as $submenu){
                    $submenu->addClass("m-0 px-0 pt-2");
                }

                foreach($html->find("ul.sub-menu a") as $submenu){
                    $submenu->addClass("text-light small");
                }

                return $html;
            }
            
            return $menu;
        }

        public function fix_content($content)
        {
            if($html = str_get_html($content)){
                foreach($html->find("img.aligncenter") as $element){
                    if(!$element->hasClass("d-block")){
                        $element->addClass("d-block");
                    }
                    if(!$element->hasClass("mx-auto")){
                        $element->addClass("mx-auto");
                    }
                }

                return $html;
            }

            return $content;
        }

        public function login_css()
        {
            ?>
            <style type='text/css'>
                body.login {
                    background-color: #ffffff;
                    background-image: url('<?= RBFWPSTARTERTHEME_URL; ?>/assets/img/background-1920x1080.jpg');
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                }
                body.login div#login h1 a {
                    background-image: url('<?= RBFWPSTARTERTHEME_URL; ?>/assets/img/logo-128x128.png');
                    background-size: 100% 100%;
                    background-repeat: no-repeat;
                    background-position: center;
                    width: 128px;
                    height: 128px;
                    margin: 0 auto 25px;
                }

                body.login div#login form#loginform {
                    background-color: rgba(255, 255, 255, 0.5);
                    transform: scale(0);
                    animation: 1s open ease-in-out forwards;
                    animation-delay: 1s;
                }

                @keyframes open{
                    0%{
                        transform: scale(0);
                    }
                    70%{
                        transform: scale(1.1);
                    }
                    90%{
                        transform: scale(0.9);
                    }
                    100%{
                        transform: scale(1);
                    }
                }
            </style>
            <?php
        }
    }
}
