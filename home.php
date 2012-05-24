<?php 
/*Template name: Home*/
get_header();
global $post, $results_rec, $results_occ, $results_price;

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
	<?php
		
				global $wpdb;
				//Query for display all children for recipient category 
				$querystr = "SELECT $wpdb->term_taxonomy.term_id 
							FROM $wpdb->terms, $wpdb->term_taxonomy
							WHERE $wpdb->terms.name='Recipients'
							AND $wpdb->terms.term_id = $wpdb->term_taxonomy.parent
							";
				$result_rec = $wpdb->get_results($querystr);
				
				
				//Query for display all children for occasion category 
				$querystr = "SELECT $wpdb->term_taxonomy.term_id 
							FROM $wpdb->terms, $wpdb->term_taxonomy
							WHERE $wpdb->terms.name='Occasions'
							AND $wpdb->terms.term_id = $wpdb->term_taxonomy.parent
							";
				$result_occasion = $wpdb->get_results($querystr);
				

				
	?>
	
	
	<div class="select-one">
	<form method="post" id="searrec" action="">
		<select name="selectionRecipient" id="selectionRecipient" onChange="this.form.submit();"> 
		  			
		  			<?php 
		  				$results_rec = get_option('current_recipient');
		  				if(isset($_POST['selectionRecipient'])){
		  					$results_rec = $_POST['selectionRecipient'];
		  					update_option('current_recipient', $results_rec);
		  					$results_rec = get_option('current_recipient');
		  					 
		  				}
		  			?>
		  
	<option <?php if($results_rec=='Any Recipient'){ echo 'selected="selected"';}?> value="Any Recipient" >Any Recipient</option>
		  	<?php foreach($result_rec as $rec):
					$t_id = $rec->term_id;
					$term = get_term($t_id , 'category' );
					$t_name = $term->name;?>
