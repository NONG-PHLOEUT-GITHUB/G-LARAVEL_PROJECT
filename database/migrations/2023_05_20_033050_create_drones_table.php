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
        Schema::create('drones', function (Blueprint $table) {
            $table->id();

            $table->string('drone_type');
            $table->string('drone_name');
            $table->integer('battery');
            $table->integer('playload_capacity');

            $table->foreignId('user_id')->constrained(table:'users')->onDelete('cascade');
            $table->foreignId('plan_id')->constrained(table:'plans')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drones');
    }
};
