<?php
get_header();
global $results_rec, $results_occ, $results_price;
update_option('current_result', '');
update_option('current_sort', '');
?>
<div id="main-content">
<div id="cat-container">

<div id="left-content" class="left-col">

<?php if(is_page('giftfinder')){
	
	/*
$results_rec = get_option('current_recipient');
	echo $results_rec;
	$results_occ = get_option('current_occasion');
	echo $results_occ;
	$results_price = get_option('current_price');
	echo $results_price;
*/

					
		  					//$results_rec = $_GET['selectionRecipient'];
		  					//update_option('current_recipient', $results_rec);
		  					$results_rec = get_option('current_recipient');
		  					
		  					echo $results_rec;
		  					
		  					//$results_occ = $_GET['selectionOccasion'];
		  					//update_option('current_occasion', $results_occ);
							$results_occ = get_option('current_occasion');
							
							echo $results_occ;
							
							//$results_price = $_GET['selectionPrice'];
		  					//update_option('current_price', $results_price);
		  					$results_price = get_option('current_price');
		  					
		  					echo $results_price;
		  				

}else{?>


		<?php 
			while ( have_posts() ) : the_post(); ?>
			
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

<?php endwhile;  ?>	

<?php }?>
<div style="clear:both">&nbsp;</div>
</div> <!-- End of left col-->


<div id="cat-sidebar" class="right-sidebar">	
			
			<div class="cat-title">
				<div>
					<span class="cat-heading">Sponsored Links</span>
				</div>
			</div>
			
			
			<div style="clear:both">&nbsp;</div>
			 
			
			<div class="cat-upper-page">		
		 		<div class="cat-inner">	
						
								<?php if ( is_active_sidebar( 'page_sidebar' ) ) : ?>
									<?php dynamic_sidebar( 'page_sidebar' ); ?>
								<?php else: ?>
									<?php // ?>
								<?php endif;?>
									
				</div>	
			</div> <!-- End cat upper-page-->		
			

</div>


<div style="clear:both">&nbsp;</div>
<div id="upcoming-ticker">
	<?php upcoming_ticker();?>
</div>
<div style="clear:both">&nbsp;</div>

<?php get_footer();
?>

