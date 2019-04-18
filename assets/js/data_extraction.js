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
		error: function () {
			Swal({
				type: 'error',
				title: 'Error',
				html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
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

				let x = document.getElementById("list_qde");
				let option = document.createElement("option");
				option.text = id;
				option.value = id;
				x.add(option);
			}
			$("#id_data_extraction")[0].value = "";
			$("#desc_data_extraction")[0].value = "";
		}
	});
}

function validate_question_extraction(id, desc, type, index) {
	if (!id) {
		Swal({
			title: 'ID Empty',
			html: '<strong>ID</strong> field is empty',
			type: 'warning',
			showCancelButton: false,
			confirmButtonText: 'Ok'
		});
		return false;
	}

	if (!desc) {
		Swal({
			title: 'Description Empty',
			html: '<strong>Description</strong> field is empty',
			type: 'warning',
			showCancelButton: false,
			confirmButtonText: 'Ok'
		});
		return false;
	}

	if (!type) {
		Swal({
			title: 'Type Empty',
			html: '<strong>Type</strong> field is empty',
			type: 'warning',
			showCancelButton: false,
			confirmButtonText: 'Ok'
		});
		return false;
	}

	let data = table_data_extraction.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (i != index) {
			if (id.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
				Swal({
					title: 'Repeat ID',
					html: 'This <strong>ID</strong> has already been registered,<strong> select another</strong>',
					type: 'warning',
					showCancelButton: false,
					confirmButtonText: 'Ok'
				});
				return false;
			}
		}
	}

	for (let i = 0; i < data.length; i++) {
		if (i != index) {
			if (desc.toLowerCase().trim() == data[i][1].toLowerCase().trim()) {
				Swal({
					title: 'Repeat Description',
					html: 'This <strong>Description</strong> has already been registered,<strong> select another</strong>',
					type: 'warning',
					showCancelButton: false,
					confirmButtonText: 'Ok'
				});
				return false;
			}
		}
	}
	return true;
}

function delete_extraction(value) {
	let row = table_data_extraction.row(value);
	let index = row.index();
	let id_project = $("#id_project").val();

	Swal.fire({
		title: 'Are you sure?',
		text: "You will not be able to reverse this," +
			" this can impact other areas of your project!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#28a745',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: base_url + 'Extraction_Controller/delete_extraction/',
				data: {
					id_project: id_project,
					id: row.data()[0]
				},
				error: function () {
					Swal({
						type: 'error',
						title: 'Error',
						html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
						showCancelButton: false,
						confirmButtonText: 'Ok'
					});
				},
				success: function () {
					row.remove();
					table_data_extraction.draw();

					let x = document.getElementById("list_qde");
					x.remove(index);
				}
			});
			Swal.fire(
				'Question Extraction Deleted',
				'<strong>Question Extraction Deleted</strong>',
				'success'
			)
		}
	});
}

function modal_extraction(value) {
	let row = table_data_extraction.row(value);
	$('#modal_question_extraction #index_de').val(row.index());
	$('#modal_question_extraction #edit_id_data_extraction').val(row.data()[0]);
	$('#modal_question_extraction #edit_desc_data_extraction').val(row.data()[1]);
	$('#modal_question_extraction #edit_type_data_extraction').val(row.data()[2]);
	$('#modal_question_extraction').modal('show');
}

function add_option() {
	let id_qe = $("#list_qde").val();
	let desc = $("#desc_op").val();
	let id_project = $("#id_project").val();
	let id = 'table_' + id_qe;

	if (!validate_option(desc, id, null)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'Extraction_Controller/add_option/',
		data: {
			id_project: id_project,
			id_qe: id_qe,
			desc: desc
		},
		error: function () {
			Swal({
				type: 'error',
				title: 'Error',
				html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		},
		success: function () {
			let table_op = document.getElementById(id);
			let row = table_op.insertRow();
			let cell1 = row.insertCell(0);
			let cell2 = row.insertCell(1);
			cell1.innerHTML = desc;
			cell2.innerHTML = '<button class="btn btn-warning opt" onClick="modal_option(this)">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_option(this)">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>';
			$("#desc_op")[0].value = "";
		}
	});

}

function validate_option(desc, id, index) {
	if (!desc) {
		Swal({
			title: 'Description Empty',
			html: '<strong>Description</strong> field is empty',
			type: 'warning',
			showCancelButton: false,
			confirmButtonText: 'Ok'
		});
		return false;
	}

	let size = document.getElementById(id).rows.length;
	let rows = document.getElementById(id).rows;
	for (let i = 0; i < size; i++) {
		if (i != index) {
			if (desc.toLowerCase().trim() == rows[i].cells.item(0).innerHTML.toLowerCase().trim()) {
				Swal({
					title: 'Repeat Description',
					html: 'This <strong>Description</strong> has already been registered,<strong> select another</strong>',
					type: 'warning',
					showCancelButton: false,
					confirmButtonText: 'Ok'
				});
				return false;
			}
		}
	}
	return true;
}

function modal_option(value) {

	let row = value.parentNode.parentNode;
	let id_qe = row.parentNode.parentNode.parentNode.parentNode.cells.item(0).innerHTML;

	$('#modal_option #index_op').val(row.rowIndex);
	$('#modal_option #old_op').val(row.cells.item(0).innerHTML);
	$('#modal_option #now_op').val(row.cells.item(0).innerHTML);
	$('#modal_option #qe_op').val(id_qe);
	$('#modal_option').modal('show');
}

function delete_option(value) {
	let row = value.parentNode.parentNode;
	let desc = row.cells.item(0).innerHTML;
	let id_project = $("#id_project").val();
	let id_qe = row.parentNode.parentNode.parentNode.parentNode.cells.item(0).innerHTML;

	Swal.fire({
		title: 'Are you sure?',
		text: "You will not be able to reverse this," +
			" this can impact other areas of your project!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#28a745',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: base_url + 'Extraction_Controller/delete_option/',
				data: {
					id_project: id_project,
					desc: desc,
					id_qe: id_qe
				},
				error: function () {
					Swal({
						type: 'error',
						title: 'Error',
						html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
						showCancelButton: false,
						confirmButtonText: 'Ok'
					});
				},
				success: function () {
					row.parentNode.removeChild(row);
				}
			});
			Swal.fire(
				'Option Deleted',
				'<strong>Option Deleted</strong>',
				'success'
			)
		}
	});
}

