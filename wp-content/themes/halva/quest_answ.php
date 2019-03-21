<?php
/*
Template Name: Чаво
*/
?>
<?php get_header(); ?>
    <div class="questions">
        <div class="wrapper">
            <div class="inside-questions">
                <div class="pre-questions">
                    <h4 class="help-name-question"><?php the_title(); ?></h4>
                </div>
            </div>
            <div class="help-main">
                <div class="help-side">
                    <?php get_template_part('templates/nav', 'side'); ?>
                </div>
                <div class="help-answer">
                    <p class="question-name"><?php the_title(); ?></p>
                    <p class="about-company">
                        <?php 
                            $question_answer = get_field('question_answer', 181);
                            if ($question_answer && is_array($question_answer)) {
                                foreach ($question_answer as $key => $value) : ?>
                                    <span>Вопрос: <p><?php echo $value['question']; ?></p></span>
                                    <span>Ответ: <p><?php echo $value['answer']; ?></p></span>
                                <?php endforeach;
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>   
<?php get_footer(); ?>