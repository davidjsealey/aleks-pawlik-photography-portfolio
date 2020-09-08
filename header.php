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

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKQ4GX7"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header class="header">
        <div class="container header__container">
            <div class="header__col header__col--1">
                <h1 class="header__logo">Aleks Pawlik.</h1>
            </div>
            <div class="header__col header__col--2">
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