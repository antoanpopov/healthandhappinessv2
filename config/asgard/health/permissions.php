<?php

return [
    'health.categories' => [
        'index' => 'health::categories.list resource',
        'create' => 'health::categories.create resource',
        'edit' => 'page::categories.edit resource',
        'destroy' => 'health::categories.destroy resource',
    ],
    'health.posts' => [
        'index' => 'health::posts.list resource',
        'create' => 'health::posts.create resource',
        'edit' => 'page::posts.edit resource',
        'destroy' => 'health::posts.destroy resource',
    ],
];
