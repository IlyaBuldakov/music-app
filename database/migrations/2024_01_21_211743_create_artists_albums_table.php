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
        Schema::create('artists_albums', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('artist_id')->index();
            $table->bigInteger('album_id')->index();
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists_albums');
    }
};
