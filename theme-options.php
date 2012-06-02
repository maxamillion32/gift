<?php
// create custom plugin settings menu
add_action('admin_menu', 'baw_create_menu');

function baw_create_menu() {

	//create new top-level menu
	add_menu_page('Theme Plugin Settings', 'Gift Ideas Settings', 'administrator', __FILE__, 'baw_settings_page');

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}

// responsible for changing the button name from settings option

function register_mysettings() {
	//register our settings
	register_setting( 'baw-settings-group', 'choice_cat' );
	register_setting( 'baw-settings-group', 'choice_cat_title' );
	
	register_setting( 'baw-settings-group', 'rss_link' );
	register_setting( 'baw-settings-group', 'twt_link' );
	register_setting( 'baw-settings-group', 'gplus_link' );
	
	register_setting( 'baw-settings-group', 'find_gifts_link' );
	
	register_setting( 'baw-settings-group', 'box_one_title' );
	register_setting( 'baw-settings-group', 'box_one_photo' );
	register_setting( 'baw-settings-group', 'box_one_link1' );
	register_setting( 'baw-settings-group', 'box_one_link_title_1' );
	register_setting( 'baw-settings-group', 'box_one_link2' );
	register_setting( 'baw-settings-group', 'box_one_link_title_2' );
	register_setting( 'baw-settings-group', 'box_one_link3' );
	register_setting( 'baw-settings-group', 'box_one_link_title_3' );
	register_setting( 'baw-settings-group', 'box_one_link4' );
	register_setting( 'baw-settings-group', 'box_one_link_title_4' );
	register_setting( 'baw-settings-group', 'box_one_link5' );
	register_setting( 'baw-settings-group', 'box_one_link_title_5' );
	
	register_setting( 'baw-settings-group', 'box_two_title' );
	register_setting( 'baw-settings-group', 'box_two_photo' );
	register_setting( 'baw-settings-group', 'box_two_link1' );
	register_setting( 'baw-settings-group', 'box_two_link_title_1' );
	register_setting( 'baw-settings-group', 'box_two_link2' );
	register_setting( 'baw-settings-group', 'box_two_link_title_2' );
	register_setting( 'baw-settings-group', 'box_two_link3' );
	register_setting( 'baw-settings-group', 'box_two_link_title_3' );
	register_setting( 'baw-settings-group', 'box_two_link4' );
	register_setting( 'baw-settings-group', 'box_two_link_title_4' );
	register_setting( 'baw-settings-group', 'box_two_link5' );
	register_setting( 'baw-settings-group', 'box_two_link_title_5' );
	
	register_setting( 'baw-settings-group', 'box_three_title' );
	register_setting( 'baw-settings-group', 'box_three_photo' );
	register_setting( 'baw-settings-group', 'box_three_link1' );
	register_setting( 'baw-settings-group', 'box_three_link_title_1' );
	register_setting( 'baw-settings-group', 'box_three_link2' );
	register_setting( 'baw-settings-group', 'box_three_link_title_2' );
	register_setting( 'baw-settings-group', 'box_three_link3' );
	register_setting( 'baw-settings-group', 'box_three_link_title_3' );
	register_setting( 'baw-settings-group', 'box_three_link4' );
	register_setting( 'baw-settings-group', 'box_three_link_title_4' );
	register_setting( 'baw-settings-group', 'box_three_link5' );
	register_setting( 'baw-settings-group', 'box_three_link_title_5' );
	
	register_setting( 'baw-settings-group', 'box_four_title' );
	register_setting( 'baw-settings-group', 'box_four_photo' );
	register_setting( 'baw-settings-group', 'box_four_link1' );
	register_setting( 'baw-settings-group', 'box_four_link_title_1' );
	register_setting( 'baw-settings-group', 'box_four_link2' );
	register_setting( 'baw-settings-group', 'box_four_link_title_2' );
	register_setting( 'baw-settings-group', 'box_four_link3' );
	register_setting( 'baw-settings-group', 'box_four_link_title_3' );
	register_setting( 'baw-settings-group', 'box_four_link4' );
	register_setting( 'baw-settings-group', 'box_four_link_title_4' );
	register_setting( 'baw-settings-group', 'box_four_link5' );
	register_setting( 'baw-settings-group', 'box_four_link_title_5' );
	
	
	register_setting( 'baw-settings-group', 'footer_title_1' );
	register_setting( 'baw-settings-group', 'footer_descr_1' );
}


