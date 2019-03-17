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
                        <?php get_template_part('templates/nav', 'side'); ?>
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

