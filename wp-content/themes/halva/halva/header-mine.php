<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>  
</head>
<body class="page-id-<?php echo get_the_ID(); ?>" id="catalog-body">
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
                            <li><?php echo get_user_city(); ?></li>
                        </ul>
                    </div>
                    <a href="">
                        <div class="log-in">
                            <ul>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.png" alt=""></li>
                                <li>
                                    <?php get_log_in_log_link();?>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="header-wrap-right">
                    <a href="<?php echo get_permalink( 118 ) ?>">
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
                               <a href="<?php echo get_permalink( 219 ); ?>">
                                    <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/help.png" alt=""></li>
                                </a>
                                <a href="<?php echo get_permalink( 219 ); ?>">
                                    <li>Помощь</li>
                                </a>
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
                                <li><a href="javasjavascript:void(0);"><?php echo get_user_city(); ?></a></li>
                                <li>
                                    <?php get_log_in_log_link();?>
                                </li>
                            </ul>
                        </div>
                        <div class="nav-m">
                            <ul>
                                <li><a href="<?php echo get_home_url(); ?>">Akula</a></li>
                                <li><a href="<?php echo get_permalink( 149 ); ?>">Покупателям</a></li>
                                <li><a href="<?php echo get_permalink( 151 ); ?>">Партнерам</a></li>
                                <li><a href="<?php echo get_permalink( 154 ); ?>">Помощь</a></li>
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
                                <li><a href="watsapp:<?php echo get_theme_mod( 'watsapp' ); ?>">watsapp</a></li>
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
            <div class="skype" title="Whatsapp">
                <a href="<?php echo get_theme_mod( 'watsapp' ); ?>" class="watsapp"></a>
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
                            <a href="javascript:void(0);" onclick="showFeedbackPopup()">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/callback.png" alt="">
                                Обратный звонок
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="shop-icons">
                    <div class="accept">
                        <a href="<?php echo get_permalink( 94 ); ?>">
                            <div class="shop-icon">
                                <div class="number"><?php echo do_shortcode( '[wcp_get_total]' ); ?></div>
                            </div>
                        </a>
                        <a href="<?php echo get_permalink( 94 ); ?>">
                            <p>Сравнение</p>
                        </a>
                    </div>
                    <div class="likes">
                        <a href="<?php echo get_permalink( 16 ); ?>">
                            <div class="shop-icon">
                                <div class="number"><?php echo do_shortcode( '[wwl_get_total]' ); ?></div>
                            </div>
                        </a>
                        <a href="<?php echo get_permalink( 16 ); ?>">
                            <p>Желание</p>
                        </a>    
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
                <?php  
                    $slider =  get_field('slider', 10) ;
                    foreach ($slider as $key => $value) : ?>
                        <div class="swiper-slide">
                            <img src="<?php echo $value['min_width_imgs'][0]['min_img']; ?>" alt="" class="img1">
                            <img src="<?php echo $value['min_width_imgs'][1]['min_img']; ?>" alt="" class="img2" > 
                            <img src="<?php echo $value['slide_img']; ?>" alt="" class="img3">
                        </div>
                    <?php
                    endforeach;
                ?>
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
