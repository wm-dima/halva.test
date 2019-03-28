<?php 
/*
*Template Name: wm basket
*/
?>
<?php get_header(); ?>
            <div class="wrapper">
<?php get_template_part('templates/search', 'catalog'); ?>
            </div>
            <div class="wrapper">
                <div class="want"> 
                    <div class="item-navigation">
                        <ul>
                            <li>Корзина</li>
                        </ul>
                    </div>
                </div>
            </div>   
<?php get_template_part('templates/basket', 'navigation') ?>            
            <div class="basket-main">
                <div class="wrapper">
                    <div class="inside-basket-main">
                        <div class="basket-left">
                            <?php get_template_part('woocommerce/cart/cart'); ?>
                        </div>
                        <div class="basket-right">
                            <div class="price-basket">
                                <p class="sum-price-p">Стоимость товаров</p>
                                <p class="final-price"><?php wc_cart_totals_subtotal_html(); ?> р.</p>
                            </div>
                            <div class="delivery-method">
                                <?php if (is_user_logged_in()) : ?>
                                    <div class="log-in">
                                        <a href="<?php echo get_permalink( 258 ); ?>" style="display: content">Кабинет &nbsp | &nbsp </a>
                                        <a href="<?php echo wp_logout_url(get_permalink()); ?>"> Выход</a>
                                    </div>
                                <?php else : ?>
                                    <p>Для того чтобы процесс оформления покупки был ещё проще, <br>
                                        вы можете «Войти под Вашей учетной записью» или «Зарегистрироваться»</p>
                                    <a href="<?php echo wp_login_url(get_permalink()); ?>" class="log-in">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.png" alt="">  
                                        Вход/Регистрация
                                    </a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo get_permalink( wc_get_page_id( 'checkout' ) ); ?>" class="befor-footer-checkout">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/g.png" alt="">
                        Оформление
                    </a>
                </div>
            </div>
<script src="<?php echo get_template_directory_uri() . '/assets/js/wm_catr_page.js' ?>"></script>
<?php get_footer(); ?>