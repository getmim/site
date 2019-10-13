<?php

return [
    '__name' => 'site',
    '__version' => '0.1.0',
    '__git' => 'git@github.com:getphun/site.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'app/site' => ['install','remove'],
        'modules/site' => ['install','update','remove'],
        'theme/site/form/field' => ['install','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'core' => NULL
            ],
            [
                'lib-view' => NULL
            ]
        ],
        'optional' => [
            [
                'lib-cache-output' => NULL
            ],
            [
                'site-meta' => NULL
            ],
            [
                'site-setting' => NULL
            ],
            [
                'lib-robot' => NULL
            ]
        ]
    ],
    'autoload' => [
        'classes' => [
            'Site\\Controller' => [
                'type' => 'file',
                'base' => 'app/site/system/Controller.php',
                'children' => ['app/site/controller','modules/site/controller']
            ],
            'Site\\Library' => [
                'type' => 'file',
                'base' => 'modules/site/library'
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
            404 => [
                'handler' => 'Site\\Controller::show404'
            ],
            500 => [
                'handler' => 'Site\\Controller::show500'
            ],
            'siteHome' => [
                'path' => [
                    'value' => '/'
                ],
                'handler' => 'Site\\Controller\\Home::index'
            ],
            'siteFeed' => [
                'path' => [
                    'value' => '/feed.xml'
                ],
                'handler' => 'Site\\Controller\\Robot::feed',
                'modules' => [
                    'lib-robot' => TRUE
                ]
            ],
            'siteSitemap' => [
                'path' => [
                    'value' => '/sitemap.xml'
                ],
                'handler' => 'Site\\Controller\\Robot::sitemap',
                'modules' => [
                    'lib-robot' => TRUE
                ]
            ]
        ]
    ],
    'site' => [
        'robot' => [
            'feed' => [
                'Site\\Library\\Robot::feed' => true
            ],
            'sitemap' => [
                'Site\\Library\\Robot::sitemap' => true
            ]
        ]
    ],
    'adminSiteSetting' => [
        'editable' => [
            'Frontpage' => [
                'label' => 'Frontpage',
                'icon'  => '<i class="fas fa-hand-pointer"></i>',
                'info'  => 'Change site frontpage preference'
            ],
            'Social Accounts' => [
                'label' => 'Social Accounts',
                'icon'  => '<i class="fas fa-share-alt-square"></i>',
                'info'  => 'List of company social accounts'
            ]
        ]
    ]
];
