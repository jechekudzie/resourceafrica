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
        Schema::create('human_wildlife_conflicts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('species_id');
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('h_w_c_type_id');
            $table->unsignedBigInteger('h_w_c_outcome_id');
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('area')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('distance_to_community')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('human_wildlife_conflicts');
    }
};
