<?php if( is_user_logged_in() ): ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" id="commentform" method="post" class="feedback-form wm-form-log-in">


    <div class="form-right" >
        <textarea name="comment" placeholder="Ваше сообщение" required></textarea>
    </div>
    <div class="form-left">
        <div class="comment-form-rating">
            <label for="the-rating">Ваша оценка</label>
            <select name="rating" id="the-rating" required="">
                <option value="">Оценка…</option>
                <option value="5">Отлично</option>
                <option value="4">Хорошо</option>
                <option value="3">Средне</option>
                <option value="2">Неплохо</option>
                <option value="1">Очень плохо</option>
            </select>
        </div>
        <input type="text" name="phone" class="phone" autocomplete="off" placeholder="Телефон">
        <input type="submit" value="Отправить">
    </div>
    <?php
        comment_id_fields();
        do_action('comment_form', $post->ID); 
    ?>
</form>

<?php else: ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" id="commentform" method="post" class="feedback-form">
    <div class="fields">
        <div class="form-left">
            <div class="comment-form-rating">
                <label for="the-rating">Ваша оценка</label>
                <select name="rating" id="the-rating" required="">
                    <option value="">Оценка…</option>
                    <option value="5">Отлично</option>
                    <option value="4">Хорошо</option>
                    <option value="3">Средне</option>
                    <option value="2">Неплохо</option>
                    <option value="1">Очень плохо</option>
                </select>
            </div>
            <input type="text" name="author" class="name" autocomplete="off" placeholder="ФИО" required>
            <input type="text" name="phone" class="phone" autocomplete="off" placeholder="Телефон">
            <input type="text" name="email" class="mail" autocomplete="off" placeholder="E-mail" required>
        </div>
        <div class="form-right">
            <textarea name="comment" placeholder="Ваше сообщение" required></textarea>
        </div>
    </div>
    <div class="submit-wrap">
        <input type="submit" value="Отправить">
    </div>
    <?php
        comment_id_fields();
        do_action('comment_form', $post->ID); 
    ?>
</form>

<?php endif; ?>

