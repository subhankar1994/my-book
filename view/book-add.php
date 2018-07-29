<?php wp_enqueue_media(); ?>

<div class="container">
	<div class="row">
		
	<div class="col-sm-12">
		<div class="alert alert-info">
			<h5>test</h5>
		</div>
			<form action="javascript:void(0);" id="frmAddBok">
				<div class="form-group">
					<label for="name">Name :</label>
					<input type="text" name="name" id="name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="author">Author :</label>
					<input type="text" name="author" id="author" class="form-control"  required>
				</div>
				<div class="form-group">
					<label for="about">About :</label>
					<textarea name="about" id="about" class="form-control"></textarea>
				</div>
					<div class="form-group">
					<label for="book_image">Upload Image :</label>
					<input type="button" name="book_image" value="Upload Image" id="book_image" class="btn btn-info">
					<span id="show_image"></span>
					<input type="hidden" name="image" id="img_value">
				</div>
				<div class="form-group">
					<input type="submit" name="submit_btn" value="Save" class="btn btn-success">
				</div>
			</form>
	</div>
	</div>
</div>