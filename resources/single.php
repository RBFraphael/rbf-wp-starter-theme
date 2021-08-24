<?php if(!defined('ABSPATH')){ exit; } ?>
<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
<main>
    <div class="w-100 lazy bg-image" data-bg="<?= get_the_post_thumbnail_url(); ?>" style="height:560px;"></div>
    <article class="container-fluid py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h1><?= get_the_title(); ?></h1>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </article>
</main>
<?php endwhile; ?>

<?php get_footer(); ?>