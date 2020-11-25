<?php

if (!isset($_GET["process"]) || trim($_GET["process"]) == "") {
	exit;
}
if (!is_callable($_GET["process"])) {
	exit;
}


if (!$wp_get_current_user = wp_get_current_user()) {
	exit;
}
// print_r($wp_get_current_user);	
if (!isset($wp_get_current_user->caps["administrator"]) || $wp_get_current_user->caps["administrator"] != 1) exit;


// funtions






















function test()
{
	echo "-----test-----";
}
$process = sanitize_text_field($_GET["process"]);
echo $process();