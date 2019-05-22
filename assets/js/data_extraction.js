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

	if (!validate_text(id)) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'This field can not contain special characters or space!'
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

$(document).ready(function () {
	table_papers_extraction.on('select', function (e, dt, type, indexes) {
		let rowData = table_papers_extraction.rows(indexes).data().toArray();
		let id_project = $("#id_project").val();

		$.ajax({
			type: "POST",
			url: base_url + 'Extraction_Controller/get_paper_ex/',
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

				let txt_ex = $('#text_ex');
				let edit = $('#edit_status_ex');
				let ex_a = $('#ex_analiese');

				$('#index_paper_ex').val(indexes);
				$('#paper_id_ex').text(rowData[0][0]);
				$('#id_paper_ex').val(rowData[0][0]);
				$('#paper_title_ex').text(rowData[0][1]);

				$('#paper_author_ex').text(rowData[0][2]);
				$('#paper_year_ex').text(rowData[0][3]);
				$('#paper_database_ex').text(rowData[0][4]);
				$('#paper_note_ex').text(dados['note']);

				switch (rowData[0][5]) {
					case "To Do":
						txt_ex.text("");
						txt_ex.removeClass("text-success");
						txt_ex.addClass("text-dark");
						txt_ex.val(2);
						txt_ex.hide();
						edit.val(2);
						edit.show();
						ex_a.show();
						break;
					case "Done":
						edit.hide();
						ex_a.show();
						txt_ex.removeClass("text-dark");
						txt_ex.addClass("text-success");
						txt_ex.text(rowData[0][5]);
						txt_ex.val(1);
						txt_ex.show();
						ex_a.show();
						break;
					case "Removed":
						txt_ex.text("");
						txt_ex.val(3);
						txt_ex.hide();
						edit.val(3);
						edit.show();
						ex_a.hide();
						break;
				}


				if (dados['keywords'] != "") {
					$('#paper_keywords_ex').text(dados['keywords']);
				} else {
					$('#paper_keywords_ex').text("This article does not have Keywords");
				}

				if (dados['abstract'] != "") {
					$('#paper_abstract_ex').text(dados['abstract']);
				} else {
					$('#paper_abstract_ex').text("This article does not have Abstract");
				}

				if (dados['doi'] != "") {
					$('#paper_doi_ex').text(dados['doi']);
				} else {
					$('#paper_doi_ex').text("This article does not have Doi");
				}
				let url = $('#paper_url_ex');
				if (dados['url'] != "") {
					url.removeClass("disabled");
					url.attr("href", dados['url']);
				} else {
					url.attr("href", "");
					url.addClass("disabled");
				}

				for (let op of dados['text']) {
					$('#' + op[0].replace(" ", "").trim()).val(op[1]);
				}

				for (let op of dados['select']) {
					$('#' + op[0].replace(" ", "").trim()).val(op[1]);
				}


				for (let qe of dados['check']) {
					let ops = $('#' + qe[0].replace(" ", "").trim()).children();
					for (let i = 0; i < ops.length; i += 2) {
						ops[i].checked = false;
					}

					for (let i = 0; i < ops.length; i += 2) {
						for (let j = 0; j < qe[1].length; j++) {
							if (ops[i].id == qe[1][j].trim().replace(" ", "")) {
								ops[i].checked = true;
							}
						}

					}

					for (let op of qe[1]) {
						$('#' + qe[0].replace(" ", "").trim() + " " + op.replace(" ", "").trim()).checked = true;
					}
				}

			}
		});
		$('#modal_paper_ex').modal('show');
	});

	$('#paper_status_ex').on('change', function () {
		let status = $('#edit_status_ex').val();
		let old_status = $('#text_ex').val();
		let id_paper = $('#id_paper_ex').val();
		let id_project = $('#id_project').val();
		let index = $('#index_paper_ex').val();

		$.ajax({
			type: "POST",
			url: base_url + 'Extraction_Controller/edit_status_ex/',
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
				change_old_status_ex(old_status);
				change_new_status_ex(id_paper, status, index);
				status_paper_ex(status);
			}
		});
	});

});

