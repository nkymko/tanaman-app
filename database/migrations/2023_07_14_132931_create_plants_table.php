<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('category_id')->onDelete('cascade');
            $table->foreignId('location_id')->onDelete('cascade');
            $table->text('khasiat')->nullable();
            $table->string('latin')->nullable();
            $table->text('thumbnail')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('uniqid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plants');
    }
};
