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
        Schema::create('ec_dones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ec_id')->nullOnDelete()->constrained();
            $table->date( 'day');
            $table->integer('nbr_hour');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ec_dones');
    }
};
