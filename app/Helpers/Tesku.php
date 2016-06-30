<?php
namespace App\Helpers;

class Tesku {

	public static function format_tanggal($tanggal)
	{
		$mnt = ["Januari", "Februari","Maret","April" ,"Mei", "Juni","Juli","Agustus","September","Oktober","Nopember","Desember"];
		$var = explode('-',$tanggal);
		$bln = ucwords($mnt[$var[1]-1]);
		return $var[2].'-'.$bln.'-'.$var[0];
	}

	public static function notif($status,$pesan)
	{
		$close = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		if($status == 'sukses')
		{
			$attr =  "<p class='alert alert-success'><span class='fa fa-check'></span> <strong>Sukses!</strong> ";
		}elseif($status == 'error')
		{
			$attr = "<p class='alert alert-danger'><span class='fa fa-exclamation-triangle'></span> <strong>Error!</strong> ";
		}else{
			$attr = "<p class='alert alert-info'><span class='fa fa-exclamation-triangle'></span> <strong>Info!</strong> ";
		}
		return $attr.$pesan.$close.'</p>';
	}

	public static function AutoNumbering($no)
	{
		if(is_null($no)){
			return sprintf('%06s',1);
		}
		$no++;
		return sprintf("%06s",$inc);
	}

}
