<div class="reviews">
    <h4>Отзывы</h4>
<?php
    global $post;
    $args = array(
        'number' => 10,
        'orderby' => 'comment_date',
        'order' => 'DESC',
        'post_id' => $post->ID,
        'status' => 'approve'
    );
    $comments = get_comments( $args );
    if( count($comments) ){
        foreach( $comments as $comment ) : ?>
           <div class="comment">
               <p class="name-commentator"><?php echo $comment->comment_author ?></p>
               <div class="comment-text">
                   <p class="comment-p"><?php echo $comment->comment_content ?></p>
               </div>
           </div>
        <?php
        endforeach;
    } else { 
    ?>
        <p class="no-one-review">
            У этого товара пока нет отзывов. Поделитесь своим мнением об этом товаре, и многие будут вам благодарны.
        </p>
    <?php 
    }
?>
    <?php  
    // var_dump( $post->post_type);
    // die;
     get_template_part('templates/feedback', 'form');
    ?>
    </div>
