<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
		wp_title( '|', true, 'right' );
		// Add the blog name.
		bloginfo( 'name' );
		
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
?>
</title>

<link href="<?php echo get_stylesheet_directory_uri() ?>/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri() ?>/css/rcarousel.css" rel="stylesheet" type="text/css" />


<?php wp_enqueue_script( 'jquery' ); ?>
<?php wp_enqueue_script('cycle', get_bloginfo('template_url') .'/js/jquery.cycle.min.js','',0,false); ?>
<?php wp_enqueue_script('uicore', get_bloginfo('template_url') .'/js/jquery.ui.core.min.js','',0,false); ?>
<?php wp_enqueue_script('widget', get_bloginfo('template_url') .'/js/jquery.ui.widget.min.js','',0,false); ?>
<?php wp_enqueue_script('rcarousel', get_bloginfo('template_url') .'/js/jquery.ui.rcarousel.min.js','',0,false); ?>
<?php wp_enqueue_script('jplaceholder', get_bloginfo('template_url') .'/js/jquery.placeholder.js','',0,false); ?>




<?php wp_head();?>


<script type="text/javascript">
		
$j = jQuery.noConflict();		
		$j( document ).ready(function() {	
			
			$j(".slide ul").cycle({
			fx:'fade',
			continuous: 0, 
			timeout:4000,
			sync:1,
			
			pagerAnchorBuilder: function(index, el) {
        		return '<a href="#"></a>'; 
    		}
		});
		
		$j(".upcoming-news ul").cycle({
			fx:'fade',
			continuous: 0, 
			timeout:4000,
			sync:1,
			width:615,
			height:34
		});
		
		
		$j( "#jcarousel" ).rcarousel({
				auto: {
						enabled: true,
						interval: 3000,
						direction: "next"
					},
			
			visible: 5,
			step: 5,
			width: 150, 
			height: 150,
			margin: 20
		});
		
		$j( "#ui-carousel-next" )
			.add( "#ui-carousel-prev" )
		

		
});


	
</script>



</head>
		
<body>
<div id="wrapper-container">
	<div id="wrapper">
		<div id="wrapper-inner">
				<!-- Everything comes on top of this inner container-->
				
				<div id="header">
						
						<div id="col_1" class="logo">
							<a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/images/gift-ideas-items-logo.gif"></a>
						</div>
						
						<div id="col_2" class="logo-right-img">
							<img src="<?php bloginfo('template_url');?>/images/gift-header.jpg">
						</div>
						
						<div id="col_3" class="social-icons-search">
							
							<div class="social-icons">
								
								<ul class="s-icons">
								Subscribe:
									<li class="one"><a href=""><img src="<?php bloginfo('template_url');?>/images/social-rss.gif"></a></li>
									<li class="one"><a href=""><img src="<?php bloginfo('template_url');?>/images/social-twitter.gif"></a></li>
									<li class="one"><a href=""><img src="<?php bloginfo('template_url');?>/images/social-google-plus.gif"></a></li>
								</ul>

<div class="fblike">										
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
</div>
<!-- AddThis Button END -->
</div>

</div>
							<div class="search-bar">
								<?php if ( is_active_sidebar( 'sidebar_search' ) ) : ?>
									<?php dynamic_sidebar( 'sidebar_search' ); ?>
								<?php else: ?>
									<?php // ?>
								<?php endif;?>
							</div>
							
						</div>
					
				
				</div> <!-- End Header -->
				
						<?php wp_nav_menu( array( 
        						'theme_location' => 'Primary', 
        						'menu_id' => '', 
        						'menu_class' => 'nv', 
        						'container_id' =>'menu-container',
        						'container_class' =>''
        					));?>  
				
				
				
				
				
				