<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index'
    ],
    'company' => [
        'controller' => 'main',
        'action' => 'company'
    ],
    'company/{list:\d+}' => [
        'controller' => 'main',
        'action' => 'company'
    ],
    'company/{category:\Aa-Zz+}' => [
        'controller' => 'main',
        'action' => 'company'
    ],
    'account/login' => [
        'controller' => 'account',
        'action' => 'login'
    ],
    'account/register' => [
        'controller' => 'account',
        'action' => 'register'
    ]
];
