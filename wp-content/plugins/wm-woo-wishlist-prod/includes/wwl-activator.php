<?php 

class WWL_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;
		$wpdb->query('CREATE TABLE IF NOT EXISTS `' . $wpdb->dbname . '`.`' . $wpdb->prefix . 'client_id_wishlist_id` ( `client_id` INT NOT NULL , `product_id` INT NOT NULL ) ENGINE = InnoDB;'); 
	}

}
