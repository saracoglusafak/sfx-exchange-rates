<?php

add_action('widgets_init', function () {
    register_widget('sfxexchangerates_widget');
});


class sfxexchangerates_widget extends WP_Widget
{

    function __construct()
    {

        parent::__construct(
            // widget ID
            'sfxexchangerates_widget',
            // widget name
            __('SFX Exchange rates', ' sfxexchangerates'),
            // widget description
            array('description' => __('SFX Plugin', sfxexchangerates_plugin_id),)
        );
    }

    public function widget($args, $instance)
    {
        // print_r($instance);

        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];
        //if title is present
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
        //output

        if (!$exchanges = get_option("exchanges")) return;
        $converted = get_option("converted", "TRY");



        require_once sfxexchangerates_plugin_libs . 'simple_html_dom.php';

        // print_r($exchanges);

        // print_r(sfxexchangeratesGetExchange("USD", $converted));


        if (!$exchange_widget = sfxexchangeratesCacheGet("exchange_widget")) {

            $ARRAY = [];
            foreach ($exchanges as $k => $v) {
                $v["value"] = strtoupper($v["value"]);
                // echo $v["value"];
                if (isset($ARRAY[$v["value"]])) continue;
                if (!$value = sfxexchangeratesGetExchange($v["value"], $converted)) continue;
                $ARRAY[$v["value"]] = $value;
            }
            // print_r($ARRAY);

            $exchange_widget = sfxexchangeratesCacheSave("exchange_widget", $ARRAY);
        }


        // sfxexchangeratesCacheDelete("exchange_widget");
        // sfxexchangeratesCacheDelete("*");
        // print_r($exchange_widget);

        if ($exchange_widget) {
?>
            <table>
                <tbody>
                    <?php
                    foreach ($exchange_widget as $k => $v) {
                    ?>
                        <tr>
                            <td><?= $v["first"] ?></td>
                            <td><?= $v["exchange"] ?></td>
                            <td><?= $v["last"] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }



        echo $args['after_widget'];
    }

    public function form($instance)
    {
        if (isset($instance['test']))
            $test = $instance['test'];
        else
            $test = __('Test', sfxexchangerates_plugin_id);


        if (isset($instance['title']))
            $title = $instance['title'];
        else
            $title = __('SFX Exchange rates', sfxexchangerates_plugin_id);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <!-- 
        <p>
            <label for="<?php echo $this->get_field_id('test'); ?>"><?php _e('Test:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('test'); ?>" name="<?php echo $this->get_field_name('test'); ?>" type="text" value="<?php echo esc_attr($test); ?>" />
        </p>
         -->
<?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        // $instance['test'] = (!empty($new_instance['test'])) ? strip_tags($new_instance['test']) : '';

        return $instance;
    }
}
