<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function ges_register_service_fields(
    string $template,
    string $label,
    string $special_section_label = 'Acabados especiales'
) {

    Container::make(
        'post_meta',
        sprintf('Contenido %s', $label)
    )

        ->where(
            'post_template',
            '=',
            $template
        )

        /*
         * TARJETA PARA LA PÁGINA SERVICIOS
         */

        ->add_tab('Tarjeta Servicios', [

            Field::make(
                'image',
                'ges_service_cover',
                'Imagen de portada'
            )
                ->set_value_type('id'),

            Field::make(
                'textarea',
                'ges_service_excerpt',
                'Descripción corta'
            ),

            Field::make(
                'text',
                'ges_service_tagline',
                'Texto inferior'
            ),

        ])

        /*
         * INTRODUCCIÓN
         */

        ->add_tab('Introducción', [

            Field::make(
                'textarea',
                'ges_service_highlight',
                'Texto destacado'
            )
                ->set_help_text(
                    'Texto mostrado dentro del recuadro oscuro superior.'
                ),

            Field::make(
                'rich_text',
                'ges_service_about',
                '¿Qué es este servicio?'
            ),

        ])

        /*
         * PRODUCTOS
         */

        ->add_tab('Productos', [

            Field::make(
                'complex',
                'ges_service_products',
                'Productos'
            )

                ->set_layout('tabbed-horizontal')

                ->add_fields([

                    Field::make(
                        'text',
                        'title',
                        'Producto'
                    ),
                    Field::make(
                        'textarea',
                        'description',
                        'Descripción'
                    )
                        ->set_rows(3),

                ]),

        ])

        /*
         * SHOWROOM DIGITAL
         */

        ->add_tab('Showroom Digital', [

            Field::make(
                'complex',
                'ges_service_showroom',
                'Categorías'
            )

                ->set_layout('tabbed-horizontal')

                ->add_fields([

                    Field::make(
                        'text',
                        'title',
                        'Nombre categoría'
                    ),

                    Field::make(
                        'complex',
                        'items',
                        'Trabajos'
                    )

                        ->set_layout('tabbed-horizontal')

                        ->add_fields([

                            Field::make(
                                'media_gallery',
                                'gallery',
                                'Imágenes'
                            ),

                            Field::make(
                                'text',
                                'title',
                                'Título'
                            ),

                            Field::make(
                                'textarea',
                                'description',
                                'Descripción'
                            ),

                            Field::make(
                                'textarea',
                                'finishes',
                                'Acabados disponibles'
                            )
                                ->set_help_text(
                                    'Un acabado por línea.'
                                ),

                            Field::make(
                                'text',
                                'tiktok_url',
                                'URL TikTok'
                            ),

                        ]),

                ]),

        ])

        /*
         * ACABADOS ESPECIALES / MATERIALES
         */

        ->add_tab($special_section_label, [

            Field::make(
                'complex',
                'ges_service_specials',
                $special_section_label
            )

                ->set_layout('tabbed-horizontal')

                ->add_fields([

                    Field::make(
                        'media_gallery',
                        'gallery',
                        'Imágenes'
                    ),

                    Field::make(
                        'text',
                        'title',
                        'Título'
                    ),

                    Field::make(
                        'rich_text',
                        'content',
                        'Contenido'
                    ),

                ]),

        ])

        /*
         * NUESTRA MAQUINARIA
         */

        ->add_tab('Nuestra Maquinaria', [

            Field::make(
                'complex',
                'ges_service_machinery',
                'Maquinaria'
            )

                ->set_layout('tabbed-horizontal')

                ->add_fields([

                    Field::make(
                        'media_gallery',
                        'gallery',
                        'Imágenes'
                    ),

                    Field::make(
                        'text',
                        'title',
                        'Título'
                    ),

                    Field::make(
                        'textarea',
                        'description',
                        'Descripción'
                    ),

                ]),

        ]);

}