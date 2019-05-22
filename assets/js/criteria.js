function add_criteria() {
	let id = $("#id_criteria").val();
	let description = $("#description_criteria").val();
	let type = $("#select_type").val();
	let id_project = $("#id_project").val();

	if (!validate_criteria(id, description, type, null)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'Criteria_Controller/add_criteria/',
		data: {
			id_project: id_project,
			id: id,
			description: description,
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
			if (type == 'Inclusion') {
				table_criteria_inclusion.row.add([
					'<div class="form-check">' +
					'<input id="selected_' + id.replace(" ", "").trim() + '" type="checkbox" class="form-check-input"' +
					' onchange="select_criteria_inclusion($(this).parents(\'tr\'))">' +
					'</div>',
					id,
					description,
					'<button class="btn btn-warning opt" onClick="modal_criteria_inclusion($(this).parents(\'tr\'))">' +
					'<span class="fas fa-edit"></span>' +
					'</button>' +
					'<button class="btn btn-danger" onClick="delete_criteria_inclusion($(this).parents(\'tr\'));">' +
					'<span class="far fa-trash-alt"></span>' +
					'</button>'
				]).draw();
			} else {
				table_criteria_exclusion.row.add([
					'<div class="form-check">' +
					'<input id="selected_' + id.replace(" ", "").trim() + '" type="checkbox" class="form-check-input"' +
					' onchange="select_criteria_exclusion($(this).parents(\'tr\'))">' +
					'</div>',
					id,
					description,
					'<button class="btn btn-warning opt" onClick="modal_criteria_exclusion($(this).parents(\'tr\'))">' +
					'<span class="fas fa-edit"></span>' +
					'</button>' +
					'<button class="btn btn-danger" onClick="delete_criteria_exclusion($(this).parents(\'tr\'));">' +
					'<span class="far fa-trash-alt"></span>' +
					'</button>'
				]).draw();
			}
			id = $("#id_criteria")[0].value = "";
			description = $("#description_criteria")[0].value = "";
		}
	});
}

function select_criteria_inclusion(value, msg = null) {
	let row = table_criteria_inclusion.row(value);
	let id_project = $("#id_project").val();
	let id = 'selected_' + row.data()[1].replace(" ", "");
	let pre_selected = document.getElementById(id).checked;

	$.ajax({
		type: "POST",
		url: base_url + 'Criteria_Controller/selected_pre_select/',
		data: {
			id_project: id_project,
			id: row.data()[1],
			pre_selected: pre_selected
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
			if (msg == null) {
				if (pre_selected) {
					Swal({
						title: 'Criteria Selected',
						html: 'Inclusion Criteria <strong>selected</strong>',
						type: 'success',
						showCancelButton: false,
						confirmButtonText: 'Ok'
					})
				} else {
					Swal({
						title: 'Criteria Deselected',
						html: 'Inclusion Criteria <strong>deselected</strong>',
						type: 'success',
						showCancelButton: false,
						confirmButtonText: 'Ok'
					})
				}
			}

		}
	});
}

function select_criteria_exclusion(value, msg = null) {
	let row = table_criteria_exclusion.row(value);
	let id_project = $("#id_project").val();
	let id = 'selected_' + row.data()[1].replace(" ", "");
	let pre_selected = document.getElementById(id).checked

	$.ajax({
		type: "POST",
		url: base_url + 'Criteria_Controller/selected_pre_select/',
		data: {
			id_project: id_project,
			id: row.data()[1],
			pre_selected: pre_selected
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
			if (msg == null) {
				if (pre_selected) {
					Swal({
						title: 'Criteria Selected',
						html: 'Exclusion Criteria <strong>deselected</strong>',
						type: 'success',
						showCancelButton: false,
						confirmButtonText: 'Ok'
					})
				} else {
					Swal({
						title: 'Criteria Deselected',
						html: 'Exclusion Criteria <strong>deselected</strong>',
						type: 'success',
						showCancelButton: false,
						confirmButtonText: 'Ok'
					})
				}
			}
		}
	});
}

