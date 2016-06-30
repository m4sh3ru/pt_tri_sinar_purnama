<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerbaikanTable extends Migration
{
     
    public function up()
    {
        Schema::create('perbaikan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kerusakan_id')->unsigned();
            $table->datetime('selesai');
            $table->text('keterangan');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            //add foreignKey
            $table->foreign('kerusakan_id')->references('id')->on('kerusakan');
            $table->foreign('user_id')->references('id')->on('users'); #IT support
        });
    }

    public function down()
    {
        Schema::table('perbaikan', function(Blueprint $table){    
             $table->dropForeign('perbaikan_kerusakan_id_foreign'); 
             $table->dropForeign('perbaikan_user_id_foreign');   
        });
        Schema::drop('perbaikan');
    }
}

