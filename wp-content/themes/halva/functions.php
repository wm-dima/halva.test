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

add_action('customize_register', 'mytheme_customize_register');
function mytheme_customize_register( $wp_customize ) {
    $wp_customize->add_section(
        'main_option',
        array(
            'title' => 'Настройки информации',
            'description' => 'телефоны, соц. сети, адресс',
            'priority' => 11,
        )
    );
    /*PHONE*/
    $wp_customize->add_setting(
        'phone_1'
    );
    $wp_customize->add_control(
        'phone_1',
        array(
            'label' => 'Телефон 1',
            'section' => 'main_option',
            'type' => 'text',
        )
    );

    /*PHONE*/
    $wp_customize->add_setting(
        'phone_2'
    );
    $wp_customize->add_control(
        'phone_2',
        array(
            'label' => 'Телефон 2',
            'section' => 'main_option',
            'type' => 'text',
        )
    );

    /*SKYPE*/
    $wp_customize->add_setting(
        'skype'
    );
    $wp_customize->add_control(
        'skype',
        array(
            'label' => 'Skype',
            'section' => 'main_option',
            'type' => 'text',
        )
    );

    /*SOCIAL FaceBook*/
    $wp_customize->add_setting(
        'faceBook'
    );
    $wp_customize->add_control(
      'faceBook',
      array(
          'label' => 'FaceBook',
          'section' => 'main_option',
          'type' => 'text',
      )
    );
    /*SOCIAL Instagram*/
    $wp_customize->add_setting(
        'instagram'
    );
    $wp_customize->add_control(
      'instagram',
      array(
          'label' => 'Instagram',
          'section' => 'main_option',
          'type' => 'text',
      )
    );

    /*SOCIAL VK*/
    $wp_customize->add_setting(
        'vk'
    );
    $wp_customize->add_control(
      'vk',
      array(
          'label' => 'VK',
          'section' => 'main_option',
          'type' => 'text',
      )
    );

    /*Working time*/
    $wp_customize->add_setting(
        'work_time'
    );
    $wp_customize->add_control(
      'work_time',
      array(
          'label' => 'Время работы',
          'section' => 'main_option',
          'type' => 'text',
      )
    );

    /*youtube*/
    $wp_customize->add_setting(
        'youtube'
    );
    $wp_customize->add_control(
      'youtube',
      array(
          'label' => 'youtube',
          'section' => 'main_option',
          'type' => 'text',
      )
    );

    /*email*/
    $wp_customize->add_setting(
        'the_email'
    );
    $wp_customize->add_control(
      'the_email',
      array(
          'label' => 'email',
          'section' => 'main_option',
          'type' => 'text',
      )
    );
}

