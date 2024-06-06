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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->integer('stock');
            $table->integer('modal');
            $table->integer('feedropship');
            $table->integer('feedokter');
            $table->integer('feeadmin');
            $table->integer('laba');
            $table->integer('feelayanan');
            $table->integer('hargacoret');
            $table->integer('hargaasli');
            $table->string('gambarutama');
            $table->string('gambar1')->nullable();
            $table->string('gambar2')->nullable();
            $table->string('gambar3')->nullable();
            $table->boolean('iskhusus'); // Tidak nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
