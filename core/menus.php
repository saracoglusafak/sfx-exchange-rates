<?php

add_action('admin_menu', 'sfxexchangerates_admin_menu');

// var_dump($GLOBALS["CONFIGS"]["plugin_name"]);

// echo sfxexchangerates_images_url;

function sfxexchangerates_admin_menu()
{

	add_menu_page(
		__($GLOBALS["CONFIGS"]["MENUS"][0]["page_title"], sfxexchangerates_plugin_id),
		__($GLOBALS["CONFIGS"]["MENUS"][0]["menu_title"], sfxexchangerates_plugin_id),
		$GLOBALS["CONFIGS"]["MENUS"][0]["capability"],
		$GLOBALS["CONFIGS"]["MENUS"][0]["menu_slug"],
		$GLOBALS["CONFIGS"]["MENUS"][0]["function"],
		$GLOBALS["CONFIGS"]["MENUS"][0]["icon_url"],
		$GLOBALS["CONFIGS"]["MENUS"][0]["position"]
	);
	$FIRST = $GLOBALS["CONFIGS"]["MENUS"][0];
	unset($GLOBALS["CONFIGS"]["MENUS"][0]);

	// print_r($GLOBALS["CONFIGS"]["MENUS"]);

	if ($GLOBALS["CONFIGS"]["MENUS"])
		foreach ($GLOBALS["CONFIGS"]["MENUS"] as $k => $v) {
			add_submenu_page(
				$v["parent_slug"],
				__($v["page_title"], sfxexchangerates_plugin_id),
				__($v["menu_title"], sfxexchangerates_plugin_id),
				$v["capability"],
				$v["menu_slug"],
				$v["function"]
			);
		}



	$GLOBALS["CONFIGS"]["MENUS"][0] = $FIRST;

	// print_r($GLOBALS["CONFIGS"]["MENUS"]);


	/* add_submenu_page(
			string $parent_slug,
			string $page_title,
			string $menu_title,
			string $capability,
			string $menu_slug,
			callable $function = ''
		); */
}
