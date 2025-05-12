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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('car_id'); // unique per client
            $table->string('type');
            $table->date('registered');
            $table->boolean('ownbrand');
            $table->unsignedInteger('accidents');
            $table->timestamps();

            $table->unique(['client_id', 'car_id']); // enforce uniqueness per client
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
