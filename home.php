<?php 
/*Template name: Home*/
get_header();
global $post;
update_option('current_result', '');
update_option('current_sort', '');
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
	
	<?php 
		$choice_cat_title = get_option('choice_cat_title');
		
		$choice_cat = get_option('choice_cat');
		
		$args = array(
			   		'post_type' => 'post',
			   		'posts_per_page' => -1,
			   		'meta_key' => 'prod_picks',
			   		'meta_value' =>'Y',
			   		'category_name' => $choice_cat
			   	);
				query_posts($args); 
	?>
		<h2 class="top-picks-title">Top Picks for <?php echo $choice_cat_title ?></h2>
		<?php if (have_posts()) : ?>
			<div id="jcarousel">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if(has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink();?>" title=""><?php the_post_thumbnail('product-thumbnail'); ?></a>
				<?php }else{ ?>
				<img src="<?php bloginfo('template_url');?>/images/no-image.jpg" width="150" height="150" alt="no-image">
				<?php } ?>
			<?php endwhile;?>
			</div>
		<?php else : ?><h1 class="no-prod">Currently There are no products available!</h1><?php endif;  
			wp_reset_query();?>
		<a href="#" id="ui-carousel-next"><span>next</span></a>
	    <a href="#" id="ui-carousel-prev"><span>prev</span></a>
	</div>
</div>

<div id="gift-box">
	
	<div class="gift-men">
		<div class="col_1_gift-men">
			<div class="men-title">
				<h3 class="gift-box-title"><?php echo get_option('box_one_title')?></h3>
			</div>
			<div class="men-photo">
				<img src="<?php echo get_option('box_one_photo')?>">
			</div>
			<div class="gift-list">
		<ul>
			<li><a href="<?php echo get_option('box_one_link1') ?>"><?php echo get_option('box_one_link_title_1') ?></a></li>
			<li><a href="<?php echo get_option('box_one_link2') ?>"><?php echo get_option('box_one_link_title_2') ?></a></li>
			<li><a href="<?php echo get_option('box_one_link3') ?>"><?php echo get_option('box_one_link_title_3') ?></a></li>
			<li><a href="<?php echo get_option('box_one_link4') ?>"><?php echo get_option('box_one_link_title_4') ?></a></li>
			<li><a href="<?php echo get_option('box_one_link5') ?>"><?php echo get_option('box_one_link_title_5') ?></a></li>
		</ul>
			</div>
		</div>
	</div>
	<div class="gift-women">
		<div class="col_2_gift-women">
			<div class="women-title">
				<h3 class="gift-box-title"><?php echo get_option('box_two_title');?></h3>
			</div>
			<div class="women-photo">
				<img src="<?php echo get_option('box_two_photo')?>">
			</div>
			<div class="gift-list">
				<ul>
				<li><a href="<?php echo get_option('box_two_link1') ?>"><?php echo get_option('box_two_link_title_1') ?></a></li>
				<li><a href="<?php echo get_option('box_two_link2') ?>"><?php echo get_option('box_two_link_title_2') ?></a></li>
				<li><a href="<?php echo get_option('box_two_link3') ?>"><?php echo get_option('box_two_link_title_3') ?></a></li>
				<li><a href="<?php echo get_option('box_two_link4') ?>"><?php echo get_option('box_two_link_title_4') ?></a></li>
				<li><a href="<?php echo get_option('box_two_link5') ?>"><?php echo get_option('box_two_link_title_5') ?></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="gift-baby">
		<div class="col_3_gift-baby">
			<div class="baby-title">
				<h3 class="gift-box-title"><?php echo get_option('box_three_title');?></h3>
			</div>
			<div class="baby-photo">
				<img src="<?php echo get_option('box_three_photo')?>">
			</div>
			<div class="gift-list">
			<ul>
			<li><a href="<?php echo get_option('box_three_link1') ?>"><?php echo get_option('box_three_link_title_1') ?></a></li>
			<li><a href="<?php echo get_option('box_three_link2') ?>"><?php echo get_option('box_three_link_title_2') ?></a></li>
			<li><a href="<?php echo get_option('box_three_link3') ?>"><?php echo get_option('box_three_link_title_3') ?></a></li>
			<li><a href="<?php echo get_option('box_three_link4') ?>"><?php echo get_option('box_three_link_title_4') ?></a></li>
			<li><a href="<?php echo get_option('box_three_link5') ?>"><?php echo get_option('box_three_link_title_5') ?></a></li>
			</ul>
			</div>
		</div>
	</div>
	<div class="gift-occassions">
		<div class="col_4_gift-occassions">
			<div class="occassions-title">
				<h3 class="gift-box-title"><?php echo get_option('box_four_title');?></h3>
			</div>
			<div class="occassions-photo">
				<img src="<?php echo get_option('box_four_photo')?>">
			</div>
			<div class="gift-list">
				<ul>
			<li><a href="<?php echo get_option('box_four_link1') ?>"><?php echo get_option('box_four_link_title_1') ?></a></li>
			<li><a href="<?php echo get_option('box_four_link2') ?>"><?php echo get_option('box_four_link_title_2') ?></a></li>
			<li><a href="<?php echo get_option('box_four_link3') ?>"><?php echo get_option('box_four_link_title_3') ?></a></li>
			<li><a href="<?php echo get_option('box_four_link4') ?>"><?php echo get_option('box_four_link_title_4') ?></a></li>
			<li><a href="<?php echo get_option('box_four_link5') ?>"><?php echo get_option('box_four_link_title_5') ?></a></li>
				</ul>
			</div>
		</div>
	</div>

</div>

<div style="clear:both">&nbsp;</div>
<div id="upcoming-ticker">
	
	<?php upcoming_ticker();?>

</div>

<?php  wp_reset_query();?>
<div style="clear:both">&nbsp;</div>

<?php get_footer();?>