<?php
$current_path = dirname(__FILE__);
require_once( $current_path. '/content-type/upcoming/functions.php');

add_action( 'after_setup_theme', 'my_setup' );
if ( !function_exists('my_setup') ):
function my_setup(){	
	add_theme_support( 'post-thumbnails' );			// This theme uses post thumbnails
	//set_post_thumbnail_size( 600, 390 ); // 299 pixels wide by 375 pixels tall, set last parameter to true for hard crop mode
	add_image_size( 'featured-image', 	680, 280 );	
}
endif;
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'Primary' => __( 'Primary Menu' ),
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
		$general_sidebar=array(
			'id' => 'general_sidebar',
			'name' => __( 'Add your widget' ),
			'description' => __( 'Add your message)' ),
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
		//register_sidebar( $general_sidebar );
		//register_sidebar( $f_sidebar_one );
}
?>