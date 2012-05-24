<div id="footer-container">
	
	<div class="footer-inner">
		<div class="footer_col_1">
			<h4><?php echo get_option('footer_title_1'); ?></h4>
			<p>
				<?php echo get_option('footer_descr_1'); ?>
			</p>
		</div>
	
		<!--
<div class="footer_col_2">
			
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Contact Us</a></li>
					<li><a href="#">Coupons</a></li>
					<li><a href="#">Privacy Policy</a></li>
				</ul>
		</div>
-->			
				<div class="footer_col_2">
						<h4>Links</h4>
						<?php wp_nav_menu( array( 
        						'theme_location' => 'Secondary', 
        						'menu_id' => '', 
        						'menu_class' => '', 
        						'container_id' =>'',
        						'container_class' =>''
        					));?> 
		
				</div>
		
		
		<div class="footer_col_3">
			<h4>Sign up our newsletter</h4>
			<p>Receive updates and news on the latest gifts!</p>
				<!--
<form>
					<input type=text id="newsletter" placeholder="email address">
					<input type="button"id="newsletter-button" value="Submit">
				</form>
-->		

		<?php echo do_shortcode( '[contact-form-7 id="277" title="newsletter"]' ); ?>
		</div>
		
		
		
		
	</div>
	
</div>

<small>Gift Ideas & Items provides great gift ideas for love ones. © 2012 giftideasitems.com. All rights reserved. </small>
</div> <!-- End of main-content-->


</div></div></div> <!-- End of wrapper, wrapper-container, wrapper-inner -->
 <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fab94974df927e0"></script>
 <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f9d4553386c391b"></script>

<?php wp_footer();?>
</body>
</html>