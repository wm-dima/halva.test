<?php get_header();?>

    <div class="catalog">
        <div class="wrapper">
            <div class="inside-catalog">
                <?php get_template_part('templates/search', 'catalog'); ?>
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
                            // do_action( 'woocommerce_before_shop_loop' );
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
                        <?php // wc_get_template_part( 'loop/pagination' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo get_template_directory_uri() . '/assets/js/wm_filters.js' ?>"></script>
<?php get_footer(); ?>