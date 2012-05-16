<?php
	/* Create Store Taxonomy with 4 custom fields */
add_action( 'init', 'store_init', 0);
function store_init(){
		
    global $wpdb;
  	$labels = array(
			    'name' => _x( 'Stores', 'taxonomy general name' ),
			    'singular_name' => _x( 'Store', 'taxonomy singular name' ),
			    'search_items' =>  __( 'Search Store' ),
			    'all_items' => __( 'All Stores' ),
			    'parent_item' => __( 'Parent Store' ),
			    'parent_item_colon' => __( 'Parent Store:' ),
			    'edit_item' => __( 'Edit Store' ), 
			    'update_item' => __( 'Update Store' ),
			    'add_new_item' => __( 'Add New Store ' ),
			    'new_item_name' => __( 'New Store Name' ),
			    'menu_name' => __( 'Store' ),
  ); 	
    
    
    register_taxonomy( 'store', 'post',
        array(  'hierarchical' => true,
                'labels' =>$labels,
                'rewrite' => array('slug' => 'go'),
                'query_var' => false
        )
    );
    
    # Define the database table 'wp_storemeta' 
    $wpdb->storemeta = $wpdb->prefix."storemeta";
    
    add_filter( 'manage_edit-store_columns','admin_store_column_headers', 10, 1);
    add_filter( 'manage_store_custom_column', 'admin_store_column_row', 10, 3 );
}

/* show columns headers only no rows (without data) */
function admin_store_column_headers($columns){
	$columns_local = array();
	if (isset($columns['cb'])) {
        $columns_local['cb'] = $columns['cb'];
        unset($columns['cb']);
    }
    if (isset($columns['name'])){
        $columns_local['name'] = $columns['name'];
        unset($columns['name']);
    }
    if (isset($columns['post']))
        $columns['post'] = "Post";
    
    if (!isset($columns_local['store_url']))  
        $columns_local['store_url'] = "Store URL";

	if (!isset($columns_local['store_promo']))  
       $columns_local['store_promo'] = "Promotion";
        
    	return array_merge($columns_local, $columns);
}


/* show columns and rows with data */
function admin_store_column_row($row_content, $column_name, $term_id){

	switch($column_name)
    {
        case 'name':
            return get_metadata('store', $term_id, 'name', true);
            break;
        case 'store_url':
            return get_metadata('store', $term_id, 'store_url', true);
            break;
        case 'store_promo':
            return get_metadata('store', $term_id, 'store_promo', true);
            break;
        default:
            break;
    }
}





/* ADD Mode */
add_action( 'store_add_form_fields', 'add_store', 10, 2);

function add_store(){
?>
		
    <tr class="form-field">
        <th scope="row" valign="top"><label for="store_photo"><strong>Store Logo</strong></label></th>
        <td>
            <input type="text" size="40" name="category_photo" id="category_photo" value="" />
            <input id="upload_image_button" type="button" value="Upload logo" />
            <p class="description">Image Size: </p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="store_url"><strong>Store URL</strong></label></th>
        <td>
            <input type="text" name="store_url" id="store_url" size="50" value=""/><br />
            <p class="description">Enter Store URL</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="store_promo"><strong>Store Promotion</strong></label></th>
        <td>
            <textarea name="store_promo" id="store_promo" cols="50" rows="10" value=""></textarea><br />
            <p class="description">Enter Store Promotion code</p>
        </td>
    </tr>	
    <?php }




add_action( 'created_store', 'save_store_add_mode', 10, 2);
/* SAVE Mode for ADD page */
function save_store_add_mode($term_id)
{		    
    if (!$term_id) return;																
    
     if (isset($_POST['category_photo']))
    		update_metadata($_POST['taxonomy'], $term_id, 'category_photo',
        		$_POST['category_photo']);
     
     if (isset($_POST['store_url']))
    		update_metadata($_POST['taxonomy'], $term_id, 'store_url',
        		$_POST['store_url']);
     
     if (isset($_POST['store_promo']))
    		update_metadata($_POST['taxonomy'], $term_id, 'store_promo',
        		$_POST['store_promo']);
	
}




/* EDIT Mode */
add_action( 'store_edit_form_fields', 'edit_store', 10, 2);
function edit_store($tag, $taxonomy){
	   $category_photo = get_metadata($tag->taxonomy, $tag->term_id, 'category_photo', true);
	   $store_url = get_metadata($tag->taxonomy, $tag->term_id, 'store_url', true);
	   $store_promo = get_metadata($tag->taxonomy, $tag->term_id, 'store_promo', true);
?>	   
			
    <tr class="form-field">
        <th scope="row" valign="top"><label for="store_photo"><strong>Store Logo</strong></label></th>
        <td>
        	<img src="<?php echo $category_photo; ?>" /><br/><br/>
            <input type="text" size="40" name="category_photo" id="category_photo" value="<?php echo $category_photo; ?>" />
            <input id="upload_image_button" type="button" value="Upload Image" />
            <p class="description">Image Size: </p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="store_url"><strong>Store URL</strong></label></th>
        <td>
            <input type="text" name="store_url" id="store_url" size="50" value="<?php echo $store_url; ?>"/><br />
            <p class="description">Enter Store URL</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="store_promo"><strong>Store Promotion</strong></label></th>
        <td>
            <textarea name="store_promo" id="store_promo" cols="50" rows="10"><?php echo $store_promo; ?></textarea><br />
            <p class="description">Enter Store Promotion code</p>
        </td>
    </tr>	


<?php 

	echo '<style type="text/css" media="screen">
    		#upload_image_button {width:100px;}
    		#category_photo {width:400px;}
    	</style>';

}

add_action( 'edited_store', 'save_store', 10, 2);

/* SAVE Mode for EDIT page */
function save_store($term_id, $tt_id)
{
    if (!$term_id) return;
    
     if (isset($_POST['category_photo']))
    		update_metadata($_POST['taxonomy'], $term_id, 'category_photo',
        		$_POST['category_photo']);
     
     if (isset($_POST['store_url']))
    		update_metadata($_POST['taxonomy'], $term_id, 'store_url',
        		$_POST['store_url']);
     
     if (isset($_POST['store_promo']))
    		update_metadata($_POST['taxonomy'], $term_id, 'store_promo',
        		$_POST['store_promo']);
} 
?>