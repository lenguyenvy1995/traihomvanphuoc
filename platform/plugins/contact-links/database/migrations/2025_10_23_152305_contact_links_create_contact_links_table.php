<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('contact_links')) {
            Schema::create('contact_links', function (Blueprint $table) {
                $table->id();
                $table->string('name', 255);
                $table->string('status', 60)->default('published');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('contact_links_translations')) {
            Schema::create('contact_links_translations', function (Blueprint $table) {
                $table->string('lang_code');
                $table->foreignId('contact_links_id');
                $table->string('name', 255)->nullable();

                $table->primary(['lang_code', 'contact_links_id'], 'contact_links_translations_primary');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_links');
        Schema::dropIfExists('contact_links_translations');
    }
};
