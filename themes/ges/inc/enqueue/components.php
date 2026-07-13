<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Registra todos los archivos JavaScript de un componente.
 *
 * @param string $component
 * @return void
 */
function ges_enqueue_component( string $component ): void {

    $theme_uri = get_template_directory_uri();

    $components = [

        'slider' => [
            'base_path' => '/assets/js/components/slider/',
            'scripts'   => [

                [
                    'handle' => 'ges-slider-base',
                    'file'   => 'BaseRenderer.js',
                    'deps'   => [],
                ],

                [
                    'handle' => 'ges-slider-fade',
                    'file'   => 'FadeRenderer.js',
                    'deps'   => [ 'ges-slider-base' ],
                ],

                [
                    'handle' => 'ges-slider-translate',
                    'file'   => 'TranslateRenderer.js',
                    'deps'   => [ 'ges-slider-base' ],
                ],

                [
                    'handle' => 'ges-slider-content',
                    'file'   => 'ContentRenderer.js',
                    'deps'   => [ 'ges-slider-base' ],
                ],

                [
                    'handle' => 'ges-slider-factory',
                    'file'   => 'RendererFactory.js',
                    'deps'   => [
                        'ges-slider-fade',
                        'ges-slider-translate',
                        'ges-slider-content',
                    ],
                ],

                [
                    'handle' => 'ges-slider-core',
                    'file'   => 'GESSlider.js',
                    'deps'   => [ 'ges-slider-factory' ],
                ],

                [
                    'handle' => 'ges-slider-init',
                    'file'   => 'index.js',
                    'deps'   => [ 'ges-slider-core' ],
                ],

            ],
        ],
        'showroom' => [
            'base_path' => '/assets/js/components/showroom/',
            'scripts'   => [

                [
                    'handle' => 'ges-showroom-init',
                    'file'   => 'index.js',
                    'deps'   => [],
                ],

            ],
        ],

    ];

    if ( empty( $components[ $component ] ) ) {
        return;
    }

    $config = $components[ $component ];

    foreach ( $config['scripts'] as $script ) {

        $src = $theme_uri .
            $config['base_path'] .
            $script['file'];

        $file = get_template_directory() .
            $config['base_path'] .
            $script['file'];

        wp_enqueue_script(
            $script['handle'],
            $src,
            $script['deps'],
            file_exists( $file ) ? filemtime( $file ) : null,
            true
        );

    }

}