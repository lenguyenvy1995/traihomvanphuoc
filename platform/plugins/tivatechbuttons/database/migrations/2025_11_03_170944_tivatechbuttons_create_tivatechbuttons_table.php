<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('tivatechbuttons')) {
            Schema::create('tivatechbuttons', function (Blueprint $table) {
                $table->id();
                $table->string('name', 255);
                $table->string('status', 60)->default('published');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('tivatechbuttons_translations')) {
            Schema::create('tivatechbuttons_translations', function (Blueprint $table) {
                $table->string('lang_code');
                $table->foreignId('tivatechbuttons_id');
                $table->string('name', 255)->nullable();

                $table->primary(['lang_code', 'tivatechbuttons_id'], 'tivatechbuttons_translations_primary');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tivatechbuttons');
        Schema::dropIfExists('tivatechbuttons_translations');
    }
};
