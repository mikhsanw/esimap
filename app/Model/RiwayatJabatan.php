<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiwayatJabatan extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $casts=[
        'id'=>'string',
    ];

    protected $fillable=[
        'id', 'tahun', 'jabatan_id', 'pegawai_id',
    ];
    
	public function jabatan()
	{
		return $this->belongsTo('App\Model\Jabatan');
	}

	public function pegawai()
	{
		return $this->belongsTo('App\Model\Pegawai');
	}

	public function file()
    {
        return $this->morphOne(File::class, 'morph');
    }

}
