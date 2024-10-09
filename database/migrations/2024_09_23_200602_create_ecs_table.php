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
        Schema::create('ecs', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('code');
            $table->integer('masse_horaire');
            // $table->string('masse_horaire');
            $table->foreignId('ue_id')->cascadeOnDelete()->constrained();
            $table->unsignedBigInteger('professeur_id')->nullable();
            $table->foreign('professeur_id')->nullOnDelete()->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecs');
    }
};
