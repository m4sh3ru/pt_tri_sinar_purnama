<?php

namespace App\Http\Requests\Pegawai;

use App\Http\Requests\Request;

class AdmPegawaiRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nik'=>'required|min:5|unique:karyawan,nik',
            'nama_lengkap'=>'required|min:5',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'date|required',
            'hp'=>'numeric|min:11|required',
            'alamat'=>'min:15',
        ];
    }
}
