<?php

namespace Botble\Tivatechbuttons\Providers;

use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Base\Facades\DashboardMenu;
use Botble\Tivatechbuttons\Models\Tivatechbuttons;

class TivatechbuttonsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/tivatechbuttons')
            ->loadHelpers()
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishTranslations()
            ->loadRoutes()
            ->loadAndPublishViews()
            ->loadMigrations();
            
            if (defined('LANGUAGE_ADVANCED_MODULE_SCREEN_NAME')) {
                \Botble\LanguageAdvanced\Supports\LanguageAdvancedManager::registerModule(Tivatechbuttons::class, [
                    'name',
                ]);
            }
            
            DashboardMenu::default()->beforeRetrieving(function () {
                DashboardMenu::registerItem([
                    'id' => 'cms-plugins-tivatechbuttons',
                    'priority' => 5,
                    'parent_id' => null,
                    'name' => 'plugins/tivatechbuttons::tivatechbuttons.name',
                    'icon' => 'ti ti-box',
                    'url' => route('tivatechbuttons.index'),
                    'permissions' => ['tivatechbuttons.index'],
                ]);
            });
    }
}