function validate_criteria(id, description, type, index) {

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
	if (!description) {
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
			html: '<strong>Description</strong> field is empty',
			type: 'warning',
			showCancelButton: false,
			confirmButtonText: 'Ok'
		});
		return false;
	}

	if(!validate_text(id)){
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'This field can not contain special characters or space!'
		});
		return false;
	}

	let data = table_criteria_inclusion.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (i != index) {
			if (id.toLowerCase().trim() == data[i][1].toLowerCase().trim()) {
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
			if (description.toLowerCase().trim() == data[i][2].toLowerCase().trim()) {
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

	data = table_criteria_exclusion.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (i != index) {
			if (id.toLowerCase().trim() == data[i][1].toLowerCase().trim()) {
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
			if (description.toLowerCase().trim() == data[i][2].toLowerCase().trim()) {
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

function delete_criteria_inclusion(value) {
	let row = table_criteria_inclusion.row(value);
	let id_project = $("#id_project").val();

	Swal.fire({
		title: 'Are you sure?',
		html: 'This action can <label class="font-weight-bold text-warning">not be reversed</label> and may affect ' +
			'<label class="font-weight-bold text-warning">other parts</label> of the project',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#28a745',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: base_url + 'Criteria_Controller/delete_criteria/',
				data: {
					id_project: id_project,
					id: row.data()[1]
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
					table_criteria_inclusion.draw();
				}
			});
			Swal.fire(
				'Criteria Deleted!',
				'<strong>Criteria Deleted</strong>',
				'success'
			)
		}
	});
}

function delete_criteria_exclusion(value) {
	let row = table_criteria_exclusion.row(value);
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
				url: base_url + 'Criteria_Controller/delete_criteria/',
				data: {
					id_project: id_project,
					id: row.data()[1]
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
					table_criteria_exclusion.draw();
				}
			});
			Swal.fire(
				'Criteria Deleted!',
				'<strong>Criteria Deleted</strong>',
				'success'
			)
		}
	});


}

function modal_criteria_inclusion(value) {
	let row = table_criteria_inclusion.row(value);
	$('#modal_inclusion_criteria #index_term').val(row.index());
	$('#modal_inclusion_criteria #edit_id_criteria_in').val(row.data()[1]);
	$('#modal_inclusion_criteria #edit_description_criteria_in').val(row.data()[2]);
	$('#modal_inclusion_criteria #edit_select_type_inclusion').val("Inclusion");
	$('#modal_inclusion_criteria').modal('show');
}

function modal_criteria_exclusion(value) {
	let row = table_criteria_exclusion.row(value);
	$('#modal_exclusion_criteria #index_term').val(row.index());
	$('#modal_exclusion_criteria #edit_id_criteria_ex').val(row.data()[1]);
	$('#modal_exclusion_criteria #edit_description_criteria_ex').val(row.data()[2]);
	$('#modal_exclusion_criteria #edit_select_type_exclusion').val("Exclusion");
	$('#modal_exclusion_criteria').modal('show');
}

