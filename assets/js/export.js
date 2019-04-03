function export_to_doc() {
	let id_project = $("#id_project").val();
	$.ajax({
		type: "POST",
		url: base_url + 'Export_Controller/export_doc/',
		data: {
			id_project: id_project
		},
		success: function () {
		}
	});
}
