<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelProgressTable extends Migration
{
    public function up()
    {
        Schema::create('level_progress', function (Blueprint $table) {
            $table->increments('id');
            $table->string('progress',50);
        });
    }

    public function down()
    {
        Schema::drop('level_progress');
    } //
}
