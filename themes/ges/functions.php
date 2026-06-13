<?php

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'ges-style',
        get_template_directory_uri() . '/assets/css/tw.build.css',
        [],
        filemtime(get_template_directory() . '/assets/css/tw.build.css')
    );
});
