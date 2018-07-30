
jQuery(document).ready(function($) {
    $('#my_book').DataTable();

    $("#book_image").on('click', function() {
	var image = wp.media({
		title: 'upload image of book',
		multiple: false
	}).open().on('select', function(){
		var upload_image = image.state().get('selection').first();
		var get_image = upload_image.toJSON().url;
		$('#show_image').html('<img src='+get_image+' style="width:50px;height:50px" />');
		$('#img_value').val(get_image);
	});
});
     $("#frmAddBok").validate({
		submitHandler:function(){
			var postdata = 'action=mybooklibrary&param=save_book&'+$('#frmAddBok').serialize();
			$.post(mybookajaxurl, postdata, function(response) {
				var data = $.parseJSON(response);
				if(data.status == 1){
					$.notifyBar({
						cssClass: 'success',
						html: data.message
					});
					setTimeout(function(){
						location.reload();
					},1300);
				}
			});
		}
});

          $("#frmeditBok").validate({
		submitHandler:function(){
			var postdata = 'action=mybooklibrary&param=update_book&'+$('#frmeditBok').serialize();
			$.post(mybookajaxurl, postdata, function(response) {
				var data = $.parseJSON(response);
				if(data.status == 1){
					$.notifyBar({
						cssClass: 'info',
						html: data.message
					});
					setTimeout(function(){
						location.reload();
					},1300);
				}
			});
		}
});

          $('.bookdelete').on('click', function(){
          	var conf = confirm("are you sure want to delete?");
          	if(conf){
          		var book_id = $(this).attr('data-id');
          		var postdata = 'action=mybooklibrary&param=delete_book&id='+book_id;
			$.post(mybookajaxurl, postdata, function(response) {
				var data = $.parseJSON(response);
				if(data.status == 1){
					$.notifyBar({
						cssClass: 'danger',
						html: data.message
					});
					setTimeout(function(){
						location.reload();
					},1300);
				}
			});
          	}
          });
} );

