{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.update', $data->id], 'class' => 'form account-form', 'method' => 'PUT', 'files' => 'true')) !!}
<div class="row">
    <div class="col-md-12">
		<p>
			{!! Form::label('tahun', 'Masukkan Tahun', ['class'=>'control-label']) !!}
			{!! Form::text('tahun', $data->tahun, array('id' => 'tahun', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('jabatan_id', 'Pilih Jabatan_id', ['class'=>'control-label']) !!}
			{!! Form::select('jabatan_id',$jabatan_id, $data->jabatan_id, array('id' => 'jabatan_id', 'class' => 'form-control select2', 'placeholder'=>'Pilih')) !!}
		</p>
		<p>
			{!! Form::label('pegawai_id', 'Pilih Pegawai_id', ['class'=>'control-label']) !!}
			{!! Form::select('pegawai_id',$pegawai_id, $data->pegawai_id, array('id' => 'pegawai_id', 'class' => 'form-control select2', 'placeholder'=>'Pilih')) !!}
		</p>
        <hr />
		<p>
            {!! Form::label('file', 'Upload Ijazah', array('class' => 'control-label')) !!}
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
<style>
    .select2-container {
        z-index: 9999 !important;
    }
</style>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/js/ajax_progress.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/'.\Auth::id().'/ajax.js') }}"></script>
<script src="{{ asset('backend/fromplugin/summernote/summernote.js') }}" async=""></script>
<script type="text/javascript">
    $('.modal-title').html('<span class="fa fa-edit"></span> Ubah {{$halaman->nama}}');
    $('.js-summernote').summernote({
        // toolbar: [['para', ['ul', 'ol']]],
        height: 200,
        dialogsInBody: true
    });
</script>
