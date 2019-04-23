<div class="basket-navigation">
    <div class="wrapper">
        <div class="inside-basket-nav">
            <ul>
                <li>
                    <a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>" class="active">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/basket.png" alt="">
                        Корзина
                    </a>
                </li>
            </ul>
        </div>
    </div>    
</div>
<script>
    <?php 
        global $wp;
        $current_url = home_url(add_query_arg(array(), $wp->request));
    ?>
    document.querySelector('.inside-basket-nav a[href="<?php echo $current_url; ?>/"]').classList.add('active')
</script>