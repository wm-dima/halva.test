<?php get_header();?>
        <div class="menu-wrapper">
            <div class="second-menu">
                <div class="logo"></div>
                <div class="phones">
                    <ul>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png" alt=""><span class="phone-number"><a href="tel:+88007007363">8 (800) 700-73-63</a></span></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png" alt=""><span class="phone-number"><a href="tel:+88007007363">8-800-700-73-63</a></span></li>
                    </ul>
                </div>
                <div class="call-back">
                    <ul>
                        <li>ПН-ВС: 6:00–16:00 (МСК)</li>
                        <li>
                            <a href="">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/callback.png" alt="">
                                Обратный звонок
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="shop-icons">
                    <div class="accept">
                        <div class="shop-icon">
                            <div class="number"><?php echo count($yith_woocompare->obj->products_list); ?></div>
                        </div>
                        <p>Сравнение</p>
                    </div>
                    <div class="likes">
                        <div class="shop-icon">
                            <div class="number"><?php echo wm_get_wishlist_count(); ?></div>
                        </div>
                        <p>Желание</p>
                    </div>
                    <div class="basket">
                        <div class="shop-icon">
                            <div class="number"><?php echo $woocommerce->cart->cart_contents_count; ?></div>
                        </div>
                        <p>Корзина</p>
                    </div>
                </div>
            </div>
        </div>
    <div class="catalog">
        <div class="wrapper">
            <div class="inside-catalog">
                <div class="search">
                    <a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/catalog.png" alt=""> Каталог товаров
                    </a>
                    <?php get_search_form(); ?>
                </div>
                <div class="catalog-info">
                    <div class="catalog-name">
                        <p>АВТОМОБИЛЬНАЯ  АКУСТИКА</p>
                    </div>
                    <div class="quantity">
                        <p><?php echo wm_prod_per_page(); ?> <span class="quantity-tov"><?php echo wc_get_loop_prop( 'total' ); ?></span></p>
                    </div>
                    <div class="only-real">
                        <?php echo wm_render_only_stock_form(); ?>
                    </div>
                    <div class="brend wm-hid">
                        <div class="brend-1" onclick="$('.brend-1 img').toggleClass('img-rotate');$('.brend-2').toggleClass('brend-2-show')">
                            <p class="brend-p">Бренду</p>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/down-arrow.png" alt="">
                        </div>
                    </div>
                    <div class="brend-2">
                        <ul>
                            <li><a href="">Бренду</a></li>
                            <li><a href="">Бренду</a></li>
                            <li><a href="">Бренду</a></li>
                            <li><a href="">Бренду</a></li>
                            <li><a href="">Бренду</a></li>
                        </ul>
                    </div>
                </div>
                <div class="catalog-main">
                    <div class="filter">
                        <?php dynamic_sidebar('wm-price-filter'); ?>
                        <div class="wm-filters-wrap">
                            <?php  dynamic_sidebar('wm-manufactarer-filter'); ?>
                        </div>
                    </div>
                    <div class="catalog-main-items">
                        <?php
                        if ( woocommerce_product_loop() ) {
                            /**
                             * Hook: woocommerce_before_shop_loop.
                             *
                             * @hooked woocommerce_output_all_notices - 10
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_catalog_ordering - 30
                             */
                            do_action( 'woocommerce_before_shop_loop' );
                            woocommerce_product_loop_start();
                            if ( wc_get_loop_prop( 'total' ) ) {
                                while ( have_posts() ) {
                                    the_post();
                                    /**
                                     * Hook: woocommerce_shop_loop.
                                     *
                                     * @hooked WC_Structured_Data::generate_product_data() - 10
                                     */
                                    do_action( 'woocommerce_shop_loop' );
                                    
                                    wc_get_template_part( 'content', 'product' );
                                }
                            }
                            woocommerce_product_loop_end();
                            /**
                             * Hook: woocommerce_after_shop_loop.
                             *
                             * @hooked woocommerce_pagination - 10
                             */
                            do_action( 'woocommerce_after_shop_loop' );
                        } else {
                            /**
                             * Hook: woocommerce_no_products_found.
                             *
                             * @hooked wc_no_products_found - 10
                             */
                            do_action( 'woocommerce_no_products_found' );
                        }
                        ?>
                        <?php wc_get_template_part( 'loop/pagination' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>