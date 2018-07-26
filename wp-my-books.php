<?php
/**
 * @package My Books
 * @version 1.0
 */
/*
Plugin Name: My Books
Plugin URI: http://wordpress.org/plugins/my-books/
Author: Subhankar Dutta
Version: 1.0
Author URI: http://ma.tt/
*/
if (!defined("ABSPATH")) {
	exit();
}
if (!defined("MY_BOOK_PLUGIN_DIR_PATH")) {
	define('MY_BOOK_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ));
}
if (!defined('MY_BOOK_PLUGIN_URL')) {
	define('MY_BOOK_PLUGIN_URL', plugin_dir_url( __FILE__ ));
}

function my_books_plugin_scripts(){
	wp_enqueue_style( 'bootstrap', MY_BOOK_PLUGIN_URL.'assets/css/bootstrap.min.css');
	wp_enqueue_style( 'datatables', MY_BOOK_PLUGIN_URL.'assets/css/datatables.min.css');
	wp_enqueue_style( 'notify-bar', MY_BOOK_PLUGIN_URL.'assets/css/jquery.notifyBar.css');
	wp_enqueue_style( 'style', MY_BOOK_PLUGIN_URL.'assets/css/style.css');

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'bootstrap', MY_BOOK_PLUGIN_URL.'assets/js/bootstrap.min.js');
	wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
	wp_enqueue_script( 'validate', MY_BOOK_PLUGIN_URL.'assets/js/jquery.validate.min.js');
	wp_enqueue_script( 'datatables', MY_BOOK_PLUGIN_URL.'assets/js/datatables.min.js');
	wp_enqueue_script( 'notifyBar', MY_BOOK_PLUGIN_URL.'assets/js/jquery.notifyBar.js');
	wp_enqueue_script( 'custom', MY_BOOK_PLUGIN_URL.'assets/js/custom.js');
	wp_localize_script( 'custom', 'mybookajaxurl', admin_url('admin-ajax.php') );
}

add_action( 'init', 'my_books_plugin_scripts');

function my_books_menu(){

	add_menu_page( 'My Book', 'My Book', 'manage_options', 'book-list', 'my_book_list', 'dashicons-book-alt', 30);
	add_submenu_page( 'book-list', 'My Book List', 'My Book List', 'manage_options', 'book-list', 'my_book_list' );
	add_submenu_page( 'book-list', 'Add New', 'Add New', 'manage_options', 'add-new-book', 'my_book_add' );

}
add_action('admin_menu', 'my_books_menu');


function my_book_list(){
	include_once MY_BOOK_PLUGIN_DIR_PATH.'/view/book-list.php';
}

function my_book_add(){
	include_once MY_BOOK_PLUGIN_DIR_PATH.'/view/book-add.php';
}

function my_book_table(){
	global $wpdb;
	return $wpdb->prefix.'my_books';
}

function my_books_generates_table(){

	global $wpdb;
	require_once ABSPATH.'/wp-admin/includes/upgrade.php';
	$sql= 'CREATE TABLE `'.my_book_table().'` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) DEFAULT NULL,
 `author` varchar(255) DEFAULT NULL,
 `about` text,
 `book_image` text,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1';
	dbDelta($sql);

}

register_activation_hook( __FILE__, 'my_books_generates_table' );

function drop_table_my_book()
{
	global $wpdb;
	$wpdb->query("DROP TABLE IF EXISTS ".my_book_table());
}

register_deactivation_hook( __FILE__, 'drop_table_my_book' );
register_uninstall_hook(  __FILE__, 'drop_table_my_book' );




 ?>