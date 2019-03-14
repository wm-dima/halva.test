<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>  
</head>
<body id="catalog-body">
<?php global $woocommerce; ?>
    <header>
        <div class="inside-header">
            <div class="menu" onclick="$('.menu-mob').toggleClass('menu-mob-show');$('body').css('overflow','hidden');;$('.body-black').toggleClass('bodyBlackShow')">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/menu.png" alt="">
                <a href="#">Меню</a>
            </div>
            <div class="header-wrap">
                <div class="header-wrap-left">
                    <div class="location">
                        <ul>
                            <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/map.png" alt=""></li>
                            <li>Москва</li>
                        </ul>
                    </div>
                    <a href="">
                        <div class="log-in">
                            <ul>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.png" alt=""></li>
                                <li>Вход/Регистрация</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="header-wrap-right">
                    <a href="">
                        <div class="payment">
                            <ul>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/question.png" alt=""></li>
                                <li>Оплата и доставка</li>
                            </ul>
                        </div>
                    </a>
                    <a href="">
                        <div class="help">
                            <ul>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/help.png" alt=""></li>
                                <li>Помощь</li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
            <div class="menu-mob">
                <div class="close" onclick="$('.menu-mob').toggleClass('menu-mob-show');$('body').css('overflow','scroll');$('.body-black').toggleClass('bodyBlackShow')"></div>
                <div class="mobi-wrapper">
                    <div class="mobile-navigation">
                        <div class="online-shop">
                            <a href="">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/online-mob.png" alt="">
                                интернет магазин
                            </a>
                        </div>
                        <div class="loc-and-log">
                            <ul>
                                <li><a href="">Москва</a></li>
                                <li><a href="">Вход/регистрация</a></li>
                            </ul>
                        </div>
                        <div class="nav-m">
                            <ul>
                                <li><a href="">Akula</a></li>
                                <li><a href="">Покупателям</a></li>
                                <li><a href="">Партнерам</a></li>
                                <li><a href="">Помощь</a></li>
                            </ul>
                        </div>
                        <div class="phones-m">
                            <ul>
                                <li>
                                    <a href="tel:+<?php echo get_call_phone(get_theme_mod( 'phone_1' )); ?>">
                                        <?php echo get_theme_mod( 'phone_1' ); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:+<?php echo get_call_phone(get_theme_mod( 'phone_2' )); ?>">
                                        <?php echo get_theme_mod( 'phone_2' ); ?>
                                    </a>
                                </li>
                                <li><a href="skype:<?php echo get_theme_mod( 'skype' ); ?>">Skype</a></li>
                            </ul>
                        </div>
                        <div class="soc-m">
                            <ul>
                                <li><a href="<?php echo get_theme_mod( 'youtube' ); ?>">youtube</a></li>
                                <li><a href="<?php echo get_theme_mod( 'vk' ); ?>">Вконтакте</a></li>
                                <li><a href="<?php echo get_theme_mod( 'instagram' ); ?>">instagram</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-black"></div>
                <div class="logo-head"></div>
            <div class="skype">
                <a href="skype:<?php echo get_theme_mod( 'skype' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/skype.png" alt=""></a>
            </div>
        </div>
    </header>
    <div class="menu-wrapper">

        <div class="second-menu" id="sc-menu-ct">
            <a href="<?php echo get_home_url(); ?>">
                <div class="logo"></div>
            </a>
            <div class="phones">
                <ul>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png" alt="">
                        <span class="phone-number">
                            <a href="tel:+<?php echo get_call_phone(get_theme_mod( 'phone_1' )); ?>">
                                <?php echo get_theme_mod( 'phone_1' ); ?>
                            </a>
                        </span>
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png" alt="">
                        <span class="phone-number">
                            <a href="tel:+<?php echo get_call_phone(get_theme_mod( 'phone_2' )); ?>">
                                <?php echo get_theme_mod( 'phone_2' ); ?>
                            </a>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="call-back">
                <ul>
                    <li><?php echo get_theme_mod( 'work_time' ); ?></li>
                    <li>
                        <a href="">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/callback.png" alt=""> Обратный звонок
                        </a>
                    </li>
                </ul>
            </div>
            <div class="shop-icons">
                <div class="accept">
                    <div class="shop-icon">
                        <div class="number"><?php echo do_shortcode( '[wcp_get_total]' ) ?></div>
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
                    <a href="<?php echo get_permalink( 6 ); ?>">
                        <div class="shop-icon">
                            <div class="number"><?php echo $woocommerce->cart->cart_contents_count; ?></div>
                        </div>
                    </a>
                    <a href="<?php echo get_permalink( 6 ); ?>">
                        <p>Корзина</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