function change_old_status_ex(old_status) {
	let old_count = 0;
	switch (old_status) {
		case "Done":
		case "1":
			old_count = parseInt($('#count_done').text());
			old_count--;
			$('#count_done').text(old_count);
			break;
		case "To Do":
		case "2":
			old_count = parseInt($('#count_to_do').text());
			old_count--;
			$('#count_to_do').text(old_count);
			break;
		case "Removed":
		case "3":
			old_count = parseInt($('#count_rem_ex').text());
			old_count--;
			$('#count_rem_ex').text(old_count);
			break;
	}
}

function status_paper_ex(status) {
	switch (status) {
		case"1":
			Swal({
				type: 'success',
				title: 'Done',
				html: 'This paper as <label class="font-weight-bold text-success">Done</label>'
			});
			break;
		case"2":
			Swal({
				type: 'question',
				title: 'To Do',
				html: 'This paper as <label class="font-weight-bold text-dark">To Do</label>'
			});
			break;
		case"3":
			Swal({
				type: 'info',
				title: 'Removed',
				html: 'This paper as <label class="font-weight-bold text-info">Removed</label>'
			});
			break;
	}
}

function update_progress_ex() {
	let pro_done = $('#prog_done');
	let pro_to_do = $('#prog_to_do');
	let pro_rem = $('#prog_rem_ex');
	let total = parseInt($('#count_total_ex').text());
	let acc = parseInt($('#count_done').text());
	let rej = parseInt($('#count_to_do').text());
	let rem = parseInt($('#count_rem_ex').text());
	let pro = 0;

	for (let i = 1; i < 4; i++) {

		switch (i) {
			case 1:
				pro = parseFloat(Math.round(acc * 100) / total).toFixed(2);
				pro_done.attr('aria-valuenow', pro);
				pro_done.css('width', pro + "%");
				pro_done.text(pro + "%");
				break;
			case 2:
				pro = parseFloat(Math.round(rej * 100) / total).toFixed(2);
				pro_to_do.attr('aria-valuenow', pro);
				pro_to_do.css('width', pro + "%");
				pro_to_do.text(pro + "%");
				break;
			case 3:
				pro = parseFloat(Math.round(rem * 100) / total).toFixed(2);
				pro_rem.attr('aria-valuenow', pro);
				pro_rem.css('width', pro + "%");
				pro_rem.text(pro + "%");
				break;
		}
	}

}

function change_new_status_ex(id_paper, status, index) {
	let ex_a = $('#ex_analiese');
	let new_count = 0;
	let paper = $('#' + id_paper);
	let edit = $('#edit_status_ex');
	let text = $('#text_ex');

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
			table_papers_extraction.cell(index, 5).data("Done");
			paper.addClass("text-success");
			text.text("Done");
			text.show();
			new_count = parseInt($('#count_done').text());
			new_count++;
			$('#count_done').text(new_count);
			ex_a.show();
			update_progress_ex();
			break;
		case "2":
			text.val(2);
			text.hide();
			paper.removeClass("text-danger");
			paper.removeClass("text-success");
			paper.removeClass("text-info");
			paper.removeClass("text-warning");
			table_papers_extraction.cell(index, 5).data("To Do");
			paper.addClass("text-dark");
			edit.val(2);
			edit.show();
			new_count = parseInt($('#count_to_do').text());
			new_count++;
			$('#count_to_do').text(new_count);
			ex_a.show();
			update_progress_ex();
			break;
		case "3":
			text.val(3);
			text.hide();
			paper.removeClass("text-danger");
			paper.removeClass("text-success");
			paper.removeClass("text-dark");
			paper.removeClass("text-warning");
			table_papers_extraction.cell(index, 5).data("Removed");
			paper.addClass("text-info");
			edit.val(3);
			edit.show();
			new_count = parseInt($('#count_rem_ex').text());
			new_count++;
			$('#count_rem_ex').text(new_count);
			ex_a.hide();
			update_progress_ex();
			break;
	}
}
