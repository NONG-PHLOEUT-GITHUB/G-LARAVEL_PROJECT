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
        Schema::create('farms', function (Blueprint $table) {
            $table->id();
            $table->string('farm_name');
            $table->text('description');
            $table->unsignedBigInteger('map_id')->unsigned();
            $table->foreignId('user_id')->constrained(table:'users')->onDelete('cascade');
            $table->foreignId('map_id')->constrained(table:'maps')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farms');
    }
};
