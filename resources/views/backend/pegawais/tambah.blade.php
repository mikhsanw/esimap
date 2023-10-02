{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.store'], 'class' => 'form account-form', 'method' => 'post', 'files' => 'true')) !!}
<div class="row">
    <div class="col-md-12">

		<p>
			{!! Form::label('nama', 'Masukkan Nama *', ['class'=>'control-label']) !!}
			{!! Form::text('nama', null, array('id' => 'nama', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('nip', 'Masukkan NIP *', ['class'=>'control-label']) !!}
			{!! Form::text('nip', null, array('id' => 'nip', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('nik', 'Masukkan NIK *', ['class'=>'control-label']) !!}
			{!! Form::text('nik', null, array('id' => 'nik', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('tempat_lahir', 'Masukkan Tempat Lahir', ['class'=>'control-label']) !!}
			{!! Form::text('tempat_lahir', null, array('id' => 'tempat_lahir', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('tanggal_lahir', 'Masukkan Tanggal Lahir', ['class'=>'control-label']) !!}
			{!! Form::date('tanggal_lahir', null, array('id' => 'tanggal_lahir', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('jenis_kelamin', 'Pilih Jenis Kelamin', ['class'=>'control-label']) !!}
			{!! Form::select('jenis_kelamin',$jenis_kelamin, null, array('id' => 'jenis_kelamin', 'class' => 'form-control select2', 'placeholder'=>'Pilih')) !!}
		</p>
		<p>
			{!! Form::label('agama', 'Pilih Agama', ['class'=>'control-label']) !!}
			{!! Form::select('agama',$agama, null, array('id' => 'agama', 'class' => 'form-control select2', 'placeholder'=>'Pilih')) !!}
		</p>
		<p>
			{!! Form::label('rt', 'Masukkan RT', ['class'=>'control-label']) !!}
			{!! Form::text('rt', null, array('id' => 'rt', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('rw', 'Masukkan RW', ['class'=>'control-label']) !!}
			{!! Form::text('rw', null, array('id' => 'rw', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('desa', 'Masukkan Desa', ['class'=>'control-label']) !!}
			{!! Form::text('desa', null, array('id' => 'desa', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('kelurahan', 'Masukkan Kelurahan', ['class'=>'control-label']) !!}
			{!! Form::text('kelurahan', null, array('id' => 'kelurahan', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('kecamatan', 'Masukkan Kecamatan', ['class'=>'control-label']) !!}
			{!! Form::text('kecamatan', null, array('id' => 'kecamatan', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('kabupaten', 'Masukkan Kabupaten', ['class'=>'control-label']) !!}
			{!! Form::text('kabupaten', null, array('id' => 'kabupaten', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('provinsi', 'Masukkan Provinsi', ['class'=>'control-label']) !!}
			{!! Form::text('provinsi', null, array('id' => 'provinsi', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
		</p>
		<p>
			{!! Form::label('bidang_id', 'Pilih Bidang *', ['class'=>'control-label']) !!}
			{!! Form::select('bidang_id',$bidang, null, array('id' => 'bidang_id', 'class' => 'form-control select2', 'placeholder'=>'Pilih')) !!}
		</p>
		<p>
			{!! Form::label('jabatan_id', 'Pilih Jabatan *', ['class'=>'control-label']) !!}
			{!! Form::select('jabatan_id',$jabatan, null, array('id' => 'jabatan_id', 'class' => 'form-control select2', 'placeholder'=>'Pilih')) !!}
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