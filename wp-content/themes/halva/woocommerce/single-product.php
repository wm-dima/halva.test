<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<?php 
	global $product;
	if ( ! is_object( $product)) $product = wc_get_product( get_the_ID() );
?>
            <div class="wrapper">
                <div class="search sc-faq">
                    <a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/catalog.png" alt="">
                        Каталог товаров
                    </a>
                    <form action="">
                        <input type="text" placeholder="Поиск" required>
                        <button>Найти</button>
                    </form>
                </div>
            </div>
            <div class="item-main">
						<div class="wrapper">
							<div class="inside-item-main">
								 	<div class="item-navigation">
									<?php
										/**
										 * woocommerce_before_main_content hook.
										 *
										 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content) ----
										 * @hooked woocommerce_breadcrumb - 20
										 */
										// do_action( 'woocommerce_before_main_content' );
										woocommerce_breadcrumb(
											$args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
												'delimiter'   => '',
												'wrap_before' => '<ul>',
												'wrap_after'  => '</ul>',
												'before'      => '<li>',
												'after'       => '</li>',
												'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
											) ) )
										);
									?>
									</div>
									<div class="pre-item-info">
										<p class="item-name-main"><?php the_title('',''); ?></p>
										<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
										   <p class="articul">Артикул: <span class="articul-value"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></p>
										<?php endif; ?>
										
										<p class="manufac">Производитель &nbsp;&nbsp; <span class="manufac-value"><?php echo $product->get_attribute('manufacturer'); ?></span></p>
									</div>
									

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		// do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
