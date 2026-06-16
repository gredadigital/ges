<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Contenido Home', 'ges' ) )
    ->where( 'post_template', '=', 'home.php' )
    ->add_tab( __( 'Slider', 'ges' ), [
        Field::make( 'complex', 'ges_home_slider', __( 'Slider superior', 'ges' ) )
            ->set_layout( 'tabbed-horizontal' )
            ->add_fields( [
                Field::make( 'image', 'imagen', __( 'Imagen', 'ges' ) )
                    ->set_value_type( 'id' ),
                Field::make( 'text', 'alt', __( 'Texto alternativo', 'ges' ) ),
            ] ),
    ] )

    ->add_tab( __( 'Servicios', 'ges' ), [
        Field::make( 'complex', 'ges_home_servicios', __( 'Nuestros servicios', 'ges' ) )
            ->set_layout( 'tabbed-horizontal' )
            ->add_fields( [
                Field::make( 'image', 'imagen', __( 'Imagen', 'ges' ) )
                    ->set_value_type( 'id' ),
                Field::make( 'text', 'titulo', __( 'Título', 'ges' ) ),
                Field::make( 'textarea', 'texto', __( 'Descripción', 'ges' ) )
                    ->set_rows( 3 ),
            ] ),
    ] )

    ->add_tab( __( 'Pasos', 'ges' ), [
        Field::make( 'complex', 'ges_home_pasos', __( 'Pasos para trabajar con nosotros', 'ges' ) )
            ->set_layout( 'tabbed-horizontal' )
            ->add_fields( [
                Field::make( 'text', 'numero', __( 'Número de paso', 'ges' ) )
                    ->set_width( 20 ),
                Field::make( 'text', 'titulo', __( 'Título', 'ges' ) )
                    ->set_width( 80 ),
                Field::make( 'textarea', 'texto', __( 'Descripción', 'ges' ) )
                    ->set_rows( 4 ),
            ] ),
    ] )

    ->add_tab( __( 'Nuestra esencia', 'ges' ), [
        Field::make( 'textarea', 'ges_home_mision', __( 'Misión', 'ges' ) )
            ->set_rows( 4 ),
        Field::make( 'textarea', 'ges_home_vision', __( 'Visión', 'ges' ) )
            ->set_rows( 4 ),
        Field::make( 'textarea', 'ges_home_valores', __( 'Valores', 'ges' ) )
            ->set_rows( 4 ),
    ] );