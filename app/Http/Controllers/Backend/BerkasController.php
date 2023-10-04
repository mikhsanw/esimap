<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BerkasController extends Controller
{
    public function index()
    {
        return view('backend.'.$this->kode.'.index');
    }

    public function data(Request $request,$id=null)
    {
        if ($request->ajax()) {
            $data= $this->model::query();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('kelola',function($q) use ($id){
                    $kelola = $id==null?'<div style="text-align: center;">
                            <a href="'.url('berkaspegawais/'.$q->id).'" title="Lengkapi" >
                                <i class="fas fa-share"></i>
                            </a>
                        </div>':'<div style="text-align: center;">
                        <a href="'.url('berkaspegawaisadmin/'.$q->id.'/'.$id).'" title="Lengkapi" >
                            <i class="fas fa-share"></i>
                        </a>
                    </div>';
                    return $kelola;
                })
               ->rawColumns(['kelola'])->make(TRUE);
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
		//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.'.$this->kode.'.index_admin',compact('id'));
        
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
			'type_berkas'	=> config('master.type_berkas'),

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
        //
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
        //
    }
}