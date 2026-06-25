<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Contenido Impacto', 'ges' ) )
    ->where( 'post_template', '=', 'page-impacto.php' )

    ->add_tab( __( 'Encabezado', 'ges' ), [

        Field::make(
            'text',
            'ges_impacto_claim',
            __( 'Texto destacado', 'ges' )
        )
            ->set_help_text( 'Ejemplo: Nuestra huella, un compromiso que perdura.' ),

        Field::make(
            'text',
            'ges_impacto_subclaim',
            __( 'Texto inferior', 'ges' )
        ),

    ] )

    ->add_tab( __( 'Introducción', 'ges' ), [

        Field::make(
            'image',
            'ges_impacto_intro_imagen',
            __( 'Imagen introductoria', 'ges' )
        )
            ->set_value_type( 'id' ),

        Field::make(
            'rich_text',
            'ges_impacto_intro_texto',
            __( 'Texto introductorio', 'ges' )
        ),

    ] )

    ->add_tab( __( 'Innovación circular', 'ges' ), [

        Field::make(
            'text',
            'ges_impacto_innovacion_titulo',
            __( 'Título de sección', 'ges' )
        )
            ->set_default_value( 'Innovación y economía circular' ),

        Field::make(
            'textarea',
            'ges_impacto_innovacion_intro',
            __( 'Texto introductorio', 'ges' )
        )
            ->set_rows( 3 ),

        Field::make(
            'complex',
            'ges_impacto_innovacion_items',
            __( 'Elementos', 'ges' )
        )
            ->set_layout( 'tabbed-horizontal' )
            ->add_fields( [

                Field::make(
                    'image',
                    'imagen',
                    __( 'Imagen', 'ges' )
                )
                    ->set_value_type( 'id' ),

                Field::make(
                    'text',
                    'titulo',
                    __( 'Título', 'ges' )
                ),

                Field::make(
                    'textarea',
                    'texto',
                    __( 'Descripción', 'ges' )
                )
                    ->set_rows( 4 ),

            ] ),

    ] )

    ->add_tab( __( 'Gestión de residuos', 'ges' ), [

        Field::make(
            'text',
            'ges_impacto_residuos_titulo',
            __( 'Título de sección', 'ges' )
        )
            ->set_default_value( 'Gestión responsable de residuos' ),

        Field::make(
            'textarea',
            'ges_impacto_residuos_intro',
            __( 'Texto introductorio', 'ges' )
        )
            ->set_rows( 3 ),

        Field::make(
            'complex',
            'ges_impacto_residuos_items',
            __( 'Tarjetas', 'ges' )
        )
            ->set_layout( 'tabbed-horizontal' )
            ->add_fields( [

                Field::make(
                    'image',
                    'icono',
                    __( 'Ícono', 'ges' )
                )
                    ->set_value_type( 'id' )
                    ->set_help_text( 'Opcional. Si se deja vacío, el ícono puede resolverse desde el template.' ),

                Field::make(
                    'text',
                    'titulo',
                    __( 'Título', 'ges' )
                ),

                Field::make(
                    'textarea',
                    'texto',
                    __( 'Descripción', 'ges' )
                )
                    ->set_rows( 4 ),

            ] ),

    ] )

    ->add_tab( __( 'Decoración final', 'ges' ), [

        Field::make(
            'image',
            'ges_impacto_decoracion_1',
            __( 'Elemento circular 1', 'ges' )
        )
            ->set_value_type( 'id' )
            ->set_help_text( 'Opcional. Si el gráfico será fijo por CSS/SVG, dejar vacío.' ),

        Field::make(
            'image',
            'ges_impacto_decoracion_2',
            __( 'Elemento circular 2', 'ges' )
        )
            ->set_value_type( 'id' )
            ->set_help_text( 'Opcional. Si el gráfico será fijo por CSS/SVG, dejar vacío.' ),

    ] );