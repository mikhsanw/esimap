<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Pegawai;
use App\Model\Jabatan;
use App\Model\Bidang;
class berandaController extends Controller
{
    public function index()
    {
        $data = [
            'pegawai'=> Pegawai::count(),
            'jabatan'=> Jabatan::count(),
            'bidang'=> Jabatan::count(),
        ];

        return view('backend.beranda.index',$data);
    }
}
