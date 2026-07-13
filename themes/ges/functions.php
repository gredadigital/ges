<?php

require_once get_template_directory() . '/inc/enqueue/components.php';

function ges_enqueue_assets() {

    wp_enqueue_style(
        'ges-style',
        get_template_directory_uri() . '/assets/css/tw.build.css',
        [],
        filemtime( get_template_directory() . '/assets/css/tw.build.css' )
    );

    wp_enqueue_script(
        'ges-menu',
        get_template_directory_uri() . '/assets/js/menu.js',
        [],
        filemtime( get_template_directory() . '/assets/js/menu.js' ),
        true
    );

    // Componentes
    ges_enqueue_component( 'slider' );
    ges_enqueue_component( 'showroom' );

}

add_action( 'wp_enqueue_scripts', 'ges_enqueue_assets' );


/*
|--------------------------------------------------------------------------
| Theme Support
|--------------------------------------------------------------------------
*/

add_action( 'after_setup_theme', function () {

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'custom-logo', [
        'height'      => 120,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    register_nav_menus( [
        'header_menu' => __( 'Menú principal', 'ges' ),
        'footer_menu' => __( 'Menú footer', 'ges' ),
    ] );

} );