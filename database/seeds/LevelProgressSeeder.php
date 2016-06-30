<?php

use Illuminate\Database\Seeder;

class LevelProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
    		['progress'=>'menunggu antrian'],
    		['progress'=>'dalam proses perbaikan'],
    		['progress'=>'selesai']
    	];
       return DB::table('level_progress')->insert($data);
    }
}