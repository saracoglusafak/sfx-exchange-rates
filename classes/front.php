<?php
class sfxexchangeratesFront
{
    public function get_image_option($name, $default = "", $size = "thumbnail", $args = [])
    {
        if (!$id = get_option($name)) return $default;

        if (!$args["before"]) $args["before"] = "";
        if (!$args["after"]) $args["after"] = "";


        return $args["before"] . $this->get_image($id, $size) . $args["after"];
    }

    public function get_image($id, $size = "thumbnail", $default = "", $args = [])
    {
        if (!$image = wp_get_attachment_image_src($id, $size)) return $default;
        // print_r($image);
        return $image[0];
    }


    public function get_option_loop(string $name, object $cb)
    {
        if (!$options = get_option($name)) return;
        // print_r($options);
        foreach ($options as $k => $v) {
            $cb($k, $v);
        }
    }
}

$GLOBALS["SFX"]["FRONT"] = new sfxexchangeratesFront();
