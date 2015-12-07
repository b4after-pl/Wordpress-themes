jQuery(document).ready(function($){
 
 
    var custom_uploader;
	var custom_uploader_background;
 
    $('#upload_image_button').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Ustaw logo strony',
            button: {
                text: 'Wybierz obrazek'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#upload_image').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });
 
	$('#upload_image_button_background').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader_background) {
            custom_uploader_background.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader_background = wp.media.frames.file_frame = wp.media({
            title: 'Ustaw tło strony',
            button: {
                text: 'Wybierz obrazek'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader_background.on('select', function() {
            attachment = custom_uploader_background.state().get('selection').first().toJSON();
            $('#upload_image_background').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader_background.open();
 
    });
 
});