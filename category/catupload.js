jQuery(document).ready(function() {

jQuery('#upload_image_button').click(function() {
 formfield = jQuery('#category_photo').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});

window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#category_photo').val(imgurl);
 tb_remove();
}

});