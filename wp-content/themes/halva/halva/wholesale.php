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
                        <a download href="<?php echo get_field('price_list', 116); ?>" class="get-price-list">Получить прайс</a>
                        <div class="opt-text">
                        <?php 
                        global $post;
                        $content = apply_filters('the_content', $post->post_content);
                        $content = str_replace(']]>', ']]>', $content);
                        echo $content;
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<?php get_footer(); ?>
