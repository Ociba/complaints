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
        Schema::table('complaint_locations', function (Blueprint $table) {
            $table->decimal('accuracy', 8, 2)->nullable()->after('longitude');
            $table->decimal('altitude', 8, 2)->nullable()->after('accuracy');
            $table->decimal('heading', 8, 2)->nullable()->after('latitude');
            $table->decimal('speed', 8, 2)->nullable()->after('heading');
            $table->decimal('speed_accuracy', 8, 2)->nullable()->after('speed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('complaints_location', function (Blueprint $table) {
            //
        });
    }
};
