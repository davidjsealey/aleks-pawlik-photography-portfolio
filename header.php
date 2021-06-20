<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Aleks Pawlik photography portfolio.">
    <?php wp_head(); ?>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KKQ4GX7');</script>
    <!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKQ4GX7"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php 
    
    $logo = get_field('logo', 'options'); 
    if($logo) :
        $logoSrc = esc_url($logo['url']);
        $logoAlt = esc_html($logo['alt']);
    endif;
    
    ?>

    <header class="header">
        <div class="container header__container">
            <div class="header__col header__col--1">
                <a href="/">
                    <img class="header__logo" src="<?php echo $logoSrc; ?>" alt="<?php echo $logoAlt; ?>">
                </a>
            </div>
            <div class="header__col header__col--2">
                <input type="checkbox" class="burger-toggle">
                <a href="" class="burger">
                    <span class="burger__inner burger__inner--one"></span>
                    <span class="burger__inner burger__inner--two"></span>
                    <span class="burger__inner burger__inner--three"></span>
                </a>
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'container' => 'nav',
                            'container_class' => 'main-nav__menu-container',
                            'menu_class' => 'main-nav__menu'
                        )
                    );
                ?>
            </div>

        </div>
    </header>