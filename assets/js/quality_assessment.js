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
		url: base_url + 'Quality_Controller/add_general_quality_score/',
		data: {
			start_interval: start_interval,
			end_interval: end_interval,
			general_score_desc: general_score_desc,
			id_project: id_project
		},
		error: function () {
			Swal({
				type: 'error',
				title: 'Error',
				html: '<label class="font-weight-bold text-danger">Error</label>'
			});
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
				url: base_url + 'Quality_Controller/delete_general_quality_score/',
				data: {
					id_project: id_project,
					description: row.data()[2]
				},
				error: function () {
					Swal({
						type: 'error',
						title: 'Error',
						html: '<label class="font-weight-bold text-danger">Error</label>'
					});
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

	if (parseFloat(start_interval) < 0) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The start interval can not be less than 0!'
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

	if (parseFloat(end_interval) < 0.1) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The end interval can not be less than 0.1!'
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
		url: base_url + 'Quality_Controller/edit_general_score/',
		data: {
			id_project: id_project,
			start: start,
			old_desc: old_desc,
			desc: desc,
			end: end
		},
		error: function () {
			Swal({
				type: 'error',
				title: 'Error',
				html: '<label class="font-weight-bold text-danger">Error</label>'
			});
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
			option.value = desc;
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

function edit_min_score(element) {
	let score = element.value;
	let id_project = $("#id_project").val();

	if (score == "null") {
		swal({
			type: 'warning',
			title: 'Score Null',
			html: 'The <strong>score min</strong> can not be empty!'
		});
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'Quality_Controller/edit_min_score/',
		data: {
			id_project: id_project,
			score: score
		},
		error: function () {
			Swal({
				type: 'error',
				title: 'Error',
				html: '<label class="font-weight-bold text-danger">Error</label>'
			});
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
	document.getElementById("edit_lbl_score").innerHTML = 'Score: ' + value + '%';
}

function add_qa() {
	let id = $("#id_qa").val();
	let qa = $("#desc_qa").val();
	let weight = $("#weight_qa").val();
	let id_project = $("#id_project").val();

	if (!validate_qa(id, qa, weight, null)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'Quality_Controller/add_qa/',
		data: {
			id_project: id_project,
			id: id,
			qa: qa,
			weight: weight
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
			table_qa.row.add([
				id,
				qa,
				'<table id="table_' + id + '" class="table">' +
				'<th>Score Rule</th>' +
				'<th>Score</th>' +
				'<th>Description</th>' +
				'<th>Actions</th>' +
				'<tbody>' +
				'</tbody>' +
				'</table>',
				weight,
				'<select class="form-control" id="min_to_' + id + '" onchange="edit_min_score_qa(this)">' +
				'<option value=""></option>' +
				'</select>',
				'<button class="btn btn-warning opt" onClick="modal_qa($(this).parents(\'tr\'))">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_qa($(this).parents(\'tr\'));">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			let x = document.getElementById("list_qa");
			let option = document.createElement("option");
			option.text = id;
			option.value = id;
			x.add(option);
			$("#id_qa")[0].value = "";
			$("#desc_qa")[0].value = "";
			$("#weight_qa")[0].value = "";
		}
	});
}

function modal_qa(value) {
	let row = table_qa.row(value);
	$('#modal_question_quality #index_qa').val(row.index());
	$('#modal_question_quality #edit_id_qa').val(row.data()[0]);
	$('#modal_question_quality #old_id_qa').val(row.data()[0]);
	$('#modal_question_quality #edit_desc_qa').val(row.data()[1]);
	$('#modal_question_quality #edit_weight_qa').val(row.data()[3]);
	$('#modal_question_quality').modal('show');
}

function delete_qa(value) {
	let row = table_qa.row(value);
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
				url: base_url + 'Quality_Controller/delete_qa/',
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
					let x = document.getElementById("list_qa");
					x.remove(index);
					row.remove();
					table_qa.draw();

				}
			});
			Swal.fire(
				'Deleted!',
				'Your question quality has been deleted.',
				'success'
			)
		}
	});
}

