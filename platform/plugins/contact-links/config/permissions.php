<?php

return [
    [
        'name' => 'Contact links',
        'flag' => 'contact-links.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'contact-links.create',
        'parent_flag' => 'contact-links.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'contact-links.edit',
        'parent_flag' => 'contact-links.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'contact-links.destroy',
        'parent_flag' => 'contact-links.index',
    ],
];
