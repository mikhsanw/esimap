@extends('layouts.backend.index')
@push('title',ucwords(strtolower($halaman->nama)))
@push('header',ucwords(strtolower($halaman->nama)))
@if(Auth::user()->level == 1)
@push('tombol')
<button class="waves-effect waves-light btn bg-gradient-primary text-white py-2 px-3 tambah">
	Tambah
</button>
@endpush
@endif
@section('content')
<div class="panel-container show">
	<div class="panel-content">
		<table id="datatable" class="table table-striped table-bordered display" style="width:100%">
			<thead class="bg-primary">
				<tr>
					<th width="10px">No</th>
					<th class="text-center">Nama</th>
					<th class="text-center">NIP</th>
					<th class="text-center">NIK</th>
					<th class="text-center">Tempat lahir</th>
					<th class="text-center">Tanggal lahir</th>
					<th class="text-center">Jenis kelamin</th>
					<th class="text-center">Agama</th>

					<th width="10%" class="text-center" tabindex="0" rowspan="1" colspan="1">Aksi</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
@endsection
@push('js')
@include('layouts.backend.js.datatable-js')
<script type="text/javascript" src="{{ URL::asset(config('master.aplikasi.author').'/js/'.$halaman->link.'/'.$halaman->kode.'/jquery-crud.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/datatables.js') }}"></script>
<script src="{{ asset('backend/assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
@endpush
@push('css')
<link rel="stylesheet" media="screen, print" href="{{ asset('backend/fromplugin/summernote/summernote.css') }}">
@endpush
