<?php /* Template name: Full Width */ ?>
<?php if(!defined('ABSPATH')){ exit; } ?>
<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
<div class="container-fluid py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="fw-bold"><?= get_the_title(); ?></h1>
            <hr>
        </div>
    </div>
    <?php the_content(); ?>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>