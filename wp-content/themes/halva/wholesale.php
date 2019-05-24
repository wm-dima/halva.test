<?php
/*
Template Name: Оптовым покупателям
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
                        <h4 class="help-name-question">Обратная связь</h4>
                    </div>
                </div>
                <div class="help-main">
                    <div class="help-side">
                        <?php get_template_part('templates/nav', 'side'); ?>
                    </div>
                    <div class="help-answer opt-ans">
                        <p class="question-name">Оптовым покупателям</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/opt.jpg" alt="" class="opt-img">
                        <a href="" class="get-price-list">Получить прайс</a>
                        <div class="opt-text">
                            <p>Став нашим партнером, Вы получаете следующие преимущества: <br>
                                Оптовые цены с первого заказа. Возможность работы «Под клиента», что позволяет не содержать   собственный товарный запас.</p>
                            <p>Вся продукция сертифицирована.</p>
                            <p>Отдел доставки компании отправит груз, в любой город, любой удобной для Вас транспортной компанией     в кратчайшие сроки.</p>
                            <p>Отдел рекламаций осуществляет гарантийную поддержку товара в кратчайшие сроки.</p>
                            <p>Гибкая система скидок и оплат, специальные предложения, отсрочки платежа.</p>
                            <p>Наша задача — долговременное и взаимовыгодное сотрудничество.
                                Для получения прайса и дополнительной информации, Вы можете обратиться к нашему менеджеру по телефону или электронной почте:</p>
                            <p>E-mail: autoazart.sd@gmail.com <br>
                                Тел.: 8-967-612-12-53</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<?php get_footer(); ?>