function edit_criteria_inclusion() {
	let index = $('#modal_inclusion_criteria #index_term').val();
	let id = $('#modal_inclusion_criteria #edit_id_criteria_in').val();
	let description = $('#modal_inclusion_criteria #edit_description_criteria_in').val();
	let type = $('#modal_inclusion_criteria #edit_select_type_inclusion option:selected').val();
	let row = table_criteria_inclusion.row(index);
	let id_project = $("#id_project").val();
	let id_check = 'selected_' + row.data()[1].replace(" ", "");
	let pre_selected = document.getElementById(id_check).checked

	if (!validate_criteria(id, description, type, index)) {
		return false;
	}


	$.ajax({
		type: "POST",
		url: base_url + 'Criteria_Controller/edit_criteria/',
		data: {
			id_project: id_project,
			new_id: id,
			old_id: row.data()[1],
			description: description,
			new_type: type,
			pre_selected: pre_selected
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
			row.remove().draw();
			if (type == 'Inclusion') {
				table_criteria_inclusion.row.add([
					'<div class="form-check">' +
					'<input id="selected_' + id.replace(" ", "").trim() + '" type="checkbox" class="form-check-input" ' +
					'onchange="select_criteria_inclusion($(this).parents(\'tr\'))">' +
					'</div>',
					id,
					description,
					'<button class="btn btn-warning opt" onClick="modal_criteria_inclusion($(this).parents(\'tr\'))">' +
					'<span class="fas fa-edit"></span>' +
					'</button>' +
					'<button class="btn btn-danger" onClick="delete_criteria_inclusion($(this).parents(\'tr\'));">' +
					'<span class="far fa-trash-alt"></span>' +
					'</button>'
				]).draw();
			} else {
				table_criteria_exclusion.row.add([
					'<div class="form-check">' +
					'<input id="selected_' + id.replace(" ", "").trim() + '" type="checkbox" class="form-check-input"' +
					' onchange="select_criteria_exclusion($(this).parents(\'tr\'))">' +
					'</div>',
					id,
					description,
					'<button class="btn btn-warning opt" onClick="modal_criteria_exclusion($(this).parents(\'tr\'))">' +
					'<span class="fas fa-edit"></span>' +
					'</button>' +
					'<button class="btn btn-danger" onClick="delete_criteria_exclusion($(this).parents(\'tr\'));">' +
					'<span class="far fa-trash-alt"></span>' +
					'</button>'
				]).draw();

			}
			Swal({
				title: 'Edited criteria',
				html: "<strong>Edited criteria</strong>",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'

			}).then((result) => {
				if (result.value) {
					$('#modal_inclusion_criteria').modal('hide');
				}
			});
		}
	});
}

function edit_criteria_exclusion() {
	let index = $('#modal_exclusion_criteria #index_term').val();
	let id = $('#modal_exclusion_criteria #edit_id_criteria_ex').val();
	let description = $('#modal_exclusion_criteria #edit_description_criteria_ex').val();
	let type = $('#modal_exclusion_criteria #edit_select_type_exclusion option:selected').val();
	let row = table_criteria_exclusion.row(index);
	let id_project = $("#id_project").val();
	let id_check = 'selected_' + row.data()[1].replace(" ", "");
	let pre_selected = document.getElementById(id_check).checked

	if (!validate_criteria(id, description, type, index)) {
		return false;
	}


	$.ajax({
		type: "POST",
		url: base_url + 'Criteria_Controller/edit_criteria/',
		data: {
			id_project: id_project,
			new_id: id,
			old_id: row.data()[1],
			description: description,
			new_type: type,
			pre_selected: pre_selected
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
			row.remove().draw();
			if (type == 'Inclusion') {
				table_criteria_inclusion.row.add([
					'<div class="form-check">' +
					'<input id="selected_' + id.replace(" ", "").trim() + '" type="checkbox" class="form-check-input" ' +
					'onchange="select_criteria_inclusion($(this).parents(\'tr\'))">' +
					'</div>',
					id,
					description,
					'<button class="btn btn-warning opt" onClick="modal_criteria_inclusion($(this).parents(\'tr\'))">' +
					'<span class="fas fa-edit"></span>' +
					'</button>' +
					'<button class="btn btn-danger" onClick="delete_criteria_inclusion($(this).parents(\'tr\'));">' +
					'<span class="far fa-trash-alt"></span>' +
					'</button>'
				]).draw();
			} else {
				table_criteria_exclusion.row.add([
					'<div class="form-check">' +
					'<input id="selected_' + id.replace(" ", "").trim() + '" type="checkbox" class="form-check-input"' +
					' onchange="select_criteria_exclusion($(this).parents(\'tr\'))">' +
					'</div>',
					id,
					description,
					'<button class="btn btn-warning opt" onClick="modal_criteria_exclusion($(this).parents(\'tr\'))">' +
					'<span class="fas fa-edit"></span>' +
					'</button>' +
					'<button class="btn btn-danger" onClick="delete_criteria_exclusion($(this).parents(\'tr\'));">' +
					'<span class="far fa-trash-alt"></span>' +
					'</button>'
				]).draw();

			}
			Swal({
				title: 'Edited criteria',
				html: "<strong>Edited criteria</strong>",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'

			}).then((result) => {
				if (result.value) {
					$('#modal_exclusion_criteria').modal('hide');
				}
			});
		}
	});
}

