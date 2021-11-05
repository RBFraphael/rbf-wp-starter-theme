<?php if(!defined('ABSPATH')){ exit; } ?>
<?php get_header(); ?>

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-center"><?= __("404 Not Found", "rbf-wp-starter-theme"); ?></h1>
                <a href="<?= get_bloginfo("name"); ?>" class="btn btn-primary"><?= __("Back to home", "rbf-wp-starter-theme") ?></a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>