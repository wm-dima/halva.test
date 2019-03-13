<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" id="commentform" method="post" class="feedback-form">
    <div class="form-left">
        <input type="text" name="author" class="name" autocomplete="off" placeholder="ФИО">
        <input type="text" name="phone" class="phone" autocomplete="off" placeholder="Телефон">
        <input type="text" name="email" class="mail" autocomplete="off" placeholder="E-mail" required>
        <input type="submit" value="Отправить">
    </div>
    <div class="form-right">
        <textarea name="comment" placeholder="Ваше сообщение" required></textarea>
    </div>
    <?php
        comment_id_fields();
        do_action('comment_form', $post->ID); 
    ?>
</form>
 