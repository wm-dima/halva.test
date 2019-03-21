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
                                <!-- <div class="price-basket">
                                    <p class="sum-price-p">Стоимость товаров</p>
                                    <p class="final-price"><?php wc_cart_totals_subtotal_html(); ?> р.</p>
                                </div> -->

                        </div>
                        <div class="basket-right">
                            <div class="price-basket">
                                <p class="sum-price-p">Стоимость товаров</p>
                                <p class="final-price"><?php wc_cart_totals_subtotal_html(); ?> р.</p>
                            </div>
                            <div class="delivery-method">
                                <?php if (is_user_logged_in()) : ?>
                                    <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="log-in">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.png" alt="">  
                                        Выход
                                    </a>
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
                </div>
            </div>
<script src="<?php echo get_template_directory_uri() . '/assets/js/wm_catr_page.js' ?>"></script>
<?php get_footer(); ?>