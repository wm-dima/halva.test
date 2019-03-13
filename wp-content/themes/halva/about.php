<?php
/*
Template Name: О нас
*/
?>
<?php get_header(); ?>
            <div class="wrapper">
                <?php get_template_part('templates/search', 'catalog'); ?>
            </div>
        <div class="questions">
            <div class="wrapper">
                <div class="inside-questions">
                    <div class="pre-questions">
                        <h4 class="help-name-question">Популярные вопросы</h4>
                    </div>
                </div>
                <div class="help-main">
                    <div class="help-side">
                        <div class="help-nav-1 help-nav">
                            <ul>
                                <li>Автоазарт</li>
                                <li><a href="" class="help-active">О компании</a></li>
                                <li><a href="">Контакты</a></li>
                                <li><a href="">Новости</a></li>
                                <li><a href="">Статьи</a></li>
                            </ul>
                        </div>
                        <div class="help-nav-2 help-nav">
                            <ul>
                                <li>ОПТ И ЗАКУПКА </li>
                                <li><a href="">Поставщикам</a></li>
                                <li><a href="">Оптовым покупателям</a></li>
                                <li><a href="">Реквизиты компании</a></li>
                            </ul>
                        </div>
                        <div class="help-nav-3 help-nav">
                            <ul>
                                <li>ИНТЕРНЕТ-МАГАЗИН </li>
                                <li><a href="">Оплата</a></li>
                                <li><a href="">Доставка</a></li>
                                <li><a href="">Гарантия</a></li>
                                <li><a href="">Договор оферты</a></li>
                            </ul>
                        </div>
                        <div class="help-nav-4 help-nav">
                            <ul>
                                <li>ПОМОЩЬ</li>
                                <li><a href="">Популярные вопросы</a></li>
                                <li><a href="">Обратная связь</a></li>
                                <li><a href="">Отзывы</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="help-answer">
                        <p class="question-name">О компании</p>
                        <p class="about-company">
                            <?php 
                                echo $post->post_content
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>   
<?php get_footer(); ?>