function validate_qa(id, qa, weight, index) {
	if (!id) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The ID can not be empty!'
		});
		return false;
	}

	if (!validate_text(id)) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'This field can not contain special characters or space!'
		});
		return false;
	}

	if (!qa) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The description can not be empty!'
		});
		return false;
	}

	if (!weight) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The weight can not be empty!'
		});
		return false;
	}

	if (parseFloat(weight) < 1) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The weight can not be less than 1!'
		});
		return false;
	}

	let max = table_general_score.column(1)
		.data()
		.sort()
		.reverse()[0];

	let data = table_qa.rows().data().toArray();

	console.log(index);

	for (let i = 0; i < data.length; i++) {
		if (i != index) {
			if (id.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'The ID has already been registered!'
				});
				return false;
			}
		}
	}

	let s = parseFloat(weight);
	for (let i = 0; i < data.length; i++) {
		if (i != index) {
			s += parseFloat(data[i][3]);
		}
	}

	if (s > max) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The weight must be less than the maximum overall score!'
		});
		return false;
	}

	for (let i = 0; i < data.length; i++) {
		if (i != index) {
			if (qa.toLowerCase().trim() == data[i][1].toLowerCase().trim()) {
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

function edit_qa() {
	let index = $("#index_qa").val();
	let id = $("#edit_id_qa").val();
	let qa = $("#edit_desc_qa").val();
	let weight = $("#edit_weight_qa").val();
	let id_project = $("#id_project").val();
	let row = table_qa.row(index);
	let old_id = row.data()[0];

	let id_table = "table_" + old_id;
	let table_score = document.getElementById(id_table);
	let id_now = "table_" + id;
	table_score.id = id_now;

	let id_select = "min_to_" + old_id;
	let slect_score = document.getElementById(id_select);
	let id_new = "min_to_" + id;
	slect_score.id = id_new;

	if (!validate_qa(id, qa, weight, index)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'Quality_Controller/edit_qa/',
		data: {
			id_project: id_project,
			id: id,
			qa: qa,
			weight: weight,
			old_id: old_id
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
			let x = document.getElementById("list_qa");
			x.remove(index);
			table_qa.row.add([
				id,
				qa,
				table_score.outerHTML,
				weight,
				slect_score.outerHTML,
				'<button class="btn btn-warning opt" onClick="modal_qa($(this).parents(\'tr\'))">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_qa($(this).parents(\'tr\'));">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			let option = document.createElement("option");
			option.text = id;
			option.value = id;
			x.add(option);

			Swal({
				title: 'Success',
				text: "The question quality was edited",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'

			}).then((result) => {
				if (result.value) {
					$('#modal_question_quality').modal('hide');
				}
			});
		}
	});
}

function add_score_quality() {
	let id_qa = $("#list_qa").val();
	let score_rule = $("#score_rule").val();
	let score = $("#score").val();
	let description = $("#desc_score").val();


	let id = "table_" + id_qa;
	let id2 = "min_to_" + id_qa;
	let id_project = $("#id_project").val();


	if (!validate_score_quality(score_rule, score, description, id, null)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'Quality_Controller/add_score_quality/',
		data: {
			id_project: id_project,
			score_rule: score_rule,
			score: score,
			description: description,
			id_qa: id_qa
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
			let table_score = document.getElementById(id);

			let x = document.getElementById(id2);
			let option = document.createElement("option");
			option.text = score_rule;
			option.value = score_rule;
			x.add(option);

			let row = table_score.insertRow();
			let cell1 = row.insertCell(0);
			let cell2 = row.insertCell(1);
			let cell3 = row.insertCell(2);
			let cell4 = row.insertCell(3);
			cell1.innerHTML = score_rule;
			cell2.innerHTML = score + "%";
			cell3.innerHTML = description;
			cell4.innerHTML = '<button class="btn btn-warning opt" onClick="modal_score_quality(this)">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_score_quality(this)">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>';


			$("#score_rule")[0].value = "";
			$("#score")[0].value = 50;
			document.getElementById("lbl_score").innerHTML = 'Score: 50%';
			$("#desc_score")[0].value = "";
		}
	});
}

function modal_score_quality(value) {
	let row = value.parentNode.parentNode;
	let id_qa = row.parentNode.parentNode.parentNode.parentNode.cells.item(0).innerHTML;

	$('#modal_score_quality #index_score').val(row.rowIndex);
	$('#modal_score_quality #id_qa_score').val(id_qa);
	$('#modal_score_quality #edit_score_rule').val(row.cells.item(0).innerHTML);
	$('#modal_score_quality #old_score_rule').val(row.cells.item(0).innerHTML);
	$('#modal_score_quality #edit_score').val(row.cells.item(1).innerHTML.replace("%", ""));
	$('#modal_score_quality #edit_lbl_score').text("Score: " + row.cells.item(1).innerHTML.replace("%", "") + "%");
	$('#modal_score_quality #edit_desc_score').val(row.cells.item(2).innerHTML);
	$('#modal_score_quality').modal('show');
}

function delete_score_quality(value) {
	let row = value.parentNode.parentNode;
	let score = row.cells.item(0).innerHTML;
	let id_project = $("#id_project").val();
	let id_qa = row.parentNode.parentNode.parentNode.parentNode.cells.item(0).innerHTML;
	let index = row.rowIndex;
	let id2 = "min_to_" + id_qa;

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
				url: base_url + 'Quality_Controller/delete_score_quality/',
				data: {
					id_project: id_project,
					id_qa: id_qa,
					score: score
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
					let x = document.getElementById(id2);
					x.remove(index);

				}
			});
			Swal.fire(
				'Deleted!',
				'Your score has been deleted.',
				'success'
			)
		}
	});
}

