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
        Schema::create('filiere_ue', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filiere_id')->nullOnDelete()->constrained();
            $table->foreignId('ue_id')->nullOnDelete()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_filiere_ue');
    }
};
