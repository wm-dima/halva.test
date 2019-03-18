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
<?php get_template_part('templates/search', 'catalog'); ?>
            </div>
            <div class="item-main">
				<div class="wrapper">
					<div class="inside-item-main">
					 	<div class="item-navigation">
						<?php
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
						<div class="item-cart">
										<div class="item-cart-main">
                                            <div class="inside-cart-main">
                                                <div class="item-view">
                                                    <div class="connected-carousels">
                                                        <div class="stage">
                                                            <div class="carousel carousel-stage">
                                                                <?php echo wm_get_single_prod_galegy( $product->id ); ?>
                                                            </div>
                                                            <a href="#" class="prev prev-stage"><span>&lsaquo;</span></a>
                                                            <a href="#" class="next next-stage"><span>&rsaquo;</span></a>
                                                        </div>

                                                        <div class="navigation">
                                                            <a href="#" class="prev prev-navigation">
                                                            	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/prev.png" alt=""></a>
                                                            <a href="#" class="next next-navigation">
                                                            	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/next.png" alt=""></a>
                                                            <div class="carousel carousel-navigation">
                                                                <?php echo wm_get_single_prod_galegy( $product->id ); ?>
                                                            </div>
                                                        </div>
                                                    </div><!--aba19-port-->
                                                    <div class="item-options">
                                                        <div class="like-item"></div>
                                                        <div class="compar"></div>
                                                    </div>
                                                </div>
                                                <div class="item-buy">
                                                    <p class="total-price"><span class="price"><?php echo $product->get_price_html(); ?></span> р.</p>
                                                    <?php if ( $product->stock_status == 'outofstock' ): ?>
                                                        <div class="out-of-stock"><p>Нет в наличие</p></div>
                                                    <?php else: ?>
                                                         <p class="in-real">В наличии:
                                                            <?php $stocks = get_field('wm_stock_availability');
                                                                foreach ($stocks as $key => $value) {
                                                                    $html .= '<span class="city-1">' . $value['stock_title'] . '</span>, ';
                                                                }
                                                                echo substr($html, 0, strlen($html) - 2) . '.';
                                                            ?>
                                                        <a 
                                                            href="/shop/?add-to-cart=<?php echo the_id(); ?>" 
                                                            data-quantity="1" 
                                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart" 
                                                            data-product_id="<?php echo the_id(); ?>" 
                                                            data-product_sku="" 
                                                            rel="nofollow"
                                                        >
                                                            <button class="in-basket-item" style="-webkit-appearance: listitem;">В корзину</button>
                                                        </a>
                                                    <?php endif ?>
                                                   

                                                    <div class="buy-at-click">
                                                        <p class="buy-click">Купить в 1 клик</p>
                                                        <p class="left-contact">Оставьте данные для связи и наш менеджер свяжется с Вами в ближайшее время</p>
                                                        <a href="" class="buy-opt">Купить оптом</a>
                                                        <p class="discript">
                                                            Цена действительна только при заказе в интернет-магазине. 
                                                            В розничных магазинах стоимость товара может отличаться.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="delivery-item">
                                            <div class="calculate">
                                                <p>Доставка до<br class="brhide">&mdash;</p>
                                                <div class="select-div">
                                                    <select class="select-city">
                                                        <option>
                                                            Москва
                                                        </option>
                                                        <option>Пункт 2</option>
                                                    </select>
                                                </div>
                                                <a href="" class="calc">Рассчитать</a>
                                            </div>
                                        </div>
                                        <div class="payment-info">
                                            <h5>Оплата</h5><!--aba19-port--><!--don't delete, important!-->
                                            <div class="payment-div">
                                                <ul>
                                                    <li>- Банковская карта Visa/MasterCard</li>
                                                    <li>- Платежные терминалы Евросеть </li>
                                                    <li>- Салоны связи Евросеть  </li>
                                                    <li>- Сбербанк</li>
                                                    <li>- Уточнить по способу оплаты у менеджера</li>
                                                    <li>- Оплата при получении</li>
                                                </ul>
                                            </div>
                                            <div class="steps">
                                                <div class="pay-step">
                                                    <div class="ps-img"></div>
                                                    <p>Оплата</p>
                                                </div>
                                                <div class="dalivery-step">
                                                    <div class="ds-img"></div>
                                                    <p>Оплата</p>
                                                </div>
                                                <div class="garanty-step">
                                                    <div class="gs-img"></div>
                                                    <p>Оплата</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="full-item-info">
                                        <div class="discription-item">
                                            <h4>Описание</h4>
                                            <p><?php echo $product->description; ?></p>
                                        </div>
                                        <div class="specifications-item">
                                                <?php  
                                                    $specifications = get_field( 'add_specifications' );
                                                    if ( count( $specifications ) && is_array($specifications) ) {
                                                        echo "<h4>Характеристики</h4>";
                                                        foreach ($specifications as $key => $value): 
                                                ?>
                                                        <div class="specifications">
                                                            <div class="spec-main">
                                                                <div><?php echo $value['specification_title']; ?></div>
                                                            </div>
                                                            <?php 
                                                                if ( count( $value['specification_block'] ) ) {
                                                                    foreach ($value['specification_block'] as $k => $v): ?>
                                                                        <div class="type">
                                                                            <div><?php echo $v['specification_title']; ?></div>
                                                                            <div><?php echo $v['specification_value']; ?></div>
                                                                        </div>
                                                            <?php 
                                                                    endforeach;
                                                                }
                                                            ?>
                                                        </div>
                                                <?php
                                                        endforeach;
                                                    }
                                                ?>
                                        </div>
                                    </div>
                                    <?php get_template_part('templates/comments', 'form'); ?>
                             </div>
