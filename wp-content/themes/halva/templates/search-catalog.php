                <div class="search">
                    <a class="search-a" onclick="$('.catalog-min').toggleClass('ct-min-show');$('.search-a').toggleClass('actv');">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/catalog.png" alt="">
                        Каталог товаров
                    </a>
                    <?php get_search_form(); ?>
                    <div class="catalog-min">
<?php 

$args = array(
    'number'     => $number,
    'orderby'    => 'name',
    'order'      => 'ASC',
    'hide_empty' => $hide_empty,
    'include'    => $ids
);

$product_categories = get_terms( 'product_cat', $args );
$product_categories = array_chunk($product_categories, ceil(count($product_categories)/2));
echo '<div class="ct-min-1"> <ul>';
foreach( $product_categories[0] as $cat )  {
    echo '<li><a href="'.get_term_link( $cat->slug, 'product_cat' ).'">'.
        $cat->name . '<span class="quantity-catalog">' . 
        $cat->count . '</span></a></li>'; 
}
echo '</div> </ul>';

echo '<div class="ct-min-2"> <ul>';
foreach( $product_categories[1] as $cat )  { 
    echo '<li><a href="'.get_term_link( $cat->slug, 'product_cat' ).'">'.
        $cat->name . '<span class="quantity-catalog">' . 
        $cat->count . '</span></a></li>'; 
}
echo '</div> </ul>';

?>
                    </div>
                </div>