<?php /* Template name: Full Width Without Title */ ?>
<?php if(!defined('ABSPATH')){ exit; } ?>
<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
<div class="container-fluid py-5">
    <?php the_content(); ?>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>