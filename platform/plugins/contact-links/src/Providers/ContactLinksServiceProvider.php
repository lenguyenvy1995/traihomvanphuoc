<?php

namespace Botble\ContactLinks\Providers;

use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Base\Facades\DashboardMenu;
use Botble\ContactLinks\Models\ContactLinks;

class ContactLinksServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/contact-links')
            ->loadHelpers()
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishTranslations()
            ->loadRoutes()
            ->loadAndPublishViews()
            ->loadRoutes(fileNames: ['web']);
            
            // if (defined('LANGUAGE_ADVANCED_MODULE_SCREEN_NAME')) {
            //     \Botble\LanguageAdvanced\Supports\LanguageAdvancedManager::registerModule(ContactLinks::class, [
            //         'name',
            //     ]);
            // }
            
            DashboardMenu::default()->beforeRetrieving(function () {
                DashboardMenu::make()->registerItem([
                    'id' => 'cms-plugins-contact links',
                    'priority' => 5,
                    'parent_id' => null,
                    'name' => 'plugins/contact links::contact links.name',
                    'icon' => 'ti ti-box',
                    'url' => route('contact links.index'),
                    'permissions' => ['contact links.index'],
                ]);
            });
            
    }
}
