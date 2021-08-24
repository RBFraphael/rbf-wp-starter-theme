<?php if(!defined('ABSPATH')){ exit; } ?>
<?php get_header(); ?>

<main class="container-fluid">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="fw-light"><?= __("Blog", "rbf-wp-starter-theme"); ?></h1>
            </div>
        </div>
        <?php if(have_posts()): ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4" id="blog-container">
            <?php while(have_posts()): the_post(); ?>
            <div class="col p-2">
                <a href="<?= get_the_permalink(); ?>" class="card shadow h-100 text-dark text-decoration-none">
                    <div class="wide lazy bg-image" data-bg="<?= get_the_post_thumbnail_url(); ?>"></div>
                    <div class="card-body">
                        <h5 class="fw-light"><?= get_the_title(); ?></h5>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
        <div class="row py-5">
            <div class="col-12">
                <div class="text-center">
                    <h4 class="text-muted"><?= __("There's nothing here yet!", "rbf-wp-starter-theme") ?></h4>
                    <p><?= __("This means that we're writting a super-cool content just for you!", "rbf-wp-starter-theme") ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>