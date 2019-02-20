<?php 

if (function_exists('add_theme_support')) {
  add_theme_support('menus');
}

add_action( 'widgets_init', 'register_my_widgets' );

function register_my_widgets(){
    register_sidebar( array(
        'name' => "Фильтр цены",
        'id' => 'wm-price-filter',
        'description' => 'Эти виджеты будут показаны в правой колонке сайта',
        'before_title' => '<p class="wm-filter-title"><img src="' . get_template_directory_uri() . '/assets/images/down-arrow.png" alt="" class="img-rotate">',
        'after_title' => '</p>',
        'before_widget' => '<div class="filter-price">',
        'after_widget'  => "</div>",
    ) );
    register_sidebar( array(
        'name' => "Фильтр Производителя",
        'id' => 'wm-manufactarer-filter',
        'description' => 'Эти виджеты будут показаны в правой колонке сайта',
        'before_title' => '<p class="wm-filter-title"><img src="' . get_template_directory_uri() . '/assets/images/down-arrow.png" alt="" class="img-rotate">',
        'after_title' => '</p>',
        'before_widget' => '<div class="filter-manufactures">',
        'after_widget'  => "</div>",
    ) );
}

add_action( 'wp_enqueue_scripts', 'my_them_load_css_and_js' );

function my_them_load_css_and_js() {
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css');

    wp_enqueue_style( 'css-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css');
    wp_enqueue_style( 'museo', get_template_directory_uri() . '/assets/fonts/museo.css');
    wp_enqueue_style( 'swiper.min', get_template_directory_uri() . '/assets/css/swiper.min.css');
    wp_enqueue_style( 'media-css', get_template_directory_uri() . '/assets/css/media.css');

    wp_enqueue_style( 'generic', get_template_directory_uri() . '/assets/css/generic.css');
    wp_enqueue_style( 'item-slider', get_template_directory_uri() . '/assets/css/item-slider.css');
    wp_enqueue_style( 'jcarousel-connected-carousels', get_template_directory_uri() . '/assets/css/jcarousel.connected-carousels.css');
    wp_enqueue_style( 'select', get_template_directory_uri() . '/assets/css/select.css');


    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', [], null, false );

    wp_enqueue_script( 'jcarousel', get_template_directory_uri() . '/assets/js/jcarousel.connected-carousels.js', array('jquery'), null, true );
    wp_enqueue_script( 'jquery-jcarousel', get_template_directory_uri() . '/assets/js/jquery.jcarousel.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'select', get_template_directory_uri() . '/assets/js/select.js', array('jquery'), null, true );
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array('jquery'), null, true );

    wp_enqueue_script( 'wm-filter', get_template_directory_uri() . '/assets/js/wm_filters.js',[], null, true );
}


add_action( 'after_setup_theme', 'woocommerce_support' );

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
 
function add_my_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'RUB': $currency_symbol = ''; break;
    }
    return $currency_symbol;
}

function wm_get_main_img($id){
    if (has_post_thumbnail( $id )) 
        return get_the_post_thumbnail_url($id);
    else 
        return get_template_directory_uri() . '/assets/images/no_image.png';
}

function wm_geet_compare_link($text){
    $compare_link = explode ( '</a>', do_shortcode('[yith_compare_button]') );
    return  $compare_link[0] . $text . $compare_link[1];
}

function wm_get_wishlist_count(){
    global $wpdb;
    $count = 0;
    $wl    = new TInvWL_Wishlist();
    if ( is_user_logged_in() ) {
        $wishlist = $wl->add_user_default();
        $wlp      = new TInvWL_Product();
        $counts   = $wlp->get( array(
            'external'    => false,
            'wishlist_id' => $wishlist['ID'],
            'sql'         => 'SELECT COUNT(`quantity`) AS `quantity` FROM {table} t1 INNER JOIN ' . $wpdb->prefix . 'posts t2 on t1.product_id = t2.ID AND t2.post_status = "publish" WHERE {where} ',
        ) );
        $counts   = array_shift( $counts );
        $count    = absint( $counts['quantity'] );
    } else {
        $wishlist = $wl->get_by_sharekey_default();
        if ( ! empty( $wishlist ) ) {
            $wishlist = array_shift( $wishlist );
            $wlp      = new TInvWL_Product( $wishlist );
            $counts   = $wlp->get_wishlist( array(
                'external' => false,
                'sql'      => sprintf( 'SELECT %s(`quantity`) AS `quantity` FROM {table}  t1 INNER JOIN ' . $wpdb->prefix . 'posts t2 on t1.product_id = t2.ID AND t2.post_status = "publish" WHERE {where}', 'COUNT' ),
            ) );
            $counts   = array_shift( $counts );
            $count    = absint( $counts['quantity'] );
        }
    }

    return $count ? $count : ( tinv_get_option( 'topline', 'hide_zero_counter' ) ? false : 0 );
}


function load_template_part() {
    ob_start();
    dynamic_sidebar('wm-manufactarer-filter');
    $var = ob_get_contents();
    ob_end_clean();
    echo "<pre>";
    $var = explode ( 'wm-the-widget-start', htmlspecialchars($var) );
    var_dump($var);
    // $links = explode('<a', $var);
    die;
    return $var;
}

add_action( 'pre_get_posts', 'iconic_hide_out_of_stock_products' );
 
function iconic_hide_out_of_stock_products( $q ) {
    session_start();
    if ( ! ( isset ( $_SESSION['only_in_stock'] ) && $_SESSION['only_in_stock'] == true ) )  {
        return;
    }
    if ( ! $q->is_main_query() || is_admin() ) {
        return;
    }
 
    if ( $outofstock_term = get_term_by( 'name', 'outofstock', 'product_visibility' ) ) {
 
        $tax_query = (array) $q->get('tax_query');
 
        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field' => 'term_taxonomy_id',
            'terms' => array( $outofstock_term->term_taxonomy_id ),
            'operator' => 'NOT IN'
        );
 
        $q->set( 'tax_query', $tax_query );
 
    }
 
    remove_action( 'pre_get_posts', 'iconic_hide_out_of_stock_products' );
 
}

function prefix_send_email_to_admin() {
    ob_start();
    session_start();
    if ( !isset ( $_SESSION['only_in_stock'] ) ) {
        $_SESSION['only_in_stock'] = true;
        header('Location: '.$_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['only_in_stock'] = !$_SESSION['only_in_stock'];
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    header('Location: '.$_SERVER['HTTP_REFERER']);
    die;
}
add_action( 'admin_post_nopriv_contact_form', 'prefix_send_email_to_admin' );
add_action( 'admin_post_contact_form', 'prefix_send_email_to_admin' );

function wm_render_only_stock_form(){
    session_start();
    $html = '<form action="' . esc_url( admin_url('admin-post.php') ) . '" method="post">';
    $html .= '<div class=" checkbox'; 
    if ( isset( $_SESSION['only_in_stock'] ) && $_SESSION['only_in_stock'] ) {
         $html .= ' chk-active ';
    }
    $html .= '">';
    $html .= '<input type="checkbox" id="real" onclick="only_in_stock(event, this)"> </div>';
    $html .= '<label for="real" id="label"';
    if ( isset( $_SESSION['only_in_stock'] ) && $_SESSION['only_in_stock'] ) {
        $html .= 'calss="orange"';
    }
    $html .= '>Только в наличии</label>
            <input type="hidden" name="action" value="contact_form">
        </form>';
    return $html;
}

function wm_prod_per_page(){
    $page = get_query_var('page');
    var_dump($page);
    $count = 0;
    return 'Товары 1-' . $count .' из';
}