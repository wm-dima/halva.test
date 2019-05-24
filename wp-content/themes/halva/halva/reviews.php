<?php
/*
Template Name: Отзывы
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
                        <h4 class="help-name-question">Отзывы</h4>
                    </div>
                </div>
                <div class="help-main">
                    <div class="help-side">
                        <?php get_template_part('templates/nav', 'side'); ?>
                    </div>
                    <div class="help-answer">
                        <p class="question-name">Отзывы</p>
                        <p class="about-company">
                            <?php 
                                echo $post->post_content
                            ?>
                        </p>
                        <?php get_template_part('templates/feedback', 'form'); ?>
<?php 

$args = array(
    'fields'              => '',
    'number'              => '',
    'offset'              => '',
    'no_found_rows'       => true,
    'orderby'             => '',
    'order'               => 'DESC',
    'parent'              => '',
    'post_author__in'     => '',
    'post_author__not_in' => '',
    'post_id'             => 0,
    'post__in'            => '',
    'post__not_in'        => '',
    'post_author'         => '',
    'post_name'           => '',
    'post_parent'         => '',
    'post_status'         => '',
    'post_type'           => '',
    'status'              => 'approve',
    'type'                => '',
    'type__in'            => '',
    'type__not_in'        => '',
    'user_id'             => '',
    'search'              => '',
    'count'               => false,
    'meta_key'            => '',
    'meta_value'          => '',
    'meta_query'          => '',
    'date_query'          => null, // See WP_Date_Query
    'hierarchical'        => false,
    'update_comment_meta_cache'  => true,
    'update_comment_post_cache'  => false,
);
if ($comments = get_comments( $args )) {
    foreach($comments as $comment): ?>
<?php 

$rating = round( get_post_meta( $comment->comment_post_ID, '_wc_average_rating_post', true ) );
if ( !$rating ) {
    $rating = get_comment_meta( $comment->comment_ID, 'rating', true );
}
?>
        <div class="review">
            <div class="review-info">
                <p class="name-reviewer"><?php echo $comment->comment_author; ?></p>
                <p class="date-city-review">
                    <span class="date-review"> <?php echo get_the_date( 'd F',  $comment->comment_post_ID ); ?></span> , 
                    <span class="city-review"><?php echo get_comment_owner_city($comment->user_id); ?></span>
                </p>
            </div>
            <?php if ($rating): ?>
                <div class="mark mark-<?php echo $rating; ?>"></div>
            <?php endif ?>
            <div class="review-text">
                <p><?php echo $comment->comment_content; ?></p>
            </div>
        </div>


   <?php endforeach;
}

?>
                    </div>
                </div>
            </div>
        </div>       
<?php get_footer(); ?>
