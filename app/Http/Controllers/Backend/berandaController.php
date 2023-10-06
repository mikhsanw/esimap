<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Pegawai;
use App\Model\Jabatan;
use App\Model\Bidang;
use App\Model\Berkas;
class berandaController extends Controller
{
    public function index()
    {
        if(request()->user()->pegawai_id==null){
            $data = [
                'pegawai'=> Pegawai::count(),
                'jabatan'=> Jabatan::count(),
                'bidang'=> Bidang::count(),
            ];
        }else{
            $data = [
                'berkas' => Berkas::withCount('berkaspegawais')->whereHas('berkaspegawais.pegawai', function ($q) {
                    $q->whereId(request()->user()->pegawai_id);
                })->get(),

            ];
        }
        return view('backend.beranda.index',$data);
    }
}