<?php 
    $args = array(
        'include' => $product->get_cross_sell_ids(),
    );
    $loop = wc_get_products( $args );
    $ids = $product->get_cross_sell_ids();
?>
                             <div class="also-buy">
                                <h4>С этим товаром покупают</h4>
                                <div class="swiper">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">

                                        <?php if ( have_posts() ) :
                                        foreach ($ids as $key => $value) : 
                                            // global $product;
                                            $product = wc_get_product( $value );
                                            // echo "<pre>";
                                            // var_dump( $product );
                                            // die;
                                        ?>

                                            <div class="swiper-slide">
                                            <div class="catalog-item hi-1" data-wm-prod-id="<?php $value; ?>">
                                                <div class="item-info">
                                                    <a href="<?php echo get_permalink($value); ?>">
                                                        <div class="item-logo">
                                                            <div class="img-padding">
                                                                <img src="<?php echo wm_get_main_img( $value ); ?>" alt="">
                                                            </div>
                                                        </div>
                                                   </a>
                                                    <a href="<?php echo get_permalink($value); ?>">
                                                        <p class="item-name"><?php echo $product->name; ?></p>
                                                    </a>
                                                    <div class="item-price"><span class="price-value"><?php echo $product->get_price_html(); ?></span> руб.</div>
                                                    <div class="item-icons">
                                                        <div class="item-like"><?php  echo do_shortcode( '[ti_wishlists_addtowishlist]' ); ?> </div>
                                                        <div 
                                                            class="item-balance" 
                                                            data-wm-wcp="<?php echo do_shortcode( '[is_in_compare_list]' ) == 1 ? 'remove' : 'add'; ?>">
                                                        </div>
                                                    </div>
                                                </div>    
                                                <div class="in-basket">
                                                    <?php if ( $product->stock_status == 'outofstock' ): ?>
                                                        <div class="out-of-stock"><p>Нет в наличие</p></div>
                                                    <?php else: ?>
                                                        <a 
                                                            href="/shop/?add-to-cart=<?php echo $value; ?>" 
                                                            data-quantity="1" 
                                                            class="button product_type_simple add_to_cart_button ajax_add_to_cart" 
                                                            data-product_id="<?php echo $value; ?>" 
                                                            data-product_sku="" 
                                                            rel="nofollow"
                                                        >
                                                            <button>В корзину</button>
                                                        </a>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                            </div>

                                        <?php endforeach; endif; ?>

                                        </div>
                                        <div class="swiper-pagination"></div>
                                    <!-- Add Arrows -->
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>    
                                      <!-- Swiper JS -->
                                      <!-- <script src="../js/swiper.min.js"></script> -->
                                    
                                      <!-- Initialize Swiper -->
                                      <script>
                                        var swiper = new Swiper('.swiper-container', {
                                          slidesPerView: 4,
                                          loop: true,
                                          pagination: {
                                            el: '.swiper-pagination',
                                            clickable: true,
                                          },
                                          navigation: {
                                            nextEl: '.swiper-button-next',
                                            prevEl: '.swiper-button-prev',
                                          }
                                        });
                                        if($(window).width() < 1010) {
                                            var swiper = new Swiper('.swiper-container', {
                                            slidesPerView: 3,
                                            loop: true,
                                            pagination: {
                                                el: '.swiper-pagination',
                                                clickable: true,
                                            },
                                            navigation: {
                                                nextEl: '.swiper-button-next',
                                                prevEl: '.swiper-button-prev',
                                            }
                                            });
                                        }
                                        if($(window).width() < 600) {
                                            var swiper = new Swiper('.swiper-container', {
                                            slidesPerView: 2,
                                            loop: true,
                                            pagination: {
                                                el: '.swiper-pagination',
                                                clickable: true,
                                            },
                                            navigation: {
                                                nextEl: '.swiper-button-next',
                                                prevEl: '.swiper-button-prev',
                                            }
                                            });
                                        }
                                        if($(window).width() < 495) {
                                            var swiper = new Swiper('.swiper-container', {
                                            slidesPerView: 1,
                                            loop: true,
                                            pagination: {
                                                el: '.swiper-pagination',
                                                clickable: true,
                                            },
                                            navigation: {
                                                nextEl: '.swiper-button-next',
                                                prevEl: '.swiper-button-prev',
                                            }
                                            });
                                        }
                                      </script>
                                      
                             </div>
						 </div>
					 </div>
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
		// do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
