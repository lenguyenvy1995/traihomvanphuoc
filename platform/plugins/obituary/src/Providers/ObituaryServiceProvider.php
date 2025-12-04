<?php

namespace Botble\Obituary\Providers;

use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Base\Facades\DashboardMenu;
use Botble\Slug\Facades\SlugHelper;
use Botble\Obituary\Models\Obituary;
use Illuminate\Support\ServiceProvider;

use Botble\LanguageAdvanced\Supports\LanguageAdvancedManager;
class ObituaryServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;
    public function register(): void
    {
        // Load helpers
        $this->app->make('files')->requireOnce(__DIR__ . '/../../helpers/constants.php');
        $this->app->make('files')->requireOnce(__DIR__ . '/../../helpers/helpers.php');
    }

    public function boot(): void
    {
        // ❗ KHÔNG dùng parent::boot()

        $this
            ->setNamespace('plugins/obituary')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadHelpers()
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']); // route plugin hợp lệ

        // 🔥 Đăng ký slug module tại đây
        SlugHelper::registerModule(Obituary::class, 'Cáo Phó');
        SlugHelper::setPrefix(Obituary::class, 'cao-pho'); // đổi theo ý bạn

        // Thêm menu admin
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
        $this->app->booted(function () {
            if (is_plugin_active('language-advanced')) {
                LanguageAdvancedManager::registerModule(Obituary::class, [
                    'name', 'description', 'content' // field cần dịch
                ]);
            }
        });
    }
}