<option <?php 
		if($results_rec==$t_name){ echo 'selected="selected"';}?>value="<?php echo $t_name;?>"><?php echo $t_name;?></option>
		  <?php endforeach;?>
		  </select>	
		<input type="hidden" id="submitrec" value="Search" />	
		</form>	
	</div>
	
	<?//php echo $results_rec;?>
	
	
	<div class="select-one">
	<form method="post" id="searoccasion" action="">
		<select name="selectionOccasion" class="occassion" onChange="this.form.submit();"> 
		  			
		  			<?php 
		  				$results_occ = get_option('current_occasion');
		  				if(isset($_POST['selectionOccasion'])){
		  					$results_occ = $_POST['selectionOccasion'];
		  					update_option('current_occasion', $results_occ);
							$results_occ = get_option('current_occasion');
		  				}
		  			?>
		  	
		  	<?php if($results_rec=='Men'):?>
		  		 	
		  					<?//php $results_men = $_POST['selectionOccasion'];?>
		  					
		  			<option 
		  			<?php if($results_occ=='Anniversary Gifts for Men'){ echo 'selected="selected"';}?>value="Anniversary Gifts for Men">Anniversary Gifts for Men</option>
		  			<option 
		  			<?php if($results_occ=='1st Anniversary Gifts'){ echo 'selected="selected"';}?>value="1st Anniversary Gifts">1st Anniversary Gifts</option>
		  			<option 
		  			<?php if($results_occ=='2nd Anniversary Gifts'){ echo 'selected="selected"';}?>value="2nd Anniversary Gifts">2nd Anniversary Gifts</option>
		  			<option 
		  			<?php if($results_occ=='Wedding Anniversary Gifts'){ echo 'selected="selected"';}?>value="Wedding Anniversary Gifts">Wedding Anniversary Gifts</option>
		  			<option 
		  			<?php if($results_occ=='Birthday Gifts for Men'){ echo 'selected="selected"';}?>value="Birthday Gifts for Men">Birthday Gifts for Men</option>
		  			<option 
		  			<?php if($results_occ=='30th Birthday Gifts'){ echo 'selected="selected"';}?>value="30th Birthday Gifts">30th Birthday Gifts</option>
		  			<option 
		  			<?php if($results_occ=='40th birthday gifts'){ echo 'selected="selected"';}?>value="40th birthday gifts">40th birthday gifts</option>
		  			<option 
		  			<?php if($results_occ=='50th Birthday Gifts'){ echo 'selected="selected"';}?>value="50th Birthday Gifts">50th Birthday Gifts</option>
		  			<option 
		  			<?php if($results_occ=='Housewarming Gifts'){ echo 'selected="selected"';}?>value="Housewarming Gifts">Housewarming Gifts</option>
		  			<option 
		  			<?php if($results_occ=='Retirement Gifts for Men'){ echo 'selected="selected"';}?>value="Retirement Gifts for Men">Retirement Gifts for Men</option>
		  	
		  	<?php elseif($results_rec=='Women'):?>
		  			
		  			<?//php $results_women = $_POST['selectionOccasion'];?>
		  			
		  			<option 
		  			<?php if($results_occ=='Anniversary Gifts for Women'){ echo 'selected="selected"';}?>value="Anniversary Gifts for Women">Anniversary Gifts for Women</option>
		  			<option 
		  			<?php if($results_occ=='1st Anniversary Gifts'){ echo 'selected="selected"';}?>value="1st Anniversary Gifts">1st Anniversary Gifts</option>
		  			<option 
		  			<?php if($results_occ=='2nd Anniversary Gifts'){ echo 'selected="selected"';}?>value="2nd Anniversary Gifts">2nd Anniversary Gifts</option>
		  			<option 
		  			<?php if($results_occ=='Wedding Anniversary Gifts'){ echo 'selected="selected"';}?>value="Wedding Anniversary Gifts">Wedding Anniversary Gifts</option>
		  			<option 
		  			<?php if($results_occ=='Birthday Gifts for Women'){ echo 'selected="selected"';}?>value="Birthday Gifts for Women">Birthday Gifts for Women</option>
		  			<option 
		  			<?php if($results_occ=='30th Birthday Gifts'){ echo 'selected="selected"';}?>value="30th Birthday Gifts">30th Birthday Gifts</option>
		  			<option 
		  			<?php if($results_occ=='40th birthday gifts'){ echo 'selected="selected"';}?>value="40th birthday gifts">40th birthday gifts</option>
		  			<option 
		  			<?php if($results_occ=='50th Birthday Gifts'){ echo 'selected="selected"';}?>value="50th Birthday Gifts">50th Birthday Gifts</option>
		  			<option 
		  			<?php if($results_occ=='Housewarming Gifts'){ echo 'selected="selected"';}?>value="Housewarming Gifts">Housewarming Gifts</option>
		  			<option 
		  			<?php if($results_occ=='Bridal Shower Gifts'){ echo 'selected="selected"';}?>value="Bridal Shower Gifts">Bridal Shower Gifts</option>
		  			<option 
		  			<?php if($results_occ=='Retirement Gifts for Women'){ echo 'selected="selected"';}?>value="Retirement Gifts for Women">Retirement Gifts for Women</option>
		  				  			
		  	<?php else:?>
		  		<option <?php 
		  		if($results_occ=='Any Occasion'){ echo 'selected="selected"';}?> value="Any Occassion" >Any Occassion</option>
				  	<?php foreach($result_occasion as $occ):
							$t_id = $occ->term_id;
							$term = get_term($t_id , 'category' );
							$t_name = $term->name;?>
				  	<option 
				  	<?php if($results_occ==$t_name){ echo 'selected="selected"';}?>value="<?php echo $t_name;?>"value="<?php echo $t_name;?>"><?php echo $t_name;?></option>
				  <?php endforeach;?>
		  	
		  <?php endif;?>
		  
		</select>
		<input type="hidden" id="submitoccasion" value="Search" />	
	</form>
	</div>
	<?//php echo $results_occ;?>
	
		
	<div class="select-one">
	<form method="post" id="searprice" action="">
		<select name="selectionPrice" class="price" onChange="this.form.submit();"> 
						
						<?php 
		  				$results_price = get_option('current_price');
		  				if(isset($_POST['selectionPrice'])){
		  					$results_price = $_POST['selectionPrice'];
		  					update_option('current_price', $results_price);
		  					$results_price = get_option('current_price');
		  				}
		  			?>
		
		
		  <option <?php if($results_price=='Any Price'){ echo 'selected="selected"';}?> value="Any Price" >Any Price</option>
		  <option <?php if($results_price=='50'){ echo 'selected="selected"';}?> value="50" >0-50</option>
		  <option <?php if($results_price=='100'){ echo 'selected="selected"';}?>value="100" >50-100</option>
		  <option <?php if($results_price=='150'){ echo 'selected="selected"';}?>value="150" >100-150</option>
		  <option <?php if($results_price=='200'){ echo 'selected="selected"';}?> value="200" >150-200</option>
		  <option <?php if($results_price=='250'){ echo 'selected="selected"';}?> value="250" >200-250</option>
		  <option <?php if($results_price=='300'){ echo 'selected="selected"';}?> value="300" >250-300</option>
		  <option <?php if($results_price=='350'){ echo 'selected="selected"';}?> value="350" >300-350</option>
		  <option <?php if($results_price=='400'){ echo 'selected="selected"';}?> value="400" >350-400</option>
		  <option <?php if($results_price=='450'){ echo 'selected="selected"';}?> value="450" >400-450</option>
		  <option <?php if($results_price=='500'){ echo 'selected="selected"';}?> value="500" >450-500</option>
		</select>
		<input type="hidden" id="submitprice" value="Search" />
		</form>
	</div>
		
		<input type="submit" id="submit" value="Search" />	
		
</div>
	
	<?//php echo $results_rec;?>
	<?//php echo $results_occ;?>
	<?//php echo $results_price;?>
	
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