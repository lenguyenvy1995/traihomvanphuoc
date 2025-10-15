<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('obituary_condolences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obituary_id')->constrained('obituaries')->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('password')->nullable();
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('obituary_condolences');
    }
};