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
        Schema::create('mitigation_measures_pac', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mitigation_measure_id');
            $table->unsignedBigInteger('pac_id');
            $table->text('rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mitigation_measures_pac', function (Blueprint $table) {
            //
        });
    }
};
