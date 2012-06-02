<?php
$current_path = dirname(__FILE__);

//if(is_admin()){
	require_once($current_path. '/theme-options.php');
	require_once( $current_path. '/content-type/upcoming/functions.php');
	require_once( $current_path. '/meta-box/functions.php');
	
	require_once( $current_path. '/store/dbtable-store.php');// create 'store_meta' table for store taxonomy
	require_once( $current_path. '/store/functions.php');
//}

// REmove admin bar
if (!function_exists('disableAdminBar')) {

	function disableAdminBar(){

  	remove_action( 'admin_footer', 'wp_admin_bar_render', 1000 ); // for the admin page
    remove_action( 'wp_footer', 'wp_admin_bar_render', 1000 ); // for the front end

    function remove_admin_bar_style_backend() {  // css override for the admin page
      echo '<style>body.admin-bar #wpcontent, body.admin-bar #adminmenu { padding-top: 0px !important; }</style>';
    }

    add_filter('admin_head','remove_admin_bar_style_backend');

    function remove_admin_bar_style_frontend() { // css override for the frontend
      echo '<style type="text/css" media="screen">
      html { margin-top: 0px !important; }
      * html body { margin-top: 0px !important; }
      </style>';
    }

    add_filter('wp_head','remove_admin_bar_style_frontend', 99);

  }

}

// add_filter('admin_head','remove_admin_bar_style_backend'); // Original version
//add_action('init','disableAdminBar'); // New version



add_action( 'after_setup_theme', 'my_setup' );
if ( !function_exists('my_setup') ):
function my_setup(){	
	add_theme_support( 'post-thumbnails' );			// This theme uses post thumbnails
	//set_post_thumbnail_size( 600, 390 ); // 299 pixels wide by 375 pixels tall, set last parameter to true for hard crop mode
	add_image_size( 'featured-image', 	680, 280 );
	add_image_size( 'product-featured-image', 	250, 250 );
	add_image_size( 'product-thumbnail', 	150, 150 );
	add_image_size( 'sidebar-product-thumbnail', 	80, 80 );	
}
endif;
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'Primary' => __( 'Primary Menu' ),
			'Secondary' => __( 'Footer Menu' )
		)
	);
}

// Create Home page

$name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name='Home'");
if ($name != '') {
	//
} else { 
	global $user_ID;
	$post = array();
	$post['post_type']    = 'page'; //could be 'post' for example
	$post['post_content'] = esc_attr('hello world!!');
	$post['post_author']  = null;
	$post['post_status']  = 'publish'; //draft
	$post['post_title']   = 'Home';
	$postid = wp_insert_post ($post);
	if ($postid == 0)
	    echo 'Screwed';
	else
	    echo 'Cool';
} 

// Use a static front page
/*
$home = get_page_by_title( 'Home' );
update_option( 'page_on_front', $home->ID );
update_option( 'show_on_front', 'page' );
*/


