<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->date('date');
            $table->time('time');
            $table->string('image')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('organization_id')->constrained();
            $table->foreignId('species_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
