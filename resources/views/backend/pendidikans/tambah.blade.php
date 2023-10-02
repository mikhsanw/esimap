{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.store'], 'class' => 'form account-form', 'method' => 'post', 'files' => 'true')) !!}
<div class="row">
    <div class="col-md-12">

		<p>
			{!! Form::label('jenjang', 'Masukkan Jenjang', ['class'=>'control-label']) !!}
			{!! Form::text('jenjang', null, array('id' => 'jenjang', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('institusi', 'Masukkan Institusi', ['class'=>'control-label']) !!}
			{!! Form::text('institusi', null, array('id' => 'institusi', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('prodi', 'Masukkan Prodi', ['class'=>'control-label']) !!}
			{!! Form::text('prodi', null, array('id' => 'prodi', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('tahun', 'Masukkan Tahun', ['class'=>'control-label']) !!}
			{!! Form::text('tahun', null, array('id' => 'tahun', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<hr />
		<p>
            {!! Form::label('file', 'Upload Ijazah', array('class' => 'control-label')) !!} <br/>
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
    $('.modal-title').html('<span class="fa fa-edit"></span> Tambah {{$halaman->nama}}');
    $('.js-summernote').summernote({
        // toolbar: [['para', ['ul', 'ol']]],
        height: 200,
        dialogsInBody: true
    });
</script>