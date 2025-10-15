<?php

namespace Botble\Obituary;

use Botble\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function activate(): void {}
    public static function deactivate(): void {}
    public static function remove(): void {}
}