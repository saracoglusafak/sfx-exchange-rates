<?php

class sfxexchangeratesvirtualpage
{

    function __construct()
    {
        register_activation_hook(sfxexchangerates_plugin_file, array($this, 'activate'));
        add_action('init', array($this, 'rewrite'));
        add_filter('query_vars', array($this, 'query_vars'));
        add_action('template_include', array($this, 'change_template'));
    }

    function activate()
    {
        set_transient('sfxexchangerates_flush', 1, 60);
    }

    function rewrite()
    {
        // ~/2020/11/13/merhaba-dunya/dump/
        add_rewrite_endpoint('dump', EP_PERMALINK);
        // ~/sfxexchangerates
        add_rewrite_rule('^test$', 'index.php?test=1', 'top');
        // add_rewrite_rule('^sfxexchangerates$', 'index.php?sfxexchangerates=1', 'top');
        // add_rewrite_rule('^sfxexchangerates[/]*(.*?)$', 'index.php?sfxexchangerates=$matches[1]', 'top');
        add_rewrite_rule('^sfxexchangerates([/]([a-z0-9-]+))*[/]*$', 'index.php?sfxexchangerates=$matches[2]', 'top');

        if (get_transient('sfxexchangerates_flush')) {
            delete_transient('sfxexchangerates_flush');
            flush_rewrite_rules();
        }
    }

    function query_vars($vars)
    {
        $vars[] = 'test';
        $vars[] = 'sfxexchangerates';

        return $vars;
    }

    function change_template($template)
    {

        if (get_query_var('test', false) !== false) {

            //Check theme directory first
            $newTemplate = locate_template(array('test.php'));
            if ('' != $newTemplate)
                return $newTemplate;

            //Check plugin directory next
            $newTemplate = sfxexchangerates_plugin_views . 'front/test.php';
            if (file_exists($newTemplate))
                return $newTemplate;
        }


        if (get_query_var('dump', false) !== false) {

            //Check theme directory first
            $newTemplate = locate_template(array('sfxexchangerates.php'));
            if ('' != $newTemplate)
                return $newTemplate;

            //Check plugin directory next
            $newTemplate = sfxexchangerates_plugin_views . 'front/sfxexchangerates.php';
            if (file_exists($newTemplate))
                return $newTemplate;
        }

        if (get_query_var('sfxexchangerates', false) !== false) {
            // print_r(get_query_var('sfxexchangerates', false));
            $get_query_var = get_query_var('sfxexchangerates', false);


            if ($get_query_var) {
                $templateFile = "sfxexchangerates_{$get_query_var}.php";
            } else {
                $templateFile = "sfxexchangerates.php";
            }


            $newTemplate = locate_template(array($templateFile));
            if ('' != $newTemplate)
                return $newTemplate;

            //Check plugin directory next
            $newTemplate = sfxexchangerates_plugin_views . 'front/' . $templateFile;
            if (file_exists($newTemplate))
                return $newTemplate;
        }

        //Fall back to original template
        return $template;
    }
}

new sfxexchangeratesvirtualpage;
