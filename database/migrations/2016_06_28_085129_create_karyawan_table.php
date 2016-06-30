<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawanTable extends Migration
{
    
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik')->unique(); //no. induk karyawan
            $table->string('nama_lengkap', 50);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('hp', 15);
            $table->integer('divisi_id')->unsigned();
            $table->string('alamat');
            $table->enum('is_aktif', [1,0]);#1 = aktif #2 = Non Aktif/Keluar/Dipecat
            $table->timestamps();

            $table->foreign('divisi_id')->references('id')->on('divisi');
        });
    }

    public function down()
    {
        Schema::table('karyawan', function(Blueprint $table){    
             $table->dropForeign('karyawan_divisi_id_foreign');       
        });
        Schema::drop('karyawan');
    }
}
