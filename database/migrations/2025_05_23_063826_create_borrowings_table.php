<?php

use App\Enums\BorrowingStatusEnum;
use App\Models\User;
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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->comment('siapa yang meminjam')->constrained()->cascadeOnDelete();
            $table->timestamp('borrowed_at');
            $table->date('due_date');
            $table->timestamp('returned_at')->nullable();
            $table->enum('status', array_column(BorrowingStatusEnum::cases(), 'value'))->default(BorrowingStatusEnum::BORROWED->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
