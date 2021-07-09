<?php

define('TEXT_DOMAIN', 'aleks-pawlik-photography-portfolio');

require_once "includes/the_defaults.php"; // A set of common functions used for varying purposes e.g. security and theme setup.
require_once "includes/acf.php"; // Core ACF functions
require_once "includes/assets.php"; // enqueue  of .css and .js files into head / footer

add_filter('wpcf7_form_elements', 'do_shortcode');

add_theme_support('post-thumbnails');

// function my_script_enqueuer()
// {
//     wp_enqueue_script("ajax-script", plugins_url("/js/meta.js", __FILE__), ["jquery"]);
//     wp_localize_script('ajax-script', 'ajax_object', ['ajax_url' => admin_url('admin-ajax.php')]);
// }
// add_action('init', 'my_script_enqueuer');

/**
 * @param string $file
 * @param array $args
 * @param bool $return
 * @return false|string
 */
function soak_get_template(string $file, array $args = [], bool $return = false)
{
    $template = new Soak_Template($file, $args, $return);
    return $template->render($return);
}

function acf_wysiwyg_remove_wpautop()
{
    // remove p tags //
    remove_filter('acf_the_content', 'wpautop');
    // add line breaks before all newlines //
    add_filter('acf_the_content', 'nl2br');
}

add_action('acf/init', 'acf_wysiwyg_remove_wpautop');
