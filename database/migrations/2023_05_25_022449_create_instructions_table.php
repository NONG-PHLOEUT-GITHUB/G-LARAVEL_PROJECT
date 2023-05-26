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
        Schema::create('instructions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('take_off');
            $table->dateTime('landing');
            $table->dateTime('return_back');
            $table->integer('recharge');
            $table->foreignId('drone_id')->constrained(table:'drones')->onDelete('cascade');
            $table->foreignId('plan_id')->constrained(table:'plans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructions');
    }
};
