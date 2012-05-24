<?php
/**
 * Template name: Search
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); 
update_option('current_result', '');
update_option('current_sort', '');
?>

<div id="main-content">
<div id="cat-container">

	<div id="left-content" class="left-col">
		
		<?php 
		global $wp_query;
		
		if( is_search() ) {
						$args = array( 'posts_per_page' => 5 );
						$args = array_merge( $args, $wp_query->query );
						query_posts( $args );
			}?>
		
		<?php if ( have_posts() ) : ?>
				<h1 class="cat-h1"><?php printf( __( 'Search Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1><hr/>
		
			<ul class="listnav">
				<?php while ( have_posts() ) : the_post(); ?>
								<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
						         <p><?php the_excerpt(); ?></p>                 
					<?php endwhile;  ?>
			</ul>	
					<?php else : ?>
					<h1 class="cat-h1"><?php _e( 'Nothing Found', 'twentyten' ); ?></h1>
					
					<?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?>	
		
		<?php endif; ?>
		
	
		<div style="clear:both">&nbsp;</div>
		
		<center><?php include (TEMPLATEPATH . '/inc/pagination.php' ); ?></center>
		
		<div style="clear:both">&nbsp;</div>
		
	</div> <!-- End of left col-->

	<div id="cat-sidebar" class="right-sidebar">
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
</div> <!-- End of cat-container -->

<div style="clear:both">&nbsp;</div>
<div id="upcoming-ticker">
	<?php upcoming_ticker();?>
</div>
<div style="clear:both">&nbsp;</div>

<?php get_footer(); ?>