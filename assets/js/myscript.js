const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal.fire(
		'Berhasil!',
		'Data ' + flashData,
		'success'
	)
}

//hapus
$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Data yang dipilih akan dihapus!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});
