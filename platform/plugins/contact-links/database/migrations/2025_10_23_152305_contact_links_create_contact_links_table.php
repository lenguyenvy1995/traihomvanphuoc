<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('contact_buttons', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('icon_class')->nullable();        // ví dụ: 'fa-brands fa-facebook-messenger'
            $table->string('image')->nullable();             // ảnh tuỳ chọn (upload icon riêng)
            $table->string('url');                           // tel:, mailto:, https://zalo.me/..., messenger...
            $table->string('bg_color')->nullable();          // ví dụ: #00c853
            $table->string('text_color')->nullable();        // ví dụ: #ffffff
            $table->enum('target', ['_self','_blank'])->default('_blank');
            $table->string('position')->default('right');    // left/right/bottom
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('style')->default('1');           // 1|2|3 dùng cho override per-button nếu muốn
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('contact_buttons');
    }
};