<?php

return [
    [
        'name' => 'Tivatechbuttons',
        'flag' => 'tivatechbuttons.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'tivatechbuttons.create',
        'parent_flag' => 'tivatechbuttons.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'tivatechbuttons.edit',
        'parent_flag' => 'tivatechbuttons.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'tivatechbuttons.destroy',
        'parent_flag' => 'tivatechbuttons.index',
    ],
];
