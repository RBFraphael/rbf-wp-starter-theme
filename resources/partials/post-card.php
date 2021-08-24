<?php if(!defined('ABSPATH')){ exit; } ?>
<div class="col p-2">
    <div class="card shadow">
        <div class="square lazy bg-image" data-bg="<?= get_the_post_thumbnail_url(); ?>"></div>
        <div class="card-body">
            <h4 class="fw-bold"><?= get_the_title(); ?></h4>
            <p><?= get_the_excerpt(); ?></p>
            <a href="<?= get_the_permalink(); ?>" class="btn btn-primary"><?= __("Read More", "rbf-wp-starter-theme"); ?></a>
        </div>
    </div>
</div>
