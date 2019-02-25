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
                                                    <p class="total-price"><span class="price">4 117</span> р.</p>
                                                    <p class="in-real">В наличии: <span class="city-1">Новосибирск</span>, <span class="city-2">Красноярск</span></p>
                                                    <a class="in-basket-item" href="">В корзину</a>

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
<!-- ================================================== -->

<!-- <div class="woocommerce-shipping-fields">
    <?php if ( true === WC()->cart->needs_shipping_address() ) : ?>

        <h3 id="ship-to-different-address">
            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                <input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" /> <span><?php _e( 'Ship to a different address?', 'woocommerce' ); ?></span>
            </label>
        </h3>

        <div class="shipping_address">

            <?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

            <div class="woocommerce-shipping-fields__field-wrapper">
                <?php
                    $checkout = WC()->checkout; /*моя вставка*/
                    $fields = $checkout->get_checkout_fields( 'shipping' );

                    foreach ( $fields as $key => $field ) {
                        if ( isset( $field['country_field'], $fields[ $field['country_field'] ] ) ) {
                            $field['country'] = $checkout->get_value( $field['country_field'] );
                        }
                        woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
                    }
                ?>
            </div>

            <?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

        </div>

    <?php endif; ?>
</div>
<div class="woocommerce-additional-fields">
    <?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

    <?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

        <?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

            <h3><?php _e( 'Additional information', 'woocommerce' ); ?></h3>

        <?php endif; ?>

        <div class="woocommerce-additional-fields__field-wrapper">
            <?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
                <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

    <?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
</div> -->
<?php
// echo "<pre>";
// global $product; /* Remove if set already.. */
// $shipping_class = $product->get_shipping_class();
// $flat_rate = new WC_Shipping_Flat_Rate;
// var_dump($flat_rate);
// $symbol = get_woocommerce_currency_symbol();
// echo $symbol . $flat_rate->flat_rates[$shipping_class]['cost'];
// die;
        wc_get_template(
            'cart/cart-shipping.php',
            array(
                'package'                  => $product,
                'available_methods'        => $product['rates'],
                'show_package_details'     => count( $packages ) > 1,
                'show_shipping_calculator' => is_cart() && $first,
                'package_details'          => implode( ', ', $product_names ),
                /* translators: %d: shipping package number */
                'package_name'             => apply_filters( 'woocommerce_shipping_package_name', ( ( $i + 1 ) > 1 ) ? sprintf( _x( 'Shipping %d', 'shipping packages', 'woocommerce' ), ( $i + 1 ) ) : _x( 'Shipping', 'shipping packages', 'woocommerce' ), $i, $product ),
                'index'                    => $i,
                'chosen_method'            => $chosen_method,
                'formatted_destination'    => WC()->countries->get_formatted_address( $product['destination'], ', ' ),
                'has_calculated_shipping'  => WC()->customer->has_calculated_shipping(),
            )
        );

?>


