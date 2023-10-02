<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PendidikansController extends Controller
{
    public function index()
    {
        return view('backend.'.$this->kode.'.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $data= $this->model::query();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', '<div style="text-align: center;">
               <a class="edit ubah" data-toggle="tooltip" data-placement="top" title="Edit" '.$this->kode.'-id="{{ $id }}" href="#edit-{{ $id }}">
                   <i class="fa fa-edit text-warning"></i>
               </a>&nbsp; &nbsp;
               <a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" href="#hapus-{{ $id }}" '.$this->kode.'-id="{{ $id }}">
                   <i class="fa fa-trash text-danger"></i>
               </a>
           </div>')->toJson();
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
			'pegawai_id'	=> \App\Model\Pegawai::pluck('nama','id'),
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
					'jenjang' => 'required|'.config('master.regex.json'),
					'institusi' => 'required|'.config('master.regex.json'),
					'prodi' => 'required|'.config('master.regex.json'),
					'tahun' => 'required|'.config('master.regex.json'),
                ]);
            if ($validator->fails()) {
                $respon=['status'=>false, 'pesan'=>$validator->messages()];
            }
            else {
                $request->request->add(['pegawai_id'=>Auth::user()->pegawai_id]);
                $data = $this->model::create($request->all());
                if ($request->hasFile('file')) {
                    $data->file()->create([
                        'name' => 'pendidikan',
                        'data' => [
                            'disk'      => config('filesystems.default'),
                            'target'    => Storage::putFile($this->kode.'/pendidikan/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('file')),
                        ]
                    ]);
                }
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
			'pegawai_id'	=> \App\Model\Pegawai::pluck('nama','id'),

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
                	'jenjang' => 'required|'.config('master.regex.json'),
					'institusi' => 'required|'.config('master.regex.json'),
					'prodi' => 'required|'.config('master.regex.json'),
					'tahun' => 'required|'.config('master.regex.json'),
            ]);
            if ($validator->fails()) {
                $response=['status'=>FALSE, 'pesan'=>$validator->messages()];
            }
            else {
                $data = $this->model::find($id);
                $data->update($request->all());
                if ($request->hasFile('file')) {
                    $data->file()->updateOrCreate(['name'=>'pendidikan'],[
                        'data' => [
                            'disk'      => config('filesystems.default'),
                            'target'    => Storage::putFile($this->kode.'/pendidikan/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('file')),
                        ]
                    ]);
                }
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