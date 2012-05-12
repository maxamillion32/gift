<?php 
/*Template name: Home*/
get_header();
global $post;
?>

<div id="main-content">
<div id="slider">
			<?php
$child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID."  AND post_type = 'page' ORDER BY menu_order", 'OBJECT');    ?>

<?php if ( $child_pages ) : ?>
<div class="slide">
	<ul>
	<?php foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?>
		  	 <li>
		  	 <?php echo get_the_post_thumbnail($pageChild->ID, 'featured-image'); ?>
		  	 	<div class="slide-content-container">
		 			<h1 class="gift-title"><?php echo $pageChild->post_title; ?></h1>
		 			<div class="slide-content">
		 				<?php echo $pageChild->post_content; ?>
		 			</div>
		 		</div>
		 	</li>
	<?php endforeach; ?>
	</ul>
</div>
<?php endif;?>
				
				
	
	
</div>
<div id="gift-finder">
	<div class="gift-finder-form">
	
	<div class="select-one">	
		<select name="selectionField" class="recipient"> 
		  <option value="CA" >Any Recipient</option>
		  <option value="CO" >Men</option>
		  <option value="CN" >Woman</option>
		</select>
	</div>
	<div class="select-one">
		<select name="selectionField" class="occassion"> 
		  <option value="CA" >Any Occassion</option>
		  <option value="CO" >XMas</option>
		  <option value="CN" >Good Friday</option>
		</select>
	</div>
	<div class="select-one">
		<select name="selectionField" class="price"> 
		  <option value="CA" >Any Price</option>
		  <option value="CO" >100</option>
		  <option value="CN" >200</option>
		</select>
	</div>
		
		
		<input type="submit" id="submit" value="Search" />
		
	</div>
</div>

<div style="clear:both">&nbsp;</div>
<div id="top-picks">
	<div class="top-picks-content">
		<h2 class="top-picks-title">Top Picks for Valentine's Day Gifts</h2>
		
			<div id="jcarousel">
				<a href=""><img src="<?php bloginfo('template_url');?>/images/gift-1.jpg"></a>
				<a href=""><img src="<?php bloginfo('template_url');?>/images/gift-2.jpg"></a>
				<a href=""><img src="<?php bloginfo('template_url');?>/images/gift-3.jpg"></a>
				<a href=""><img src="<?php bloginfo('template_url');?>/images/gift-4.jpg"></a>
				<a href=""><img src="<?php bloginfo('template_url');?>/images/gift-5.jpg"></a>
				<a href=""><img src="<?php bloginfo('template_url');?>/images/gift-4.jpg"></a>
				<a href=""><img src="<?php bloginfo('template_url');?>/images/gift-3.jpg"></a>
				<a href=""><img src="<?php bloginfo('template_url');?>/images/gift-2.jpg"></a>
				<a href=""><img src="<?php bloginfo('template_url');?>/images/gift-1.jpg"></a>
				<a href=""><img src="<?php bloginfo('template_url');?>/images/gift-5.jpg"></a>
				<a href=""><img src="<?php bloginfo('template_url');?>/images/gift-2.jpg"></a>
				<a href=""><img src="<?php bloginfo('template_url');?>/images/gift-1.jpg"></a>
			</div>
		<a href="#" id="ui-carousel-next"><span>next</span></a>
	    <a href="#" id="ui-carousel-prev"><span>prev</span></a>
	</div>
</div>

<div id="gift-box">
	
	<div class="gift-men">
		<div class="col_1_gift-men">
			<div class="men-title">
				<h3 class="gift-box-title">Gifts for Men</h3>
			</div>
			<div class="men-photo">
				<img src="<?php bloginfo('template_url');?>/images/gifts-for-men.jpg">
			</div>
			<div class="gift-list">
				<ul>
					<li>Birthday Gifts</li>
					<li>XXX Gifts</li>
					<li>Birthday Gifts</li>
					<li>Birthday Gifts</li>
					<li>Birthday Gifts</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="gift-women">
		<div class="col_2_gift-women">
			<div class="women-title">
				<h3 class="gift-box-title">Gifts for Woman</h3>
			</div>
			<div class="women-photo">
				<img src="<?php bloginfo('template_url');?>/images/gifts-for-men.jpg">
			</div>
			<div class="gift-list">
				<ul>
					<li>Birthday Gifts</li>
					<li>XXX Gifts</li>
					<li>Birthday Gifts</li>
					<li>Birthday Gifts</li>
					<li>Birthday Gifts</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="gift-baby">
		<div class="col_3_gift-baby">
			<div class="baby-title">
				<h3 class="gift-box-title">Gifts for Babies</h3>
			</div>
			<div class="baby-photo">
				<img src="<?php bloginfo('template_url');?>/images/gifts-for-men.jpg">
			</div>
			<div class="gift-list">
				<ul>
					<li>Birthday Gifts</li>
					<li>XXX Gifts</li>
					<li>Birthday Gifts</li>
					<li>Birthday Gifts</li>
					<li>Birthday Gifts</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="gift-occassions">
		<div class="col_4_gift-occassions">
			<div class="occassions-title">
				<h3 class="gift-box-title">Gifts for Occassions</h3>
			</div>
			<div class="occassions-photo">
				<img src="<?php bloginfo('template_url');?>/images/gifts-for-men.jpg">
			</div>
			<div class="gift-list">
				<ul>
					<li>Birthday Gifts</li>
					<li>XXX Gifts</li>
					<li>Birthday Gifts</li>
					<li>Birthday Gifts</li>
					<li>Birthday Gifts</li>
				</ul>
			</div>
		</div>
	</div>

</div>

<div style="clear:both">&nbsp;</div>
<div id="upcoming-ticker">
	
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
			<li><h5 class="find-gifts-h5"><a href="#">FIND GIFTS</a></h5></li>
			<li><a href="#"><img src="<?php bloginfo('template_url');?>/images/upcoming-occassions-arrow.png"></a></li>
		</ul>
	</div>

</div>

<?php  wp_reset_query();?>
<div style="clear:both">&nbsp;</div>

<?php get_footer();?>