function validate_score_quality(score_rule, score, description, id_table, index) {

	if (!score_rule) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The score rule can not be empty!'
		});
		return false;
	}

	if (!score) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The score can not be empty!'
		});
		return false;
	}

	if (!description) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The description can not be empty!'
		});
		return false;
	}

	let size = document.getElementById(id_table).rows.length;
	let rows = document.getElementById(id_table).rows;
	for (let i = 0; i < size; i++) {
		if (i != index) {
			if (score_rule.toLowerCase().trim() == rows[i].cells.item(0).innerHTML.toLowerCase().trim()) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'The score rule has already been registered!'
				});
				return false;
			}
		}
	}

	for (let i = 0; i < size; i++) {
		if (i != index) {
			if (description.toLowerCase().trim() == rows[i].cells.item(2).innerHTML.toLowerCase().trim()) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'The description has already been registered!'
				});
				return false;
			}
		}
	}

	for (let i = 0; i < size; i++) {
		if (i != index) {
			if (score.trim() + "%" == rows[i].cells.item(1).innerHTML.trim()) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'The score has already been registered!'
				});
				return false;
			}
		}
	}
	return true;
}

function edit_score_quality() {
	let index = $('#modal_score_quality #index_score').val();
	let score_rule = $('#modal_score_quality #edit_score_rule').val();
	let old_score_rule = $('#modal_score_quality #old_score_rule').val();
	let score = $('#modal_score_quality #edit_score').val();
	let description = $('#modal_score_quality #edit_desc_score').val();
	let id_qa = $('#modal_score_quality #id_qa_score').val();
	let id_project = $("#id_project").val();

	let id_table = 'table_' + id_qa;
	let id_min = 'min_to_' + id_qa;

	if (!validate_score_quality(score_rule, score, description, id_table, index)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'Quality_Controller/edit_score_quality/',
		data: {
			id_project: id_project,
			score_rule: score_rule,
			old_score_rule: old_score_rule,
			description: description,
			score: score,
			id_qa: id_qa
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
			let table_score = document.getElementById(id_table);
			let select_score = document.getElementById(id_min);

			select_score.remove(index);
			let option = document.createElement("option");
			option.text = score_rule;
			option.value = score_rule;
			select_score.add(option);

			table_score.deleteRow(index);

			let row = table_score.insertRow();
			let cell1 = row.insertCell(0);
			let cell2 = row.insertCell(1);
			let cell3 = row.insertCell(2);
			let cell4 = row.insertCell(3);
			cell1.innerHTML = score_rule;
			cell2.innerHTML = score + "%";
			cell3.innerHTML = description;
			cell4.innerHTML = '<button class="btn btn-warning opt" onClick="modal_score_quality(this)">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_score_quality(this)">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>';
			Swal({
				title: 'Success',
				text: "The score quality was edited",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			}).then((result) => {
				if (result.value) {
					$('#modal_score_quality').modal('hide');
				}
			});
		}
	});
}

