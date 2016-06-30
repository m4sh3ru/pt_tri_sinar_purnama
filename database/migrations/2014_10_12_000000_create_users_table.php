<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique(); //recomended with no. karyawan
            #$table->string('email')->unique();
            $table->string('password', 60);
            $table->enum('level_user',[ 1 , 2, 3])->default(3);// 1=>'Administrator', 2 => 'IT Manager', 3 => 'Staff Divisi'
            $table->enum('is_aktif',[ 1, 0])->default(0);// 1 =>'Aktif', 0 => 'Non Aktif
            $table->rememberToken();
            $table->timestamps();
        });

        //insert default user administrator
        DB::table('users')->insert(['username'=>'admin', 'password'=>bcrypt('1234'), 'level_user'=>1, 'is_aktif'=>1]);
    }

    public function down()
    {
        Schema::drop('users');
    }
}
