
<div class="row">
    <div class="col-xl-4">
        <a href="#" class="box bg-primary bg-hover-danger">
            <div class="box-body">
                <span class="text-white icon-User font-size-40"><span class="path1"></span><span class="path2"></span> {{$pegawai}}</span>
                <h1></h1>
                <div class="text-white font-weight-600 font-size-18 mb-2 mt-5">Pegawai</div>
            </div>
        </a>
    </div>
    <div class="col-xl-4">
        <a href="#" class="box bg-info bg-hover-danger">
            <div class="box-body">
                <span class="text-white icon-Bag font-size-40"><span class="path1"></span><span class="path2"></span> {{$jabatan}}</span>
                <h1></h1>
                <div class="text-white font-weight-600 font-size-18 mb-2 mt-5">Jabatan</div>
            </div>
        </a>
    </div>
    <div class="col-xl-4">
        <a href="#" class="box bg-warning bg-hover-danger">
            <div class="box-body">
                <span class="text-white icon-Book font-size-40"><span class="path1"></span><span class="path2"></span> {{$bidang}}</span>
                <h1></h1>
                <div class="text-white font-weight-600 font-size-18 mb-2 mt-5">Bidang</div>
            </div>
        </a>
    </div>
    <div class="col-xl-12">

        <div class="box">
            <div class="box-header with-border">
				<h4 class="box-title d-block text-left"><i class="fas fa-bell"></i> Pemeberitahuan Kenaikan Gaji Pegawai</h4>
			</div>
            <div class="box-body">
        <table class="table table-striped dataTable">
<thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Sisa Hari</th>
    </tr>
</thead>
<tbody>
    @foreach(\App\Model\Pegawai::withwherehas('kenaikans',function ($r){
        $r->latest('id')->take(1);
    })->get() as $k=> $row)
    <tr>
        <td>{{$k+1}}</td>
        <td>{{$row->nama}}</td>
        <td>{{date('d M Y',strtotime($row->kenaikans->first()-> tanggal))}}</td>
        <td>{{Help::countdown($row->kenaikans->first()-> tanggal)}}</td>
    </tr>
    @endforeach
</tbody>
        </table>
    </div>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
	$('.dataTable').DataTable();
    });
</script>
