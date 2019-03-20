<div class="basket-navigation">
    <div class="wrapper">
        <div class="inside-basket-nav">
            <ul>
                <li>
                    <a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/basket.png" alt="">
                        Корзина
                    </a>
                </li>
          <!--       <li>
                    <a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/truck.png" alt="">
                        Доставка
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wallet.png" alt="">
                        Оплата
                    </a>
                </li> -->
                <li>
                    <a href="<?php echo get_permalink( wc_get_page_id( 'checkout' ) ); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/g.png" alt="">
                        Оформление
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