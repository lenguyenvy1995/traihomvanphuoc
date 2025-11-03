<?php

namespace Botble\ContactButtons;

use Botble\PluginManagement\Abstracts\PluginOperationAbstract;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;

class Plugin extends PluginOperationAbstract
{
    /**
     * Kích hoạt plugin – tạo bảng nếu chưa tồn tại
     */
    public static function activate(): void
    {
        try {
            Artisan::call('migrate', [
                '--path' => 'platform/plugins/contact-buttons/database/migrations',
                '--force' => true,
            ]);
        } catch (\Exception $e) {
            info('Migration error [contact-buttons]: ' . $e->getMessage());
        }
    }

    /**
     * Hủy kích hoạt plugin – không xóa bảng, chỉ dừng hoạt động
     */
    public static function deactivate(): void
    {

        if (Schema::hasTable('contact_buttons')) {
            Schema::dropIfExists('contact_buttons');
        }
        // Có thể thêm logic nếu cần (ví dụ clear cache)
        // Không nên xóa dữ liệu ở đây để tránh mất mát ngoài ý muốn
    }

    /**
     * Gỡ bỏ plugin – xóa hoàn toàn dữ liệu và bảng
     */
    public static function remove(): void
    {
        if (Schema::hasTable('contact_buttons')) {
            Schema::dropIfExists('contact_buttons');
        }
    }
}