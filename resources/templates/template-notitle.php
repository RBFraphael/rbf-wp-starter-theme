<?php /* Template name: Without Title */ ?>
<?php if(!defined('ABSPATH')){ exit; } ?>
<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
<main class="container-fluid px-0">
    <?php the_content(); ?>
</dimainv>
<?php endwhile; ?>

<?php get_footer(); ?>