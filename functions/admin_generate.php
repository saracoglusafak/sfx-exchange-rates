<?php

function sfxexchangeratesOptionLoop(string $option, object $cb)
{
    if (!$loop = get_option($option)) return;
    foreach ($loop as $k => $v) {
        $cb($k, $v);
    }
}

function sfxexchangeratesImagesGenerate(string $option, object $cb)
{
    if (!$images = get_option($option)) return;
    foreach ($images as $k => $v) {
        if (!$image = wp_get_attachment_image_src($v)) continue;
        // print_r($image);
        $cb($k, $v, $image);
    }
}

function sfxexchangeratesImageGenerate(string $option, object $cb)
{
    if (!$v = get_option($option)) return;
    if (!$image = wp_get_attachment_image_src($v)) return;
    return $cb($v, $image);
}
function sfxexchangeratesImageIdGenerate(int $id, object $cb)
{
    if (!$image = wp_get_attachment_image_src($id)) return;
    return $cb($id, $image);
}
