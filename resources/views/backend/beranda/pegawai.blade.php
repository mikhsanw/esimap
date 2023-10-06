
<div class="row">
    <div class="col-xl-12">

        <div class="box">
            <div class="box-header with-border">
				<h4 class="box-title d-block text-left"><i class="fas fa-bell"></i> Pemeberitahuan Kenaikan  Gaji Pegawai</h4>
			</div>
            <div class="box-body">
                @php
                $info = \App\Model\Kenaikan::wherePegawaiId(request()->user()->pegawai_id)->latest('id')->first();
                @endphp
                @if( Help::countdown($info->tanggal) > 0)
                <div class="alert alert-warning ">
                    <span style="font-size:20px">Anda memiliki <b>{{Help::countdown($info->tanggal)}}</b> hari lagi untuk menyiapkan berkas kenaikan gaji berkala</span>
                </div>
                @else
                <center>Belum ada info kenaikan</center>
                @endif
    </div>
</div>
</div>
<div class="col-xl-12">

    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title d-block text-left"><i class="fas fa-folder"></i> Berkas Anda</h4>
        </div>
        <div class="box-body">
            <div class="row">
    @forelse($berkas as $row)
    <div class="col-xl-4">
        <a href="{{url('berkaspegawais/index/'.$row->id)}}" class="box bg-primary bg-hover-danger">
            <div class="box-body">
                <span class="text-white icon-Folder font-size-40"><span class="path1"></span><span class="path2"></span> {{$row->berkaspegawais_count}}</span>
                <h1></h1>
                <div class="text-white font-weight-600 font-size-18 mb-2 mt-5">Berkas {{$row->nama}}</div>
            </div>
        </a>
    </div>
    @empty
    <div class="col-xl-12">
        Belum ada bekas
    </div>
    @endforelse
</div>


</div>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
	$('.dataTable').DataTable();
    });
</script>
