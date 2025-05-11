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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->date('birthdate');
            $table->foreignId('class_id')->constrained(table: 'classes', indexName: 'class_id');
            $table->foreignId('specie_id')->constrained(table: 'species', indexName: 'specie_id');
            $table->string('habitat');
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
