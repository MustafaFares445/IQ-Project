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
        Schema::disableForeignKeyConstraints();

        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('typeId')->constrained('types')->references('id')->cascadeOnDelete();
            $table->foreignId('userId')->constrained('users')->references('id')->cascadeOnDelete();

            $table->bigInteger('iq');
            $table->string('name');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
