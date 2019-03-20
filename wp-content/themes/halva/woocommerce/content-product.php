<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="catalog-item hi-1" data-wm-prod-id="<?php the_ID(); ?>">
    <div class="item-info">
        <a href="<?php echo get_permalink(); ?>">
            <div class="item-logo">
                <div class="img-padding">
                    <img src="<?php echo wm_get_main_img( $loop->post->ID ); ?>" alt="">
                </div>
            </div>
       </a>
        <a href="<?php echo get_permalink(); ?>">
            <p class="item-name"><?php the_title(); ?></p>
        </a>
        <div class="item-price"><span class="price-value"><?php echo $product->get_price_html(); ?></span> руб.</div>
        <div class="item-icons">
            <div 
                class="item-like" 
                data-wm-wwl="<?php echo do_shortcode( '[is_in_wish_list]' ) == 1 ? 'remove' : 'add'; ?>">
            </div>
            <div 
                class="item-balance" 
                data-wm-wcp="<?php echo do_shortcode( '[is_in_compare_list]' ) == 1 ? 'remove' : 'add'; ?>">
            </div>
        </div>
    </div>    
    <div class="in-basket">
        <?php if ( $product->stock_status == 'outofstock' ): ?>
            <div class="out-of-stock"><button>Нет в наличие</button></div>
        <?php else: ?>
            <a 
                href="/shop/?add-to-cart=<?php echo the_id(); ?>" 
                data-quantity="1" 
                class="button product_type_simple add_to_cart_button ajax_add_to_cart" 
                data-product_id="<?php echo the_id(); ?>" 
                data-product_sku="" 
                rel="nofollow"
            >
                <button>В корзину</button>
            </a>
        <?php endif ?>
    </div>
</div>