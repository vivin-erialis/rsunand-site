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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('title',100)->index();
            $table->string('desc')->index();
            $table->mediumText('isi');
            $table->string('gambar')->nullable();
            $table->boolean('status')->index()->default(false);
            $table->string('url',100);
            // $table->integer('profil_id')->index()->unsigned()->nullable();
            $table->integer('kategori_id')->index()->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
