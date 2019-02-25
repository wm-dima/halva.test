<?php 
/*
Template Name: index
*/
?>
<?php get_header( 'mine' ); ?>

    <div class="new-and-hits">
        <div class="wrapper">
            <div class="search">
                <a class="search-a" onclick="$('.catalog-min').toggleClass('ct-min-show');$('.search-a').toggleClass('actv');">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/catalog.png" alt="">
                    Каталог товаров
                </a>
                <?php get_search_form(); ?>
                <div class="catalog-min">
                    <div class="ct-min-1">
                        <ul>
                            <li><a href="">Автозвук и видео <span class="quantity-catalog">3427</span></a></li>
                            <li><a href="">Автоэлектроника <span class="quantity-catalog">3427</span></a></li>
                            <li><a href="">автоаксессуары <span class="quantity-catalog">3427</span></a></li>
                            <li><a href="" class="active">автосвет <span class="quantity-catalog">3427</span></a></li>
                            <li><a href="">Защита от угона <span class="quantity-catalog">3427</span></a></li>
                            <li><a href="">мультимедия <span class="quantity-catalog">3427</span></a></li>
                            <li><a href="">навесное оборудование <span class="quantity-catalog">3427</span></a></li>
                            <li><a href="">багажники и рейлинги <span class="quantity-catalog">3427</span></a></li>
                            <li><a href="" class="br ">предпусковые <br> обогреватели <span class="quantity-catalog">427</span></a></li>
                            <li><a href="">бытовое освещение <span class="quantity-catalog">3427</span></a></li>
                            <li><a href="">фирменная атрибутика <span class="quantity-catalog">3427</span></a></li>
                            <li><a href="">распродажа <span class="quantity-catalog">3427</span></a></li>
                        </ul>
                    </div>
                    <div class="ct-min-2">
                        <ul>
                            <li><a href="">Антирадары <span class="quantity-catalog">3427</span></a></li>
                            <li class="more-list">
                                <a href="">Видеорегистраторы <span class="quantity-catalog">3427</span></a>
                                <ul class="second-ul">
                                    <li><a href="">Видеорегистраторы <span class="quantity-catalog">3427</span></a></li>
                                    <li><a href="">Запасные части к видеорегистраторам <span class="quantity-catalog">3427</span></a></li>
                                </ul>
                            </li>
                            <li><a href="">Gps навигаторы <span class="quantity-catalog">3427</span></a></li>
                            <li class="more-list">
                                <a href="">Камеры <span class="quantity-catalog">3427</span></a>
                                <ul class="second-ul">
                                    <li><a href="">Камеры заднего вида <span class="quantity-catalog">3427</span></a></li>
                                    <li><a href="">Камеры переднего обзора <span class="quantity-catalog">3427</span></a></li>
                                </ul>
                            </li>
                            <li class="more-list">
                                <a href="">Парковочные радары <span class="quantity-catalog">3427</span></a>
                                <ul class="second-ul">
                                    <li><a href="">Парковочные радары <span class="quantity-catalog">3427</span></a></li>
                                    <li><a href="">Датчики <span class="quantity-catalog">3427</span></a></li>
                                </ul>
                            </li>
                            <li><a href="">Карты памяти и usb flash <span class="quantity-catalog">3427</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
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

                            <div class="hit-item hi-1">
                                <div class="item-info">
                                    <div class="item-logo">
                                        <div class="img-padding">
                                            <img src="<?php echo wm_get_main_img( $loop->post->ID ); ?>" alt="">
                                        </div>
                                    </div>
                                    <p class="item-name"><?php the_title(); ?></p>
                                    <div class="item-price"><span class="price-value"><?php echo $product->get_price_html(); ?></span> руб.</div>
                                                    <div class="item-icons wm-for-balance">
                                                        <div class="item-like"><?php  echo do_shortcode( '[ti_wishlists_addtowishlist]' ); ?> </div>
                                                        <div 
                                                            class="item-balance" 
                                                            data-wm-wcp="<?php echo do_shortcode( '[is_in_compare_list]' ) == 1 ? 'remove' : 'add'; ?>">
                                                        </div>
                                                    </div>
                                </div>    

                               <div class="in-basket">
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
                                <div class="hit-item hi-1">
                                    <div class="item-info">
                                        <div class="item-logo">
                                            <div class="img-padding">
                                                <img src="<?php echo wm_get_main_img( $loop->post->ID ); ?>" alt="" />
                                            </div>
                                        </div>
                                        <p class="item-name"><?php the_title(); ?></p>
                                        <div class="item-price"><span class="price-value"><?php echo $product->get_price_html(); ?></span> руб.</div>
                                                    <div class="item-icons wm-for-balance ">
                                                        <div class="item-like"><?php  echo do_shortcode( '[ti_wishlists_addtowishlist]' ); ?> </div>
                                                        <div 
                                                            class="item-balance" 
                                                            data-wm-wcp="<?php echo do_shortcode( '[is_in_compare_list]' ) == 1 ? 'remove' : 'add'; ?>">
                                                        </div>
                                                    </div>
                                    </div>    
                                    <div class="in-basket">
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
                                    <p class="description-item"><?php echo $cat->category_description; ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/more.png" alt=""></p>
                                </div>
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

                <a href="" class="all-categories">Все категории</a>
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
                    <a href="" class="subscribe">Подписаться</a>
                </div>
                <div class="slider-video">
                    <div class="swiper-container2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="video-slide-wrap">
                                    <iframe id="iframe" src="https://www.youtube.com/embed/Bey4XXJAqS8" frameborder="0" allow="picture-in-picture" allowfullscreen></iframe>
                                </div>    
                            </div>
                            <div class="swiper-slide">
                                <div class="video-slide-wrap">
                                    <iframe id="iframe" src="https://www.youtube.com/embed/Bey4XXJAqS8" frameborder="0" allow="picture-in-picture" allowfullscreen></iframe>
                                </div>    
                            </div>
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
                <div class="a-item adv-i-1">
                    <div class="a-picture"></div>
                    <p class="a-p">С НАМИ НАДЁЖНО <br> И БЕЗОПАСНО</p>
                </div>
                <div class="a-item adv-i-2">
                    <div class="a-picture"></div>
                    <p class="a-p">ПОЛНАЯ ГАРАНТИЯ НА <br> ДОСТАВКУ И КАЧЕСТВО ТОВАРА</p>
                </div>
                <div class="a-item adv-i-3">
                    <div class="a-picture"></div>
                    <p class="a-p">БЫСТРАЯ ДОСТАВКА ПО <br> РОССИИ И ЗА ЕЁ ПРЕДЕЛЫ</p>
                </div>
                <div class="a-item adv-i-4">
                    <div class="a-picture"></div>
                    <p class="a-p">НИЗКИЕ ЦЕНЫ</p>
                </div>
                <div class="a-item adv-i-5">
                    <div class="a-picture"></div>
                    <p class="a-p">Знания  и опыт</p>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
