<?php 
global $wpdb;
$all_books = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".my_book_table()." ORDER BY id DESC", ""),ARRAY_A);
?>


<div class="container">
	<div class="col-sm-12">
		<div class="alert alert-info">test</div>
		<table id="my_book" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SL.</th>
                <th>Name</th>
                <th>Author</th>
                <th>About</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(count($all_books) > 0){ 
                $i = 1;
                foreach($all_books as $ab){
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $ab['name']; ?></td>
                <td><?php echo $ab['author']; ?></td>
                <td><?php echo $ab['about']; ?></td>
                <td><img src="<?php echo $ab['book_image']; ?>" width="80px" height="80px"></td>
                <td>
                    <a href="admin.php?page=update-book&book_id=<?php echo $ab['id']; ?>" data-id="<?php echo $ab['id']; ?>" class="btn btn-info">Edit</a>
                    <a href="javascript:void(0);" class="btn btn-danger bookdelete" data-id="<?php echo $ab['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        } 
    } ?>
        </tbody>
    </table>
	</div>
</div>