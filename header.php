<?php if(!defined('ABSPATH')){ exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<?php if(get_field("enable-barba", "options")): ?>
<body <?php body_class(); ?> data-barba="wrapper">
<?php else: ?>
<body <?php body_class(); ?>>
<?php endif; ?>

<?php wp_body_open(); ?>

<?php get_template_part("partials/loader"); ?>

<?php get_template_part("partials/popups"); ?>

<?php get_template_part("partials/mobile-drawer"); ?>

<?php get_template_part("partials/site-header"); ?>

<?php if(get_field("enable-barba", "options")): ?>
<main data-barba="container" data-barba-namespace="rbf-wp-starter-theme">
<?php else: ?>
<main>
<?php endif; ?>