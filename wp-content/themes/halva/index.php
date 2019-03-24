<?php 
/*
Template Name: index
*/
?>
<?php get_header( 'mine' ); ?>
    <div class="popupBg" onclick="$('.popupBg').toggleClass('popupBgShow');"></div>
    <div class="new-and-hits">
        <div class="wrapper">
            <?php get_template_part('templates/search', 'catalog'); ?>
        </div>    
        <div class="wrapper">
            <div class="main-hits">
                <div class="new">
                    <div class="hit-name">Новинки</div>
                    <div class="hit-items">
                        <?php
                        $args = array(
                            'post_type' => 'product',
                            'stock' => 1,
                            'posts_per_page' => 2,
                            'orderby' =>'date',
                            'order' => 'DESC' 
                        );
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                            <div class="hit-item hi-1" data-wm-prod-id="<?php the_ID(); ?>">
                                <div class="item-info">
                                    <a href="<?php echo get_permalink( $loop->post->ID );?>">
                                        <div class="item-logo">
                                            <div class="img-padding">
                                                <img src="<?php echo wm_get_main_img( $loop->post->ID ); ?>" alt="">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="<?php echo get_permalink( $loop->post->ID );?>">
                                        <p class="item-name"><?php the_title(); ?></p>
                                    </a>
                                    <div class="item-price"><span class="price-value"><?php echo $product->get_price_html(); ?></span> руб.</div>
                                        <div class="item-icons wm-for-balance">
                                            <div 
                                                class="item-like" 
                                                data-wm-wwl="<?php echo do_shortcode( '[is_in_wish_list]' ) == 1 ? 'remove' : 'add'; ?>"
                                                data-item-id="<?php the_ID(); ?>"
                                                data-event-after="wish_event_simple"
                                            >
                                            </div>
                                            <div 
                                                class="item-balance" 
                                                data-wm-wcp="<?php echo do_shortcode( '[is_in_compare_list]' ) == 1 ? 'remove' : 'add'; ?>"
                                                data-item-id="<?php the_ID(); ?>"
                                                data-event-after="compare_event_simple"
                                                >
                                            </div>
                                        </div>
                                        <div></div>
                                </div>    

                               <div class="in-basket">
                                <?php if ($product->stock_status != 'outofstock'): ?>
                                    <a 
                                        href="/shop/?add-to-cart=<?php echo the_id(); ?>" 
                                        data-quantity="1" 
                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart" 
                                        data-product_id="<?php echo the_id(); ?>" 
                                        data-product_sku="" 
                                        rel="nofollow"
                                    >
                                        <button>В корзину</button>
                                    </a>
                                <?php else: ?>
                                    <div class="out-of-stock"><button>Нет в наличие</button></div>
                                <?php endif ?>
                                </div>
                            </div>

                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>

                    </div>
                </div>
                <div class="hits">
                    <div class="hit-name">Хиты продаж</div>
                    <div class="hit-items">

                    <?php
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => 2,
                            'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_visibility',
                                        'field'    => 'name',
                                        'terms'    => 'featured',
                                    ),
                                ),
                            'orderby'     =>  'post_modified',
                            'order'       =>  'DESC',
                            );
                        $loop = new WP_Query( $args );
                        if ( $loop->have_posts() ) :
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <div class="hit-item hi-1" data-wm-prod-id="<?php the_ID(); ?>">
                                <div class="item-info">
                                    <a href="<?php echo get_permalink( $loop->post->ID );?>">
                                        <div class="item-logo">
                                            <div class="img-padding">
                                                <img src="<?php echo wm_get_main_img( $loop->post->ID ); ?>" alt="" />
                                            </div>
                                        </div>
                                    </a>
                                    <a href="<?php echo get_permalink( $loop->post->ID );?>">
                                        <p class="item-name"><?php the_title(); ?></p>
                                    </a>
                                    <div class="item-price"><span class="price-value"><?php echo $product->get_price_html(); ?></span> руб.</div>
                                                <div class="item-icons wm-for-balance ">
                                                    <div 
                                                        class="item-like" 
                                                        data-wm-wwl="<?php echo do_shortcode( '[is_in_wish_list]' ) == 1 ? 'remove' : 'add'; ?>"
                                                        data-item-id="<?php the_ID(); ?>"
                                                        data-event-after="wish_event_simple"
                                                    >
                                                    </div>
                                                    <div 
                                                        class="item-balance" 
                                                        data-wm-wcp="<?php echo do_shortcode( '[is_in_compare_list]' ) == 1 ? 'remove' : 'add'; ?>"
                                                        data-item-id="<?php the_ID(); ?>"
                                                        data-event-after="compare_event_simple"
                                                        >
                                                    </div>
                                                </div>
                                </div>    
                                <div class="in-basket">
                                <?php if ($product->stock_status != 'outofstock'): ?>
                                    <a 
                                        href="/shop/?add-to-cart=<?php echo the_id(); ?>" 
                                        data-quantity="1" 
                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart" 
                                        data-product_id="<?php echo the_id(); ?>" 
                                        data-product_sku="" 
                                        rel="nofollow"
                                    >
                                        <button>В корзину</button>
                                    </a>
                                <?php else: ?>
                                    <div class="out-of-stock"><button>Нет в наличие</button></div>
                                <?php endif ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="line" id="line1"></div>
    <div class="item-columns">
        <div class="wrapper">
            <div class="inside-item-columns">
                <?php 
                    $args = array(
                         'taxonomy'     => 'product_cat',
                         'orderby'      => 'term_id',
                         'number'       => 8,
                         'parent' => 0,
                    );
                    $all_categories = get_categories( $args );
                    $count = 0;
                    foreach ($all_categories as $cat) : 
                        $category_id = $cat->term_id; 
                        $count++; 
                        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
                        $image = wp_get_attachment_url( $thumbnail_id );
                        $link = get_term_link( $cat->term_id, 'product_cat' );
                    ?>
                        <?php if ($count == 1 ): ?>
                            <div class="column">
                        <?php elseif ($count == 5): ?>
                            <div class="column col2">     
                        <?php endif ?>

                        <a href="<?php echo $link; ?>">
                            <div class="item-column">
                                <div class="item-about">
                                    <p class="category"><?php echo $cat->name; ?></p>
                                    <p class="description-item">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/more.png" alt="">
                                    </p>
                                </div>
                                <p class="description-item">
                                    <span class="the-desc"><?php echo $cat->category_description; ?></span>
                                </p>
                                <div class="column-more">
                                    <div class="show-all">Все товары...</div>
                                    <img src="<?php echo $image; ?>" alt="">
                                </div>
                            </div>
                        </a>

                        <?php if ($count == 4 || $count == 9 ): ?>
                            </div> 
                        <?php endif ?>
                    <?php endforeach; ?>
                </div>

                <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="all-categories">Все категории</a>
            </div>
            
        </div>
    </div>
    <div class="line" id="line2"></div>
    <div class="articles">
        <div class="wrapper">
            <div class="inside-articles">
                <p>Статьи</p>
                <div class="articles-block">
                    <?php 
                        $args = array(
                            'numberposts' => 2,
                            'offset' => 0,
                            'category' => 0,
                            'orderby' => 'post_date',
                            'order' => 'DESC',
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'suppress_filters' => true 
                        );

                        $recent_posts = wp_get_recent_posts( $args, ARRAY_A );

                        foreach( $recent_posts as $recent ) :
                    ?>
                        <a href="<?php echo $recent['guid']; ?>">
                            <div class="article">
                                <div class="article-logo">
                                    <img src="<?php echo wm_get_main_img($recent['ID']); ?>" alt="">
                                </div>
                                <div class="article-description">
                                    <p class="article-name"><?php echo $recent['post_title']; ?></p>
                                    <p class="article-min"> <?php echo get_the_excerpt( $recent['ID'] ); ?></p>
                                    <a href="<?php echo $recent['guid']; ?>" class="article-more">Подробнее</a>   
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
    <div class="video">
        <div class="video-wrapper">
            <div class="inside-video">
                <div class="video-first">
                    <div class="logo logoyt"></div>
                    <div class="youtube"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube.png" alt=""></div>
                    <a 
                        href="https://www.youtube.com/channel/<?php echo get_field('yt_subscribe', 10) ?>?sub_confirmation=1" 
                        class="subscribe"
                    >
                        Подписаться
                    </a>
                  
                </div>
                <div class="slider-video">
                    <div class="swiper-container2">
                        <div class="swiper-wrapper">
                            <?php 
                                $y_slider = get_field('y_slider', 10);
                                if (count($y_slider)): 
                            ?>
                            <?php foreach ($y_slider as $key => $value): ?>
                                <div class="swiper-slide">
                                    <div class="video-slide-wrap">
                                        <iframe id="iframe" src="<?php echo $value['The_video']; ?>" frameborder="0" allow="picture-in-picture" allowfullscreen></iframe>
                                    </div>    
                                </div>
                            <?php endforeach ?>
                            <?php endif ?>


                        </div>
                        <div class="swiper-pagination hide-pag"></div>
                       
                        <div class="swiper-button-next hide-next"></div>
                        <div class="swiper-button-prev hide-prev"></div>
                    </div>
                    <script>
                        var swiper = new Swiper('.swiper-container2', {
                        slidesPerView: 1,
                        spaceBetween: 30,
                        loop: true,
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        });
                    </script>       
                </div>
            </div>
        </div>
    </div>
    <div class="advantages">
        <div class="adv-wrapper">
            <h3>ПРЕИМУЩЕСТВА ПОКУПКИ У НАС</h3>
            <div class="inside-adv">
            <?php  
                $benefits =  get_field('benefits', 10) ;
                foreach ($benefits as $key => $value) : ?>
                    <div class="a-item adv-i-1">
                        <div style="background-image: url('<?php echo $value['img'] ?>');" class="a-picture"></div>
                        <p class="a-p"><?php echo $value['desc'] ?></p>
                    </div>
                <?php
                endforeach;
            ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
