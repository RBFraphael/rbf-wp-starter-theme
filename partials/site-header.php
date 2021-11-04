<?php if(!defined('ABSPATH')){ exit; } ?>
<header id="site-header" class="<?= is_front_page() ? "" : "scroll"; ?>">
    <div class="container-fluid py-3">
        <div class="row px-2 px-lg-5 align-items-center">
            <div class="col-4 col-lg-1">
                <a href="<?= get_bloginfo("url"); ?>">
                    <?php if($header_logo = get_field("header-logo", "options")): ?>
                    <img data-src="<?= $header_logo; ?>" alt="<?= get_bloginfo("name"); ?>" class="img-fluid lazy" id="header-logo">
                    <?php else: ?>
                    <h1 class="fw-bold"><?= get_bloginfo("name"); ?></h1>
                    <?php endif; ?>
                </a>
            </div>
            <div class="col-8 col-lg-10 text-end text-lg-start">
                <div class="d-none d-lg-block">
                    <?php do_action("header-menu-desktop"); ?>
                </div>
                <div class="d-block d-lg-none">
                    <button class="btn btn-light text-primary" onclick="openDrawer()">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part("partials/breadcrumbs"); ?>
</header>
