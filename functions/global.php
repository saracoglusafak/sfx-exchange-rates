<?php

function sfxexchangeratesCacheSave(string $name, $data)
{
    if (!$data) return;
    // $data = serialize($data);
    // echo $name;

    global $wp_filesystem;
    require_once(ABSPATH . '/wp-admin/includes/file.php');
    WP_Filesystem();


    $wp_filesystem->put_contents(
        sfxexchangerates_plugin_cache . "{$name}.sfx",
        serialize($data),
        FS_CHMOD_FILE // predefined mode settings for WP files
    );

    return $data;
}

function sfxexchangeratesCacheGet(string $name, $time = (5 * 60))
{
    $file = sfxexchangerates_plugin_cache . "{$name}.sfx";
    if (!file_exists($file)) return;
    // echo $time;

    // echo filemtime($file);
    // echo time() - filemtime($file);
    if ((time() - filemtime($file)) > $time) {
        wp_delete_file($file);
    }


    global $wp_filesystem;
    require_once(ABSPATH . '/wp-admin/includes/file.php');
    WP_Filesystem();



    if (!$data = $wp_filesystem->get_contents($file)) return;
    $data = unserialize($data);
    // print_r($data);
    return $data;
}


function sfxexchangeratesCacheDelete(string $name)
{
    if (!$files = glob(sfxexchangerates_plugin_cache . "{$name}.sfx")) return 1;
    // print_r($files);
    foreach ($files as $k => $v)
        wp_delete_file($v);

    return 1;
}
