<?php

namespace Botble\Tivatechbuttons;

use Illuminate\Support\Facades\Schema;
use Botble\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        Schema::dropIfExists('Tivatechbuttons');
        Schema::dropIfExists('Tivatechbuttons_translations');
    }
}
