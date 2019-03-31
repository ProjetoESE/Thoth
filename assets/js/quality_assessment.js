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
		url: base_url + 'Quality_Controller/edit_general_score/',
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

function edit_min_score() {
	let score = $("#min_score_to_app").val();
	let id_project = $("#id_project").val();

	$.ajax({
		type: "POST",
		url: base_url + 'Quality_Controller/edit_min_score/',
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

	console.log(id);
	$.ajax({
		type: "POST",
		url: base_url + 'Quality_Controller/add_qa/',
		data: {
			id_project: id_project,
			id: id,
			qa: qa,
			weight: weight
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
	$('#modal_question_quality #index_score').val(row.index());
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

	let data = table_qa.rows().data().toArray();

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
	let index = $("#index_score").val();
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
