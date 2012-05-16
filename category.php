<?php
get_header();
?>

<div id="main-content">


<div id="cat-container">
<?php if (is_category()) { global $wp_query, $sort, $results, $paged;
$ribbon=0;
?>

<div id="cat-sidebar" class="left-sidebar">	
	
	<div class="cat-title"></div>
	
	
	<div style="clear:both">&nbsp;</div>
	 
	
	<div class="cat-upper">		
 		<div class="cat-inner">	
		
		<?php
    		if (is_category()) {
   				 $this_category = get_category($cat);
   			 }
    	?>
    	<?php
		  	  if($this_category->category_parent){
		  	  	//echo "child";
		  	  		//echo get_category_parents( get_query_var('cat') , true , '<li>' );
		    		$this_category = wp_list_categories('orderby=id&hide_empty=0
		    		&title_li=&use_desc_for_title=1&child_of='.$this_category->category_parent."&echo=0"); 
		    		
		    		if($this_category){?>
		    			<ul>
		    				<?php echo $this_category; ?>
		    			</ul>			
		    		<?php } 
		    		
		     }else{
		     	//echo "parent";
		     	//echo get_category_parents( get_query_var('cat') , true , '' );
		    	$this_category = wp_list_categories('orderby=id&hide_empty=0
		    	&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID."&echo=0");
		    	if($this_category){?>
		    			<ul>
		    				<?php echo $this_category; ?>
		    			</ul>			
		    		<?php } 
		    }?>


<?php } ?>		
		
		<div style="clear:both">&nbsp;</div>
			
				<?php if ( is_active_sidebar( 'category_sidebar' ) ) : ?>
						<?php dynamic_sidebar( 'category_sidebar' ); ?>
				<?php else: ?>
					<img src="<?php bloginfo('template_url');?>/images/160x600.jpg" alt="" />
				<?php endif;?>
			
							
		</div>	
	</div> <!-- End cat upper-->		
			
</div>

<div id="right-content" class="right-col">
			
			<!-- Category Title-->
			<h1 class="cat-h1"><?php single_cat_title(); ?></h1>
			<!-- Social Icons-->
			
			<div class="cat-social-icons">
				
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox_top addthis_default_style ">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			
			</div>
			
			<div style="clear:both">&nbsp;</div>
			
			<!-- Category descriptions-->	
			<div class="cat-descr">
					<?php $term_id =  getCurrentCatID(); // get current category ID
						$term = get_term( $term_id, 'category' ); 
						$desc = $term->description;
				
						echo '<p>'.$desc.'</p>'; ?>
			</div>
			
			<!-- Category image-->
			<div class="cat-img">
			
				<?php $tag_extra_fields = get_option('gift_category_fields_option'); ?>
				<img src="<?php echo $tag_extra_fields[$term_id]['cat_img']; ?>" />
			
			</div>
			
<div style="clear:both">&nbsp;</div>			
			
			<!-- Product pagination-->
			<div class="product-pagination">
				
					<div class="results">
						<form name="prd-qry" method="post" action="">
								<div class="show-col">
									
										<span class="show">Show</span>
										<select name="showresults" id="showresults" onChange="this.form.submit();"> 
										
										<?php
										$results = get_option('current_result', $results);
											if(isset($_POST['showresults'])){
												$results = $_POST['showresults'];
												update_option('current_result', $results);
												$results = get_option('current_result', $results);
												echo $results;
											}
										?>
										
				  <option <?php if($results=='3'){ echo 'selected="selected"';}?> value="3">3 Results</option>
				  <option <?php if($results=='4'){ echo 'selected="selected"';}?> value="4">4 Results</option>
				  <option <?php if($results=='5'){ echo 'selected="selected"';}?>value="5">5 Results</option>
				  <option <?php if($results=='6'){ echo 'selected="selected"';}?>value="6">6 Results</option>
				  <option <?php if($results=='12'){ echo 'selected="selected"';}?>value="12">12 Results</option>
										</select>
								</div>
								
								<div class="sort-col">
										<span class="show">Sort By</span>
										<select name="sort" id="sort" onChange="this.form.submit();">
									
									<?php 
										
									
										$sort = get_option('current_sort', $sort); 
										
										if (isset($_POST['sort'])){
											$sort = $_POST['sort'];
											update_option('current_sort', $sort);
											$sort = get_option('current_sort', $sort);
											echo "sort: '.$sort.'";
											$paged=0;
				
										}
									
									?>
			<option <?php if($sort=='prod_popularity'){ echo 'selected="selected"';}?>value="prod_popularity">Popularity</option>
			<option <?php if($sort=='prod_picks'){ echo 'selected="selected"';}?> value="prod_picks">Top Picks</option>
			<option <?php if($sort=='new'){ echo 'selected="selected"';}?> value="new">Newest First</option>
			<option <?php if($sort=='high'){ echo 'selected="selected"';}?> value="high">Highest Price</option>
			<option <?php if($sort=='low'){ echo 'selected="selected"';}?> value="low">Lowest Price</option>
										</select>
								</div>
							<input type="hidden" value="Go" id="cat-submit">
						</form>
					</div>
					
					
										
					
					<div style="clear:both">&nbsp;</div>
					
					<!-- Query Area-->
					<?php					
		//if(isset($sort)):			
				$sort = get_option('current_sort', $sort);
				$results = get_option('current_result', $results);		
						if($sort=='high'){
						//echo "high";
							$args = array_merge( $wp_query->query, 
							array(
						   		'post_type' => 'post',
						   		'posts_per_page' => $results,
						   		'meta_key' => 'prod_price',
						   		'orderby' => 'meta_value_num',
						   		'order' => 'DESC',
						   		'paged' => $paged
						   	));
							query_posts($args);
							
					 }elseif($sort=='low'){
					 //echo "low";
					 	$args =  array_merge( $wp_query->query,
							array(
						   		'post_type' => 'post',
						   		'posts_per_page' => $results,
						   		'meta_key' => 'prod_price',
						   		'orderby' => 'meta_value_num',
						   		'order' => 'ASC',
						   		'paged' => $paged
						   	));
							query_posts($args);
					 
					 }elseif($sort=='prod_picks'){
					 	//echo "picks";
					 	$ribbon=1;
					 	$args =  array_merge( $wp_query->query,
							array(
						   		'post_type' => 'post',
						   		'posts_per_page' => $results,
						   		'meta_key' => $sort,
						   		'meta_value' =>'Y',
						   		'orderby' => 'meta_value',
						   		'paged' => $paged
						   	));
							query_posts($args);
					 
					 }elseif($sort=='prod_popularity'){
					 //echo "pop";
					 	$args =  array_merge( $wp_query->query,
							array(
						   		'post_type' => 'post',
						   		'posts_per_page' => $results,
						   		'meta_key' => $sort,
						   		'orderby' => 'meta_value_num',
						   		'order' => 'DESC',
						   		'paged' => $paged
						   	));
							query_posts($args);
					 
					 }else{
					 	
					 	//echo "default";
					 	//$results = 3; // initially only 12 porducts will be displayed. Change 3 to 12. and sort by newest.
						$args = array_merge( $wp_query->query, 
							array(
						   		'post_type' => 'post',
						   		'posts_per_page' => $results,
						   		'paged' => $paged
						   	));
						query_posts($args);
			 		}?>
					
	<?//php endif;?>				
					<div class="pagination-numeric">
						<div class="total-results-col">
							<?php $myCount = $wp_query->found_posts;?>
							<?php echo '<span class="total-gifts">'.$myCount.' Gifts items Found </span>';?>
						</div>
						
						<div class="pagination-col">
							<?php include (TEMPLATEPATH . '/inc/pagination.php' ); ?>
						</div>
					</div>
				
			</div>
			<div style="clear:both">&nbsp;</div>
			<!-- For products display-->
			
			<?php if (have_posts()) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php if($ribbon==1):?>
					<div><span class="ribbon-area"></span></div>
					<div class="product-box">
						
						<ul class="product-list">
							<?php if(has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink();?>" title=""><?php the_post_thumbnail('product-thumbnail'); ?></a>
							<?php }else{ ?>
							<img src="<?php bloginfo('template_url');?>/images/no-image.jpg" width="150" height="150" alt="no-image">
							<?php } ?>
							
							<li class="p-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
							<li class="p-descr"><?php echo get_post_meta($post->ID, "prod_desc", true); ?></li>
							<li class="p-price"><?php echo '&#36;'.get_post_meta($post->ID, "prod_price", true).'' ?></li>
						</ul>
						
					</div>
					<?php else:?>
					
					
					<?php $ribbon_data = get_post_meta($post->ID, "prod_picks", true); ?>
					<?php if($ribbon_data=='Y'){?>
					
					<!-- <div><span class="ribbon-area"></span></div> -->
					<div class="product-box">

						<div><span class="ribbon-area-one"></span></div>				
						<ul class="product-list">
							<?php if(has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink();?>" title=""><?php the_post_thumbnail('product-thumbnail'); ?></a>
							<?php }else{ ?>
							<img src="<?php bloginfo('template_url');?>/images/no-image.jpg" width="150" height="150" alt="no-image">
							<?php } ?>
							
							<li class="p-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
							<li class="p-descr"><?php echo get_post_meta($post->ID, "prod_desc", true); ?></li>
							<li class="p-price"><?php echo '&#36;'.get_post_meta($post->ID, "prod_price", true).'' ?></li>
						</ul>
						
					</div>
					<?php } else { ?>
							
					<div class="product-box">					
						<ul class="product-list">
							<?php if(has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink();?>" title=""><?php the_post_thumbnail('product-thumbnail'); ?></a>
							<?php }else{ ?>
							<img src="<?php bloginfo('template_url');?>/images/no-image.jpg" width="150" height="150" alt="no-image">
							<?php } ?>
							
							<li class="p-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
							<li class="p-descr"><?php echo get_post_meta($post->ID, "prod_desc", true); ?></li>
							<li class="p-price"><?php echo '&#36;'.get_post_meta($post->ID, "prod_price", true).'' ?></li>
						</ul>
						
					</div>
										
					<?php };?>
				<?php endif;?>
				
				
	
	
			<?php endwhile;  ?>
			<?php else : ?><h1>Currently There are no posts available!</h1><?php endif; ?>
</div>

</div>

<?php wp_reset_query();?>






<div style="clear:both">&nbsp;</div>
<div id="upcoming-ticker">
	<?php upcoming_ticker();?>
</div>
<div style="clear:both">&nbsp;</div>
<?php get_footer();?>