<?php

class WCP_Public {

	private $plugin_name;
	private $version;
	private $all_prods = array();

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->fill_compared_prods();
	}

	public function fill_compared_prods(){
		if ( is_user_logged_in() ) {
			global $wpdb;
			unset( $this->all_prods );
			$db_res = $wpdb->get_results( "SELECT product_id FROM " . $wpdb->prefix . "client_id_product_id WHERE client_id = " . get_current_user_id(), ARRAY_A);
			foreach ($db_res as $key => $value) {
				$this->all_prods[] = $value['product_id']; 
			}	
		} else {
			$this->all_prods = json_decode( $_COOKIE['wcp_compare'], true );
		}
	}

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wcp-public.css', array(), $this->version, 'all' );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wcp-public.js', array( 'jquery' ), $this->version, true );
	}

	public function set_to_compare_controller() {
		$this->validate_before_insert();
		$id = (int)$_POST['id'];
		if (is_user_logged_in()) {
			$this->set_to_db( $id );
		} else {
			$this->set_to_cookie( $id );
		}
	}

	public function set_to_db( $id ){
		global $wpdb;
		$wpdb->insert( $wpdb->prefix . 'client_id_product_id', array( 'client_id' => get_current_user_id() , 'product_id' => $id ) );
		$this->all_prods[] = $id;
		$this->added_js_event($id);
	}

	public function set_to_cookie( $id ) {
		$in_cookie = json_decode( $_COOKIE['wcp_compare'], true );
		if ( empty( $in_cookie ) ) {
			setcookie( 
				'wcp_compare', 
				json_encode( array ('0'=>$id) ), 
				time()+60*60*24*380,
				'/'
			);
		} else {
			$in_cookie[] = $id;
			setcookie( 
				'wcp_compare', 
				json_encode( $in_cookie ), 
				time()+60*60*24*380,
				'/'
			);
		}
		$this->added_js_event($id);
	}


	public function rm_from_compare_controller() {
		$this->validate_before_insert();
		$id = (int)$_POST['id'];
		if (is_user_logged_in()) {
			$this->rm_from_db( $id );
		} else {
			$this->rm_from_cookie( $id );
		}
	}

	// public function set_to_db( $id ) {
	// 	global $wpdb;
	// 	$wpdb->insert( $wpdb->prefix . 'client_id_product_id', array( 'client_id' => get_current_user_id() , 'product_id' => $id ) );
	// 	$this->all_prods[] = $id;
	// 	$this->added_js_event($id);
	// }

	public function rm_from_db( $id ) {
		global $wpdb;
		$wpdb->delete( $wpdb->prefix . 'client_id_product_id', array( 'product_id' => $id ) );
		unset( $this->all_prods[array_search( $id, $this->all_prods )] );
		$this->removed_js_event($id);
	}



	public function rm_from_cookie( $id ) {
		$in_cookie = json_decode( $_COOKIE['wcp_compare'], true );
		unset( $in_cookie[array_search( $id, $in_cookie )] );
		unset( $this->all_prods[array_search( $id, $this->all_prods )] );
		if ( empty( $in_cookie ) ) {
			setcookie( 
				'wcp_compare', 
				'', 
				time()+60*60*24*380,
				'/'
			);
		} else {
			setcookie( 
				'wcp_compare', 
				json_encode( $in_cookie ), 
				time()+60*60*24*380,
				'/'
			);
		}
		$this->removed_js_event($id);
	}

	public function added_js_event($id) {
		$response = [
			'success' => true,
			'last_added_product' => $id,
			'event' => 'compare_added_event'
		];
		echo json_encode($response);
		die();
	}

	public function removed_js_event($id) {
		$response = [
			'success' => true,
			'last_removed_product' => $id,
			'event' => 'compare_remove_event'
		];
		echo json_encode($response);
		die();
	}

	public function validate_before_insert(){
		if ( !isset( $_POST['id'] ) && !is_int( (int)$_POST['id'] ) ) {
			die;
		}
	}

	public function is_in_compare_list(){
		global $product;
		if ( ! isset( $this->all_prods ) ) {
			return 0;
		}
		return (in_array ( $product->id , $this->all_prods) );
	}

	public function transfer_cookie_to_bd(){
		global $wpdb;
		$in_cookie = json_decode( $_COOKIE['wcp_compare'], true );
		if (empty($in_cookie)) {
			return;
		}
		foreach ($in_cookie as $key => $value) {
			$sql = '
				INSERT INTO ' . $wpdb->prefix . 'client_id_product_id (client_id, product_id)
				SELECT * FROM (SELECT ' . get_current_user_id() . ', '. (int)$value . ') AS tmp
				WHERE NOT EXISTS (
				    SELECT client_id FROM wp_client_id_product_id WHERE client_id = ' . get_current_user_id() . ' AND product_id = '. (int)$value . '
				) LIMIT 1;
			';
			$wpdb->query($sql);
		}
		setcookie('wcp_compare', '', -1000);
	}

	public function wcp_get_total(){
		if (is_user_logged_in()) {
			global $wpdb;
			return $wpdb->get_var('SELECT COUNT(product_id) FROM ' . $wpdb->prefix . 'client_id_product_id WHERE client_id = ' . get_current_user_id() . ';');
			// var_dump( $wpdb->get_var('SELECT COUNT(product_id) FROM ' . $wpdb->prefix . 'client_id_product_id WHERE client_id = ' . get_current_user_id() . ';') );
		} else {
			return count( json_decode( $_COOKIE['wcp_compare'], true ) );
		}
	}
}
