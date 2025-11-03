<?php

namespace Botble\ContactButtons\Providers;

use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Support\ServiceProvider;

class ContactButtonsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
        // Tải helpers (nếu có)
        $this->app->make('files')->requireOnce(__DIR__ . '/../../helpers/helpers.php');
    }

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/contact-buttons')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        // Đăng ký menu trong admin dashboard
        DashboardMenu::default()->beforeRetrieving(function (): void {
            DashboardMenu::make()
                ->registerItem([
                    'id'          => 'cms-plugins-contact-buttons',
                    'priority'    => 36,
                    'parent_id'   => null,
                    'name'        => 'plugins/contact-buttons::contact-buttons.name',
                    'icon'        => 'ti ti-headset', // hoặc 'fa-solid fa-phone' nếu bạn dùng FontAwesome
                    'url'         => route('contact-buttons.index'),
                    'permissions' => ['contact-buttons.index'],
                ]);
        });

   
    }
}