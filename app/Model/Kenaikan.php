<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kenaikan extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $casts=[
        'id'=>'string',
    ];

    protected $fillable=[
        'id', 'pegawai_id', 'tanggal', 'keterangan',
    ];
    
	public function pegawai()
	{
		return $this->belongsTo('App\Model\Pegawai');
	}
}
