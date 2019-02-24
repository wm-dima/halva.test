<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<?php 
echo "<pre>";
// echo wp_get_attachment_image( $post->ID, array(20,20), true);
// var_dump( wm_get_images( $post->ID ) );
// die;
echo "</pre>";
?>
									<div class="item-cart" id="product-<?php the_ID(); ?>" >
										<div class="item-cart-main">
                                            <div class="inside-cart-main">
                                                <div class="item-view">

                                                    <div class="connected-carousels">
                                                        <div class="stage">
                                                            <div class="carousel carousel-stage">
                                                                <ul>
                                                                    <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/item-1.png"  alt=""></li>
                                                                    <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/item-2.png"  alt=""></li>
                                                                    <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/item-3.png"  alt=""></li>
                                                                </ul>
                                                            </div>
                                                            <a href="#" class="prev prev-stage"><span>&lsaquo;</span></a>
                                                            <a href="#" class="next next-stage"><span>&rsaquo;</span></a>
                                                        </div>

                                                        <div class="navigation">
                                                            <a href="#" class="prev prev-navigation"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/prev.png" alt=""></a>
                                                            <a href="#" class="next next-navigation"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/next.png" alt=""></a>
                                                            <div class="carousel carousel-navigation">
                                                                <ul>
                                                                    <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/item-slider.jpg" width="69" height="21" alt=""></li>
                                                                    <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/item-slider.jpg" width="69" height="21" alt=""></li>
                                                                    <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/item-slider.jpg" width="69" height="21" alt=""></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="item-options">
                                                        <div class="like-item"></div>
                                                        <div class="compar"></div>
                                                    </div>
                                                </div>
	<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		// do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			// do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		// do_action( 'woocommerce_after_single_product_summary' );
	?>

<?php do_action( 'woocommerce_after_single_product' ); ?>
