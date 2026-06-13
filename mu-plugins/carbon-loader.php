<?php
/**
 * Plugin Name: Carbon (MU Loader)
 * Description: Carga Carbon Fields como mu-plugin usando Composer y define containers.
 */

require_once __DIR__ . '/carbon/vendor/autoload.php';

add_action('after_setup_theme', function () {
    if ( class_exists('\Carbon_Fields\Carbon_Fields') ) {
        \Carbon_Fields\Carbon_Fields::boot();
    }
});

// Cargar definición de containers personalizados
require_once __DIR__ . '/carbon/carbon-plug.php';
