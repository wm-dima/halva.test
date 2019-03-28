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
        echo "<div id='comments-wrap'>";
        foreach( $comments as $comment ) : ?>
           <div class="comment">
               <p class="name-commentator"><?php echo $comment->comment_author ?></p>
               <div class="comment-text">
                   <p class="comment-p"><?php echo $comment->comment_content ?></p>
               </div>
           </div>
        <?php
        endforeach;
        echo "</div>";
        echo "<div class=\"load-more\"><p data-load-more='10'>Загрузить еще...</p></div>";
    } else { 
    ?>
        <p class="no-one-review">
            У этого товара пока нет отзывов. Поделитесь своим мнением об этом товаре, и многие будут вам благодарны.
        </p>
    <?php 
    }
?>
    <?php  
    get_template_part('templates/feedback', 'form');
    ?>
    </div>
<script>
document.querySelector('[data-load-more]').addEventListener('click', function(e){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>?action=get_more_comments', true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send('offset=' + this.getAttribute('data-load-more'));
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4) {
            if (xhttp.status == 200) {
                obj = JSON.parse(xhttp.response );
                if(obj.success){
                    document.querySelector('#comments-wrap').innerHTML = document.querySelector('#comments-wrap').innerHTML + obj.res;
                    document.querySelector('[data-load-more]').setAttribute(
                        'data-load-more', 
                        document.querySelector('[data-load-more]').getAttribute('data-load-more') * 1 + 10
                    );
                    if (obj.count < 10) {
                        document.querySelector('[data-load-more]').classList.add('wm-hid');
                    }
                } else {
                    wm_ajax_err();
                }
            } else {
                wm_ajax_err();
            }
        }
    }
})
</script>