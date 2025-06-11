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
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->id();

            // Contact Information
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // Notification Preferences
            $table->boolean('receive_email')->default(true);
            $table->boolean('receive_sms')->default(false);
            $table->boolean('is_primary')->default(false);

            // Additional Fields
            $table->string('additional_notes')->nullable();
            $table->integer('priority')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('is_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_contacts');
    }
};
