<?php

add_action('carbon_fields_register_fields', function () {

    $fields_dir = __DIR__ . '/fields';

    require_once $fields_dir . '/service-fields.php';

    foreach (glob($fields_dir . '/*.php') as $file) {

        if (str_contains($file, 'service-fields.php')) {
            continue;
        }

        require_once $file;
    }

});