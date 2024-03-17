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

        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('questionId')->constrained('questions')->references('id')->cascadeOnDelete();
            $table->string('description')->nullable();
            $table->string('img')->nullable();
            $table->boolean('istrue')->default(0);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choices');
    }
};
