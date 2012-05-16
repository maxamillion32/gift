<?php
class storeTable{
		function __construct(){
			global $wpdb;
			$table_name = $wpdb->prefix . "storemeta";
	  		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name){
	
				   $sql = "CREATE TABLE " . $table_name . " (
					  	meta_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	  					store_id bigint(20) unsigned NOT NULL DEFAULT '0',
	  					meta_key varchar(255) DEFAULT NULL,
	  					meta_value longtext,
	  					PRIMARY KEY (meta_id),
	  					KEY post_id (store_id),
	  					KEY meta_key (meta_key)
	  				);";
			    	
			    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
				dbDelta($sql);	   
			}
		}
}
$store_table = new storeTable();?>