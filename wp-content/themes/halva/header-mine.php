<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>  
</head>
<body id="catalog-body">
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
                                <li><a href="">8-800-700-73-63</a></li>
                                <li><a href="">8-800-700-73-63</a></li>
                                <li><a href="">Skype</a></li>
                            </ul>
                        </div>
                        <div class="soc-m">
                            <ul>
                                <li><a href="">youtube</a></li>
                                <li><a href="">Вконтакте</a></li>
                                <li><a href="">instagram</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-black"></div>
            <div class="logo-head"></div>
            <div class="skype">
                <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/images/skype.png" alt=""></a>
            </div>
        </div>
    </header>
<?php 
    global $woocommerce;
?>
    <div class="banner">
        <div class="menu-wrapper">
            <div class="second-menu">
            <a href="<?php echo get_home_url(); ?>">
                <div class="logo"></div>
            </a>
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
                    <a href="<?php echo get_permalink( 94 ); ?>">
                        <div class="accept">
                            <div class="shop-icon">
                                <div class="number"><?php echo do_shortcode( '[wcp_get_total]' ) ?></div>
                            </div>
                            <p>Сравнение</p>
                        </div>
                    </a>
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
        <div class="slide-wrapper">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-1.png" alt="" class="img1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-2.png" alt="" class="img2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide.png" alt="" class="img3" > 
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-1.png" alt="" class="img1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-2.png" alt="" class="img2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide.png" alt="" class="img3" > 
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-1.png" alt="" class="img1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-2.png" alt="" class="img2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide.png" alt="" class="img3" > 
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-1.png" alt="" class="img1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-2.png" alt="" class="img2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide.png" alt="" class="img3" > 
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-1.png" alt="" class="img1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-2.png" alt="" class="img2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide.png" alt="" class="img3" > 
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-1.png" alt="" class="img1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-2.png" alt="" class="img2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide.png" alt="" class="img3" > 
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-1.png" alt="" class="img1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide-2.png" alt="" class="img2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide.png" alt="" class="img3" > 
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <!-- <script src="js/swiper.min.js"></script> -->

            <script>
                var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                });
            </script>       
        </div>
    </div>