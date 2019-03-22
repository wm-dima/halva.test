<?php 
 
class WCP_Public { 
 
	private $plugin_name; 
	private $version; 
	private $all_prods = array(); 
	private $first_cat; 
 
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
		$this->added_js_event($id, $_POST['type']); 
	} 
 
	public function set_to_db( $id ){ 
		global $wpdb; 
		$wpdb->insert( $wpdb->prefix . 'client_id_product_id', array( 'client_id' => get_current_user_id() , 'product_id' => $id ) ); 
		$this->all_prods[] = $id; 
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
	} 
 
 
	public function rm_from_compare_controller() { 
		$this->validate_before_insert(); 
		$id = (int)$_POST['id']; 
		if (is_user_logged_in()) { 
			$this->rm_from_db( $id ); 
		} else { 
			$this->rm_from_cookie( $id ); 
		} 
		$this->removed_js_event( $id, $_POST['type'] ); 
	} 
 
	public function rm_from_db( $id ) { 
		global $wpdb; 
		$wpdb->delete( $wpdb->prefix . 'client_id_product_id', array( 'product_id' => $id ) ); 
		unset( $this->all_prods[array_search( $id, $this->all_prods )] ); 
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
	} 
 
	public function added_js_event($id, $type = 'compare_added_event' ) { 
		$response = [ 
			'success' => true, 
			'last_added_product' => $id, 
			'event' => $type 
		]; 
		echo json_encode($response); 
		die(); 
	} 
 
	public function removed_js_event($id, $type = false) { 
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
				    SELECT client_id FROM ' . $wpdb->prefix . 'client_id_product_id WHERE client_id = ' . get_current_user_id() . ' AND product_id = '. (int)$value . ' 
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
		} else { 
			return count( json_decode( $_COOKIE['wcp_compare'], true ) ); 
		} 
	} 
 
	public function wcp_pages_controller($template){ 
		global $post; 
		if( $post->ID == 94 ){ 
			return plugin_dir_path( __FILE__ ) . 'partials/wcp-public-display.php'; 
		} 
		return $template; 
	} 
 
	public function get_all_prods(){ 
		if (is_user_logged_in()) { 
			global $wpdb; 
			$wpdb->get_var('SELECT product_id FROM ' . $wpdb->prefix . 'client_id_product_id WHERE client_id = ' . get_current_user_id() . ';', ARRAY_N); 
			$res = $wpdb->last_result; 
			$ids = []; 
			foreach ($res as $key => $value) { 
				$ids[] = $value->product_id; 
			} 
		} else { 
			$ids =  json_decode( $_COOKIE['wcp_compare'], true ); 
		} 
		return $ids; 
	} 
 
	public function get_comp_cats(){ 
		$cats = $this->get_categories(); 
		$res = '<ul>'; 
		foreach ($cats as $key => $value) { 
			$res .= "<li><a href=\"?category={$value->term_id}\">{$value->name}</li></a>" ; 
		} 
		$res .= "</ul>" ; 
		return $res; 
	} 
 
	public function get_categories(){ 
		global $wpdb; 
 
		$ids = $this->get_all_prods(); 
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
 
	public function get_prods_id_from_cat( $cat_id = false ){ 
		global $wpdb; 
 
		if ( !$cat_id ) { 
			$cat_id = $this->first_cat; 
		} 
		$ids = $this->get_all_prods(); 
		$query_ids = '( '; 
		foreach ($ids as $key => $value) { 
			$query_ids .= $value . ', '; 
		} 
		$query_ids = substr($query_ids, 0, strlen( $query_ids ) - 2) . ' )'; 
 
  		$sql = " 
			SELECT  
				ID  
			FROM  
				{$wpdb->prefix}posts  
			WHERE ID in ( SELECT object_id FROM {$wpdb->prefix}term_relationships WHERE term_taxonomy_id = {$cat_id} ) AND {$wpdb->prefix}posts.ID in {$query_ids}"; 
		$wpdb->get_results( $sql, ARRAY_A ); 
		return $wpdb->last_result; 
	} 
 
	public function show_compared_prods(){ 
		if ( isset($_GET['category']) && (int)$_GET['category'] ) { 
			$ids = $this->get_prods_id_from_cat($_GET['category']); 
		} else { 
			$ids = $this->get_prods_id_from_cat(); 
		} 
		foreach ($ids as $key => $value) : $_product = wc_get_product( $value->ID ); ?> 
 
            <div class="element" data-wm-prod-id="<?php echo $value->ID; ?>"> 
                <div class="element-main"> 
                    <div class="d21"> 
                    	<a href="<?php echo get_permalink( $value->ID ); ?>"> 
	                        <div class="item-logo"> 
	                            <div class="img-padding"> 
	                                <img src="<?php echo wm_get_main_img( $value->ID ); ?>" alt=""> 
	                            </div> 
	                        </div> 
                        </a> 
                    	<a href="<?php echo get_permalink( $value->ID ); ?>"> 
                        	<p class="element-name"><?php echo $_product->name; ?></p> 
                    	</a> 
                        <p class="element-price"><?php echo $_product->get_price_html(); ?> руб.</p> 
                    </div>     
                    <a  
                        href="/shop/?add-to-cart=<?php echo $value->ID; ?>"  
                        data-quantity="1"  
                        class="button product_type_simple add_to_cart_button ajax_add_to_cart element-main button"  
                        data-product_id="<?php echo $value->ID; ?>"  
                        data-product_sku=""  
                        rel="nofollow" 
                    > 
                        <button>В корзину</button> 
                    </a> 
                </div> 
                <div class="element-delete"> 
                    <div class="delete-elem" data-wm-wcp-compared-list></div> 
                </div> 
            </div> 
 
		<?php endforeach; 
	} 
 
	public function show_compared_options(){ 
		$options = $this->prepare_options(); 
        echo '<table>'; 
        $options = array_chunk( $options, 2, true); 
        $ids =  $this->get_prods_id_from_cat() ; 
		foreach ($options as $the_option => $row) :  
			$data = array_values($row); 
		?> 
			<?php  
			?> 
			<tr> 
				<td rowspan="1" class="first"><?php echo $data[0]; ?></td> 
				<?php foreach ($ids as $key => $value) : ?> 
					<td data-compared-prod="<?php echo $value->ID; ?>"> 
						<?php 
						$res = ''; 
						if ( is_null(  $data[1][$value->ID] ) ) { 
							echo "-"; 
						} else { 
							foreach($data[1][$value->ID] as $k => $v){ 
								$res .=  $v . ', '; 
							}; 
							echo substr($res, 0, strlen($res) - 2) . '.'; 
						} 
						?> 
					</td> 
				<?php endforeach; ?> 
			</tr> 
		<?php endforeach;  
        echo '</table>'; 
	} 
 
	public function prepare_options(){ 
		global $wpdb; 
		$ids = $this->get_prods_id_from_cat(); 
		$query_ids = '( '; 
		foreach ($ids as $key => $value) { 
			$query_ids .= $value->ID . ', '; 
		} 
		$query_ids = substr($query_ids, 0, strlen( $query_ids ) - 2) . ' )'; 
  		$sql = " 
		SELECT {$wpdb->prefix}term_relationships.object_id, {$wpdb->prefix}woocommerce_attribute_taxonomies.attribute_label, {$wpdb->prefix}terms.name 
		FROM {$wpdb->prefix}term_taxonomy  
		    LEFT JOIN {$wpdb->prefix}woocommerce_attribute_taxonomies on concat('pa_',{$wpdb->prefix}woocommerce_attribute_taxonomies.attribute_name) = {$wpdb->prefix}term_taxonomy.taxonomy 
		    LEFT JOIN {$wpdb->prefix}terms on {$wpdb->prefix}terms.term_id = {$wpdb->prefix}term_taxonomy.term_id 
		    LEFT JOIN {$wpdb->prefix}term_relationships on {$wpdb->prefix}term_taxonomy.term_id = {$wpdb->prefix}term_relationships.term_taxonomy_id 
		WHERE  
			{$wpdb->prefix}term_relationships.object_id in  {$query_ids} AND 
		    {$wpdb->prefix}woocommerce_attribute_taxonomies.attribute_name LIKE 'compare%' 
		    ORDER BY wp_woocommerce_attribute_taxonomies.attribute_name ASC "; 
		$wpdb->get_results( $sql, ARRAY_A ); 
		$res = $wpdb->last_result; 
		$options = []; 
		foreach ($res as $key => $value) { 
			if ( @!in_array($value->attribute_label, $options))  
				$options[] = $value->attribute_label; 
			if ( @!in_array($value->object_id, $options[$value->attribute_label]) )  
				$options[$value->attribute_label][$value->object_id][] = $value->name; 
		} 
		return $options; 
	} 
} 
