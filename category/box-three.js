jQuery(document).ready(function() {

	jQuery('#upload_image_button_3').click(function() {
	 formfield = jQuery('#box_three_photo').attr('name');
	 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	 return false;
	});
	window.send_to_editor = function(html) {
	 imgurl = jQuery('img',html).attr('src');
	 jQuery('#' + formfield).val(imgurl);
	 tb_remove();
	}
});