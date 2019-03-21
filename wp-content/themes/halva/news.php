<?php
/*
Template Name: Новости
*/
?>
<?php get_header(); ?>
            <div class="wrapper">
                <?php get_template_part('templates/search', 'catalog'); ?>
            </div>
        <div class="wrapper">
                <div class="want"> 
                    <div class="item-navigation">
                        <ul>
                            <li>Новости</li>
                        </ul>
                    </div>
                </div>
            </div>   
            <div class="news">
                <div class="wrapper">
                    <div class="inside-news">

    <?php
        global $wp_query, $paged;
        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
        $args = array(
            'paged' => $paged,
            'posts_per_page' => 15,
            'post_type' => 'post'
        );
        $posts = new WP_Query( $args );
    ?>
    <?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>

        <div class="news-block news-block-1">
            <div class="news-image">
                <div class="item-logo">
                    <div class="img-padding">
                    <img 
                        src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : wm_get_main_img(-1); ?>"
                        alt="">
                    </div>
                </div>
            </div>
            <div class="news-info">
                <p class="article-new-name">
                    <?php the_title(); ?>
                </p>
                <p class="article-pre-info">
                    <?php echo get_the_excerpt(); ?>
                </p>
                <a href="<?php echo get_permalink(); ?>" class="read-more">Читать...</a>
            </div>
        </div>

    <?php endwhile; ?> 
    <div class="catalog-navigation">
    <?php
        $args = array(
            'base'         => '%_%',
            'format'       => '?page=%#%',
            'total'        => $posts->max_num_pages,
            'current'      => $paged,
            'end_size'     => 1,
            'mid_size'     => 2,
            'prev_text'    => __(' « '),
            'next_text'    => __(' » ')
        ); 

        echo paginate_links( $args );?>
    </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>



                        
                    </div>
                </div>
            </div>    
<?php get_footer(); ?>
