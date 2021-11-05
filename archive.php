<?php if(!defined('ABSPATH')){ exit; } ?>
<?php get_header(); ?>

<div class="container-fluid py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h4><?= __("Archive", "rbf-wp-starter-theme"); ?></h4>
            <hr>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
        <?php while(have_posts()): the_post(); ?>
            <?php get_template_part("partials/post-card"); ?>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>