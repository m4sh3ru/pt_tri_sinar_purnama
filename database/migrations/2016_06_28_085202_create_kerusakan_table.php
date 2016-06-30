<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKerusakanTable extends Migration
{

    public function up()
    {
        Schema::create('kerusakan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('perangkat', 100);
            $table->integer('divisi_id')->unsigned();
            $table->integer('progress')->unsigned();
            $table->text('keterangan');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('progress')->references('id')->on('level_progress');//1=>'menunggu antrian', 2 => 'dalam proses perbaikan', 3 => 'selesai'
            $table->foreign('divisi_id')->references('id')->on('divisi');
            $table->foreign('user_id')->references('id')->on('users'); #user yang membuat laporan kerusakan
        });
    }


    public function down()
    {
       Schema::table('kerusakan', function(Blueprint $table){
            $table->dropForeign('kerusakan_user_id_foreign');
            $table->dropForeign('kerusakan_progress_foreign');
            $table->dropForeign('kerusakan_divisi_id_foreign');
        });
        Schema::drop('kerusakan'); 
        
    }
}
