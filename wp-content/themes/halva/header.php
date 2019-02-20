<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!--   <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/museo.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/media.css"> -->
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script> -->
    <?php wp_head(); ?>  
    <title>Akula каталог</title>
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