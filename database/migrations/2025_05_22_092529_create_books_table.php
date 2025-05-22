<?php

use App\Enums\GlobalActiveStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->json('images');
            $table->string('title');
            $table->string('isbn')->unique();
            $table->text('summary')->nullable();
            $table->enum('status', array_column(GlobalActiveStatusEnum::cases(), 'value'))->default(GlobalActiveStatusEnum::ACTIVE->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
