<?php
/**
 * Carbon Fields: Ejemplo de Container para la página Home
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Registramos los campos cuando Carbon Fields ya está cargado.
add_action('carbon_fields_register_fields', function () {

    // Este container se mostrará SOLO en la página configurada como “Página de inicio”
    Container::make('post_meta', 'Home – Ajustes de Portada')
        ->where('post_type', '=', 'page')
        ->where('post_id', '=', get_option('page_on_front'))
        ->add_fields([
            Field::make('text', 'home_titulo_principal', 'Título principal')
                ->set_help_text('Texto que aparece como encabezado en la Home.'),

            Field::make('textarea', 'home_descripcion', 'Descripción')
                ->set_rows(3)
                ->set_help_text('Texto descriptivo para la Home.'),

            Field::make('image', 'home_imagen_destacada', 'Imagen destacada')
                ->set_help_text('Imagen principal de la Home.')
        ]);
});
