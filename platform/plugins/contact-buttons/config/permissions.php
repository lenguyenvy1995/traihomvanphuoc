<?php

return [
    [
        'name' => 'Contact Buttons',
        'flag' => 'contact-buttons.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'contact-buttons.create',
        'parent_flag' => 'contact-buttons.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'contact-buttons.edit',
        'parent_flag' => 'contact-buttons.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'contact-buttons.destroy',
        'parent_flag' => 'contact-buttons.index',
    ],
];