jQuery(document).ready(function() {

	jQuery('#upload_image_button_2').click(function() {
	 formfield = jQuery('#box_two_photo').attr('name');
	 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	 return false;
	});
	window.send_to_editor = function(html) {
	 imgurl = jQuery('img',html).attr('src');
	 jQuery('#' + formfield).val(imgurl);
	 tb_remove();
	}
});