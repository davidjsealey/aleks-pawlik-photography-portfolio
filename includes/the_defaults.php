<?php

// Remove resource hints so we don't get unwanted links to other sub sites with rel="dns-prefetch".
remove_action('wp_head', 'wp_resource_hints', 2);

/**
 * Add resources to the theme on setup.
 * Initial styles, js, theme setting here.
 */
add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'Main Menu'),
        'secondary' => __('Secondary Navigation', 'Secondary'),
        'footer' => __('Footer', 'Footer'),
    ));
});

/**
 * Prevent WordPress core/theme updates from showing in the CMS.
 */
add_filter('pre_site_transient_update_core', '__return_null');
add_filter('pre_site_transient_update_themes', '__return_null');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

/**
 * Hide menus in the admin
 *
 * @return [type] [description]
 */
add_action('admin_menu', function () {
    // remove_menu_page( 'index.php' );                  //Dashboard
    // remove_menu_page( 'jetpack' );                    //Jetpack*
    // remove_menu_page('edit.php');                     //Posts
    // remove_menu_page( 'upload.php' );                 //Media
    // remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page('edit-comments.php');               //Comments
    // remove_menu_page( 'themes.php' );                 //Appearance
    // remove_menu_page( 'plugins.php' );                //Plugins
    // remove_menu_page( 'users.php' );                  //Users
    // remove_menu_page( 'tools.php' );                  //Tools
    // remove_menu_page( 'options-general.php' );        //Settings
});

add_filter('wpcf7_load_js', '__return_false');

// Disable the WordPress 5.x Gutenberg editor
add_filter('use_block_editor_for_post', '__return_false', 5);

// Disable auto p tags on CF7 forms
add_filter('wpcf7_autop_or_not', '__return_false');

// Modify the .htaccess file content.
add_filter('mod_rewrite_rules', function ($rules) {

    // Block 'author' output.
    $domain = preg_replace('!http(|s)://!Ui', '', get_home_url());

    $rules .= <<<HTACCESS

# START WordPress username enumeration vulnerability
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_URI}  ^/$
    RewriteCond %{QUERY_STRING} ^/?author=([0-9]*)
    RewriteRule ^(.*)$ http://$domain/? [L,R=301]
</IfModule>
# FINISH WordPress username enumeration vulnerability

HTACCESS;

    // Block XML-RPC.
    $rules .= <<<HTACCESS

# START XML RPC BLOCKING
<Files xmlrpc.php>
    Order Deny,Allow
    Deny from all
</Files>
# FINISH XML RPC BLOCKING

HTACCESS;

    return $rules;
});
