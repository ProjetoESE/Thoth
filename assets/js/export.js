function export_to_doc() {
	let id_project = $("#id_project").val();
	$.ajax({
		type: "POST",
		url: base_url + 'Project_Controller/export_doc/' + id_project,
		success: function () {
			Swal({
				title: 'Success',
				text: "The planning was exported",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			})
		}
	});
}
