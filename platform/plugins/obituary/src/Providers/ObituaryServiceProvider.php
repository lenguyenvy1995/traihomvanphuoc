<?php

namespace Botble\Obituary\Providers;

use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Base\Facades\DashboardMenu;
use Illuminate\Support\ServiceProvider;
use Botble\Slug\Facades\SlugHelper;
use Botble\Obituary\Models\Obituary;
class ObituaryServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/obituary')
            ->loadAndPublishConfigurations(fileNames: ['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        // Menu Admin
        DashboardMenu::default()->beforeRetrieving(function () {
            DashboardMenu::make()->registerItem([
                'id'          => 'cms-plugins-obituary',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/obituary::obituary.menu_name',
                'icon'        => 'ti ti-file-description',
                'url'         => route('obituary.index'),
                'permissions' => ['obituary.index'],
            ]);
        });
        SlugHelper::registering(function (): void {
            SlugHelper::registerModule(Obituary::class,'Cáo Phó');
            SlugHelper::setPrefix(Obituary::class, 'cao-pho'); // hoặc tùy bạn muốn
        });
    }
}