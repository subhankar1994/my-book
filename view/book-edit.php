<?php wp_enqueue_media(); ?>
<?php 
global $wpdb;
$book_id = isset($_GET['book_id']) ? $_GET['book_id'] : 0;
$book_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".my_book_table()." WHERE id = %d",$book_id),ARRAY_A);

?>

<div class="container">
	<div class="row">
		
		<div class="col-sm-12">
			<div class="alert alert-info">
				<h5>test</h5>
			</div>
			<form action="javascript:void(0);" id="frmeditBok">
				<input type="hidden" value="<?php echo isset($_GET['book_id']) ? intval($_GET['book_id']) : 0; ?>" name="book_id">
				<div class="form-group">
					<label for="name">Name :</label>
					<input type="text" name="name" id="name" class="form-control" value="<?php echo $book_details['name']; ?>" required>
				</div>
				<div class="form-group">
					<label for="author">Author :</label>
					<input type="text" name="author" id="author" class="form-control" value="<?php echo $book_details['author']; ?>"  required>
				</div>
				<div class="form-group">
					<label for="about">About :</label>
					<textarea name="about" id="about" class="form-control"><?php echo $book_details['about']; ?></textarea>
				</div>
				<div class="form-group">
					<label for="book_image">Upload Image :</label>
					<input type="button" name="book_image" value="Upload Image" id="book_image" class="btn btn-info">
					<span id="show_image">
						<img src="<?php echo $book_details['book_image']; ?>" width="50px" height="50px">
					</span>
					<input type="hidden" name="image" value="<?php echo $book_details['book_image']; ?>" id="img_value">
				</div>
				<div class="form-group">
					<input type="submit" name="submit_btn" value="Update" class="btn btn-info">
				</div>
			</form>
		</div>
	</div>
</div>