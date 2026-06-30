<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Contenido Contacto', 'ges' ) )
    ->where( 'post_template', '=', 'page-contacto.php' )

    /*
     * ENCABEZADO
     */
    ->add_tab( __( 'Encabezado', 'ges' ), [

        Field::make(
            'textarea',
            'ges_contact_intro',
            __( 'Texto introductorio', 'ges' )
        )
            ->set_rows( 3 ),

        Field::make(
            'text',
            'ges_contact_form_shortcode',
            __( 'Shortcode formulario de contacto', 'ges' )
        )
            ->set_help_text(
                __( 'Ejemplo: [contact-form-7 id="123"]', 'ges' )
            ),

    ] )

    /*
     * UBICACIÓN PRINCIPAL
     */
    ->add_tab( __( 'Ubicación principal', 'ges' ), [

        Field::make(
            'textarea',
            'ges_contact_map_embed',
            __( 'Código Embed de Google Maps', 'ges' )
        )
            ->set_rows( 6 )
            ->set_help_text(
                __( 'Pegue el iframe generado por Google Maps (Compartir → Insertar un mapa).', 'ges' )
            ),

        Field::make(
            'rich_text',
            'ges_contact_schedule',
            __( 'Horario de atención', 'ges' )
        ),

        Field::make(
            'complex',
            'ges_contact_social',
            __( 'Redes sociales', 'ges' )
        )

            ->set_layout( 'tabbed-horizontal' )

            ->add_fields( [

                Field::make(
                    'text',
                    'network',
                    __( 'Red social', 'ges' )
                )
                    ->set_help_text(
                        __( 'Facebook, Instagram, LinkedIn, TikTok, etc.', 'ges' )
                    ),

                Field::make(
                    'text',
                    'username',
                    __( 'Usuario', 'ges' )
                ),

                Field::make(
                    'text',
                    'url',
                    __( 'Enlace', 'ges' )
                ),

            ] ),

    ] )

    /*
     * SUCURSALES
     */
    ->add_tab( __( 'Sucursales', 'ges' ), [

        Field::make(
            'complex',
            'ges_contact_branches',
            __( 'Sucursales', 'ges' )
        )

            ->set_layout( 'tabbed-horizontal' )

            ->add_fields( [

                Field::make(
                    'text',
                    'city',
                    __( 'Ciudad', 'ges' )
                ),

                Field::make(
                    'textarea',
                    'address',
                    __( 'Dirección', 'ges' )
                )
                    ->set_rows( 2 ),

                Field::make(
                    'text',
                    'phone',
                    __( 'Teléfono', 'ges' )
                ),

                Field::make(
                    'text',
                    'email',
                    __( 'Correo electrónico', 'ges' )
                ),

            ] ),

    ] )

    /*
     * BUZÓN DE SUGERENCIAS
     */
    ->add_tab( __( 'Buzón de sugerencias', 'ges' ), [

        Field::make(
            'textarea',
            'ges_contact_suggestions_intro',
            __( 'Texto introductorio', 'ges' )
        )
            ->set_rows( 3 ),

        Field::make(
            'text',
            'ges_contact_suggestions_shortcode',
            __( 'Shortcode buzón de sugerencias', 'ges' )
        )
            ->set_help_text(
                __( 'Ejemplo: [contact-form-7 id="456"]', 'ges' )
            ),

    ] );