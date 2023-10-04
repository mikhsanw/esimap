@extends('layouts.backend.index')
@push('title','Dashboard')
@push('header','Dashboard')
@section('content')
<section class="content">
	<h6 class="pull-right">{{date("l, d F Y")}}</h6>
		<div class="box">
			<div class="box-header with-border">
				<h4 class="box-title d-block text-left"><i class="fas fa-home"></i> Dashboard</h4>
			</div>
		</div>
     @if(Auth::user()->pegawai_id==NULL)
     @include('backend.beranda.admin')
     @else
     @include('backend.beranda.pegawai')
     @endif
</section>
@endsection
