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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nm_pengguna')->nullable();
            $table->string('no_pendaftar')->nullable();
            $table->string('tmpt_pendaftar')->nullable();
            $table->date('tgl_pendaftar')->nullable();
            $table->string('nm_pendaftar')->nullable();
            $table->enum('jk_pendaftar',['P','W']);
            $table->string('almt_pendaftar')->nullable();
            $table->string('hp_pendaftar')->nullable();
            $table->string('jrsn_pendaftar')->nullable();
            $table->enum('sts_pendaftar',['0','1'])->nullable();
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
        Schema::dropIfExists('pendaftarans');
    }
};
