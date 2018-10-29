$(document).ready(function () {
	$('#tableMyProjects').DataTable({
		"responsive": true,
		"order": [[ 0, "asc" ]],
		"columnDefs": [
			{ "orderable": false, "targets": 2 }],
	});
});
