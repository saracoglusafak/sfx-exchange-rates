<?php

if (isset($_POST["option_page"]) && $_POST["option_page"] == sfxexchangerates_plugin_id . "-group") {

    sfxexchangeratesCacheDelete("*");

    $sanitize_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if (isset($sanitize_post["reset"])) {
        register_setting($sanitize_post["option_page"], "");
        foreach ($sanitize_post as $k => $v) {
            delete_option($k);
        }
        return;
    }
    foreach ($sanitize_post as $k => $v) {
        register_setting($sanitize_post["option_page"], $k);
    }
}