function baw_settings_page() {
?>

<h1>Gift Ideas Settings</h1>
<div class="wrap">
<form class="form" method="post" action="options.php">
<h2 class="section-title">Select top picks category</h2>

    <?php settings_fields( 'baw-settings-group' ); ?>    
    
    <p>
    	<label for="fb">Top picks title</label> 
    	<input type="text" name="choice_cat_title" class="choice_cat_title" value="<?php echo get_option('choice_cat_title'); ?>" />
    </p>
    
    
    <p>
    	<label for="twt">Top picks Category</label>
    	<input type="text" name="choice_cat" class="choice_cat" value="<?php echo get_option('choice_cat'); ?>" /> 
    	<p class="description">Please select those category where they have at least 5 top picks product.</p> 
    </p>   
    
	<p class="submit">
    	<input type="submit" class="button-primary" value="Save Changes" />
    </p>    

<div style="clear:both">&nbsp;</div>
<h2 class="section-title">Social media links</h2>
	<p>
    	<label for="rss">RSS</label> 
    	<input type="text" name="rss_link" class="choice_cat_title" value="<?php echo get_option('rss_link'); ?>" />
    </p>
    
    
    <p>
    	<label for="twt">Twitter</label>
    	<input type="text" name="twt_link" class="choice_cat" value="<?php echo get_option('twt_link'); ?>" /> 
    	 
    </p>
    
    <p>
    	<label for="twt">Google plus</label>
    	<input type="text" name="gplus_link" class="choice_cat" value="<?php echo get_option('gplus_link'); ?>" /> 
    	 
    </p>   
    
	<p class="submit">
    	<input type="submit" class="button-primary" value="Save Changes" />
    </p>  



<div style="clear:both">&nbsp;</div>
<h2 class="section-title">Find Gifts URL</h2>
	<p>
    	<label for="rss">Find gifts Link</label> 
    <input type="text" name="find_gifts_link" class="choice_cat_title" value="<?php echo get_option('find_gifts_link'); ?>" />
    </p>
    
    <p class="submit">
    	<input type="submit" class="button-primary" value="Save Changes" />
    </p>
    
    
    
    
    
    
    
    
<div style="clear:both">&nbsp;</div>
<h2 class="section-title">4 Box's in home page</h2><hr>

	
	<h3 class="box-number">Box one:</h3>
	<p>
    	<label for="title">Title</label> 
    	<input type="text" name="box_one_title" class="box_setting" value="<?php echo get_option('box_one_title'); ?>" />
    </p>
	
	<p>
		<label for="title">Image</label></th>	
		<img src="<?php echo get_option('box_one_photo'); ?>" />
      	<input type="text" size="40" name="box_one_photo" id="box_one_photo" value="<?php echo get_option('box_one_photo');?>" />
        <input id="upload_image_button_1" class="img_btn" type="button" value="Upload Image" />
    </p>
	
	<p>
    	<label for="title">Link 1:</label> 
    	<input type="text" name="box_one_link1" class="box_setting" value="<?php echo get_option('box_one_link1'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_one_link_title_1" class="box_setting" value="<?php echo get_option('box_one_link_title_1'); ?>" />
    </p>
	<p>
    	<label for="title">Link 2:</label> 
    	<input type="text" name="box_one_link2" class="box_setting" value="<?php echo get_option('box_one_link2'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_one_link_title_2" class="box_setting" value="<?php echo get_option('box_one_link_title_2'); ?>" />
    </p>

	<p>
    	<label for="title">Link 3:</label> 
    	<input type="text" name="box_one_link3" class="box_setting" value="<?php echo get_option('box_one_link3'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_one_link_title_3" class="box_setting" value="<?php echo get_option('box_one_link_title_3'); ?>" />
    </p>
	
	<p>
    	<label for="title">Link 4:</label> 
    	<input type="text" name="box_one_link4" class="box_setting" value="<?php echo get_option('box_one_link4'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_one_link_title_4" class="box_setting" value="<?php echo get_option('box_one_link_title_4'); ?>" />
    </p>

	<p>
    	<label for="title">Link 5:</label> 
    	<input type="text" name="box_one_link5" class="box_setting" value="<?php echo get_option('box_one_link5'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_one_link_title_5" class="box_setting" value="<?php echo get_option('box_one_link_title_5'); ?>" />
    </p>

	
	
	
<h3 class="box-number">Box two:</h3>
	<p>
    	<label for="title">Title</label> 
    	<input type="text" name="box_two_title" class="box_setting" value="<?php echo get_option('box_two_title'); ?>" />
    </p>
	
	<p>
        <label for="title">Image</label></th>	
		<img src="<?php echo get_option('box_two_photo'); ?>" />
      	<input type="text" size="40" name="box_two_photo" id="box_two_photo" value="<?php echo get_option('box_two_photo');?>" />
        <input id="upload_image_button_2" class="img_btn" type="button" value="Upload Image" />   
	 </p>
	
	<p>
    	<label for="title">Link 1:</label> 
    	<input type="text" name="box_two_link1" class="box_setting" value="<?php echo get_option('box_two_link1'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_two_link_title_1" class="box_setting" value="<?php echo get_option('box_two_link_title_1'); ?>" />
    </p>
	<p>
    	<label for="title">Link 2:</label> 
    	<input type="text" name="box_two_link2" class="box_setting" value="<?php echo get_option('box_two_link2'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_two_link_title_2" class="box_setting" value="<?php echo get_option('box_two_link_title_2'); ?>" />
    </p>

	<p>
    	<label for="title">Link 3:</label> 
    	<input type="text" name="box_two_link3" class="box_setting" value="<?php echo get_option('box_two_link3'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_two_link_title_3" class="box_setting" value="<?php echo get_option('box_two_link_title_3'); ?>" />
    </p>
	
	<p>
    	<label for="title">Link 4:</label> 
    	<input type="text" name="box_two_link4" class="box_setting" value="<?php echo get_option('box_two_link4'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_two_link_title_4" class="box_setting" value="<?php echo get_option('box_two_link_title_4'); ?>" />
    </p>

	<p>
    	<label for="title">Link 5:</label> 
    	<input type="text" name="box_two_link5" class="box_setting" value="<?php echo get_option('box_two_link5'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_two_link_title_5" class="box_setting" value="<?php echo get_option('box_two_link_title_5'); ?>" />
    </p>


<h3 class="box-number">Box three:</h3>
	<p>
    	<label for="title">Title</label> 
    	<input type="text" name="box_three_title" class="box_setting" value="<?php echo get_option('box_three_title'); ?>" />
    </p>
	<p>	
		<label for="title">Image</label>
		<img src="<?php echo get_option('box_three_photo'); ?>" />
      	<input type="text" size="40" name="box_three_photo" id="box_three_photo" value="<?php echo get_option('box_three_photo');?>" />
        <input id="upload_image_button_3" class="img_btn" type="button" value="Upload Image" />
        
	</p>
	
	<p>
    	<label for="title">Link 1:</label> 
    	<input type="text" name="box_three_link1" class="box_setting" value="<?php echo get_option('box_three_link1'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_three_link_title_1" class="box_setting" value="<?php echo get_option('box_three_link_title_1'); ?>" />
    </p>
	<p>
    	<label for="title">Link 2:</label> 
    	<input type="text" name="box_three_link2" class="box_setting" value="<?php echo get_option('box_three_link2'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_three_link_title_2" class="box_setting" value="<?php echo get_option('box_three_link_title_2'); ?>" />
    </p>

	<p>
    	<label for="title">Link 3:</label> 
    	<input type="text" name="box_three_link3" class="box_setting" value="<?php echo get_option('box_three_link3'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_three_link_title_3" class="box_setting" value="<?php echo get_option('box_three_link_title_3'); ?>" />
    </p>
	
	<p>
    	<label for="title">Link 4:</label> 
    	<input type="text" name="box_three_link4" class="box_setting" value="<?php echo get_option('box_three_link4'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_three_link_title_4" class="box_setting" value="<?php echo get_option('box_three_link_title_4'); ?>" />
    </p>

	<p>
    	<label for="title">Link 5:</label> 
    	<input type="text" name="box_three_link5" class="box_setting" value="<?php echo get_option('box_three_link5'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_three_link_title_5" class="box_setting" value="<?php echo get_option('box_three_link_title_5'); ?>" />
    </p>



<h3 class="box-number">Box four:</h3>
	<p>
    	<label for="title">Title</label> 
    	<input type="text" name="box_four_title" class="box_setting" value="<?php echo get_option('box_four_title'); ?>" />
    </p>
	<p>	
		<label for="title">Image</label>
		<img src="<?php echo get_option('box_four_photo'); ?>" />
      	<input type="text" size="40" name="box_four_photo" id="box_four_photo" value="<?php echo get_option('box_four_photo');?>" />
        <input id="upload_image_button_4" class="img_btn" type="button" value="Upload Image" />
        
	</p>
	
	<p>
    	<label for="title">Link 1:</label> 
    	<input type="text" name="box_four_link1" class="box_setting" value="<?php echo get_option('box_four_link1'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_four_link_title_1" class="box_setting" value="<?php echo get_option('box_four_link_title_1'); ?>" />
    </p>
	<p>
    	<label for="title">Link 2:</label> 
    	<input type="text" name="box_four_link2" class="box_setting" value="<?php echo get_option('box_four_link2'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_four_link_title_2" class="box_setting" value="<?php echo get_option('box_four_link_title_2'); ?>" />
    </p>

	<p>
    	<label for="title">Link 3:</label> 
    	<input type="text" name="box_four_link3" class="box_setting" value="<?php echo get_option('box_four_link3'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_four_link_title_3" class="box_setting" value="<?php echo get_option('box_four_link_title_3'); ?>" />
    </p>
	
	<p>
    	<label for="title">Link 4:</label> 
    	<input type="text" name="box_four_link4" class="box_setting" value="<?php echo get_option('box_four_link4'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_four_link_title_4" class="box_setting" value="<?php echo get_option('box_four_link_title_4'); ?>" />
    </p>

	<p>
    	<label for="title">Link 5:</label> 
    	<input type="text" name="box_four_link5" class="box_setting" value="<?php echo get_option('box_four_link5'); ?>" />
    	<label for="title" class="title_link">Title</label> 
    	<input type="text" name="box_four_link_title_5" class="box_setting" value="<?php echo get_option('box_four_link_title_5'); ?>" />
    </p>




	<p class="submit">
    	<input type="submit" class="button-primary" value="Save Changes" />
    </p>
    
    
    
<div style="clear:both">&nbsp;</div>
<h2 class="section-title">About Gift Ideas & Items (in footer)</h2><hr>
    
    <p>
    	<label for="title">Title</label> 
    	<input type="text" name="footer_title_1" class="box_setting" value="<?php echo get_option('footer_title_1'); ?>" />
    </p>
    <p>
		<label for="title">Short descriptions</label>
    	<textarea name="footer_descr_1" class="box_setting_textarea" cols="50" rows="10"><?php echo get_option('footer_descr_1'); ?></textarea>
    </p>
	
	
	<p class="submit">
    	<input type="submit" class="button-primary" value="Save Changes" />
    </p>    

</form>
</div>

<style type="text/css">

* {
  border: none;
}

.wrap{margin: 10px auto;}
h1{font-family:"Century Gothic"; font-size: 40px; font-weight:bold; color: #336699;border-bottom: 1px solid #CCC; line-height: 1.5em;}
h2.section-title{font-family:"Century Gothic"; font-size: 25px; font-weight:normal; color: #336699;}
h3.box-number{font-family:"Century Gothic"; font-size: 20px; font-weight:normal; color: #336699;}

.choice_cat, .choice_cat_title, .box_setting, #box_one_photo, #box_two_photo, #box_three_photo, #box_four_photo{  
	padding: 9px;  
	border: solid 1px #E5E5E5;  
	 outline: 0;  
	font: normal 13px/100% Verdana, Tahoma, sans-serif;  
	width: 300px;  
	background: #FFFFFF;  
	box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
} 

.box_setting_textarea{
	padding: 9px;  
	border: solid 1px #E5E5E5;  
	 outline: 0;  
	font: normal 13px/100% Verdana, Tahoma, sans-serif;  
	background: #FFFFFF;  
	box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;

}



.img_btn{
	padding: 8px;  
	border: solid 1px #E5E5E5;  
	 outline: 0;  
	font: bold 12px/100% Tahoma, sans-serif;  
	width: auto;  
	background: #FFFFFF;  
	box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
}

.form label{
	float: left;
	text-align: right;
	margin-right: 15px;
	color: #336699;
	width: 100px;
	font-family:"Century Gothic"; font-size: 12px; font-weight:bold;
}



.title_link{
	
	float: none!important;
	margin-right: 0!important;

}
submit.button-primary {
	width: auto;
	padding: 9px 15px;
	background: #336699;
	border: 0;
	font-size: 14px;
	color: #FFFFFF;
	}      
 
</style>
<?php } ?>