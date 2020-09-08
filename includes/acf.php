<?php

// Hide admin menu on non-dev environments
// if (defined('WP_DEBUG') && WP_DEBUG === false) {
//     add_filter('acf/settings/show_admin', '__return_false');
// }

// Theme Options Page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
    ));
}
