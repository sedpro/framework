<?php

return [
    'environment' => \Framework\App::DEVELOPMENT_ENVIRONMENT,
    'routes' => [
        '/' => 'index/index',
        '/(?P<some_param_from_url>[0-9a-zA-Z]+)' => 'index/other',
    ],
    'some_key' => 'some_value_from_config',
];
