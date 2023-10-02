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
		ajax: "{{ url($url_admin.'/'.$kode.'/data') }}",
		columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
				{ data: 'nama' },
				{ data: 'nip' },
				{ data: 'nik' },
				{ data: 'tempat_lahir' },
				{ data: 'tanggal_lahir' },
				{ data: 'jenis_kelamin' },
				{ data: 'agama' },

				{ data: 'action', orderable: false, searchable: false}
		    ]
    });
});
