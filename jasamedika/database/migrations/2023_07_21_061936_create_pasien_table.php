<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->string('id',12)->primary();
            $table->string('nama',255);
            $table->string('alamat',255);
            $table->string('no_telepon',15);
            $table->string('rt_rw',10);
            $table->bigInteger('kelurahan_id')->unsigned();
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin',255);
            $table->timestamps();
            
            $table->foreign('kelurahan_id')->references('id')->on('kelurahan')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
