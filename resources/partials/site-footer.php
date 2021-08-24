<?php if(!defined('ABSPATH')){ exit; } ?>
<footer id="site-footer" class="bg-dark-blue py-5">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 text-center text-lg-start">
                <div class="d-none d-lg-block">
                    <?php do_action("footer-menu-desktop"); ?>
                </div>
                <div class="d-block d-lg-none">
                    <?php do_action("footer-menu-mobile"); ?>
                </div>
            </div>
        </div>
        <hr class="border-light my-4">
        <div class="row align-items-center px-lg-5">
            <div class="col-12 col-lg-7 mb-3 mb-lg-0">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-2 col-xl-1 text-center">
                        <img data-src="<?= get_field("footer-logo", "options"); ?>" alt="<?= get_bloginfo("name"); ?>" class="img-fluid lazy" style="max-width: 80px;">
                    </div>
                    <div class="col-12 col-lg-10 col-xl-11">
                        <p class="text-muted text-uppercase small m-0"><?= get_field("footer-copyright", "options"); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <ul class="list-inline text-center text-lg-end m-0">
                    <?php while(have_rows("footer-social", "options")): the_row(); ?>
                    <li class="list-inline-item">
                        <a href="<?= get_sub_field("url", "options"); ?>" target="_blank" rel="noopener noreferrer" class="text-light text-decoration-none" title="<?= get_sub_field("label"); ?>"><?= get_sub_field("icon", "options"); ?></a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
