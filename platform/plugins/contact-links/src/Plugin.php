<?php

namespace Botble\ContactLinks;

use Illuminate\Support\Facades\Schema;
use Botble\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        Schema::dropIfExists('Contact Links');
        Schema::dropIfExists('Contact Links_translations');
    }
}
