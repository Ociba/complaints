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
        Schema::create('file_complaints', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('path'); // Full path in storage
            $table->string('file_type'); // e.g., 'audio_recording', 'video_file_upload', 'attachment'
            $table->string('original_name');
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('size')->nullable(); // File size in bytes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_complaints');
    }
};
