<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

    Container::make('theme_options', __('GES - Contacto'))
        ->add_fields([

            Field::make('text', 'ges_footer_phone', 'Teléfono'),
            Field::make('text', 'ges_footer_email', 'Email'),
            Field::make('text', 'ges_footer_address', 'Dirección'),
            Field::make('text', 'ges_footer_city', 'Ciudad'),
            Field::make('textarea', 'ges_footer_description', 'Descripción'),
            Field::make('image', 'ges_footer_logo', 'Logo Grupo Empresarial'),
            Field::make('text', 'ges_footer_copyright', 'Copyright'),
        ]);
