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
        Schema::create('group_hike_attendees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_hike_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('emergency_contact');
            $table->timestamps();

            $table->foreign('group_hike_id')->references('id')->on('group_hikes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_hike_attendees');
    }
};
