<?php

//INTERNAL
define('sfxexchangerates_is_admin', is_admin());
define('sfxexchangerates_plugin_core', plugin_dir_path(__FILE__));
define('sfxexchangerates_plugin_dir', str_replace('core/', '', sfxexchangerates_plugin_core));
define('sfxexchangerates_plugin_pro', sfxexchangerates_plugin_dir . "pro/");
define('sfxexchangerates_plugin_pro_views', sfxexchangerates_plugin_pro . "views/");
// var_dump(is_dir(sfxexchangerates_plugin_pro));
define('sfxexchangerates_is_pro', is_dir(sfxexchangerates_plugin_pro));
// echo sfxexchangerates_is_pro;
define('sfxexchangerates_plugin_cache', sfxexchangerates_plugin_dir . "cache/");
define('sfxexchangerates_plugin_views', sfxexchangerates_plugin_dir . "views/");
define('sfxexchangerates_plugin_libs', sfxexchangerates_plugin_dir . "libs/");
define('sfxexchangerates_plugin_controller', sfxexchangerates_plugin_dir . "controller/");
define('sfxexchangerates_plugin_functions', sfxexchangerates_plugin_dir . "functions/");
define('sfxexchangerates_plugin_widgets', sfxexchangerates_plugin_dir . "widgets/");
define('sfxexchangerates_plugin_classes', sfxexchangerates_plugin_dir . "classes/");




define('sfxexchangerates_plugin_id', preg_replace('~^.*(\/|\\\)(.*?)(\/|\\\)$~usmi', '$2', sfxexchangerates_plugin_dir));


// echo __FILE__;
// echo __DIR__;
// echo sfxexchangerates_plugin_dir_url(__DIR__);

// echo preg_replace('~^.*(\/|\\\)(.*?)(\/|\\\)$~usmi', '$2', sfxexchangerates_plugin_dir);
// echo sfxexchangerates_plugin_id;
// exit;

//EXTERAL
// define('sfxexchangerates_plugin_url',plugins_url( '/sfxexchangerates/' ));
define('sfxexchangerates_home_url', home_url());
define('sfxexchangerates_plugin_url', plugin_dir_url(__DIR__));
// echo sfxexchangerates_plugin_url;
define('sfxexchangerates_functions_url', sfxexchangerates_plugin_url . 'functions/');
define('sfxexchangerates_views_url', sfxexchangerates_plugin_url . 'views/');
// define('sfxexchangerates_process_admin_url', sfxexchangerates_functions_url . 'process_admin.php?process=');
define('sfxexchangerates_process_admin_url', sfxexchangerates_home_url . 'wp-admin/admin.php?page=process_admin&process=');
// define('sfxexchangerates_process_front_url', sfxexchangerates_functions_url . 'process_front.php?process=');
define('sfxexchangerates_process_front_url', sfxexchangerates_home_url . '?process_front&process=');
define('sfxexchangerates_common_url', sfxexchangerates_plugin_url . 'common/');
define('sfxexchangerates_css_url', sfxexchangerates_common_url . 'css/');
define('sfxexchangerates_js_url', sfxexchangerates_common_url . 'js/');
// echo sfxexchangerates_js_url;
define('sfxexchangerates_libs_url', sfxexchangerates_common_url . 'libs/');
define('sfxexchangerates_images_url', sfxexchangerates_common_url . 'images/');
