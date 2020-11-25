<?php

$GLOBALS["CONFIGS"]["MENUS"] = [];

//add_menu_page
$GLOBALS["CONFIGS"]["MENUS"][] = [
	"page_title" => 'SFX Plugin',
	"menu_title" => 'SFX Plugin',
	"capability" => 'manage_options',
	"menu_slug" => sfxexchangerates_plugin_id . '/views/admin/index.php',
	"function" => '',
	"icon_url" => sfxexchangerates_images_url . 'icon.png',
	"position" => 99
];

