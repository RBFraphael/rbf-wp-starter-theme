<?php /* Template name: Without Title */ ?>
<?php if(!defined('ABSPATH')){ exit; } ?>
<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
<div class="container py-5">
    <?php the_content(); ?>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>