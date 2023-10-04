{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.update', $data->id], 'class' => 'form account-form', 'method' => 'PUT', 'files' => 'true')) !!}
<div class="row">
    <div class="col-md-12">
		<p>
			{!! Form::label('tahun', 'Masukkan Tahun', ['class'=>'control-label']) !!}
			{!! Form::text('tahun', $data->tahun, array('id' => 'tahun', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('keterangan', 'Masukkan Keterangan', ['class'=>'control-label']) !!}
			{!! Form::textarea('keterangan', $data->keterangan, array('id' => 'keterangan', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
            {!! Form::label('file', 'Upload Berkas Terkait', array('class' => 'control-label')) !!}
            <small class="text-danger"> * Ekstensi. Pdf / Zip / Rar / Jpg / Png </small> <br>
            {!! Form::file('file', null, array('id' => 'file', 'class' => 'form-control')) !!}
        </p>
    </div>
	{!! Form::hidden('table-list', 'datatable', array('id' => 'table-list')) !!}
</div>
<div class="row">
	<div class="col-md-12">
        <span class="pesan"></span>
        <div id="output"></div>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div id="statustxt">0%</div>
            </div>
        </div>
	</div>
</div>
{!! Form::close() !!}
<hr>
<div class="col-8 p-5 mt-5">
    @if( $data->file)
    @if($data->file->extension=='pdf')
    <object data="{{$data->file->url_stream.'?t='.time() ?? '#'}}" type="application/pdf"
        style="background: transparent url({{asset('backend/img/loading.gif')}}) no-repeat center; width: 100%;height: 700px">
        <p>
            File PDF tidak dapat ditampilkan, silahkan download file
            <a download="{{$data->nama}}" href="{{$data->file->url_stream ?? '#'}}"><span
                    class="fa fa-download"> di sini</span></a>
        </p>
    </object>
    @elseif($data->file->extension=='jpg' || $data->file->extension=='png')
    <p>
        <img src="{{$data->file->url_stream.'?t='.time() ?? '#'}}" />
    </p>
    @else
    <p>
        File tidak dapat ditampilkan, silahkan download file
        <a download="{{$data->nama}}" href="{{$data->file->url_download.'?t='.time() ?? '#'}}"><span
                class="fa fa-download"> di sini</span></a>
    </p>
    @endif
    @endif
</div>
<style>
    .select2-container {
        z-index: 9999 !important;
    }
</style>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/js/ajax_progress.js') }}"></script>
<!-- <script src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/'.\Auth::id().'/ajax.js') }}"></script> -->
<script src="{{ asset('backend/fromplugin/summernote/summernote.js') }}" async=""></script>
<script type="text/javascript">
    $('.modal-title').html('<span class="fa fa-edit"></span> Ubah {{$halaman->nama}}');
    $('.js-summernote').summernote({
        // toolbar: [['para', ['ul', 'ol']]],
        height: 200,
        dialogsInBody: true
    });
</script>
