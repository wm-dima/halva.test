<?php
/*
Template Name: checkout
*/
?>
<?php get_header(); ?>
<?php get_template_part('templates/basket', 'navigation') ?>	  
	<div class="wrapper">
	   <?php echo do_shortcode( '[woocommerce_checkout]' ); ?>
	</div>
<?php get_footer(); ?>
