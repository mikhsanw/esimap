$(document).ready(function(){
   $('.tambah-data').click(function(){
		if({{Auth::user()->level}}==3 && "{{$kode}}" === "halaman"){
			return Swal.fire({
					title: 'Cancelled',
					text: 'Anda tidak memiliki akses untuk ini',
					type: 'error'
				});
		}
		ojisatrianiLoadingFadeIn();
		$.loadmodal({
			url: "{{ url($url_admin.'/'.$kode.'/create/'.$id.'/'.$id2) }}",
			id: 'responsive',
			dlgClass: 'fade',
			bgClass: 'primary',
			title: 'Tambah',
			width: 'whatever',
			modal: {
				keyboard: true,
				// any other options from the regular $().modal call (see Bootstrap docs)
				},
          ajax: {
				dataType: 'html',
				method: 'GET',
				success: function(data, status, xhr){
            		ojisatrianiLoadingFadeOut();
            	},

			},
        });
  });

	$(document).on("click",".lihat",function() {
		ojisatrianiLoadingFadeIn();
		var id = $(this).attr("{{$kode.'-id'}}");
		$.loadmodal({
			url: "{{ url($url_admin.'/'.$kode) }}/lihat/"+ id,
		id: 'responsive',
			dlgClass: 'fade',
			bgClass: 'warning',
			title: 'Ubah',
			width: 'whatever',
			modal: {
				keyboard: true,
				// any other options from the regular $().modal call (see Bootstrap docs)
				},
			ajax: {
				dataType: 'html',
				method: 'GET',
				success: function(data, status, xhr){
					$('.modal-footer').remove();
					ojisatrianiLoadingFadeOut();
				},
			},
		});
	});
});
