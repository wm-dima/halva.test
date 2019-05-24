<?php get_template_part( 'templates/feedback', 'popup' ); ?>
<footer>
        <div class="wrapper">
            <div class="inside-footer">
                <div class="fb1">
                    <div class="foot-block1">
                        <div class="azart">
                            <ul>
                                <li>Покупателю</li>
                                <li><a href="<?php echo get_permalink( 103 ); ?>">О компании</a></li>
                                <li><a href="<?php echo get_permalink( 160 ); ?>">Контакты</a></li>
                                <li><a href="<?php echo get_permalink( 114 ); ?>">Новости</a></li>
                            </ul>
                        </div>
                        <div class="opt">
                            <ul>
                                <li>Опт и закупка</li>
                                <li><a href="<?php echo get_permalink( 120 ); ?>">Поставщикам </a></li>
                                <li><a href="<?php echo get_permalink( 116 ); ?>">Оптовым покупателям </a></li>
                                <li><a href="<?php echo get_permalink( 166 ); ?>">Реквизиты компании</a></li>
                            </ul>
                        </div>
                    </div>
                <div class="foot-block2">
                    <div class="social-and-phone">
                        <div class="socials-footer">
                            <div><p>Мы в соц сетях</p></div> 
                            <div class="footer-line"></div>
                            <div class="socials-f">
                                <ul>
                                    <li>
                                        <a href="<?php echo get_theme_mod( 'youtube' ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo get_theme_mod( 'instagram' ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo get_theme_mod( 'vk' ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/vk.png" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="phones-footer">
                            <div class="phones-ul">
                                <ul>
                                    <li>
                                        <a href="tel:+<?php echo get_call_phone( get_theme_mod( 'phone_1') ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png" alt="">
                                            <?php echo get_theme_mod( 'phone_1'); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tel:+<?php echo get_call_phone( get_theme_mod( 'phone_2') ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png" alt="">
                                            <?php echo get_theme_mod( 'phone_2'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="callback-footer">
                                <p><?php echo get_theme_mod( 'work_time' ); ?></p>
                                <a href="javascript:void(0);" onclick="showFeedbackPopup()">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/callback.png" alt="">
                                    Обратный звонок
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="fb2">
                    <div class="foot-block3">  
                        <div class="online-shop os">
                            <ul>
                                <li>Интернет магазин</li>
                                <li><a href="<?php echo get_permalink( 118 ); ?>">Оплата</a></li>
                                <li><a href="<?php echo get_permalink( 175 ); ?>">Доставка</a></li>
                                <li><a href="<?php echo get_permalink( 177 ); ?>">Гарантия</a></li>
                                <li><a href="<?php echo get_permalink( 171 ); ?>">Договор оферты</a></li>
                            </ul>
                        </div>
                        <div class="online-shop">
                            <ul>
                                <li>Помощь</li>
                                <li><a href="<?php echo get_permalink( 181 ); ?>">Популярные вопросы</a></li>
                                <li><a href="<?php echo get_permalink( 111 ); ?>">Обратная связь</a></li>
                                <li><a href="<?php echo get_permalink( 183 ); ?>">Отзывы</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="foot-block5 hide-foot">
                        <div class="social-and-phone">
                        <div class="socials-footer">
                            <div><p>Мы в соц сетях</p></div> 
                            <div class="footer-line"></div>
                            <div class="socials-f">
                                <ul>
                                    <li>
                                        <a href="<?php echo get_theme_mod( 'facebook' ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo get_theme_mod( 'instagram' ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo get_theme_mod( 'vk' ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/vk.png" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="phones-footer">
                            <div class="phones-ul">
                                <ul>
                                    <li>
                                        <a href="tel:+<?php echo get_call_phone( get_theme_mod( 'phone_1') ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png" alt="">
                                            <?php echo get_theme_mod( 'phone_1'); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tel:+<?php echo get_call_phone( get_theme_mod( 'phone_2') ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png" alt="">
                                            <?php echo get_theme_mod( 'phone_2'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="callback-footer">
                                <p><?php echo get_theme_mod( 'work_time' ); ?></p>
                                <a href="javascript:void(0);" onclick="showFeedbackPopup()">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/callback.png" alt="">
                                    Обратный звонок
                                </a>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="foot-block4">  
                        <div class="fb4-line"></div>
                        <div class="fb4-text">
                            <p>Cайт разработан командой Web Marketing</p>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>