<!-- ================================================== -->

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
                                            <p>
                                                Цифровой ресивер JVC KD-T402 в черном корпусе имеет 
                                                компактные размеры. Помимо этого у него множество 
                                                плюсов: высокочувствительный FM-тюнер, вещающий радиостанции в 
                                                диапазоне FM, что позволит слушать любимую радиостанцию в дороге и 
                                                наслаждаться лаконичным звучанием. МР3-декодер, преобразовывающий цифровой 
                                                сигнал в чистый звук. Устройство читает аудио форматы МР3. 
                                                Его монохромный дисплей потребляет минимум энергии, 
                                                несмотря на это, информация на нем читается превосходно.
                                            </p>
                                        </div>
                                        <div class="specifications-item">
                                            <h4>Характеристики</h4>
                                            <div class="specifications">
                                                <div class="type">
                                                    <div>Тип</div>
                                                    <div>автопроигрыватель</div>
                                                </div>
                                                <div class="model">
                                                    <div>Модель</div>
                                                    <div>JVC KD-T402</div>
                                                </div>
                                                <div class="color-front">
                                                    <div>Цвет передней панели</div>
                                                    <div>черный</div>
                                                </div>
                                                <div class="typsize">
                                                    <div>Стандартный типоразмер</div>
                                                    <div>1 din</div>
                                                </div>
                                                <div class="tv">
                                                    <div>Наличие ТВ-тюнера</div>
                                                    <div>нет</div>
                                                </div>
                                                <div class="bort">
                                                    <div>Бортовая сеть авто</div>
                                                    <div>12 B</div>
                                                </div>
                                            </div>
                                            <div class="specifications">
                                                <div class="spec-main">
                                                    <div>Аудио характеристики</div>
                                                </div>
                                                <div class="char1">
                                                    <div>Общее количество каналов звука	</div>
                                                    <div>4</div>
                                                </div>
                                                <div class="char2">
                                                    <div>Номинальная выходная мощность</div>
                                                    <div>4x22 Вт</div>
                                                </div>
                                                <div class="char3">
                                                    <div>Максимальная выходная мощность</div>
                                                    <div>4x50 Вт</div>
                                                </div>
                                                <div class="char4">
                                                    <div>Наличие эквалайзера</div>
                                                    <div>есть</div>
                                                </div>  
                                            </div>
                                            <div class="specifications">
                                                <div class="spec-main">
                                                    <div>Воспроизведение</div>
                                                </div>
                                                <div class="char5">
                                                    <div>Читаемые носители (CD/DVD)</div>
                                                    <div>CD</div>
                                                </div>
                                                <div class="char6">
                                                    <div>Воспроизведение музыки по Bluetooth</div>
                                                    <div>нет</div>
                                                </div>
                                                <div class="char7">
                                                    <div>Читаемые форматы (USB/карта памяти)</div>
                                                    <div>WAV, WMA, FLAC, MP3</div>
                                                </div>
                                                <div class="char8">
                                                    <div>Читаемые форматы (CD/DVD)</div>
                                                    <div>MP3, WMA</div>
                                                </div>  
                                            </div>
                                            <div class="specifications">
                                                    <div class="spec-main">
                                                        <div>Беспроводные модули и навигация</div>
                                                    </div>
                                                    <div class="char9">
                                                        <div>Bluetooth</div>
                                                        <div>нет</div>
                                                    </div>
                                                    <div class="char10">
                                                        <div>GPS-приемник</div>
                                                        <div>нет</div>
                                                    </div>
                                                    <div class="char11">
                                                        <div>Wi-Fi</div>
                                                        <div>нет</div>
                                                    </div>
                                                    <div class="char12">
                                                        <div>Навигационное ПО</div>
                                                        <div>нет</div>
                                                    </div> 
                                                    <div class="char13">
                                                        <div>Передняя панель</div>
                                                        <div>нет</div>
                                                    </div>  
                                                </div>
                                                <div class="specifications">
                                                    <div class="spec-main">
                                                        <div>Разъемы на передней панели</div>
                                                    </div>
                                                    <div class="char14">
                                                        <div>Съемная панель</div>
                                                        <div>CD, AUX, USB</div>
                                                    </div>
                                                    <div class="char15">
                                                        <div>Тип дисплея</div>
                                                        <div>есть</div>
                                                    </div>
                                                    <div class="char16">
                                                        <div>Сенсорное управление</div>
                                                        <div>сегментный дисплей</div>
                                                    </div>
                                                    <div class="char17">
                                                        <div>Цвет подсветки дисплея</div>
                                                        <div>белый</div>
                                                    </div> 
                                                    <div class="char18">
                                                        <div>Цвет подсветки кнопок</div>
                                                        <div>красный</div>
                                                    </div>  
                                                </div>
                                                <div class="specifications">
                                                    <div class="spec-main">
                                                        <div>Задняя панель</div>
                                                    </div>
                                                    <div class="char19">
                                                        <div>Аналоговые входы</div>
                                                        <div>нет</div>
                                                    </div>
                                                    <div class="char20">
                                                        <div>Аналоговые выходы</div>
                                                        <div>линейный аудио (RCA)</div>
                                                    </div>
                                                    <div class="char21">
                                                        <div>Разъемы на тыльной стороне</div>
                                                        <div>разъем подключения по ISO, антенный вход</div>
                                                    </div>
                                                </div>
                                                <div class="specifications">
                                                    <div class="spec-main">
                                                        <div>Радио</div>
                                                    </div>
                                                    <div class="char22">
                                                        <div>Диапазоны радиочастот</div>
                                                        <div>FM, AM</div>
                                                    </div>
                                                    <div class="char23">
                                                        <div>Поддержка RDS</div>
                                                        <div>есть</div>
                                                    </div>
                                                    <div class="char24">
                                                        <div>Общее число предустановок</div>
                                                        <div>24</div>
                                                    </div>
                                                </div>
                                                <div class="specifications">
                                                    <div class="spec-main">
                                                        <div>Управление и подключение устройств</div>
                                                    </div>
                                                    <div class="char25">
                                                        <div>Телефонные звонки по Bluetooth (hands-free)</div>
                                                        <div>нет</div>
                                                    </div>
                                                    <div class="char26">
                                                        <div>Работа с мобильными устройствами</div>
                                                        <div>Android</div>
                                                    </div>
                                                    <div class="char27">
                                                        <div>Пульт ДУ в комплекте</div>
                                                        <div>нет</div>
                                                    </div>
                                                     <div class="char28">
                                                        <div>Возможность управления с помощью руля</div>
                                                        <div>есть</div>
                                                    </div>
                                                     <div class="char29">
                                                        <div>Возможность управления с помощью руля</div>
                                                        <div>нет</div>
                                                    </div>
                                                     <div class="spec-main">
                                                        <div>Дополнительно</div>
                                                    </div>
                                                     <div class="char31">
                                                        <div>Комплектация</div>
                                                        <div>документация, ISO-коннектор</div>
                                                    </div>
                                                    <div class="char31">
                                                        <div>Дополнительно</div>
                                                        <div>3-полосный эквалайзер</div>
                                                    </div>
                                                </div>
                                                <div class="specifications">
                                                    <div class="spec-main">
                                                        <div>Габариты</div>
                                                    </div>
                                                    <div class="char25">
                                                        <div>Установочная глубина</div>
                                                        <div>158 мм</div>
                                                    </div>
                                                    <div class="char26">
                                                        <div>Ширина</div>
                                                        <div>182 мм</div>
                                                    </div>
                                                    <div class="char27">
                                                        <div>Высота</div>
                                                        <div>53 мм</div>
                                                    </div>
                                                </div>  
                                        </div>
                                    </div>
                                    <div class="reviews">
                                        <h4>Отзывы</h4>
                                        <p class="no-one-review">
                                            У этого товара пока нет отзывов. Поделитесь своим мнением об этом товаре, и многие будут вам благодарны.
                                        </p>
                                        <a href="" class="get-review">Оставить отзыв</a>
                                    </div>
                             </div>
                             <div class="also-buy">
                                 <h4>С этим товаром покупают</h4>
                                 <div class="swiper">
                                 <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                          <div class="swiper-slide">
                                              <div class="catalog-item hi-1">
                                                <div class="item-info">
                                                    <div class="item-logo">
                                                        <img src="<?php echo get_templa_directory_uri(); ?>/assets/images/ct-item-1.png" alt="">
                                                    </div>
                                                    <p class="item-name"> Акустика Ural AS-D200 ARMADA, Мидрейндж 1шт.</p>
                                                    <div class="item-price"><span class="price-value">1 350</span> руб.</div>
                                                    <div class="item-icons">
                                                        <div class="item-like"></div>
                                                        <div class="item-balance"></div>
                                                    </div>
                                                </div>
                                                <div class="in-basket">
                                                    <button>В корзину</button>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="swiper-slide">
                                              <div class="catalog-item hi-1">
                                                <div class="item-info">
                                                    <div class="item-logo">
                                                        <img src="<?php echo get_templa_directory_uri(); ?>/assets/images/ct-item-1.png" alt="">
                                                    </div>
                                                    <p class="item-name"> Акустика Ural AS-D200 ARMADA, Мидрейндж 1шт.</p>
                                                    <div class="item-price"><span class="price-value">1 350</span> руб.</div>
                                                    <div class="item-icons">
                                                        <div class="item-like"></div>
                                                        <div class="item-balance"></div>
                                                    </div>
                                                </div>
                                                <div class="in-basket">
                                                    <button>В корзину</button>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="swiper-slide">
                                              <div class="catalog-item hi-1">
                                                <div class="item-info">
                                                    <div class="item-logo">
                                                        <img src="<?php echo get_templa_directory_uri(); ?>/assets/images/ct-item-1.png" alt="">
                                                    </div>
                                                    <p class="item-name"> Акустика Ural AS-D200 ARMADA, Мидрейндж 1шт.</p>
                                                    <div class="item-price"><span class="price-value">1 350</span> руб.</div>
                                                    <div class="item-icons">
                                                        <div class="item-like"></div>
                                                        <div class="item-balance"></div>
                                                    </div>
                                                </div>
                                                <div class="in-basket">
                                                    <button>В корзину</button>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="swiper-slide">
                                              <div class="catalog-item hi-1">
                                                <div class="item-info">
                                                    <div class="item-logo">
                                                        <img src="<?php echo get_templa_directory_uri(); ?>/assets/images/ct-item-1.png" alt="">
                                                    </div>
                                                    <p class="item-name"> Акустика Ural AS-D200 ARMADA, Мидрейндж 1шт.</p>
                                                    <div class="item-price"><span class="price-value">1 350</span> руб.</div>
                                                    <div class="item-icons">
                                                        <div class="item-like"></div>
                                                        <div class="item-balance"></div>
                                                    </div>
                                                </div>
                                                <div class="in-basket">
                                                    <button>В корзину</button>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="swiper-slide">
                                              <div class="catalog-item hi-1">
                                                <div class="item-info">
                                                    <div class="item-logo">
                                                        <img src="<?php echo get_templa_directory_uri(); ?>/assets/images/ct-item-1.png" alt="">
                                                    </div>
                                                    <p class="item-name"> Акустика Ural AS-D200 ARMADA, Мидрейндж 1шт.</p>
                                                    <div class="item-price"><span class="price-value">1 350</span> руб.</div>
                                                    <div class="item-icons">
                                                        <div class="item-like"></div>
                                                        <div class="item-balance"></div>
                                                    </div>
                                                </div>
                                                <div class="in-basket">
                                                    <button>В корзину</button>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="swiper-slide">
                                              <div class="catalog-item hi-1">
                                                <div class="item-info">
                                                    <div class="item-logo">
                                                        <img src="<?php echo get_templa_directory_uri(); ?>/assets/images/ct-item-1.png" alt="">
                                                    </div>
                                                    <p class="item-name"> Акустика Ural AS-D200 ARMADA, Мидрейндж 1шт.</p>
                                                    <div class="item-price"><span class="price-value">1 350</span> руб.</div>
                                                    <div class="item-icons">
                                                        <div class="item-like"></div>
                                                        <div class="item-balance"></div>
                                                    </div>
                                                </div>
                                                <div class="in-basket">
                                                    <button>В корзину</button>
                                                </div>
                                            </div>
                                          </div>
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
