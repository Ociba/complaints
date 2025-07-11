<?php

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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type'); // 'text', 'audio', 'video'
            $table->text('content')->nullable(); // For text complaints
            $table->foreignId('file_complaint_id')->nullable()->constrained('file_complaints')->onDelete('set null'); // Nullable for text complaints
            $table->string('status')->default('pending'); // 'pending', 'resolved', 'in_progress'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
