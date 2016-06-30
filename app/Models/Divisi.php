<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = "divisi";
    protected $fillable = ['nama'];

    #set timestamps to disabled
    public $timestamps = false;


    public function karyawan()
    {
    	return $this->hasMany('Karyawan', 'divisi_id');
    }
}
