<?php
/**
* Create meta box for post
*/


/*Define the custom box in posts*/

// backwards compatible (before WP 3.0)
add_action("admin_init", "products_page_init", 1);

// Latest wp version after 3.0
add_action("add_meta_boxes", "products_page_init");

function products_page_init(){
	
	  add_meta_box("prod_details_meta", "Products Details", "prod_details_meta", "post", "normal", "low");
  
}

function prod_details_meta($object, $box){

	global $post;
	$custom = get_post_custom($post->ID);
	$prod_desc = $custom["prod_desc"][0];
  	$prod_price = $custom["prod_price"][0];
  	$prod_picks = $custom["prod_picks"][0];
  	$prod_popularity = $custom["prod_popularity"][0];
?>

	<div id="prod_details">
		<p>
			<label class="lbl_1" for ="upcoming_details_meta"><strong>Short descriptions</strong></label>
  			<input name="prod_desc" id="up-date" value= "<?php echo $prod_desc ?>" size="30" maxlength="37" type="textfield">
  			<p class="description">Enter few words</p>
  		</p>
		<p>
			<label class="lbl_1" for ="upcoming_details_meta"><strong>Price</strong></label>
  			<input name="prod_price" id="up-date" value= "<?php echo $prod_price ?>" size="5" maxlength="5" type="textfield">
  			<p class="description">Enter price (No need to add currency symbol here)</p>
  		</p>
  		<p>
			<label class="lbl_1" for ="upcoming_details_meta"><strong>Top Picks</strong></label>
  			<input name="prod_picks" id="up-date" value= "<?php echo $prod_picks ?>" size="1" maxlength="1" type="textfield">
  			<p class="description">Enter Y or N </p>
  		</p>
  		<p>
			<label class="lbl_1" for ="upcoming_details_meta"><strong>Popularity</strong></label>
  			<input name="prod_popularity" id="up-date" value= "<?php echo $prod_popularity ?>" size="1" maxlength="2" type="textfield">
  			<p class="description">Enter Popularity (between 1 and 10 (where 1 is less popular , 10 is hot))</p>
  		</p>
	
	</div>
<style type="text/css">
	#up-date, #up-title, #up-link, #up-descr{  
	padding: 9px;  
	border: solid 1px #E5E5E5;  
	outline: 0;  
	font: normal 13px/100% Verdana, Tahoma, sans-serif;    
	background: #FFFFFF;  
	box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
} 
.lbl_1, .lbl_2, .lbl_3, .lbl_4 {
	float: left;
	text-align: left;
	color: #336699;
	width: 120px;
	font-family:"Century Gothic"; font-size: 12px; font-weight:bold;
	margin: 10px 0;
}
</style>  	
<?php }
add_action('save_post', 'save_details_post');
  function save_details_post(){
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;
    
    global $post;
    update_post_meta($post->ID, "prod_desc", $_POST["prod_desc"]);
    update_post_meta($post->ID, "prod_price", $_POST["prod_price"]);
	update_post_meta($post->ID, "prod_picks", $_POST["prod_picks"]);
	update_post_meta($post->ID, "prod_popularity", $_POST["prod_popularity"]);
}

?>