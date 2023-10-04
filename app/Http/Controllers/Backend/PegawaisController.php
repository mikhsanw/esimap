<?php

namespace App\Http\Controllers\Backend;

use App\Model\Bidang;
use App\Model\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Auth;
class PegawaisController extends Controller
{
    public function index()
    {
        return view('backend.'.$this->kode.'.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $data= ((Auth::user()->pegawai_id==null) ?$this->model::query():$this->model::whereId(Auth::user()->pegawai_id))->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', '<div style="text-align: center;">
               '.(Auth::user()->pegawai_id==null ? '<div style="text-align: center;">
                <a href="'.url('berkas/{{ $id }}').'" title="Menu" >
                    <i class="fas fa-share"></i>
                </a>&nbsp; &nbsp;':'').
                '<a class="edit ubah" data-toggle="tooltip" data-placement="top" title="Edit" '.$this->kode.'-id="{{ $id }}" href="#edit-{{ $id }}">
                    <i class="fa fa-edit text-warning"></i>
                </a>&nbsp; &nbsp;'
                .(Auth::user()->pegawai_id==null ? '<a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" href="#hapus-{{ $id }}" '.$this->kode.'-id="{{ $id }}">
                    <i class="fa fa-trash text-danger"></i>
                </a>' :'')
                .'</div>')
                ->toJson();
        }
        else {
            exit("Not an AJAX request -_-");
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data=[
			'jenis_kelamin'	=> config('master.jenis_kelamin'),
			'agama'	=> config('master.agama'),
			'jabatan'	=> Jabatan::pluck('nama','id'),
			'bidang'	=> Bidang::pluck('nama','id'),
		];

        return view('backend.'.$this->kode.'.tambah' ,$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator=Validator::make($request->all(), [
					'nama' => 'required|'.config('master.regex.json'),
					'nip' => 'required|'.config('master.regex.json'),
                    'jabatan_id' => 'required',
                    'bidang_id' => 'required',
                ]);
            if ($validator->fails()) {
                $respon=['status'=>false, 'pesan'=>$validator->messages()];
            }
            else {
                $this->model::create($request->all());
                $respon=['status'=>true, 'pesan'=>'Data berhasil disimpan'];
            }
            return $respon;
        }
        else {
            exit('Ops, an Ajax request');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[
            'data'    => $this->model::find($id),
			'jenis_kelamin'	=> config('master.jenis_kelamin'),
			'agama'	=> config('master.agama'),
			'jabatan'	=> Jabatan::pluck('nama','id'),
			'bidang'	=> Bidang::pluck('nama','id'),
        ];
        return view('backend.'.$this->kode.'.ubah', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $validator=Validator::make($request->all(), [
                					'nama' => 'required|'.config('master.regex.json'),
					'nip' => 'required|'.config('master.regex.json'),
					'nik' => 'required|'.config('master.regex.json'),
					'tempat_lahir' => 'required|'.config('master.regex.json'),
					'tanggal_lahir' => 'required|'.config('master.regex.json'),
					'jenis_kelamin' => 'required|'.config('master.regex.json'),
					'agama' => 'required|'.config('master.regex.json'),
					'rt' => 'required|'.config('master.regex.json'),
					'rw' => 'required|'.config('master.regex.json'),
					'desa' => 'required|'.config('master.regex.json'),
					'kelurahan' => 'required|'.config('master.regex.json'),
					'kecamatan' => 'required|'.config('master.regex.json'),
					'kabupaten' => 'required|'.config('master.regex.json'),
					'provinsi' => 'required|'.config('master.regex.json'),
                    'jabatan_id' => 'required',
                    'bidang_id' => 'required',
            ]);
            if ($validator->fails()) {
                $response=['status'=>FALSE, 'pesan'=>$validator->messages()];
            }
            else {
                $this->model::find($id)->update($request->all());
                $respon=['status'=>true, 'pesan'=>'Data berhasil diubah'];
            }
            return $response ?? ['status'=>TRUE, 'pesan'=>['msg'=>'Data berhasil diubah']];
        }
        else {
            exit('Ops, an Ajax request');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $data=$this->model::find($id);
        return view('backend.'.$this->kode.'.hapus', ['data'=>$data]);
    }

    public function destroy($id)
    {
        $data=$this->model::find($id);
        if ($data->delete()) {
            $response=['status'=>TRUE, 'pesan'=>['msg'=>'Data berhasil dihapus']];
        }
        else {
            $response=['status'=>FALSE, 'pesan'=>['msg'=>'Data gagal dihapus']];
        }
        return response()->json($response);
    }
}
