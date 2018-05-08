<?php
return [
    'admin' => [
        'type' => 1,
        'children' => [
            'products/index',
            'products/add',
            'orders/add',
            'products/delete',
        ],
    ],
    'supervisor' => [
        'type' => 1,
        'children' => [
            'products/index',
            'products/add',
            'orders/add',
        ],
    ],
    'operator' => [
        'type' => 1,
        'children' => [
            'products/index',
        ],
    ],
    'products/index' => [
        'type' => 2,
    ],
    'orders/add' => [
        'type' => 2,
    ],
    'products/add' => [
        'type' => 2,
    ],
    'products/delete' => [
        'type' => 2,
    ],
];