function edit_inclusion_rule() {
	let rule = $("#rule_inclusion").val();
	let id_project = $("#id_project").val();

	$.ajax({
		type: "POST",
		url: base_url + 'Criteria_Controller/edit_inclusion_rule/',
		data: {
			id_project: id_project,
			rule: rule
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
			switch (rule) {
				case "All":
					if (table_criteria_inclusion.rows().data().length > 0) {
						table_criteria_inclusion.rows().every(function (rowIdx, tableLoop, rowLoop) {
							let data = this.data();
							let id = 'selected_' + data[1].replace(" ", "").trim();
							document.getElementById(id).checked = true;
							select_criteria_inclusion(rowIdx, rule)
						});
					}
					break;
				case "Any":
					if (table_criteria_inclusion.rows().data().length > 0) {
						table_criteria_inclusion.rows().every(function (rowIdx, tableLoop, rowLoop) {
							let data = this.data();
							let id = 'selected_' + data[1].replace(" ", "").trim();
							document.getElementById(id).checked = false;
							select_criteria_inclusion(rowIdx, rule)
						});
					}
					break;
				case "At Least":
					if (table_criteria_inclusion.rows().data().length > 0) {
						let data = table_criteria_inclusion.row(0).data();
						let id = 'selected_' + data[1].replace(" ", "").trim();
						document.getElementById(id).checked = true;
						select_criteria_inclusion(0, rule)
					}
					break;
			}
			Swal({
				title: 'Edited Inclusion Rule',
				html: "<strong>Edited Inclusion Rule</strong>",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'

			});
		}
	});
}

function edit_exclusion_rule() {
	let rule = $("#rule_exclusion").val();
	let id_project = $("#id_project").val();

	$.ajax({
		type: "POST",
		url: base_url + 'Criteria_Controller/edit_exclusion_rule/',
		data: {
			id_project: id_project,
			rule: rule
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
			switch (rule) {
				case "All":
					if (table_criteria_exclusion.rows().data().length > 0) {
						table_criteria_exclusion.rows().every(function (rowIdx, tableLoop, rowLoop) {
							let data = this.data();
							let id = 'selected_' + data[1].replace(" ", "").trim();
							document.getElementById(id).checked = true;
							select_criteria_exclusion(rowIdx, rule)
						});
					}
					break;
				case "Any":
					if (table_criteria_exclusion.rows().data().length > 0) {
						table_criteria_exclusion.rows().every(function (rowIdx, tableLoop, rowLoop) {
							let data = this.data();
							let id = 'selected_' + data[1].replace(" ", "").trim();
							document.getElementById(id).checked = false;
							select_criteria_exclusion(rowIdx, rule)
						});
					}
					break;
				case "At Least":
					if (table_criteria_exclusion.rows().data().length > 0) {
						let data = table_criteria_exclusion.row(0).data();
						let id = 'selected_' + data[1].replace(" ", "").trim();
						document.getElementById(id).checked = true;
						select_criteria_exclusion(0, rule)
					}
					break;
			}
			Swal({
				title: 'Edited Exclusion Rule',
				html: "<strong>Edited Exclusion Rule</strong>",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'

			});
		}
	});
}
