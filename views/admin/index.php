<h1><?= sprintf(__('Admin panel <span class="sfxmuted">%1$s</span>', sfxexchangerates_plugin_id), __($GLOBALS["CONFIGS"]["MENUS"][0]["menu_title"], sfxexchangerates_plugin_id)) ?></h1>

<hr>


<div id="sfxexchangerates-wrap" class="wrap">
    <form method="post" action="options.php">
        <?php
        settings_fields(sfxexchangerates_plugin_id . '-group');
        do_settings_sections(sfxexchangerates_plugin_id . '-group');
        ?>

        <div class="row">
            <div class="col-6">


                <div class="row">
                    <div class="col-12">
                        <label for="converted"><?= __('Currency to be converted', sfxexchangerates_plugin_id) ?></label>
                        <input type="text" id="converted" class="postform" name="converted" value="<?= get_option("converted", "TRY") ?>" />
                    </div>
                </div>





                <div class="row">
                    <div class="col-12">


                        <?php

                        // print_r(get_option("elements"));
                        if ($exchanges = get_option("exchanges")) {
                            // print_r($elements);
                            // print_r(array_values($elements));
                            $exchanges = array_values($exchanges);
                            $exchanges = json_encode($exchanges);
                            // echo $elements;
                        ?>
                            <script>
                                var exchanges = '<?= $exchanges ?>';
                            </script>
                        <?php
                        }

                        ?>


                        <div class="vue-gen">

                            <label for="exchanges"><?= __("Add element;", sfxexchangerates_plugin_id) ?></label>
                            <br>
                            <vue-element input-id="exchanges" input-name="exchanges" placeholder="<?= __("Exchange value", sfxexchangerates_plugin_id) ?>" load="exchanges" add-title="<?= __("+ Add", sfxexchangerates_plugin_id) ?>"></vue-element>

                        </div>





                    </div>
                </div>







            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php submit_button() ?>
                <?php submit_button(__('Reset', sfxexchangerates_plugin_id), 'secondary', 'reset', false) ?>
            </div>
        </div>

    </form>