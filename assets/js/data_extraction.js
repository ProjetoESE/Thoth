function add_question_extraction() {
	let id = $("#id_data_extraction").val();
	let desc = $("#desc_data_extraction").val();
	let type = $("#type_data_extraction").val();
	let id_project = $("#id_project").val();

	if (!validate_question_extraction(id, desc, type, null)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'Extraction_Controller/add_question_extraction/',
		data: {
			id_project: id_project,
			id: id,
			desc: desc,
			type: type
		},
		success: function () {
			if (type == "Text") {
				table_data_extraction.row.add([
					id,
					desc,
					type,
					"",
					'<button class="btn btn-warning opt" onClick="modal_extraction($(this).parents(\'tr\'));">' +
					'<span class="fas fa-edit"></span>' +
					'</button>' +
					'<button class="btn btn-danger" onClick="delete_extraction($(this).parents(\'tr\'));">' +
					'<span class="far fa-trash-alt"></span>' +
					'</button>'
				]).draw();
			} else {
				table_data_extraction.row.add([
					id,
					desc,
					type,
					'<table id="table_' + id + '" class="table">' +
					'<th>Option</th>' +
					'<th>Actions</th>' +
					'<tbody>' +
					'</tbody>' +
					'</table>',
					'<button class="btn btn-warning opt" onClick="modal_extraction($(this).parents(\'tr\'));">' +
					'<span class="fas fa-edit"></span>' +
					'</button>' +
					'<button class="btn btn-danger" onClick="delete_extraction($(this).parents(\'tr\'));">' +
					'<span class="far fa-trash-alt"></span>' +
					'</button>'
				]).draw();
			}

			$("#id_data_extraction")[0].value = "";
			$("#desc_data_extraction")[0].value = "";
			$("#type_data_extraction")[0].value = "";
		}
	});
}

function validate_question_extraction(id, desc, type, index) {
	if (!id) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The id can not be empty!'
		});
		return false;
	}

	if (!desc) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The description can not be empty!'
		});
		return false;
	}

	if (!type) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The type can not be empty!'
		});
		return false;
	}

	let data = table_data_extraction.rows().data().toArray();


	for (let i = 0; i < data.length; i++) {
		if (i != index) {
			if (id.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'The id has already been registered!',
				});
				return false;
			}
		}
	}

	for (let i = 0; i < data.length; i++) {
		if (i != index) {
			if (desc.toLowerCase().trim() == data[i][1].toLowerCase().trim()) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'The description has already been registered!',
				});
				return false;
			}
		}
	}
	return true;
}

function delete_extraction() {

}

function modal_extraction() {
}
