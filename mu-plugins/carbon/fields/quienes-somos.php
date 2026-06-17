<?php


use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', __('Contenido Quiénes Somos', 'ges'))
    ->where('post_template', '=', 'page-quienes-somos.php')
    ->add_tab(__('Nuestra historia', 'ges'), [

        Field::make(
            'image',
            'ges_quienes_historia_imagen',
            __('Imagen principal', 'ges')
        )
            ->set_value_type('id'),

        Field::make(
            'rich_text',
            'ges_quienes_historia_texto',
            __('Historia', 'ges')
        ),

    ])
    ->add_tab(__('¿Por qué elegirnos?', 'ges'), [

        Field::make(
            'complex',
            'ges_quienes_elegirnos',
            __('Tarjetas', 'ges')
        )
            ->set_layout('tabbed-horizontal')
            ->set_max(4)
            ->add_fields([

                Field::make(
                    'text',
                    'titulo',
                    __('Título', 'ges')
                ),

                Field::make(
                    'textarea',
                    'texto',
                    __('Descripción', 'ges')
                )
                    ->set_rows(4),

            ]),

    ])
    ->add_tab(__('Compromiso presidencial', 'ges'), [

        Field::make(
            'rich_text',
            'ges_quienes_presidencia_mensaje',
            __('Mensaje', 'ges')
        ),

        Field::make(
            'text',
            'ges_quienes_presidencia_nombre',
            __('Nombre', 'ges')
        ),

        Field::make(
            'text',
            'ges_quienes_presidencia_cargo',
            __('Cargo', 'ges')
        ),

        Field::make(
            'image',
            'ges_quienes_presidencia_foto',
            __('Fotografía', 'ges')
        )
            ->set_value_type('id'),

    ]);