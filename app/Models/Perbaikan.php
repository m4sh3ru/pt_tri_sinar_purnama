<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    protected $table = "perbaikan";
    protected $fillable = ['kerusakan_id', 'selesai', 'keterangan', 'user_id'];


    public function kerusakan()
    {
    	return $this->belongsTo(Kerusakan::class, 'kerusakan_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

}
