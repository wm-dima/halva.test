<div class="search">
    <a class="search-a" onclick="$('.catalog-min').toggleClass('ct-min-show');$('.search-a').toggleClass('actv');">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/catalog.png" alt="">
        Каталог товаров
    </a>
    <?php get_search_form(); ?>
    <div class="catalog-min" style="max-width: 350px;">
        <ul>
            <li>
                <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">Все товары</a>
            </li>
            <?php 
            $args = array(
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
            'parent'   => 0
            );
            $product_cat = get_terms( $args );
            foreach ($product_cat as $parent_product_cat) : ?>
                <li>
                    <a href="<?php echo get_term_link($parent_product_cat->term_id); ?>">
                        <div class="parent-cat">
                            <?php echo $parent_product_cat->name; ?>
                            <?php 
                            $child_args = array(
                            'taxonomy' => 'product_cat',
                            'hide_empty' => false,
                            'parent'   => $parent_product_cat->term_id
                            );
                            $child_product_cats = get_terms( $child_args );
                            ?>
                        </div>
                    </a> 
                    <?php if ($child_product_cats) :?>
                        <div class="catalog-additional">
                            <ul>
                                <?php
                                foreach ($child_product_cats as $child_product_cat):
                                ?>
                                    <li>
                                        <a href="<?php echo get_term_link($child_product_cat->term_id); ?>">
                                            <?php echo $child_product_cat->name; ?>
                                        </a>
                                    </li>
                                <?php 
                                endforeach;?>
                            </ul>
                        </div>
                    <?php endif;?>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>