add_action( 'wp_enqueue_scripts', 'my_them_load_css_and_js' );
function my_them_load_css_and_js() {

    wp_enqueue_style( 'wm-the-css-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style( 'wm-the-normalize', get_template_directory_uri() . '/assets/css/normalize.css');
    wp_enqueue_style( 'wm-the-museo', get_template_directory_uri() . '/assets/fonts/museo.css');
    wp_enqueue_style( 'wm-the-swiper.min', get_template_directory_uri() . '/assets/css/swiper.min.css');
    wp_enqueue_style( 'wm-the-media-css', get_template_directory_uri() . '/assets/css/media.css');

    // wp_enqueue_style( 'wm-the-generic', get_template_directory_uri() . '/assets/css/generic.css');
    wp_enqueue_style( 'wm-the-item-slider', get_template_directory_uri() . '/assets/css/item-slider.css');
    wp_enqueue_style( 'wm-the-jcarousel-connected-carousels', get_template_directory_uri() . '/assets/css/jcarousel.connected-carousels.css');
    wp_enqueue_style( 'wm-the-select', get_template_directory_uri() . '/assets/css/select.css');
    
    wp_enqueue_style( 'wm-the-main-style', get_template_directory_uri() . '/style.css');


    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', [], null, false );

    wp_enqueue_script( 'wm-the-jcarousel', get_template_directory_uri() . '/assets/js/jcarousel.connected-carousels.js', array('jquery'), null, false );
    wp_enqueue_script( 'wm-the-jquery-jcarousel', get_template_directory_uri() . '/assets/js/jquery.jcarousel.min.js', array('jquery'), null, false );
    wp_enqueue_script( 'wm-the-select', get_template_directory_uri() . '/assets/js/select.js', array('jquery'), null, true );
    wp_enqueue_script( 'wm-the-the-swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array('jquery'), null, false );

    wp_enqueue_script( 'wm-the-feedback_popup.js', get_template_directory_uri() . '/assets/js/wm_feedback_popup.js', [], null, false );


    wp_enqueue_script( 'wm-the-wm-main', get_template_directory_uri() . '/assets/js/main.js',[], null, true );

    wp_localize_script( 
        'wm-the-wm-main', 
        'my_ajax_url', 
            array( 
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'is_log_in' => is_user_logged_in()
            ) 
        );
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
    return $compare_link[0] . $text . '</a>' . $compare_link[1];
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
    $per_page = 20;
    $total = wc_get_loop_prop( 'total' );
    $page_pos = strripos($_SERVER['REQUEST_URI'], 'page');
    if (!$page_pos) {
        $page = 1;
    } else {
        $expl = explode ( '/', $_SERVER['REQUEST_URI']);
        $page = $expl[ array_search ('page', $expl) + 1];
    }
    // var_dump($total, $)
    if ($total < $per_page) {
        return 'Товары 1 -' . $total .' из';
    } else {
        if ($page == 1) {
            return 'Товары 1 - 20 из';
        } else {
            $start_from = ( $page - 1 ) * $per_page;
            if ($total > $start_from + 20) {
                return 'Товары ' . $start_from . ' - ' . $start_from + 20 . ' из';
            } else {
                return 'Товары ' . $start_from . ' - ' . $total . ' из';
            }
        }
     
    }
}

function wm_get_shipping_methods(){
    global $wpdb;
    $methods_id = $wpdb->get_results( 'SELECT * from ' . $wpdb->prefix . 'woocommerce_shipping_zone_methods where is_enabled = 1' );
    $where_clause = 'WHERE ';
    foreach ($methods_id as $key => $value) {
        $where_clause .= 'option_name like "%' . $value->method_id . '_' . $value->instance_id . '%" OR ';
    }
    $where_clause = substr($where_clause, 0, strlen($where_clause) - 3);

    $option_values = $wpdb->get_results( 'SELECT option_value FROM `' . $wpdb->prefix . 'options` ' . $where_clause );

    $html = '<ul class="shipping-list">';
    foreach ($option_values as $key => $value) {
        $shipping = unserialize($value->option_value);
        $html .= '<li>';
        $html .= '<span class="title">' . $shipping['title'] . '<span>';
        if ( $shipping['cost'] != '0' && $shipping['cost'] != '' ) {
            $html .= '<span class="cost"> (' . $shipping['cost'] . ') руб.<span>';
        }
        $html .= '</li>';
    }
    $html .= '</ul>';
    return $html;
}

// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

function wm_get_images( $id ){
    if (!is_int((int)$id)) {
        return;
    }
    global $wpdb;
    $sql = 'SELECT meta_key, meta_value from ' . $wpdb->prefix . 'postmeta where post_id = ' . $id . 
           ' AND ( meta_key = \'_product_image_gallery\' OR meta_key = \'_thumbnail_id\' );';
    $res = $wpdb->get_results( $sql );
    $main_img = [];
    $additional_img = [];
    foreach ($res as $key => $value) {
        if ( $value->meta_key == '_thumbnail_id' ) {
            $main_img[] = wp_get_attachment_url( $value->meta_value );
        }
        if ( $value->meta_key == '_product_image_gallery' && !empty( $value->meta_value ) ) {
                $ids = explode(',', $value->meta_value);
                foreach ($ids as $k => $v) {
                    $additional_img[] = wp_get_attachment_url($v);
                }
        }
    }
    return array_merge($main_img, $additional_img);
}

function wm_get_single_prod_galegy( $id ){
    $images = wm_get_images( $id );
    // var_dump($images);
    // die;
    $html = '<ul>';
        foreach ($images as $key => $value) {
            $html .= '<li><img src="' . $value . '"  alt=""></li>';
        }
    $html .= '</ul>';
    return $html;
}

function all_commentfields( $fields ) {
    // var_dump($fields); // просмотр всех полей в переменной $fields

    // сохраняем значение всех полей формы
    $mycomment_field = $fields['comment'];
    $myauthor_field = $fields['author'];
    $myemail_field = $fields['email'];
    $myurl_field = $fields['url'];
 
    unset( $fields['comment'], $fields['author'], $fields['email'], $fields['url'] );
 
    // заново добавляем поля в форму в нужном порядке
    $fields['author'] = $myauthor_field;
    $fields['email'] = $myemail_field;
    $fields['comment'] = $mycomment_field;
 
    return $fields;
}
 
add_filter( 'comment_form_fields', 'all_commentfields' );

add_action( 'comment_post', 'save_extend_comment_meta_data' );
function save_extend_comment_meta_data( $comment_id ){

    if( !empty( $_POST['phone'] ) ){
        $phone = sanitize_text_field($_POST['phone']);
        add_comment_meta( $comment_id, 'phone', $phone );
    }
}

add_action( 'add_meta_boxes_comment', 'extend_comment_add_meta_box' );
function extend_comment_add_meta_box(){
    add_meta_box( 'title', __( 'Comment Metadata - Extend Comment' ), 'extend_comment_meta_box', 'comment', 'normal', 'high' );
}

// Отображаем наши поля
function extend_comment_meta_box( $comment ){
    $phone  = get_comment_meta( $comment->comment_ID, 'phone', true );

    wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
    ?>
    <p>
        <label for="phone"><?php _e( 'Phone' ); ?></label>
        <input type="text" name="phone" value="<?php echo esc_attr( $phone ); ?>" class="widefat" />
    </p>
    <?php
}

add_action( 'edit_comment', 'extend_comment_edit_meta_data' );
function extend_comment_edit_meta_data( $comment_id ) {
    if( ! isset( $_POST['extend_comment_update'] ) || ! wp_verify_nonce( $_POST['extend_comment_update'], 'extend_comment_update' ) )
    return;

    if( !empty($_POST['phone']) ){
        $phone = sanitize_text_field($_POST['phone']);
        update_comment_meta( $comment_id, 'phone', $phone );
    }
    else
        delete_comment_meta( $comment_id, 'phone');
}

function get_call_phone($phone){
    return str_replace(['+','-',' ','(',')'], '', $phone);
}

add_action( 'comment_post', 'add_comment_metadata_field' );
function add_comment_metadata_field( $comment_id ) {
    add_comment_meta( $comment_id, 'rating', $_POST['rating'] );
}

function send_form_contact() {

  /* Забираем отправленные данные */
  $name = $_POST['name'];
  $phone = $_POST['tel'];

  $res = "Уведомление с сайта 'АвтоАзарт' <br/><br/>
            Имя:  $name <br/><br/>
            Телефон: $phone <br/><br/>
            Сообщение: 'Перезвоните мне пожалуйста'";
  /* Отправляем нам письмо */
  $emailTo = get_theme_mod('the_email');
  $subject = 'Перезвоните мне пожалуйста!';
  $headers = "Content-type: text/html; charset=\"utf-8\"";
  $mailBody = $res;

  $send = wp_mail($emailTo, $subject, $mailBody, $headers);

  /* Завершаем выполнение ajax */
  if( $send ){
      $response = [
        'success' => true
      ];
  } else {
      $response = [
            'success' => false
          ];
  }
  echo json_encode($response);
  die();
  
}
add_action("wp_ajax_feedback_popup", "send_form_contact");
add_action("wp_ajax_nopriv_feedback_popup", "send_form_contact");