function edit_de() {
	let index = $('#modal_question_extraction #index_de').val();
	let id = $('#modal_question_extraction #edit_id_data_extraction').val();
	let desc = $('#modal_question_extraction #edit_desc_data_extraction').val();
	let type = $('#modal_question_extraction #edit_type_data_extraction').val();
	let id_project = $("#id_project").val();
	let row = table_data_extraction.row(index);
	let old_id = row.data()[0];
	let x = document.getElementById("list_qde");
	let inde = null;
	let ops = x.options;
	for (let z = 0; z < ops.length; z++) {
		if (ops[z].value == old_id) {
			inde = z;
		}
	}

	if (!validate_question_extraction(id, desc, type, index)) {
		return false;
	}
	let table_op = "";
	if (row.data()[2] != "Text") {
		let id_table = "table_" + row.data()[0];
		let table = document.getElementById(id_table);
		let id_now = "table_" + id;
		table.id = id_now;
		table_op = table.outerHTML;
	} else {
		table_op = '<table id="table_' + id + '" class="table">' +
			'<th>Option</th>' +
			'<th>Actions</th>' +
			'<tbody>' +
			'</tbody>' +
			'</table>'
	}
	$.ajax({
		type: "POST",
		url: base_url + 'Extraction_Controller/edit_de/',
		data: {
			id_project: id_project,
			id: id,
			old_id: row.data()[0],
			desc: desc,
			type: type,
			old_type: row.data()[2]
		},
		error: function () {
			Swal({
				type: 'error',
				title: 'Error',
				html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		},
		success: function () {
			row.remove();
			if (inde != null) {
				x.remove(inde);
			}
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
					table_op,
					'<button class="btn btn-warning opt" onClick="modal_extraction($(this).parents(\'tr\'));">' +
					'<span class="fas fa-edit"></span>' +
					'</button>' +
					'<button class="btn btn-danger" onClick="delete_extraction($(this).parents(\'tr\'));">' +
					'<span class="far fa-trash-alt"></span>' +
					'</button>'
				]).draw();

				let option = document.createElement("option");
				option.text = id;
				option.value = id;
				x.add(option);
			}

			Swal({
				title: 'Edited Question Extraction',
				html: "<strong>Edited question extraction</strong>",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'

			}).then((result) => {
				if (result.value) {
					$('#modal_question_extraction').modal('hide');
				}
			});
		}
	});
}

function edit_option() {
	let index = $('#modal_option #index_op').val();
	let old = $('#modal_option #old_op').val();
	let now = $('#modal_option #now_op').val();
	let id_project = $("#id_project").val();
	let qe = $('#modal_option #qe_op').val();
	let id = "table_" + qe;

	if (!validate_option(now, id, index)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'Extraction_Controller/edit_option/',
		data: {
			id_project: id_project,
			qe: qe,
			old: old,
			now: now
		},
		error: function () {
			Swal({
				type: 'error',
				title: 'Error',
				html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		},
		success: function () {
			let table_op = document.getElementById(id);
			table_op.deleteRow(index);
			let row = table_op.insertRow();
			let cell1 = row.insertCell(0);
			let cell2 = row.insertCell(1);
			cell1.innerHTML = now;
			cell2.innerHTML = '<button class="btn btn-warning opt" onClick="modal_option(this)">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_option(this)">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>';
			Swal({
				title: 'Edited Option',
				html: "<strong>Edited option</strong>",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'

			}).then((result) => {
				if (result.value) {
					$('#modal_option').modal('hide');
				}
			});
		}
	});
}
