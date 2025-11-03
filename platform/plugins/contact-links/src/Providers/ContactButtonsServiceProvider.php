<?php

namespace Botble\ContactButtons\Providers;

use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Support\ServiceProvider;
use Botble\Theme\Supports\ThemeSupport;
use Shortcode; // Botble shortcode
use Botble\ContactButtons\Models\ContactButton;

class ContactButtonsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
        $this->setNamespace('plugins/contact-buttons')
             ->loadAndPublishConfigurations(['permissions'])
             ->loadAndPublishTranslations()
             ->loadRoutes()
             ->loadMigrations()
             ->loadAndPublishViews()
             ->publishAssets();
    }

    public function boot(): void
    {
        // Menu admin
        dashboard_menu()
            ->registerItem([
                'id'          => 'cms-plugins-contact-buttons',
                'priority'    => 36,
                'parent_id'   => null,
                'name'        => 'Contact Buttons',
                'icon'        => 'ti ti-headset',
                'url'         => route('contact-buttons.index'),
                'permissions' => ['contact-buttons.index'],
            ]);

        // Đăng ký shortcode: [contact-buttons style="1" position="right"]
        if (class_exists('Shortcode')) {
            Shortcode::register('contact-buttons', __('Contact Buttons'), __('Show contact buttons'),
                function ($shortcode) {
                    $style = $shortcode->style ?? '1';
                    $position = $shortcode->position ?? 'right';

                    $buttons = ContactButton::query()
                        ->where('is_active', true)
                        ->orderBy('sort_order')
                        ->get();

                    return view('plugins/contact-buttons::shortcodes.contact-buttons', compact('buttons','style','position'))->render();
                });

            Shortcode::setAdminConfig('contact-buttons', function ($attributes) {
                return view('plugins/contact-buttons::shortcodes.admin-config', compact('attributes'))->render();
            });
        }

        // Tự động enqueue assets (tuỳ theme)
        ThemeSupport::registerAssets(function () {
            theme_enqueue_style('contact-buttons-css', 'vendor/core/plugins/contact-buttons/css/contact-buttons.css');
            theme_enqueue_script('contact-buttons-js', 'vendor/core/plugins/contact-buttons/js/contact-buttons.js', [], [], true);
        });
    }
}