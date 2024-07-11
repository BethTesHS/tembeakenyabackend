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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('no_of_hikes')->default(0);
            $table->unsignedFloat('total_distance_walked', 8, 2)->default(0);
            $table->unsignedBigInteger('no_of_steps_taken')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('no_of_hikes');
            $table->dropColumn('total_distance_walked');
            $table->dropColumn('no_of_steps_taken');
        });
    }
};
