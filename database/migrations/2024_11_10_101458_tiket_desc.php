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
        Schema::create('tiket_desc', function (Blueprint $table) {
            $table->id();
            $table->string('id_tiket');
            $table->string('name');
            $table->integer('harga');
            $table->string('deskripsi');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('tiket_desc');
    }
};
