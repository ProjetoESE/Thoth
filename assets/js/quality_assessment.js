function add_general_quality_score() {
	let start_interval = $("#start_interval").val();
	let end_interval = $("#end_interval").val();
	let general_score_desc = $("#general_score_desc").val();
	let id_project = $("#id_project").val();

	if (!validate_general_quality_score(start_interval, end_interval, general_score_desc)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/add_general_quality_score/',
		data: {
			start_interval: start_interval,
			end_interval: end_interval,
			general_score_desc: general_score_desc,
			id_project: id_project
		},
		success: function () {
			table_general_score.row.add([
				start_interval,
				end_interval,
				general_score_desc,
				'<button class="btn btn-warning opt" onClick="modal_general_score($(this).parents(\'tr\'))">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_general_quality_score($(this).parents(\'tr\'))">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			let x = document.getElementById("min_score_to_app");
			let option = document.createElement("option");
			option.text = general_score_desc;
			x.add(option);
			$("#general_score_desc")[0].value = "";
			$("#start_interval")[0].value = "";
			$("#end_interval")[0].value = "";
		}
	});
}


function delete_general_quality_score(value) {
	let row = table_general_score.row(value);
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
				url: base_url + 'project_controller/delete_general_quality_score/',
				data: {
					id_project: id_project,
					description: row.data()[2]
				},
				success: function () {
					let x = document.getElementById("min_score_to_app");
					x.remove(index);
					row.remove();
					table_general_score.draw();

				}
			});
			Swal.fire(
				'Deleted!',
				'Your general score has been deleted.',
				'success'
			)
		}
	});
}

function validate_general_quality_score(start_interval, end_interval, general_score_desc, index) {

	if (!start_interval) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The start interval can not be empty!'
		});
		return false;
	}
	if (!end_interval) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The end interval can not be empty!'
		});
		return false;
	}
	if (!general_score_desc) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The description can not be empty!'
		});
		return false;
	}


	if (start_interval >= end_interval) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'Beginning of the interval must be greater than the end of the same interval'
		});
		return false;
	}


	let data = table_general_score.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (i != index) {
			if (start_interval == data[i][0]) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'The start interval has already been registered!'
				});

				return false;
			}
			if (start_interval >= data[i][0] && end_interval <= data[i][1]) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'The range can not be within another!'
				});
				return false;
			}
			if (start_interval <= data[i][1] && end_interval >= data[i][1]) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'The beginning of the interval can not be within another!'
				});
				return false;
			}
			if (start_interval <= data[i][0] && end_interval >= data[i][0]) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'End of range can not be within another!'
				});
				return false;
			}
		}
	}

	for (let i = 0; i < data.length; i++) {
		if (i != index) {
			if (general_score_desc.toLowerCase().trim() == data[i][2].toLowerCase().trim()) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'The description has already been registered!'
				});
				return false;
			}

		}
	}

	return true;
}

function modal_general_score(value) {
	let row = table_general_score.row(value);
	$('#modal_general_score #index_score').val(row.index());
	$('#modal_general_score #edit_start_interval').val(row.data()[0]);
	$('#modal_general_score #edit_end_interval').val(row.data()[1]);
	$('#modal_general_score #old_desc').val(row.data()[2]);
	$('#modal_general_score #edit_general_score_desc').val(row.data()[2]);
	$('#modal_general_score').modal('show');
}

function edit_general_score() {
	let index = $('#modal_general_score #index_score').val();
	let start = $('#modal_general_score #edit_start_interval').val();
	let end = $('#modal_general_score #edit_end_interval').val();
	let old_desc = $('#modal_general_score #old_desc').val();
	let desc = $('#modal_general_score #edit_general_score_desc').val();
	let id_project = $("#id_project").val();
	let row = table_general_score.row(index);

	if (!validate_general_quality_score(start, end, desc, index)) {
		return false;
	}


	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/edit_general_score/',
		data: {
			id_project: id_project,
			start: start,
			old_desc: old_desc,
			desc: desc,
			end: end
		},
		success: function () {
			row.remove();
			let x = document.getElementById("min_score_to_app");
			x.remove(index);
			table_general_score.row.add([
				start,
				end,
				desc,
				'<button class="btn btn-warning opt" onClick="modal_general_score($(this).parents(\'tr\'))">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_general_quality_score($(this).parents(\'tr\'))">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			x = document.getElementById("min_score_to_app");
			let option = document.createElement("option");
			option.text = desc;
			x.add(option);

			Swal({
				title: 'Success',
				text: "The general score was edited",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'

			}).then((result) => {
				if (result.value) {
					$('#modal_general_score').modal('hide');
				}
			});
		}
	});
}

function edit_min_score() {
	let score = $("#min_score_to_app").val();
	let id_project = $("#id_project").val();

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/edit_min_score/',
		data: {
			id_project: id_project,
			score: score
		},
		success: function () {
			Swal({
				title: 'Success',
				text: "The min score to approved was edited",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		}
	});
}

function update_text_score(value) {
	document.getElementById("lbl_score").innerHTML = 'Score: ' + value + '%';
}


function add_qa() {
	let id = $("#id_qa").val();
	let qa = $("#desc_qa").val();
	let weight = $("#weight_qa").val();
	let id_project = $("#id_project").val();

	if (!validate_term(term, null)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/add_qa/',
		data: {
			id_project: id_project,
			term: term
		},
		success: function () {
			table_search_string.row.add([
				term, '' +
				'<table id="table_' + term + '" class="table">' +
				'<th>Synonym</th>' +
				'<th>Actions</th>' +
				'<tbody>' +
				'</tbody>' +
				'</table>',
				'<button class="btn btn-warning opt" onClick="modal_term($(this).parents(\'tr\'))">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_term($(this).parents(\'tr\'));">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			let x = document.getElementById("list_term");
			let option = document.createElement("option");
			option.text = term;
			x.add(option);
			$("#term")[0].value = "";
		}
	});
}
