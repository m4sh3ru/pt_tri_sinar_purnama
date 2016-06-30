<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    protected $table = "kerusakan";
    protected $fillable = ['perangkat', 'divisi_id', 'progress', 'keterangan','user_id'];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function divisi()
    {
    	return $this->belongsTo(Divisi::class, 'divisi_id');
    }

    public function level_progress()
    {
        return $this->belongsTo(LevelProgress::class, 'progress');
    }
}
