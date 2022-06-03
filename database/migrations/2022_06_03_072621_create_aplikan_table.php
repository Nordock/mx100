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
        Schema::create('aplikan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aplikan');
            $table->string('email');
            $table->string('cv');
            $table->unsignedBigInteger('id_lowongan');
            $table->foreign('id_lowongan')->references('id')->on('lowongan');
            $table->softDeletes();
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
        Schema::dropIfExists('aplikan');
    }
};
