<?php

add_action('wp_enqueue_scripts', function () {

    $min = defined('WP_DEBUG') && WP_DEBUG === false ? '.min' : '';

    if (!is_admin()) {
        global $wp_styles, $wp_scripts; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
        $version = wp_get_theme()->get("Version");

        wp_register_style('styles-core', get_template_directory_uri() . '/dist/styles.css', array(), $version);
        wp_enqueue_style('styles-core');

        wp_enqueue_script('script-main', get_template_directory_uri() . '/dist/app.bundle.js', array(), $version, true);

        // Register the script
        wp_register_script('script-main', get_template_directory_uri() . '/dist/app.bundle.js');

        // Localize the script with data required in the DOM e.g. window.theme_data.template_dir
        $theme_data = [
            'template_dir' => get_template_directory_uri(),
            'images_dir' => get_template_directory_uri() . '/images/',
        ];
        wp_localize_script('script-main', 'theme_data', $theme_data);

        // Enqueued script with theme_data.
        wp_enqueue_script('script-main', array(), $version, true);
    }
});
