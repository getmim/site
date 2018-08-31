<?php
/**
 * Module site config
 * @package site
 * @version 0.0.1
 */

return [
    '__name' => 'site',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getphun/site.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'app/site' => ['install', 'remove'],
        'modules/site' => ['install', 'update', 'remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'core' => null
            ],
            [
                'lib-view' => null
            ]
        ],
        'optional' => [
            [
                'lib-output-cache' => null
            ],
            [
                'lib-event' => null
            ]
        ]
    ],
    'autoload' => [
        'classes' => [
            'Site\\Controller' => [
                'type' => 'file',
                'base' => 'app/site/system/Controller.php',
                'children' => 'app/site/controller'
            ]
        ]
    ],

    'gates' => [
        'site' => [
            'priority' => 1000,
            'host' => [
                'value' => 'HOST'
            ],
            'path' => [
                'value' => '/'
            ]
        ]
    ],

    'routes' => [
        'site' => [
            '404' => [
                'handler' => 'Site\\Controller::show404'
            ],
            '500' => [
                'handler' => 'Site\\Controller::show500'
            ],
            'siteHome' => [
                'path' => [
                    'value' => '/'
                ],
                'handler' => 'Site\\Controller\\Home::index'
            ]
        ]
    ]
];