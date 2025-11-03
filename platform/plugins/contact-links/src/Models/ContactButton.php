<?php

namespace Botble\ContactButtons\Models;

use Botble\Base\Models\BaseModel;

class ContactButton extends BaseModel
{
    protected $table = 'contact_buttons';

    protected $fillable = [
        'label', 'icon_class', 'image', 'url',
        'bg_color', 'text_color', 'target',
        'position', 'sort_order', 'is_active', 'style',
    ];
}