function edit_min_score_qa(element) {
	let score = element.value;
	let qa = element.dataset.qa;
	let id_project = $("#id_project").val();

	$.ajax({
		type: "POST",
		url: base_url + 'Quality_Controller/edit_min_score_qa/',
		data: {
			id_project: id_project,
			min: score,
			qa: qa
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
			Swal({
				title: 'Success',
				text: "The minimum to approve was edited",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		}
	});
}

$(document).ready(function () {
	table_papers_quality.on('select', function (e, dt, type, indexes) {
		let rowData = table_papers_quality.rows(indexes).data().toArray();
		let id_project = $("#id_project").val();
		let size = table_papers_quality.columns().data().length;

		$.ajax({
			type: "POST",
			url: base_url + 'Quality_Controller/get_paper_qa/',
			data: {
				id_project: id_project,
				id: rowData[0][0]
			}, error: function () {
				Swal({
					type: 'error',
					title: 'Error',
					html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
					showCancelButton: false,
					confirmButtonText: 'Ok'
				});
			},
			success: function (data) {

				let dados = JSON.parse(data);
				let txt_sel = $('#text_qa');
				let edit = $('#edit_status_qa');
				let criteria_a = $('#qa_analiese');
				let score_qa = $('#score_paper_qa');
				let gen_qa = $('#gen_score_qa');

				$('#index_paper_qa').val(indexes);
				$('#paper_id_qa').text(rowData[0][0]);
				$('#id_paper_qa').val(rowData[0][0]);
				$('#paper_title_qa').text(rowData[0][1]);
				score_qa.text(rowData[0][size - 2]);
				gen_qa.text(rowData[0][size - 3]);

				$('#paper_author_qa').text(dados['author']);
				$('#paper_year_qa').text(dados['year']);
				$('#paper_database_qa').text(dados['database']);
				$('#paper_note_qa').text(dados['note']);

				switch (rowData[0][size - 1]) {
					case "Unclassified":
						txt_sel.text("");
						txt_sel.val(3);
						txt_sel.hide();
						edit.val(3);
						edit.show();
						score_qa.removeClass('text-success');
						score_qa.removeClass('text-danger');
						score_qa.addClass('text-dark');
						gen_qa.removeClass('text-success');
						gen_qa.removeClass('text-danger');
						gen_qa.addClass('text-dark');
						criteria_a.show();
						break;
					case "Rejected":
						edit.hide();
						score_qa.removeClass('text-success');
						score_qa.removeClass('text-dark');
						score_qa.addClass('text-danger');
						gen_qa.removeClass('text-success');
						gen_qa.removeClass('text-dark');
						gen_qa.addClass('text-danger');
						txt_sel.removeClass("text-success");
						txt_sel.addClass("text-danger");
						txt_sel.text(rowData[0][size]);
						txt_sel.val(2);
						txt_sel.show();
						criteria_a.show();
						break;
					case "Accepted":
						edit.hide();
						score_qa.removeClass('text-dark');
						score_qa.removeClass('text-danger');
						score_qa.addClass('text-success');
						gen_qa.removeClass('text-dark');
						gen_qa.removeClass('text-danger');
						gen_qa.addClass('text-success');
						criteria_a.show();
						txt_sel.removeClass("text-danger");
						txt_sel.addClass("text-success");
						txt_sel.text(rowData[0][size]);
						txt_sel.val(1);
						txt_sel.show();
						criteria_a.show();
						break;
					case "Removed":
						txt_sel.text("");
						txt_sel.val(4);
						txt_sel.hide();
						edit.val(4);
						edit.show();
						criteria_a.hide();
						break;
				}


				for (let i = 2; i < (size - 3); i++) {
					let id_qa = table_papers_quality.column(i).title().replace(" ", "");
					let select = $('#' + id_qa);
					select.val(rowData[0][i]);

					select.on('change', function () {
						let cont = 0;
						let id_qa = this.dataset.qa;
						let colum = 0;
						table_papers_quality.columns().every(function () {
							if (this.title() == id_qa) {
								colum = cont;
							}
							cont++;
						});

						let score = this.value;

						let id_project = $('#id_project').val();
						let id_paper = $('#id_paper_qa').val();
						let index = $('#index_paper_qa').val();
						let old_status = $('#text_qa').val();

						$.ajax({
							type: "POST",
							url: base_url + 'Quality_Controller/evaluation_qa/',
							data: {
								id_project: id_project,
								id_qa: id_qa,
								id_paper: id_paper,
								score: score
							}, error: function () {
								Swal({
									type: 'error',
									title: 'Error',
									html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
									showCancelButton: false,
									confirmButtonText: 'Ok'
								});
							},
							success: function (result) {
								let dados = JSON.parse(result);

								change_new_qa(dados.status.toString(), index, (size - 1), dados.s, dados.gen, score, colum);

								if (dados.change) {
									change_old_status_qa(old_status.toString());
									change_new_status_qa(id_paper, dados.status.toString(), index, (size - 1));
									status_paper_qa(dados.status.toString());
								}


							}
						});

					});
				}


				if (dados['keywords'] != "") {
					$('#paper_keywords_qa').text(dados['keywords']);
				} else {
					$('#paper_keywords_qa').text("This article does not have Keywords");
				}

				if (dados['abstract'] != "") {
					$('#paper_abstract_qa').text(dados['abstract']);
				} else {
					$('#paper_abstract_qa').text("This article does not have Abstract");
				}

				let doi = $('#paper_doi_qa');
				if (data['doi'] != "") {
					doi.removeClass("disabled");
					doi.attr("href", "https://doi.org/" + data['doi']);
				} else {
					doi.attr("href", "");
					doi.addClass("disabled");
				}
				let url = $('#paper_url_qa');
				if (dados['url'] != "") {
					url.removeClass("disabled");
					url.attr("href", dados['url']);
				} else {
					url.attr("href", "");
					url.addClass("disabled");
				}

				$('#modal_paper_qa').modal('show');
			}
		});

	});

	table_papers_quality_rep.on('select', function (e, dt, type, indexes) {
		let rowData = table_papers_quality_rep.rows(indexes).data().toArray();
		let id_project = $("#id_project").val();
		let size = table_papers_quality_rep.columns().data().length;
		$.ajax({
			type: "POST",
			url: base_url + 'Quality_Controller/get_paper_qa/',
			data: {
				id_project: id_project,
				id: rowData[0][0]
			}, error: function () {
				Swal({
					type: 'error',
					title: 'Error',
					html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
					showCancelButton: false,
					confirmButtonText: 'Ok'
				});
			},
			success: function (data) {

				let dados = JSON.parse(data);

				$('#index_paper_rep').val(indexes);
				$('#paper_id_rep').text(rowData[0][0]);
				$('#id_paper_rep').val(rowData[0][0]);
				$('#paper_title_rep').text(rowData[0][1]);

				$('#paper_author_rep').text(dados['author']);
				$('#paper_year_rep').text(dados['year']);
				$('#paper_database_rep').text(dados['database']);

				if (dados['keywords'] != "") {
					$('#paper_keywords_rep').text(dados['keywords']);
				} else {
					$('#paper_keywords_rep').text("This article does not have Keywords");
				}

				if (dados['abstract'] != "") {
					$('#paper_abstract_rep').text(dados['abstract']);
				} else {
					$('#paper_abstract_rep').text("This article does not have Abstract");
				}

				let doi = $('#paper_doi_rep');
				if (data['doi'] != "") {
					doi.removeClass("disabled");
					doi.attr("href", "https://doi.org/" + data['doi']);
				} else {
					doi.attr("href", "");
					doi.addClass("disabled");
				}
				let url = $('#paper_url_rep');
				if (dados['url'] != "") {
					url.removeClass("disabled");
					url.attr("href", dados['url']);
				} else {
					url.attr("href", "");
					url.addClass("disabled");
				}

				$('#modal_paper_rep').modal('show');
			}
		});

	});

	$('#paper_status_qa').on('change', function () {
		let status = $('#edit_status_qa').val();
		let old_status = $('#text_qa').val();
		let id_paper = $('#id_paper_qa').val();
		let id_project = $('#id_project').val();
		let index = $('#index_paper_qa').val();
		let size = table_papers_quality.columns().data().length;

		$.ajax({
			type: "POST",
			url: base_url + 'Quality_Controller/edit_status_qa/',
			data: {
				id_project: id_project,
				status: status,
				id_paper: id_paper
			}, error: function () {
				Swal({
					type: 'error',
					title: 'Error',
					html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
					showCancelButton: false,
					confirmButtonText: 'Ok'
				});
			},
			success: function () {
				change_old_status_qa(old_status);
				change_new_status_qa(id_paper, status, index, (size - 1));
				status_paper_qa(status);
			}
		});
	});

	$('#paper_note_qa').on('change', function () {
		let id_project = $('#id_project').val();
		let id_paper = $('#id_paper_qa').val();
		let note = $('#paper_note_qa').val();
		$.ajax({
			type: "POST",
			url: base_url + 'Quality_Controller/update_note_qa/',
			data: {
				id_project: id_project,
				id_paper: id_paper,
				note: note
			}, error: function () {
				Swal({
					type: 'error',
					title: 'Error',
					html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
					showCancelButton: false,
					confirmButtonText: 'Ok'
				});
			},
			success: function () {
				Swal({
					type: 'success',
					title: 'Added Note',
					html: 'Added <label class="font-weight-bold text-dark">Note</label> as paper!'
				});
			}

		});
	});

	table_conf_paper_qa.on('select', function (e, dt, type, indexes) {
		let rowData = table_conf_paper_qa.rows(indexes).data().toArray();
		let id_project = $("#id_project").val();

		$.ajax({
			type: "POST",
			url: base_url + 'Quality_Controller/get_paper_conflict/',
			data: {
				id_project: id_project,
				id: rowData[0][0]
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
			success: function (data) {
				data = JSON.parse(data);
				$('#index_paper_conf_qa').val(indexes);
				$('#paper_id_conf_qa').text(rowData[0][0]);
				$('#id_paper_conf_qa').val(rowData[0][0]);
				$('#paper_title_conf_qa').text(data['title']);
				$('#paper_author_conf_qa').text(data['author']);
				$('#paper_year_conf_qa').text(data['year']);
				$('#paper_database_conf_qa').text(data['database']);
				let score_qa = $('#score_paper_qa_conf');
				let gen_qa = $('#gen_score_qa_conf');

				gen_qa.text(data['gen_score']);
				score_qa.text(data['score']);

				$('#old_status_conf_qa').val(data['status']);

				switch (data['status']) {
					case "3":
						score_qa.removeClass('text-success');
						score_qa.removeClass('text-danger');
						score_qa.addClass('text-dark');
						gen_qa.removeClass('text-success');
						gen_qa.removeClass('text-danger');
						gen_qa.addClass('text-dark');
						break;
					case "2":
						score_qa.removeClass('text-success');
						score_qa.removeClass('text-dark');
						score_qa.addClass('text-danger');
						gen_qa.removeClass('text-success');
						gen_qa.removeClass('text-dark');
						gen_qa.addClass('text-danger');
						break;
					case "1":
						score_qa.removeClass('text-dark');
						score_qa.removeClass('text-danger');
						score_qa.addClass('text-success');
						gen_qa.removeClass('text-dark');
						gen_qa.removeClass('text-danger');
						gen_qa.addClass('text-success');
						break;
					case "4":
						score_qa.removeClass('text-dark');
						score_qa.removeClass('text-danger');
						score_qa.addClass('text-success');
						gen_qa.removeClass('text-dark');
						gen_qa.removeClass('text-danger');
						gen_qa.addClass('text-success');
						break;
				}

				if (data['keywords'] != "") {
					$('#paper_keywords_conf_qa').text(data['keywords']);
				} else {
					$('#paper_keywords_conf_qa').text("This article does not have Keywords");
				}

				if (data['abstract'] != "") {
					$('#paper_abstract_conf_qa').text(data['abstract']);
				} else {
					$('#paper_abstract_conf_qa').text("This article does not have Abstract");
				}

				let doi = $('#paper_doi_conf_qa');
				if (data['doi'] != "") {
					doi.removeClass("disabled");
					doi.attr("href", "https://doi.org/" + data['doi']);
				} else {
					doi.attr("href", "");
					doi.addClass("disabled");
				}
				let url = $('#paper_url_conf_qa');
				if (data['url'] != "") {
					url.removeClass("disabled");
					url.attr("href", data['url']);
				} else {
					url.attr("href", "");
					url.addClass("disabled");
				}

				let notes = $('#notes_qa');
				table_qa_answer.clear();

				for (let i = 0; i < data['ans'].length; i++) {
					let ans = [];
					let sta = "";
					let cla = "";

					switch (data['ans'][i][1]) {
						case "3":
							sta = "Unclassified";
							cla = "text-dark";
							break;
						case "2":
							sta = "Rejected";
							cla = "text-danger";
							break;
						case "1":
							sta = "Accepted";
							cla = "text-success";
							break;
						case "4":
							sta = "Removed";
							cla = "text-info";
							break;
					}

					ans.push(data['ans'][i][0]);
					for (let o = 4; o < data['ans'][i].length; o++) {
						ans.push(data['ans'][i][o]);
					}

					ans.push(data['ans'][i][2]);
					ans.push(data['ans'][i][3]);
					ans.push("<p class='" + cla + "'>" + sta + "</p>");

					table_qa_answer.row.add(ans);
				}
				table_qa_answer.draw();


				for (let i = 0; i < data['notes'].length; i++) {
					if (document.getElementById("name_" + data['notes'][i][3])) {
						let name = document.getElementById("name_" + data['notes'][i][3]);
						name.innerText = data['notes'][i][1];
						name.id = "name_" + data['notes'][i][3];
					} else {
						let name = document.createElement('h6');
						name.innerText = data['notes'][i][1];
						name.id = "name_" + data['notes'][i][3];
						notes.append(name);
					}

					if (document.getElementById("txt_" + data['notes'][i][3])) {
						let txt = document.getElementById("txt_" + data['notes'][i][3]);
						txt.id = "txt_" + data['notes'][i][3];
						txt.value = data['notes'][i][0];
						txt.className = 'form-control';
					} else {
						let txt = document.createElement('textarea');
						txt.id = "txt_" + data['notes'][i][3];
						txt.value = data['notes'][i][0];
						txt.className = 'form-control';
						notes.append(txt);
					}

					if (document.getElementById("br_" + data['notes'][i][3])) {
						let br = document.getElementById("br_" + data['notes'][i][3]);
						br.id = "br_" + data['notes'][i][3];
					} else {
						let br = document.createElement('br');
						br.id = "br_" + data['notes'][i][3];
						notes.append(br);

					}
				}
				let size = table_qa_answer.columns().data().length;
				for (let i = 1; i < (size - 3); i++) {
					let id_qa = table_qa_answer.column(i).title().replace(" ", "");
					let select = $('#conf_' + id_qa);
					select.val("");
					select.on('change', function () {

						let cont = 0;
						let id_qa = this.dataset.qa;
						let colum = 0;
						table_papers_quality.columns().every(function () {
							if (this.title() == id_qa) {
								colum = cont;
							}
							cont++;
						});

						let score = this.value;

						let id_project = $('#id_project').val();
						let id_paper = $('#id_paper_conf_qa').val();
						let index = $('#index_paper_conf_qa').val();
						let old_status = $('#old_status_conf_qa').val();


						$.ajax({
							type: "POST",
							url: base_url + 'Quality_Controller/evaluation_qa_conf/',
							data: {
								id_project: id_project,
								id_qa: id_qa,
								id_paper: id_paper,
								score: score
							}, error: function () {
								Swal({
									type: 'error',
									title: 'Error',
									html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
									showCancelButton: false,
									confirmButtonText: 'Ok'
								});
							},
							success: function (result) {
								console.log(result);
								let dados = JSON.parse(result);
								if (dados.change) {
									table_conf_paper_qa.row(index).remove().draw();
									change_new_qa_conf(dados.s, dados.gen, dados.status.toString());
									new_status_paper_qa(old_status, dados.status.toString());
									status_paper_qa(dados.status.toString());
								}


							}
						});

					});
				}

				$('#modal_paper_conflict_qa').modal('show');
			}
		});
	});

});

function new_status_paper_qa(old_status, new_status) {
	$('#old_status_conf').val(new_status);
	let old_count = 0;
	let new_count = 0;
	switch (old_status) {
		case "Accepted":
		case "1":
			old_count = parseInt($('#count_acc_qa').text());
			old_count--;
			$('#count_acc_qa').text(old_count);
			break;
		case "Rejected":
		case "2":
			old_count = parseInt($('#count_rej_qa').text());
			old_count--;
			$('#count_rej_qa').text(old_count);
			break;
		case "Unclassified":
		case "3":
			old_count = parseInt($('#count_unc_qa').text());
			old_count--;
			$('#count_unc_qa').text(old_count);
			break;
		case "Removed":
		case "4":
			old_count = parseInt($('#count_rem_qa').text());
			old_count--;
			$('#count_rem_qa').text(old_count);
			break;
	}

	switch (new_status) {
		case "Accepted":
		case "1":
			new_count = parseInt($('#count_acc_qa').text());
			new_count++;
			$('#count_acc_qa').text(new_count);
			update_progress();
			break;
		case "Rejected":
		case "2":
			new_count = parseInt($('#count_rej_qa').text());
			new_count++;
			$('#count_rej_qa').text(new_count);
			update_progress_qa();
			break;
		case "Unclassified":
		case "3":
			new_count = parseInt($('#count_unc_qa').text());
			new_count++;
			$('#count_unc_qa').text(new_count);
			update_progress_qa();
			break;
		case "Removed":
		case "4":
			new_count = parseInt($('#count_rem_qa').text());
			new_count++;
			$('#count_rem_qa').text(new_count);
			update_progress_qa();
			break;
	}
}

function change_old_status_qa(old_status) {
	let old_count = 0;
	switch (old_status) {
		case "Accepted":
		case "1":
			old_count = parseInt($('#count_acc_qa').text());
			old_count--;
			$('#count_acc_qa').text(old_count);
			break;
		case "Rejected":
		case "2":
			old_count = parseInt($('#count_rej_qa').text());
			old_count--;
			$('#count_rej_qa').text(old_count);
			break;
		case "Unclassified":
		case "3":
			old_count = parseInt($('#count_unc_qa').text());
			old_count--;
			$('#count_unc_qa').text(old_count);
			break;
		case "Removed":
		case "4":
			old_count = parseInt($('#count_rem_qa').text());
			old_count--;
			$('#count_rem_qa').text(old_count);
			break;
	}
}

function status_paper_qa(status) {
	switch (status) {
		case"1":
			Swal({
				type: 'success',
				title: 'Accepted',
				html: 'This paper as <label class="font-weight-bold text-success">Accepted</label>'
			});
			break;
		case"2":
			Swal({
				type: 'error',
				title: 'Rejected',
				html: 'This paper as <label class="font-weight-bold text-danger">Rejected</label>'
			});
			break;
		case"3":
			Swal({
				type: 'question',
				title: 'Unclassified',
				html: 'This paper as <label class="font-weight-bold text-dark">Unclassified</label>'
			});
			break;
		case"4":
			Swal({
				type: 'info',
				title: 'Removed',
				html: 'This paper as <label class="font-weight-bold text-info">Removed</label>'
			});
			break;
	}
}

function update_progress_qa() {
	let pro_acc = $('#prog_acc_qa');
	let pro_rej = $('#prog_rej_qa');
	let pro_unc = $('#prog_unc_qa');
	let pro_rem = $('#prog_rem_qa');
	let total = parseInt($('#count_total_qa').text());
	let acc = parseInt($('#count_acc_qa').text());
	let rej = parseInt($('#count_rej_qa').text());
	let unc = parseInt($('#count_unc_qa').text());
	let rem = parseInt($('#count_rem_qa').text());
	let pro = 0;

	for (let i = 1; i < 5; i++) {

		switch (i) {
			case 1:
				pro = parseFloat(Math.round(acc * 100) / total).toFixed(2);
				pro_acc.attr('aria-valuenow', pro);
				pro_acc.css('width', pro + "%");
				pro_acc.text(pro + "%");
				break;
			case 2:
				pro = parseFloat(Math.round(rej * 100) / total).toFixed(2);
				pro_rej.attr('aria-valuenow', pro);
				pro_rej.css('width', pro + "%");
				pro_rej.text(pro + "%");
				break;
			case 3:
				pro = parseFloat(Math.round(unc * 100) / total).toFixed(2);
				pro_unc.attr('aria-valuenow', pro);
				pro_unc.css('width', pro + "%");
				pro_unc.text(pro + "%");
				break;
			case 4:
				pro = parseFloat(Math.round(rem * 100) / total).toFixed(2);
				pro_rem.attr('aria-valuenow', pro);
				pro_rem.css('width', pro + "%");
				pro_rem.text(pro + "%");
				break;
		}
	}

}

function change_new_status_qa(id_paper, status, index, size) {
	let criteria_a = $('#qa_analiese');
	let new_count = 0;
	let paper = $('#' + id_paper);
	let edit = $('#edit_status_qa');
	let text = $('#text_qa');

	switch (status) {
		case "1":
			text.val(1);
			text.removeClass("text-danger");
			text.addClass("text-success");
			edit.hide();
			paper.removeClass("text-danger");
			paper.removeClass("text-dark");
			paper.removeClass("text-info");
			paper.removeClass("text-warning");
			table_papers_quality.cell(index, size).data("Accepted");
			paper.addClass("text-success");
			text.text("Accepted");
			text.show();
			new_count = parseInt($('#count_acc_qa').text());
			new_count++;
			$('#count_acc_qa').text(new_count);
			criteria_a.show();
			update_progress_qa();
			break;
		case "2":
			text.removeClass("text-success");
			text.addClass("text-danger");
			text.val(2);
			edit.hide();
			paper.removeClass("text-success");
			paper.removeClass("text-dark");
			paper.removeClass("text-info");
			paper.removeClass("text-warning");
			table_papers_quality.cell(index, size).data("Rejected");
			text.text("Rejected");
			paper.addClass("text-danger");
			text.show();
			new_count = parseInt($('#count_rej_qa').text());
			new_count++;
			$('#count_rej_qa').text(new_count);
			criteria_a.show();
			update_progress_qa();
			break;
		case "3":
			text.val(3);
			text.hide();
			paper.removeClass("text-danger");
			paper.removeClass("text-success");
			paper.removeClass("text-info");
			paper.removeClass("text-warning");
			table_papers_quality.cell(index, size).data("Unclassified");
			paper.addClass("text-dark");
			edit.val(3);
			edit.show();
			new_count = parseInt($('#count_unc_qa').text());
			new_count++;
			$('#count_unc_qa').text(new_count);
			criteria_a.show();
			update_progress_qa();
			break;
		case "4":
			text.val(4);
			text.hide();
			paper.removeClass("text-danger");
			paper.removeClass("text-success");
			paper.removeClass("text-dark");
			paper.removeClass("text-warning");
			table_papers_quality.cell(index, size).data("Removed");
			paper.addClass("text-info");
			edit.val(4);
			edit.show();
			new_count = parseInt($('#count_rem_qa').text());
			new_count++;
			$('#count_rem_qa').text(new_count);
			criteria_a.hide();
			update_progress_qa();
			break;
	}
}

function change_new_qa_conf(score, gen, status) {
	let text_score = $('#score_paper_qa_conf');
	let text_gen = $('#gen_score_qa_conf');

	text_score.text(score);
	text_gen.text(gen);

	switch (status) {
		case "1":
			text_gen.removeClass("text-dark");
			text_gen.removeClass("text-danger");
			text_gen.addClass("text-success");
			text_score.removeClass("text-dark");
			text_score.removeClass("text-danger");
			text_score.addClass("text-success");
			break;
		case "2":
			text_gen.removeClass("text-dark");
			text_gen.removeClass("text-success");
			text_gen.addClass("text-danger");
			text_score.removeClass("text-dark");
			text_score.removeClass("text-success");
			text_score.addClass("text-danger");
			break;
		case "3":
			text_gen.removeClass("text-danger");
			text_gen.removeClass("text-success");
			text_gen.addClass("text-dark");
			text_score.removeClass("text-danger");
			text_score.removeClass("text-success");
			text_score.addClass("text-dark");
			break;
	}
}

function change_new_qa(status, index, size, score, gen, score_rule, colum) {
	let text_score = $('#score_paper_qa');
	let text_gen = $('#gen_score_qa');

	text_score.val(score);
	text_score.text(score);

	text_gen.val(gen);
	text_gen.text(gen);

	switch (status) {
		case "1":
			text_gen.removeClass("text-dark");
			text_gen.removeClass("text-danger");
			text_gen.addClass("text-success");
			text_score.removeClass("text-dark");
			text_score.removeClass("text-danger");
			text_score.addClass("text-success");
			table_papers_quality.cell(index, (size - 1)).data(score);
			table_papers_quality.cell(index, (size - 2)).data(gen);
			table_papers_quality.cell(index, colum).data(score_rule);
			break;
		case "2":
			text_gen.removeClass("text-dark");
			text_gen.removeClass("text-success");
			text_gen.addClass("text-danger");
			text_score.removeClass("text-dark");
			text_score.removeClass("text-success");
			text_score.addClass("text-danger");
			table_papers_quality.cell(index, (size - 1)).data(score);
			table_papers_quality.cell(index, (size - 2)).data(gen);
			table_papers_quality.cell(index, colum).data(score_rule);
			break;
		case "3":
			text_gen.removeClass("text-danger");
			text_gen.removeClass("text-success");
			text_gen.addClass("text-dark");
			text_score.removeClass("text-danger");
			text_score.removeClass("text-success");
			text_score.addClass("text-dark");
			table_papers_quality.cell(index, (size - 1)).data(score);
			table_papers_quality.cell(index, (size - 2)).data(gen);
			table_papers_quality.cell(index, colum).data(score_rule);
			break;
	}
}
