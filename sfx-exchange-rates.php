<?php

/**
 * Plugin Name: SFX Exchange rates
 * Plugin URI: https://dogruwebtasarim.com
 * Description: SFX Google Exchange rates.
 * Version: 1.0
 * Author: Şafak Saraçoğlu
 * Author URI: 
 * Text Domain: sfx-exchange-rates
 * Domain Path: /languages
 */


//FIRST
define('sfxexchangerates_plugin_file', __FILE__);
// echo sfxexchangerates_plugin_file;



require_once (__DIR__) . "/core/cons.php";



add_action('plugins_loaded', function () {
	// echo basename(dirname(__FILE__)) . '/languages/';
	load_plugin_textdomain(sfxexchangerates_plugin_id, FALSE, basename(dirname(__FILE__)) . '/languages/');
});


add_action('init', function () {
	load_plugin_textdomain(sfxexchangerates_plugin_id);
});



require_once (__DIR__) . "/core/configs.php";

// var_dump(sfxexchangerates_is_admin);
// var_dump(sfxexchangerates_plugin_dir);




// require_once sfxexchangerates_plugin_core . 'menu_items.php';
// require_once sfxexchangerates_plugin_core . 'menu_elements.php';


if ($WIDGETS = glob(sfxexchangerates_plugin_widgets . '*.php')) {
	// print_r($WIDGETS);
	foreach ($WIDGETS as $k => $v) {
		require_once $v;
	}
}




//GLOBAL FIRST
require_once sfxexchangerates_plugin_functions . "global.php";
require_once sfxexchangerates_plugin_functions . "generate.php";

require_once sfxexchangerates_plugin_classes . "virtualpage.php";


if (sfxexchangerates_is_admin) {
	require_once sfxexchangerates_plugin_core . "menus.php";
	require_once sfxexchangerates_plugin_functions . "admin_generate.php";
	require_once sfxexchangerates_plugin_controller . "admin.php";
	// require_once sfxexchangerates_plugin_controller . "admin-woo.php";
} else {
	require_once sfxexchangerates_plugin_functions . "front_generate.php";
	require_once sfxexchangerates_plugin_controller . "front.php";
	// require_once sfxexchangerates_plugin_controller . "front-woo.php";
	require_once sfxexchangerates_plugin_classes . "front.php";
}

//GLOBAL LAST
// require_once sfxexchangerates_plugin_controller . "woo.php";




register_activation_hook(sfxexchangerates_plugin_file, 'sfxexchangerates_activation');
register_deactivation_hook(sfxexchangerates_plugin_file, 'sfxexchangerates_deactivation');
// register_uninstall_hook( sfxexchangerates_plugin_file, 'sfxexchangerates_uninstall' );




function sfxexchangerates_activation()
{
	/* 
			global $wpdb;
			
			$table_name = $wpdb->prefix . "etkinlik";
			$charset_collate = $wpdb->get_charset_collate();
			
			$sql = "CREATE TABLE $table_name (
			id bigint(20) NOT NULL AUTO_INCREMENT,
			zaman timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			adsoyad varchar(100) DEFAULT '' NOT NULL,
			telefon varchar(15) DEFAULT '' NOT NULL,
			eposta varchar(255) DEFAULT '' NOT NULL,
			firma varchar(200) DEFAULT '' NOT NULL,
			PRIMARY KEY  (id)
			) $charset_collate;";
			
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql ); 
		*/
}



function sfxexchangerates_deactivation()
{
	/* 
			global $wpdb;
			$table_name = $wpdb->prefix . 'etkinlik';
			$sql = "DROP TABLE IF EXISTS $table_name";
			$wpdb->query($sql);
			delete_option("my_plugin_db_version");
		*/
}
