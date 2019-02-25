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
    <p class="get-review" id="show-comment-form">Оставить отзыв</p>
    <?php  
        $defaults = array(
            'fields' =>
                array(
                'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>',
                'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                            '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
                ),
            'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea></p>',
            'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
            'logged_in_as'         => '',
            'comment_notes_after'  => '',
            'id_form'              => 'commentform',
            'id_submit'            => 'submit',
            'class_form'           => 'comment-form',
            'class_submit'         => 'submit',
            'name_submit'          => 'submit',
            'title_reply'          => '',
            'title_reply_to'       => '',
            'title_reply_before'   => '',
            'title_reply_after'    => '</h3>',
            'cancel_reply_before'  => ' <small>',
            'cancel_reply_after'   => '</small>',
            'cancel_reply_link'    => __( 'Cancel reply' ),
            'label_submit'         => 'Оставить отзыв',
            'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="get-review wm-btn-comment" value="%4$s" />',
            'submit_field'         => '%1$s %2$s',
            'format'               => 'xhtml',
            'comment_notes_before' => '',
            'class_form'           => 'wm-hid before-appearance'
        );
        comment_form( $defaults );
    ?>
    </div>
<script>
var btn_show_form = document.querySelector('#show-comment-form') 
btn_show_form.addEventListener('click', function (e){
    let form = e.target.closest('.reviews').querySelector('form');
    form.classList.remove('wm-hid');
    e.target.classList.add('wm-hid');
})
</script>