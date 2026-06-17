<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Contenido Servicios', 'ges' ) )
    ->where( 'post_template', '=', 'page-servicios.php' )

    ->add_tab( __( 'Servicios', 'ges' ), [

        Field::make(
            'association',
            'ges_servicios_paginas',
            __( 'Servicios destacados', 'ges' )
        )

            ->set_types( [
                [
                    'type'      => 'post',
                    'post_type' => 'page',
                ],
            ] )

            ->set_duplicates_allowed( false )

            ->set_max( 3 )

            ->set_help_text(
                __( 'Seleccione las páginas que aparecerán en esta sección y ordénelas arrastrándolas.', 'ges' )
            ),

    ] );