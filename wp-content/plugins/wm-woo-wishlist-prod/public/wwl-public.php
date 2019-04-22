<?php

class WWL_Public {

	private $plugin_name;
	private $version;
	private $all_prods = array();
	private $first_cat;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->fill_wish_prods();
	}

	public function fill_wish_prods(){
		if ( is_user_logged_in() ) {
			global $wpdb;
			unset( $this->all_prods );
			$db_res = $wpdb->get_results( "SELECT product_id FROM " . $wpdb->prefix . "client_id_wishlist_id WHERE client_id = " . get_current_user_id(), ARRAY_A);
			foreach ($db_res as $key => $value) {
				$this->all_prods[] = $value['product_id']; 
			}	
		} else {
			$this->all_prods = json_decode( $_COOKIE['wwl_wish'], true );
		}
	}

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wwl-public.css', array(), $this->version, 'all' );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wwl-public.js', array(), $this->version, false );
		wp_localize_script( 
		    $this->plugin_name, 
		    'my_ajax_url', 
		        array( 
		            'ajax_url' => admin_url( 'admin-ajax.php' ),
		            'is_log_in' => is_user_logged_in()
		        ) 
		    );
	}

	public function set_to_wish_controller() {
		$this->validate_before_insert();
		$id = (int)$_POST['id'];
		if (is_user_logged_in()) {
			$this->set_to_db( $id );
		} else {
			$this->set_to_cookie( $id );
		}
		$this->added_js_event($id, $_POST['type']);
	}

	public function set_to_db( $id ){
		global $wpdb;
		$wpdb->insert( $wpdb->prefix . 'client_id_wishlist_id', array( 'client_id' => get_current_user_id() , 'product_id' => $id ) );
		$this->all_prods[] = $id;
	}

	public function set_to_cookie( $id ) {
		$in_cookie = json_decode( $_COOKIE['wwl_wish'], true );
		if ( empty( $in_cookie ) ) {
			setcookie( 
				'wwl_wish', 
				json_encode( array ($id) ), 
				time()+60*60*24*380,
				'/'
			);
		} else {
			$in_cookie[] = $id;
			setcookie( 
				'wwl_wish', 
				json_encode( array_values( $in_cookie) ),
				time()+60*60*24*380,
				'/'
			);
		}
	}


	public function rm_from_wish_controller() {
		$this->validate_before_insert();
		$id = (int)$_POST['id'];
		$type = $_POST['type'];
		if (is_user_logged_in()) {
			$this->rm_from_db( $id );
		} else {
			$this->rm_from_cookie( $id );
		}
		$this->removed_js_event($id, $type);
	}

	public function rm_from_db( $id ) {
		global $wpdb;
		$wpdb->delete( $wpdb->prefix . 'client_id_wishlist_id', array( 'product_id' => $id ) );
		unset( $this->all_prods[array_search( $id, $this->all_prods )] );
	}



	public function rm_from_cookie( $id ) {
		$in_cookie = json_decode( $_COOKIE['wwl_wish'], true );
		unset( $in_cookie[array_search( $id, $in_cookie )] );
		unset( $this->all_prods[array_search( $id, $this->all_prods )] );
		if ( empty( $in_cookie ) ) {
			setcookie( 
				'wwl_wish', 
				'', 
				time()+60*60*24*380,
				'/'
			);
		} else {
			setcookie( 
				'wwl_wish', 
				json_encode( array_values( $in_cookie) ),
				time()+60*60*24*380,
				'/'
			);
		}
	}

	public function added_js_event($id, $type) {
		$response = [
			'success' => true,
			'last_added_product' => $id,
			'event' => $type 
		];
		echo json_encode($response);
		die();
	}

	public function removed_js_event($id, $type) {
		$response = [
			'success' => true,
			'last_removed_product' => $id,
			'event' => $type 
		];
		echo json_encode($response);
		die();
	}

	public function validate_before_insert(){
		if ( !isset( $_POST['id'] ) && !is_int( (int)$_POST['id'] ) ) {
			die;
		}
	}

	public function is_in_wish_list(){
		global $product;
		if ( ! isset( $this->all_prods ) ) {
			return 0;
		}
		return (in_array ( $product->id , $this->all_prods) );
	}

	public function transfer_cookie_to_bd(){
		global $wpdb;
		$in_cookie = json_decode( $_COOKIE['wwl_wish'], true );
		if (empty($in_cookie)) {
			return;
		}
		foreach ($in_cookie as $key => $value) {
			$sql = '
				INSERT INTO ' . $wpdb->prefix . 'client_id_wishlist_id (client_id, product_id)
				SELECT * FROM (SELECT ' . get_current_user_id() . ', '. (int)$value . ') AS tmp
				WHERE NOT EXISTS (
				    SELECT client_id FROM ' . $wpdb->prefix . 'client_id_wishlist_id WHERE client_id = ' . get_current_user_id() . ' AND product_id = '. (int)$value . '
				) LIMIT 1;
			';
			$wpdb->query($sql);
		}
		setcookie('wwl_wish', '', -1000);
	}

	public function wwl_get_total(){
		if (is_user_logged_in()) {
			global $wpdb;
			return $wpdb->get_var('SELECT COUNT(product_id) FROM ' . $wpdb->prefix . 'client_id_wishlist_id WHERE client_id = ' . get_current_user_id() . ';');
		} else {
			return @count( json_decode( $_COOKIE['wwl_wish'], true ) ) ;
		}
	}

	public function wwl_pages_controller($template){
		global $post;
		if( $post->ID == 16 ){
			return plugin_dir_path( __FILE__ ) . 'partials/wwl-public-display.php';
		}
		return $template;
	}

	public function get_categories(){
		global $wpdb;

		$ids = $this->get_all_prods();
		if (empty($ids) || is_null($ids)) return false;
		$query_ids = '( ';
		foreach ($ids as $key => $value) {
			$query_ids .= $value . ', ';
		}
		$query_ids = substr($query_ids, 0, strlen( $query_ids ) - 2) . ' )';
  		$sql = "
			select 
				name, term_id
			from 
				{$wpdb->prefix}terms 
			where 
				term_id in ( 
					select 
						tr.term_taxonomy_id 
					from 
						{$wpdb->prefix}term_relationships as tr 
						LEFT JOIN {$wpdb->prefix}term_taxonomy as tt on tt.term_id = tr.term_taxonomy_id  
					WHERE 
						tt.taxonomy = 'product_cat' 
						AND tr.object_id in {$query_ids}
				)";
		$wpdb->get_results( $sql, ARRAY_A );
		$this->first_cat = $wpdb->last_result[0]->term_id;
		return $wpdb->last_result;
	}

	public function get_all_prods(){
		if (is_user_logged_in()) {
			global $wpdb;
			$wpdb->get_var('SELECT product_id FROM ' . $wpdb->prefix . 'client_id_wishlist_id WHERE client_id = ' . get_current_user_id() . ';', ARRAY_N);
			$res = $wpdb->last_result;
			$ids = [];
			foreach ($res as $key => $value) {
				$ids[] = $value->product_id;
			}
		} else {
			$ids =  json_decode( $_COOKIE['wwl_wish'], true );
		}
		return $ids;
	}

	public function ajax_get_wish_cats(){
		echo $this->get_wish_cats();
		die;
	}

	public function get_wish_cats(){
		$cats = $this->get_categories();
		if (!$cats) return "<li class=\"wcp-compare-category--empty\">Для выбора категорий необходимо добавить товары в желания.</li>";
		$res = '';
		foreach ($cats as $key => $value) {
			if ($key == 0 ) $res .= "<li class=\"wcp-compare-category wcp-compare-category--active\"><a href=\"\">{$value->name}</a></li>" ;
			else $res .= "<li class=\"wcp-compare-category\"><a href=\"?category={$value->term_id}\">{$value->name}</a></li>" ;
		}
		return $res;
	}

	public function show_wish_prods(){
		$ids = $this->get_all_prods();
		if (empty($ids)) {
			echo "<p class=\"any-wish-prods\">У Вас нет товаров в разделе желания.</p>";
			return;
		}
		$ids[] = false;
		foreach ($ids as $key => $value) : 
			if ($value) {
				$_product = wc_get_product( $value ) ; 
			} else {
				continue;
			}
			?>
                            <div class="want-item" data-wm-prod-id="<?php echo $value; ?>">
                                <div class="wi">

			                        <div class="item-logo">
			                            <div class="img-padding">
			                                <img src="<?php echo wm_get_main_img( $value ); ?>" alt="">
			                            </div>
			                        </div>

                                    <div class="want-item-info">
                                        <p class="want-name"><?php echo $_product->name; ?></p>
                                        <p class="articul">Артикул: <?php echo $_product->sku; ?></p>
                                        <p class="price"><?php echo $_product->get_price_html(); ?> р.</p>
                                    </div>
                                </div>    
                                <div class="want-in-basket">
				                    <a 
				                        href="/shop/?add-to-cart=<?php echo $value; ?>" 
				                        data-quantity="1" 
				                        class="button product_type_simple add_to_cart_button ajax_add_to_cart element-main button" 
				                        data-product_id="<?php echo $value; ?>" 
				                        data-product_sku="" 
				                        rel="nofollow"
				                    > В корзину</a>
                                </div>
                                <div 
                                	class="want-delete" 
                                	data-wm-wwl="remove"
									data-item-id="<?php echo $value; ?>"
                                    data-event-after="remove_from_compare_list"
                                ></div>
                            </div>

		<?php endforeach;
	}
}
