$(document).ready(function() {
	$('#datatable').DataTable({
		responsive: true,
		serverside: true,
		lengthChange: false,
		language: {
            url: "{{ asset('resources/vendor/datatables/js/indonesian.json') }}"
        },
		processing: true,
		serverSide: true,
		ajax: "{{ url($url_admin.'/'.$kode.'/data/'.$id.'/'.$id2) }}",
		columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
				{ data: 'berkas.nama' },
				{ data: 'tahun' },
				{ data: 'keterangan' },

				{ data: 'action', orderable: false, searchable: false}
		    ]
    });
});
