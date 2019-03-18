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
                    <div class="item-logo">
                        <div class="img-padding">
                        <img 
                            src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : wm_get_main_img(-1); ?>"
                            alt=""
                            style="width: 70%;"
                            >
                        </div>
                    </div>
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