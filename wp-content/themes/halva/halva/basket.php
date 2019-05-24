<?php 
/*
*Template Name: wm basket
*/
?>
<?php wp_head(); ?>
 <div class="menu-wrapper">
            
            <div class="second-menu s-m-help" id="sc-manu-av">
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
                            <div class="number">9</div>
                        </div>
                        <p>Сравнение</p>
                    </div>
                    <div class="likes">
                        <div class="shop-icon">
                            <div class="number">99</div>
                        </div>
                        <p>Желание</p>
                    </div>
                    <div class="basket">
                        <div class="shop-icon">
                            <div class="number">999</div>
                        </div>
                        <p>Корзина</p>
                    </div>
                </div>
            </div>
        </div>
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
            <div class="wrapper">
                <div class="want"> 
                    <div class="item-navigation">
                        <ul>
                            <li>Корзина</li>
                        </ul>
                    </div>
                </div>
            </div>   
            <div class="basket-navigation">
                    <div class="wrapper">
                        <div class="inside-basket-nav">
                            <ul>
                                <li>
                                    <a href="" class="active">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/basket.png" alt="">
                                        Корзина
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/truck.png" alt="">
                                        Доставка
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wallet.png" alt="">
                                        Оплата
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/g.png" alt="">
                                        Оформление
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>    
            </div>        
            <div class="basket-main">
                <div class="wrapper">
                    <div class="inside-basket-main">
                        <div class="basket-left">
                            <div class="basket-item">
                                <div class="basket-item-img">
                                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/want-item.jpg" alt="">
                                </div>
                                <div class="basket-item-info">
                                    <p class="want-name">АвтоОдеяло STP №1 цвет черный 128*70см </p>
                                    <p class="articul">Артикул: В0000013463</p>
                                    <p class="price"><span>918</span> р.</p>
                                </div>
                                <div class="quantity-basket">
                                    <div class="minus"></div>
                                    <div class="quantity-main">
                                        <input type="text" value="1" class="quant">
                                    </div>
                                    <div class="plus"></div>
                                </div>
                            </div>
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
                                <p class="final-price"><span>918</span> р.</p>
                            </div>
                            <div class="delivery-method">
                                <p class="dm-p">Способ доставки</p>
                                <p class="d-method-main">Не выбран</p>
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
<?php wp_footer(); ?>