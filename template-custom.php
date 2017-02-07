<?php if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
} ?>

<?php
/**
 * Template Name: Custom Template
 * Template Post Type: page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
