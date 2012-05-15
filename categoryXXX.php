<?php
get_header();
?>

<div id="main-content">


<div id="cat-container">
<?php global $wp_query;?>

<?php if (have_posts()) : ?>
<div id="cat-sidebar" class="left-sidebar">
				
		<!-- Get the ID of current category page and list all its children-->
		<?//php $cur_cat_id = get_cat_id( single_cat_title("",false) ); ?>
		<?//php wp_list_categories('orderby=id&depth=1&hierarchical=1&title_li=&include='.$cur_cat_id.''); ?> 
		
		
		

		
	
							
				
			
</div>

<div id="right-content" class="right-col">
			
			<?php if (is_category()) { ?>
				<!-- Category Title-->
				<h1 class="archive"><?php single_cat_title(); ?></h1>
			<?php } ?>
			
			<!-- Social Icons-->
			
			
						
<div style="clear:both">&nbsp;</div>			
			
			<!-- Product pagination-->
			<div class="product-pagination">
				
										
										
					
					<div style="clear:both">&nbsp;</div>
					
					
					
					
					
					<div class="pagination-numeric">
						<div class="total-results-col">
							
						</div>
						
						<div class="pagination-col">
							
						</div>
					</div>
				
			</div>
			<div style="clear:both">&nbsp;</div>
			<!-- For products display-->
			
			
				<?php while ( have_posts() ) : the_post(); ?>
					
					<div class="product-box">
						
						<ul class="product-list">
							<?php if(has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink();?>" title=""><?php the_post_thumbnail('product-thumbnail'); ?></a>
							<?php }else{ ?>
							<img src="<?php bloginfo('template_url');?>/images/no-image.jpg" width="150" height="150" alt="no-image">
							<?php } ?>
							
							<li class="p-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
							<li class="p-descr">description ssfksjfksj sfsfsjfkls fskjfksj skfjskjfks</li>
							<li class="p-price"><?php echo get_post_meta($post->ID, "prod_price", true); ?></li>
						</ul>
						
					</div>
					
				
				
	
	
			<?php endwhile;  ?>
			<?php else : ?><h1>Currently There are no posts available!</h1><?php endif; ?>
</div>

</div>
<?php include (TEMPLATEPATH . '/inc/pagination.php' ); ?>

<?php wp_reset_query();?>






<div style="clear:both">&nbsp;</div>
<div id="upcoming-ticker">
	<?php upcoming_ticker();?>
</div>
<div style="clear:both">&nbsp;</div>
<?php get_footer();?>