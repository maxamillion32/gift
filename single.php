<?php
get_header();
update_option('current_result', '');
update_option('current_sort', '');
global $wp_query, $post;
?>
<div id="main-content">
<div id="cat-container">

<div id="left-content" class="left-col">
	
	<?php 
	while ( have_posts() ) : the_post(); 
		
	$cur_post_id = $post->ID;
	//echo $cur_post_id; 
	$cat_array = get_the_category($cur_post_id);
	$cur_cat_id = $cat_array[0]->cat_ID;
	//echo $cur_cat_id;
	
	?>	
			
			<h1 class="cat-h1"><?php the_title(); ?></h1>
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

			<div class="post-descr">
				<div>
					<?php the_content();?>
				</div>
					
			</div>
			
			<!-- Category image-->
			<div class="post-img-item">
			
				<?php if(has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink();?>" title=""><?php the_post_thumbnail('product-featured-image'); ?></a>
				<?php }else{ ?>
				<img src="<?php bloginfo('template_url');?>/images/no-image.jpg" width="250" height="250" alt="no-image">
				<?php } ?>
			
			</div>
				
			<div style="clear:both">&nbsp;</div>	
			<?php
				$store_term_name = get_the_term_list($post->ID, 'store', '', ', ','');
				$mycat = get_term_by('slug', $store_term_name, 'store');
		    	$term_id = $mycat->term_id;
			?>
			
			
			<div class="store-col">
				<p class="store-title">Store:</p>
				<?php
					// URL Cloaking code here
					$site_addr = get_option('siteurl');
					$addr = strip_tags($store_term_name);
					$go = "go";
					$my_site = $site_addr ."&#47;" .$go ."&#47;" .$addr;
				?>	
				
				
				<a href="<?php echo $my_site?>" onclick="parent.location.href='<?php echo get_metadata('store', $term_id, 'store_url', true); ?>';
return event.returnValue=false"><img src="<?php echo get_metadata('store', $term_id, 'category_photo', true); ?>" alt=""/></a>
			</div>
			<div class="promo-col">
				<p class="promo-item">Promotion Code:</p>
				<span class="promo-code-item"><?php echo get_metadata('store', $term_id, 'store_promo', true); ?></span>
			</div>
			<div class="price-col">
				<p class="price-item"><?php echo '&#36;'.get_post_meta($post->ID, "prod_price", true).'' ?></p>
				<a href="#"><img src="<?php bloginfo('template_url');?>/images/view-details.png" width="125" height="35" alt=""/></a>
			</div>				
			
<?php endwhile;  ?>	

				
				<!-- Display 4 top picks randomly from current category -->
				<?php 
						$cat_term_id =  getCurrentCatID(); // get current category ID
						$cat_term = get_term( $cat_term_id, 'category' );	
					
						$args = array(
						   		'post_type' => 'post',
						   		'posts_per_page' => 4,
						   		'meta_key' => 'prod_picks',
						   		'meta_value' =>'Y',
						   		'term_id' => $cat_term_id,
						   		'orderby' => rand
						   		
						   	);
							query_posts($args); 
				
					?>
<div style="clear:both">&nbsp;</div>
<div class="border-top"></div>	
					<h3 class="edit-h3">Editor's Picks</h3>
					<?php while ( have_posts() ) : the_post(); ?>
					
						<div class="product-box-single">
							<ul class="product-list">
							<?php if(has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink();?>" title=""><?php the_post_thumbnail('product-thumbnail'); ?></a>
							<?php }else{ ?>
							<img src="<?php bloginfo('template_url');?>/images/no-image.jpg" width="150" height="150" alt="no-image">
							<?php } ?>
							
							<li class="p-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
							<li class="p-descr"><?php echo get_post_meta($post->ID, "prod_desc", true); ?></li>
						</ul>
						</div>
							
				<?php endwhile;  
				wp_reset_query();?>	
<div class="border-bottom"></div>

			<div class="goolge-adsense-one">	
				<?php if ( is_active_sidebar( 'item_google_adsense_sidebar_one' ) ) : ?>
						<?php dynamic_sidebar( 'item_google_adsense_sidebar_one' ); ?>
							<?php else: ?>
						<img src="<?php bloginfo('template_url');?>/images/item-ad.gif" width="312" height="282" alt="default google adsense one">
				<?php endif;?>
			</div>
				
			<div class="goolge-adsense-two">	
				<?php if ( is_active_sidebar( 'item_google_adsense_sidebar_two' ) ) : ?>
						<?php dynamic_sidebar( 'item_google_adsense_sidebar_two' ); ?>
							<?php else: ?>
						<img src="<?php bloginfo('template_url');?>/images/item-ad.gif" width="312" height="282" alt="default google adsense two">
				<?php endif;?>
			</div>	

<div style="clear:both">&nbsp;</div>


</div><!-- End left side-->



<div id="cat-sidebar" class="right-sidebar">	
			
			<div class="cat-title">
				<div>
					<span class="cat-heading">More Related Gifts</span>
				</div>
			</div>
			
			
			<div style="clear:both">&nbsp;</div>
			 
			
			<div class="cat-upper">		
		 		<div class="cat-inner">	
				<!-- 
						Display 10 related items from current store and current category 
				-->
				<?php 
						$cat_term_id =  getCurrentCatID(); // get current category ID
						$cat_term = get_term( $cat_term_id, 'category' );	
					
						$args = array(
									'tax_query' => array(
										array(
											'taxonomy' => 'store',
											'field' => 'slug',
											'terms' => $mycat
										)
									),
									'post_type' => 'post'
								);	
						
						$args =  array_merge( $args,
							array(
						   		'post_type' => 'post',
						   		'posts_per_page' => 10,
						   		//'term_id' => $cat_term_id
						   		'cat' => $cur_cat_id,
						   		'post__not_in' => array($cur_post_id)
						   		
						   	));
							query_posts($args);?>
				
				
				
		<?php while ( have_posts() ) : the_post(); 
			
			?>
			<div class="related-prd-thumb">
							
			<?php if(has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink();?>" title=""><?php the_post_thumbnail('sidebar-product-thumbnail'); ?></a>
			<?php }else{ ?>
				<img src="<?php bloginfo('template_url');?>/images/no-image.jpg" width="80" height="80" alt="no-image">
			<?php } ?>
							
			</div>				
			<div class="related-prd-title">	
				<a href="<?php the_permalink();?>" title=""><?php the_title();?></a>
			</div>
			
			<div style="clear:both">&nbsp;</div>
			<div class="border-bottom"></div>
			<div style="clear:both">&nbsp;</div>
							
				<?php endwhile;  
				wp_reset_query();?>	

			
				
				
				
				</div>	
			</div> <!-- End cat upper-->		
			
</div>

<div style="clear:both">&nbsp;</div>
<div id="upcoming-ticker">
	<?php upcoming_ticker();?>
</div>
<div style="clear:both">&nbsp;</div>

<?php get_footer();
?>