<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $casts=[
        'id'=>'string',
    ];

    protected $fillable=[
        'id', 'nama', 'nip', 'nik', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'rt', 'rw', 'desa', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi','jabatan_id','bidang_id'
    ];
    
	public function riwayatjabatans()
	{
		return $this->hasMany('App\Model\RiwayatJabatan');
	}

	public function pendidikans()
	{
		return $this->hasMany('App\Model\Pendidikan');
	}
	
	public function kenaikans()
	{
		return $this->hasMany('App\Model\Kenaikan');
	}

	public function jabatan()
	{
		return $this->belongsTo('App\Model\Jabatan');
	}

	public function bidang()
	{
		return $this->belongsTo('App\Model\Bidang');
	}
}
