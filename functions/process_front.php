<?php

if (!isset($_GET["process"]) || trim($_GET["process"]) == "") {
	exit;
}
if (!is_callable($_GET["process"])) {
	exit;
}



// funtions

function sfx_save_session()
{
	if (!$_POST || !isset($_POST["name"]) || !isset($_POST["value"])) return;


	if (!session_id()) {
		session_start();
	}

	$name = sanitize_text_field($_POST["name"]);

	$_SESSION[$name] = sanitize_post($_POST["value"]);
	return 1;
}




















function test()
{
	echo "-----test-----";
}
$process = sanitize_text_field($_GET["process"]);
echo $process();