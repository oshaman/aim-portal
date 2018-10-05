<?php
return [
    'mail_from'=> env('MAIL_FROM', 'hello@example.com'),
    'locales' => ['uk', 'ru'],
    'no_image' => '/img/no-image.jpg',

    'roles' => [
        ['name' => 'admin'],
        ['name' => 'moderator'],
        ['name' => 'editor'],
        ['name' => 'guest'],
        ['name' => 'user'],
        ['name' => 'manager'],
        ['name' => 'employee']
    ],
];
