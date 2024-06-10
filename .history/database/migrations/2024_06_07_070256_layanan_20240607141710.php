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
        //
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_layanan');
            $table->string('title')->index();
            $table->string('desc')->index();
            $table->mediumText('isi');
            $table->longText('gambar')->nullable();
            $table->boolean('status')->index()->default(false);
            $table->string('url',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
