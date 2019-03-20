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

                            <div class="basket-info">
                                <p>Для того чтобы процесс оформления покупки был ещё проще, <br>
                                    вы можете «Войти под Вашей учетной записью» или «Зарегистрироваться»</p>
                                <a href="" class="log-in">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.png" alt="">    
                                    Вход / Регистрация
                                </a>
                            </div>
                        </div>
                        <div class="basket-right">
                            <div class="price-basket">
                                <p class="sum-price-p">Стоимость товаров</p>
                                <p class="final-price"><?php wc_cart_totals_subtotal_html(); ?> р.</p>
                            </div>
                            <div class="delivery-method">
                                <p class="dm-p">Способ доставки</p>
                                <p class="d-method-main">Не выбран</p>
                                <?php echo wm_get_shipping_methods(); ?>
                            </div>
                            <div class="pay-method">
                                <p class="dm-p">Способ оплаты</p>
                                <p class="p-method-main">Не выбран</p>
                            </div>
                            <div class="basket-next">
                                <ul>
                                    <li>Для продолжения введите <br> номер телефона:</li>
                                    <li>
                                        <form action="">
                                            <input type="text" placeholder="+7">
                                            <button>Далее</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script src="<?php echo get_template_directory_uri() . '/assets/js/wm_catr_page.js' ?>"></script>
<?php get_footer(); ?>