<?php

/*
Plugin Name: Gilpanel
Plugin URI: http://mickey3cutter.com/plugins/gilpanel.zip
Author: Gilmedia
Author uri: https://gilmedia.ca
Version: 1.1
*/

//Update

add_action( 'init', 'github_plugin_updater_test_init' );
function github_plugin_updater_test_init() {

	include_once 'updater.php';

	define( 'WP_GITHUB_FORCE_UPDATE', true );

	if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin

		$config = array(
			'slug' => plugin_basename( __FILE__ ),
			'proper_folder_name' => 'gilpanel',
			'api_url' => 'https://api.github.com/repos/mickey3cutter/gilpanel',
			'raw_url' => 'https://raw.github.com/mickey3cutter/gilpanel/master',
			'github_url' => 'https://github.com/mickey3cutter/gilpanel',
			'zip_url' => 'https://github.com/mickey3cutter/gilpanel/archive/master.zip',
			'sslverify' => true,
			'requires' => '4.0',
			'tested' => '4.5.2',
			'readme' => 'admin-theme.php',
			'access_token' => '',
		);

		new WP_GitHub_Updater( $config );

	}

}



//Initialize plugin
function m3c_settings_init() {
    register_setting( 'm3c_plugin_settings', 'm3c_option' );
}
function register_m3c_menu_page() {
	add_menu_page( 'Options', 'Gilpanel', 'manage_options', 'gilpanel', 'm3c_admin_page', 'dashicons-album' );
}
add_action( 'admin_init', 'm3c_settings_init' );
add_action( 'admin_menu', 'register_m3c_menu_page' );
function m3c_admin_page(){
	require 'admin_page.php';
}

//Globalize options variable
$option = get_option( 'm3c_option' ); 

//Redirect in admin menu
$req_uri = substr($_SERVER['REQUEST_URI'],-18);
if($req_uri == '/wp-admin/gilpanel' || $req_uri == 'wp-admin/gilpanel/'){
	header("Location: admin.php?page=gilpanel");
	die();
}


//Remove menus
function m3c_remove_menus(){
	global $option;
	$pages_old = $GLOBALS[ 'admin_page_hooks' ];
	$pages_new = get_option('m3c_menu_positions', true);
	$pages = explode(',', $pages_new);
	foreach ($pages as $page) {
		if(isset($option[$page])==1) { remove_menu_page( $page ); }
	}

}
add_action( 'admin_menu', 'm3c_remove_menus',999 );

//Add gilpanel view
if(isset($option['gil'])){
	$color = $option['color'];
	$oldHash = get_transient('m3c_color');
	$currentHash =  $option['color'];
	if($oldHash !== $currentHash){
	  set_transient('m3c_color', $currentHash, 60 * 60 * 24 * 14);
	}
	function gil_custom_fonts() {
	  include ('gil/gilpanel.php');
	}
	add_action('admin_head', 'gil_custom_fonts');
	function gil_login_logo() {
	   include ('gil/gilpanel.php');
	}
	add_action( 'login_enqueue_scripts', 'gil_login_logo' );
	

	//Change footer text

	function gil_remove_footer_admin () 
	{
	    echo '<span id="footer-thankyou">Styled by <a href="http://gilmedia.ca" target="_blank" rel="nofollow">Gilmedia</a></span>';
	}
	add_filter('admin_footer_text', 'gil_remove_footer_admin');

	
}

//Add script to admin panel
if(isset($option['js'])){
	function m3c_enqueue() {    
	    wp_enqueue_script( 'm3c_custom_script', plugin_dir_url( __FILE__ ) . 'js/admin.js' );
	}
	add_action('admin_enqueue_scripts', 'm3c_enqueue');
}

//Add Dasboard and Login CSS
if(isset($option['css'])){
	function m3c_custom_fonts() {
	  echo '<link rel="stylesheet" href="'. plugin_dir_url( __FILE__ ) .'css/admin_style.css" type="text/css" media="all" />';
	}
	add_action('admin_head', 'm3c_custom_fonts');
	function m3c_login_logo() {
	    echo '<link rel="stylesheet" href="'. plugin_dir_url( __FILE__ ) .'css/admin_style.css" type="text/css" media="all" />';
	 }
	add_action( 'login_enqueue_scripts', 'm3c_login_logo' );
}

//Change login logo url
if(isset($option['logo_url'])){
	function m3c_login_logo_url() {
	    return home_url();
	}
	add_filter( 'login_headerurl', 'm3c_login_logo_url' );
}

//Change footer text
if(isset($option['footer_admin'])){
	function m3c_remove_footer_admin () {
		global $option;
	    echo '<span id="footer-thankyou">'.$option['footer_text'].'</span>';
	}
	add_filter('admin_footer_text', 'm3c_remove_footer_admin');
}
function m3c_admin_head_func(){
	echo '<style>
	#advanced-custom-fields-pro,#toplevel_page_edit-post_type-acf-field-group{display:none}
	</style>';
}
add_action('admin_head','m3c_admin_head_func');

//Remove admin bar on front-end
if(isset($option['admin_bar'])){
	add_filter('show_admin_bar', '__return_false', 999);
}






add_action('wp_ajax_update_menu_positions', 'm3c_update_menu_positions');
add_action('admin_enqueue_scripts', 'm3c_admin_enqueues');

/* Filters */

add_filter('custom_menu_order', 'm3c_custom_menu_order');
add_filter('menu_order', 'm3c_custom_menu_order');

/* Functions */

function m3c_update_menu_positions() {
    update_option('m3c_menu_positions', str_replace('admin.php?page=', '', $_REQUEST['menu_item_positions'])); // str_replace (support for custom added menu items)

}

function m3c_admin_enqueues() {
    wp_enqueue_script('jquery-ui-sortable');
      wp_enqueue_script('amr_admin', plugins_url('/js/amr-admin.js', __FILE__), array('jquery-ui-sortable'));
}

function m3c_custom_menu_order($menu_order) {
    if (!$menu_order)
        return true;

    $new_menu_order = get_option('m3c_menu_positions', true);

    if ($new_menu_order) {
        $new_menu_order = explode(',', $new_menu_order);

        return $new_menu_order;
    } else {
        return $menu_order;
    }
}