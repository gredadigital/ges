<?php
/**
 * Carbon Fields: Ejemplo de Container para la página Home
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Registramos los campos cuando Carbon Fields ya está cargado.
add_action('carbon_fields_register_fields', function () {

    foreach (glob(__DIR__ . '/fields/*.php') as $file) {
        require_once $file;
    }

});
