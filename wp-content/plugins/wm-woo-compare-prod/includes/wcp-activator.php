<?php 

class WCP_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;
		$wpdb->query('CREATE TABLE IF NOT EXISTS `' . $wpdb->dbname . '`.`' . $wpdb->prefix . 'client_id_product_id` ( `client_id` INT NOT NULL , `product_id` INT NOT NULL ) ENGINE = InnoDB;'); 
	}

}
