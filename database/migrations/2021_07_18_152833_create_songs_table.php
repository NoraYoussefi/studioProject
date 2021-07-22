<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {

            $table->id();
            $table->String('name');
            $table->String('bio');
            $table->String('fullName');
            $table->String('songDate');
            $table->String('path');
            $table->String('ex');
            $table->String('size');
            $table->String('lyrics');

            $table->unsignedInteger('id_artist');
            $table->unsignedInteger('id_album');

            $table->timestamps();

            $table->foreign('id_artist')->references('idArtist')->on('artists')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_album')->references('idAlbum')->on('albums')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
