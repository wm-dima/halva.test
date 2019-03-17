<?php
/*
Template Name: Поставщикам
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
                        <?php get_template_part('templates/feedback', 'form'); ?>
                    </div>
                    <div class="help-answer opt-text">
                        <p class="question-name">Поставщикам</p>
                        <p>Если Вас интересует сотрудничество с нами, напишите на электронную почту: <br>
                       <span class="bld"> E-mail: auto-azart-zakaz@mail.ru</span></p>
                    </div>
                </div>
            </div>
        </div>  
<?php get_footer(); ?>
