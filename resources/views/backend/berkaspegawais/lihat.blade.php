<div id="link" class="text-center">
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
        <a download="{{$data->nama}}" href="{{$data->file->url_download.'?t='.time() ?? '#'}}"><span
                class="fa fa-download"> Download</span></a>
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
    .modal-lg{
        max-width: 45% !important;
    }
    .custom-modal-footer {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end;
        padding: 1rem;
        border-top: 0 solid #dee2e6;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
    }
</style>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/js/ajax_progress.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/'.\Auth::id().'/ajax.js') }}"></script>
<script type="text/javascript">
    $('.modal-title').html('<span class="fa fa-edit"></span> Lihat {{$halaman->nama}}');
</script>
