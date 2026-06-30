<?php
/**
 * Header del tema GES
 *
 * @package GES
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="min-h-screen flex flex-col">

    <header class="site-header">

        <div class="header-bar">

            <div class="container mx-auto p-1">

                <div class="flex items-center justify-between">

                    <a
                            href="<?php echo esc_url(home_url('/')); ?>"
                            class="logo-ges"
                            aria-label="<?php bloginfo('name'); ?>"
                    ></a>

                    <button
                            id="menu-toggle"
                            class="menu-toggle"
                            type="button"
                            aria-label="<?php esc_attr_e('Abrir menú', 'ges'); ?>"
                            aria-controls="site-navigation"
                            aria-expanded="false"
                    >
                        <span>Abrir menú</span>
                    </button>

                </div>

            </div>

        </div>

        <div
                id="site-navigation"
                class="site-navigation"
                aria-hidden="true"
        >

            <div class="header-bar">

                <div class="container mx-auto p-1">

                    <div class="flex items-center justify-between">

                        <a
                                href="<?php echo esc_url(home_url('/')); ?>"
                                class="logo-ges"
                                aria-label="<?php bloginfo('name'); ?>"
                        ></a>

                        <button
                                id="menu-close"
                                class="menu-close"
                                type="button"
                                aria-label="<?php esc_attr_e('Cerrar menú', 'ges'); ?>"
                        >
                            <span>Cerrar menú</span>
                        </button>

                    </div>

                </div>

            </div>

            <div class="container mx-auto p-4">

                <?php
                wp_nav_menu([
                        'theme_location' => 'header_menu',
                        'container'      => false,
                        'menu_class'     => 'menu-principal',
                        'fallback_cb'    => false,
                        'depth'          => 1,
                ]);
                ?>

            </div>

        </div>

    </header>

    <main id="primary" class="flex-1">