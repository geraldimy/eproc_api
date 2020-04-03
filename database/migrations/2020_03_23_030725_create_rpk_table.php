<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRpkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpk', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('user_id');
            $table->string('nama_rpk');
            $table->string('pemilik');
            $table->string('email')->nullable(true);
            $table->string('divre');
            $table->string('entitas');
            $table->string('npwp')->nullable(true);
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('alamat');
            $table->string('kode_pos');
            $table->string('telp');
            $table->decimal('latitude', 9, 6);
            $table->decimal('longitude', 9, 6);
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
        Schema::dropIfExists('rpk');
    }
}