add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	
		/*General Sidebar*/
		$category_sidebar=array(
			'id' => 'category_sidebar',
			'name' => __( 'Category page Sidebar' ),
			'description' => __( 'This is for google ad in left sidebar of category page. Recommended size: 160 X 600 pixels.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		/*Page Sidebar*/
		$page_sidebar=array(
			'id' => 'page_sidebar',
			'name' => __( 'Page Sidebar: Sponsored Links' ),
			'description' => __( 'This is for Sponsored Links' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		/*Page Sidebar*/
		$pro_sidebar=array(
			'id' => 'pro_sidebar',
			'name' => __( 'Product Sidebar: More related gifts' ),
			'description' => __( 'This is for More related gifts' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		
		$item_google_adsense_sidebar_one=array(
			'id' => 'item_google_adsense_sidebar_one',
			'name' => __( '1. Google Adsense Sidebar' ),
			'description' => __( 'This is for google adsense in bottom of items page.Recommended size: 312 X 282 pixels.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		$item_google_adsense_sidebar_two=array(
			'id' => 'item_google_adsense_sidebar_two',
			'name' => __( '2. Google Adsense Sidebar' ),
			'description' => __( 'This is for google adsense in bottom of items page.Recommended size: 312 X 282 pixels.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		$sidebar_search=array(
			'id' => 'sidebar_search',
			'name' => __( 'Search bar' ),
			'description' => __( 'Drag and drop the search widget here' ),
			'before_widget' => '',
			'after_widget' => ''
		);
		
		
		/*Footer sidebar */
		$f_sidebar_one=array(
			'id' => 'f_sidebar_one',
			'name' => __( 'Footer Sidebar-one' ),
			'description' => __( 'This sidebar is designed for displaying widgets in footer.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		);
		
		/* Register the sidebars. */
		register_sidebar( $sidebar_search );
		register_sidebar( $page_sidebar );
		//register_sidebar( $pro_sidebar );
		register_sidebar( $category_sidebar );
		register_sidebar( $item_google_adsense_sidebar_one );
		register_sidebar( $item_google_adsense_sidebar_two );
}

function upcoming_ticker(){
?>
	<div class="upcoming-title"><h4 class="upcoming-title-h4">Upcoming Occassion:</h4></div>
	
	<div class="upcoming-news">
		<ul>
				<?php
					query_posts('post_type=upcoming' );
					while (have_posts()) : the_post();  
					$custom = get_post_custom();
				?>
				
				<li>
				<?php echo $custom["upcoming_date"][0]; ?>, <a href="<?php echo $custom["upcoming_title_link"][0]; ?>"><?php echo $custom["upcoming_title"][0]; ?></a>: <?php echo $custom["upcoming_descr"][0]; ?>
				</li>
				
				<?php endwhile;?>
	</ul>
				
	</div>
	<div class="find-gifts">
		<ul>
			<li><h5 class="find-gifts-h5"><a href="<?php echo get_option('find_gifts_link'); ?>">FIND GIFTS</a></h5></li>
			<li><a href="<?php echo get_option('find_gifts_link'); ?>"><img src="<?php bloginfo('template_url');?>/images/upcoming-occassions-arrow.png"></a></li>
		</ul>
	</div>

<?php }

// the option name
define('edit_category_fields', 'gift_category_fields_option');


// Add extra custom field in category EDIT mode
add_action( 'category_edit_form_fields', 'edit_category_fields', 10, 2);
function edit_category_fields($tag, $taxonomy){
	$tag_extra_fields = get_option(edit_category_fields);

	?>
	<tr class="form-field">
        <th scope="row" valign="top"><label for="category_photo"><strong>Photo URL</strong></label></th>
        <td>
            
            <img src="<?php echo $tag_extra_fields[$tag->term_id]['cat_img'] ?> " /><br/><br/>
            <input type="text" size="50" name="category_photo" id="category_photo" value="<?php echo $tag_extra_fields[$tag->term_id]['cat_img']; ?>"/>
            <input id="upload_image_button" type="button" value="Upload Image" />
            <p class="description">Image Size: 334px by 215px</p>
        </td>
    </tr>
	<style type="text/css" media="screen">
    	#upload_image_button {width:100px;}
    	#category_photo {width:400px;}
    </style>

<?php }
add_action( 'edited_category', 'save_category_field', 10, 2);
function save_category_field($term_id){
	if($_POST['taxonomy'] == 'category'):
		$tag_extra_fields = get_option(edit_category_fields);
		$tag_extra_fields[$term_id]['cat_img'] = $_POST['category_photo'];
		update_option(edit_category_fields, $tag_extra_fields);
 	endif;
}

function my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('category-upload', WP_CONTENT_URL.'/themes/gift/category/catupload.js', array('jquery','media-upload','thickbox'));
	wp_register_script('boxone-upload', WP_CONTENT_URL.'/themes/gift/category/box-one.js', array('jquery','media-upload','thickbox'));
	wp_register_script('boxtwo-upload', WP_CONTENT_URL.'/themes/gift/category/box-two.js', array('jquery','media-upload','thickbox'));
	wp_register_script('boxthree-upload', WP_CONTENT_URL.'/themes/gift/category/box-three.js', array('jquery','media-upload','thickbox'));
	wp_register_script('boxfour-upload', WP_CONTENT_URL.'/themes/gift/category/box-four.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('category-upload');
	wp_enqueue_script('boxone-upload');
	wp_enqueue_script('boxtwo-upload');
	wp_enqueue_script('boxthree-upload');
	wp_enqueue_script('boxfour-upload');
}

function my_admin_styles() {
	wp_enqueue_style('thickbox');
	
}

// These actions were called for both category and store extra fields. We can't use more than one of each fucntion in one theme.
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');




add_action( 'category_add_form_fields', 'add_category_fields', 10, 2);
function add_category_fields(){?>
	<tr class="form-field">
        <th scope="row" valign="top"><label for="category_photo"><strong>Photo URL</strong></label></th>
        <td>
            <input type="text" size="40" name="category_photo" id="category_photo" value="" />
            <input id="upload_image_button" type="button" value="Upload Image" />
            <p class="description">Image Size: 334px by 215px</p>
        </td>
    </tr>

<?php }

add_action( 'created_category', 'save_category_add_mode', 10, 2);
function save_category_add_mode($term_id){
	if($_POST['taxonomy'] == 'category'):
		$tag_extra_fields = get_option(edit_category_fields);
		$tag_extra_fields[$term_id]['cat_img'] = $_POST['category_photo'];
		update_option(edit_category_fields, $tag_extra_fields);
 	endif;
}

// Get the current category id if we are on an archive/category page
function getCurrentCatID(){
	global $wp_query;
	if(is_category() || is_single()){
		$cat_ID = get_query_var('cat');
	}
	return $cat_ID;
}

function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
?>