<?php
/*
Template Name: Обратная связь
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
                    <div class="help-answer">
                        <p class="question-name">Обратная связь</p>
                        <p class="about-company">
                            <?php 
                                echo $post->post_content
                            ?>
                        </p>
                        <?php get_template_part('templates/feedback', 'form'); ?>
                    </div>
                </div>
            </div>
        </div>       
<?php get_footer(); ?>
