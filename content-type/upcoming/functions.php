<?php
echo '<style type="text/css" media="screen">
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
      </style>';

add_action('init', 'upcoming_occassions_register');
function upcoming_occassions_register() {
	$labels = array(
		'name' => _x('Upcoming Occassions', 'post type general name'),
		'singular_name' => _x('Upcoming Occassions List', 'post type singular name'),
		'add_new' => _x('Add New', 'Occassion Item'),
		'add_new_item' => __('Add New Occassion'),
		'edit_item' => __('Edit Occassion List Item'),
		'new_item' => __('New Occassion List Item'),
		'view_item' => __('View Occassion List Item'),
		'search_items' => __('Search Occassion List'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('')
	  ); 
 
	register_post_type( 'upcoming' , $args );
	flush_rewrite_rules();
}

//add_action('init', 'my_rem_editor_from_post_type');
function my_rem_editor_from_post_type() {
    remove_post_type_support('post', 'editor' );
}





// backwards compatible (before WP 3.0)
add_action("admin_init", "upcoming_page_init", 1);

// Latest wp version after 3.0
add_action("add_meta_boxes", "upcoming_page_init");

function upcoming_page_init(){
	  add_meta_box("upcoming_details_meta", "Upcoming occassions Details", "upcoming_details_meta", "upcoming", "normal", "low");
}


function upcoming_details_meta($object, $box){
	global $post, $upcoming_date, $upcoming_title, $upcoming_title_link, $upcoming_descr;
	
	$custom = get_post_custom($post->ID);
	
  	
  	if(empty($custom["upcoming_date"][0])){
  		$custom["upcoming_date"][0]="Untitle Date";
  	}elseif(empty($custom["upcoming_title"][0])){
  		$custom["upcoming_title"][0]="Untitle title";
  	}elseif(empty($custom["upcoming_title_link"][0])){
  		$custom["upcoming_title_link"][0]="Untitle Link";
  	}elseif(empty($custom["upcoming_descr"][0])){
  		$custom["upcoming_descr"][0]="Untitle Description";
  	}else{
  		$upcoming_date = $custom["upcoming_date"][0];
  		$upcoming_title = $custom["upcoming_title"][0];
  		$upcoming_title_link = $custom["upcoming_title_link"][0];
  		$upcoming_descr = $custom["upcoming_descr"][0];
  	};
?>	
	<div id="upcoming_details">
		<p>
			<label class="lbl_1" for ="upcoming_details_meta"><strong>Occassion's Date</strong></label>
  			
  			<input name="upcoming_date" id="up-date" value= "<?php echo $upcoming_date ?>" size="10" type="textfield">
  		</p>
  		
  		<p>
  			<label class="lbl_2" for ="upcoming_details_meta"><strong>Occassion's Title</strong></label>
  			
  			<input name="upcoming_title" id="up-title" value= "<?php echo $upcoming_title ?>" size="10" type="textfield">
  		</p>
  		
  		<p>
  			<label class="lbl_3" for ="upcoming_details_meta"><strong>Occassion's URL</strong></label>
  			
  			<input name="upcoming_title_link" id="up-link" value= "<?php echo $upcoming_title_link ?>" size="50" type="textfield">
  		</p>
  		
  		<p>
  			<label class="lbl_4" for ="upcoming_details_meta"><strong>Short Description</strong></label>
  			
  			<input name="upcoming_descr" id="up-descr" value= "<?php echo $upcoming_descr ?>" size="50" type="textfield">
  		</p>
	</div>

<?php }

add_action('save_post', 'save_details');
  function save_details(){
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;
    
    global $post;
    
    update_post_meta($post->ID, "upcoming_date", $_POST["upcoming_date"]);
	update_post_meta($post->ID, "upcoming_title", $_POST["upcoming_title"]);
	update_post_meta($post->ID, "upcoming_title_link", $_POST["upcoming_title_link"]);
	update_post_meta($post->ID, "upcoming_descr", $_POST["upcoming_descr"]);
}

add_action("manage_posts_custom_column",  "upcoming_custom_columns");
function upcoming_custom_columns($column){
  global $post;
  switch ($column) {
    case "upcoming_date":
      $custom = get_post_custom();
      echo $custom["upcoming_date"][0];
      break;
    case "upcoming_title":
      $custom = get_post_custom();
      echo $custom["upcoming_title"][0];
      break;
    case "upcoming_title_link":
      $custom = get_post_custom();
      echo $custom["upcoming_title_link"][0];
      break;
    case "upcoming_descr":
      $custom = get_post_custom();
      echo $custom["upcoming_descr"][0];
      break;
   }
}
add_filter("manage_edit-upcoming_columns", "upcoming_edit_columns");
function upcoming_edit_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Title",
    "upcoming_date" => "Occassion date",
    "upcoming_title" => "Occassion title",
    "upcoming_title_link" => "Occassion web link",
    "upcoming_descr" => "Occassion Description"
  );
  return $columns;
}
?>