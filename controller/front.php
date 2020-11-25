<?php



add_action('wp_loaded', function () {
	if (!isset($_GET["process_front"])) return;
	require_once sfxexchangerates_plugin_functions . "process_front.php";
	exit;
});




/* 
add_action('wp_head', function () {
	if (!isset($_GET['room_type'])) return;
	echo "------------------------";

	exit;
});

 */



add_action(
	'wp_enqueue_scripts',
	function () {
		//css
		wp_enqueue_style(
			sfxexchangerates_plugin_id . '-front',
			sfxexchangerates_css_url . 'front.css'
		);
		//js		
		wp_enqueue_script('jquery');
		// wp_enqueue_script('jquery-ui-core');
		// wp_enqueue_script('jquery-ui-sortable');

		// echo sfxexchangerates_libs_url . 'vue-2.6.12/vue.js';
		wp_register_script(
			sfxexchangerates_plugin_id . '-vue',
			sfxexchangerates_libs_url . 'vue-2.6.12/vue.js',
			array('jquery'),
			null,
			true
		);
		wp_enqueue_script(sfxexchangerates_plugin_id . '-vue');

		wp_register_script(
			sfxexchangerates_plugin_id . '-global',
			sfxexchangerates_js_url . 'global.js',
			array('jquery'),
			null,
			true
		);
		wp_enqueue_script(sfxexchangerates_plugin_id . '-global');

		wp_register_script(
			sfxexchangerates_plugin_id . '-front-vue',
			sfxexchangerates_js_url . 'front-vue.js',
			array('jquery'),
			null,
			true
		);
		wp_enqueue_script(sfxexchangerates_plugin_id . '-front-vue');


		//SECONDARY ---------------------------------------
		wp_register_script(
			sfxexchangerates_plugin_id . '-front',
			sfxexchangerates_js_url . 'front.js',
			array('jquery'),
			null,
			true
		);
		wp_enqueue_script(sfxexchangerates_plugin_id . '-front');

		/* 
			wp_register_script('sfxlast',
			TEMPLATE_URL.'sfx/core/common/js/last.js',
			array('jquery'),
			null,
			true );
			wp_enqueue_script('sfxlast');
		*/
	}
);



add_action('wp_footer', function () {
?>
	<script type="text/javascript">
		// var $ = jQuery.noConflict();
		var sfxexchangerates_plugin_id = "<?= sfxexchangerates_plugin_id ?>";
		var sfxexchangerates_plugin_url = "<?= sfxexchangerates_plugin_url ?>";
		var sfxexchangerates_process_front_url = "<?= sfxexchangerates_process_front_url ?>";
	</script>
<?php
});








/*
add_filter('wp_nav_menu_items', function ($items, $args) {
	if ($args->theme_location == 'footer_menu') {
		$items .= '<li><a title="Admin" href="' . esc_url(admin_url()) . '">' . __('Admin') . '</a></li>';
	}
	return $items;
}, 10, 2);
*/