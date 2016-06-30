<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = "karyawan";

    protected $fillable = ['nik', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'hp', 'alamat', 'divisi_id'];

    public function divisi()
    {
    	return $this->belongsTo(Divisi::class, 'divisi_id');
    }
}


