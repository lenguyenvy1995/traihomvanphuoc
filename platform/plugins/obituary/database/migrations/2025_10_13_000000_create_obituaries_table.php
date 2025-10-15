<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('obituaries', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // deceased person name
            $table->string('slug')->unique()->nullable();
            $table->string('avatar')->nullable(); // profile image
            $table->string('honorific_title')->nullable();
            $table->text('condolence_message')->nullable();
            $table->string('funeral_host')->nullable(); // "chủ tang"
            $table->text('content')->nullable(); // main obituary content
            $table->text('wreath')->nullable(); //vòng hoa
            $table->longText('funeral_program')->nullable(); // detailed funeral schedule
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_death')->nullable();
            $table->string('place')->nullable();
            $table->string('status')->default('published');
            $table->string('account_holder')->nullable(); // Chủ tài khoản
            $table->string('bank_name')->nullable();     // Tên ngân hàng
            $table->string('account_number')->nullable();     // Số tài khoản
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('obituaries');
    }
};