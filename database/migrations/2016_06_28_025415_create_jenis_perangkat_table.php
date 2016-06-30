<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisPerangkatTable extends Migration
{
     
    public function up()
    {
        Schema::create('jenis_perangkat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50)->unique();          
        });
        
    }

    public function down()
    {
        Schema::drop('jenis_perangkat');
    }
}
