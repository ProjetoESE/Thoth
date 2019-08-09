$(document).ready(function () {

	$("#edit_status_selection").on('change', function () {
		let status = this.value;
		let id_paper = $('#id_paper').val();
		let id_project = $('#id_project').val();
		let index = $('#index_paper').val();
		let old_status = table_papers.cell(index, 5).data();
		$.ajax({
			type: "POST",
			url: base_url + 'Selection_Controller/edit_status_selection/',
			data: {
				id_project: id_project,
				id_paper: id_paper,
				status: status
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
				change_old_status(old_status);
				change_new_status(id_paper, status, index);
				status_paper(status)
			}
		});
	});

	table_papers.on('select', function (e, dt, type, indexes) {
		let rowData = table_papers.rows(indexes).data().toArray();
		let id_project = $("#id_project").val();
		let size = table_papers.columns().data().length;

		$.ajax({
			type: "POST",
			url: base_url + 'Selection_Controller/get_paper_selection/',
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

				let txt_sel = $('#text_selection');
				let edit = $('#edit_status_selection');
				let criteria_a = $('#criteria_analiese');
				data = JSON.parse(data);

				$('#index_paper').val(indexes);
				$('#paper_id').text(rowData[0][0]);
				$('#id_paper').val(rowData[0][0]);
				$('#paper_title').text(rowData[0][1]);
				$('#paper_author').text(data['author']);
				$('#paper_year').text(data['year']);
				$('#paper_database').text(rowData[0][size - 2]);
				switch (rowData[0][size - 1]) {
					case "Unclassified":
						txt_sel.text("");
						txt_sel.val(3);
						txt_sel.hide();
						edit.val(3);
						edit.show();
						criteria_a.show();
						break;
					case "Rejected":
						edit.hide();
						txt_sel.removeClass("text-success");
						txt_sel.addClass("text-danger");
						txt_sel.text(rowData[0][size - 1]);
						txt_sel.val(2);
						txt_sel.show();
						criteria_a.show();
						break;
					case "Accepted":
						edit.hide();
						criteria_a.show();
						txt_sel.removeClass("text-danger");
						txt_sel.addClass("text-success");
						txt_sel.text(rowData[0][size - 1]);
						txt_sel.val(1);
						txt_sel.show();
						criteria_a.show();
						break;
					case "Duplicate":
						txt_sel.text("");
						txt_sel.val(4);
						txt_sel.hide();
						edit.val(4);
						edit.show();
						criteria_a.hide();
						break;
					case "Removed":
						txt_sel.text("");
						txt_sel.val(5);
						txt_sel.hide();
						edit.val(5);
						edit.show();
						criteria_a.hide();
						break;
				}

				$('#paper_note').val(data['note']);

				if (data['keywords'] != "") {
					$('#paper_keywords').text(data['keywords']);
				} else {
					$('#paper_keywords').text("This article does not have Keywords");
				}

				if (data['abstract'] != "") {
					$('#paper_abstract').text(data['abstract']);
				} else {
					$('#paper_abstract').text("This article does not have Abstract");
				}

				let doi = $('#paper_doi');
				if (data['doi'] != "") {
					doi.removeClass("disabled");
					doi.attr("href", "https://doi.org/" + data['doi']);
				} else {
					doi.attr("href", "");
					doi.addClass("disabled");
				}
				let url = $('#paper_url');
				if (data['url'] != "") {
					url.removeClass("disabled");
					url.attr("href", data['url']);
				} else {
					url.attr("href", "");
					url.addClass("disabled");
				}

				table_inclusion_criteria.column(1).data().each(function (value, index) {
					let row = table_inclusion_criteria.row(index).node();
					$(row).removeClass('import');
				});

				table_exclusion_criteria.column(1).data().each(function (value, index) {
					let row = table_exclusion_criteria.row(index).node();
					$(row).removeClass('import');
				});

				table_inclusion_criteria.rows().deselect();
				table_exclusion_criteria.rows().deselect();

				if (data['inclusion'].length > 0) {
					table_inclusion_criteria.column(1).data().each(function (value, index) {
						let row = table_inclusion_criteria.row(index).node();
						$(row).removeClass('import');
						for (let i = 0; i < data['inclusion'].length; i++) {
							if (value == data['inclusion'][i]) {
								$(row).addClass('import');
								table_inclusion_criteria.row(index).select();
							}
						}
					});
				} else {
					table_inclusion_criteria.column(1).data().each(function (value, index) {
						let row = table_inclusion_criteria.row(index).node();
						$(row).removeClass('import');
					});
				}

				if (data['exclusion'].length > 0) {
					table_exclusion_criteria.column(1).data().each(function (value, index) {
						let row = table_exclusion_criteria.row(index).node();
						$(row).removeClass('import');
						for (let i = 0; i < data['exclusion'].length; i++) {
							if (value == data['exclusion'][i]) {
								$(row).addClass('import');
								table_exclusion_criteria.row(index).select();
							}
						}
					});

				} else {
					table_exclusion_criteria.column(1).data().each(function (value, index) {
						let row = table_exclusion_criteria.row(index).node();
						$(row).removeClass('import');
					});
				}


				$('#modal_paper_selection').modal('show');
			}
		});
	});

	$('#paper_note').on('change', function () {
		let id_project = $('#id_project').val();
		let id_paper = $('#id_paper').val();
		let note = $('#paper_note').val();
		$.ajax({
			type: "POST",
			url: base_url + 'Selection_Controller/update_note_selection/',
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

	table_inclusion_criteria.on('select', function (e, dt, type, indexes) {
		let row = table_inclusion_criteria.row(indexes).node();
		let selected = true;
		let clas = $(row).attr('class');
		if (clas.indexOf("import") < 0) {
			$(row).addClass('import');
			evaluation_criteria(indexes, selected, true);
		}
	})
		.on('deselect', function (e, dt, type, indexes) {
			let row = table_inclusion_criteria.row(indexes).node();
			let selected = false;
			let clas = $(row).attr('class');
			if (clas.indexOf("import") >= 0) {
				evaluation_criteria(indexes, selected, true);
				$(row).removeClass('import');
			}
		});

	table_exclusion_criteria.on('select', function (e, dt, type, indexes) {
		let row = table_exclusion_criteria.row(indexes).node();
		let selected = true;
		let clas = $(row).attr('class');
		if (clas.indexOf("import") < 0) {
			$(row).addClass('import');
			evaluation_criteria(indexes, selected, false);
		}
	})
		.on('deselect', function (e, dt, type, indexes) {
			let row = table_exclusion_criteria.row(indexes).node();
			let selected = false;
			let clas = $(row).attr('class');
			if (clas.indexOf("import") >= 0) {
				evaluation_criteria(indexes, selected, false);
				$(row).removeClass('import');
			}
		});


	table_conf_paper_selection.on('select', function (e, dt, type, indexes) {
		let rowData = table_conf_paper_selection.rows(indexes).data().toArray();
		let id_project = $("#id_project").val();

		$.ajax({
			type: "POST",
			url: base_url + 'Selection_Controller/get_paper_conflict/',
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
				$('#index_paper_conf').val(indexes);
				$('#paper_id_conf').text(rowData[0][0]);
				$('#id_paper_conf').val(rowData[0][0]);
				$('#paper_title_conf').text(data['title']);
				$('#paper_author_conf').text(data['author']);
				$('#paper_year_conf').text(data['year']);
				$('#paper_database_conf').text(data['database']);

				$('#status_conflict').val(data['status']);
				$('#old_status_conf').val(data['status']);

				if (data['keywords'] != "") {
					$('#paper_keywords_conf').text(data['keywords']);
				} else {
					$('#paper_keywords_conf').text("This article does not have Keywords");
				}

				if (data['abstract'] != "") {
					$('#paper_abstract_conf').text(data['abstract']);
				} else {
					$('#paper_abstract_conf').text("This article does not have Abstract");
				}

				let doi = $('#paper_doi_conf');
				if (data['doi'] != "") {
					doi.removeClass("disabled");
					doi.attr("href", "https://doi.org/" + data['doi']);
				} else {
					doi.attr("href", "");
					doi.addClass("disabled");
				}
				let url = $('#paper_url_conf');
				if (data['url'] != "") {
					url.removeClass("disabled");
					url.attr("href", data['url']);
				} else {
					url.attr("href", "");
					url.addClass("disabled");
				}

				let notes = $('#notes');
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

					let status = null;
					if (document.getElementById("status_" + data['notes'][i][3])) {
						status = document.getElementById("status_" + data['notes'][i][3]);
						status.id = "status_" + data['notes'][i][3];
					} else {
						status = document.createElement('p');
						status.id = "status_" + data['notes'][i][3];
						notes.append(status);
					}

					switch (data['notes'][i][2]) {
						case "1":
							status.className = 'text-success';
							status.innerText = "Accepted";
							break;
						case "2":
							status.className = 'text-danger';
							status.innerText = "Rejected";
							break;
						case "3":
							status.className = 'text-dark';
							status.innerText = "Unclassified";
							break;
						case "4":
							status.className = 'text-warning';
							status.innerText = "Duplicate";
							break;
						case "5":
							status.className = 'text-info';
							status.innerText = "Removed";
							break;
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
				$('#modal_paper_conflict').modal('show');
			}
		});
	});

	$("#status_conflict").on('change', function () {
		let status = this.value;
		let id_paper = $('#id_paper_conf').val();
		let id_project = $('#id_project').val();
		let index = $('#index_paper_conf').val();
		let old_status = $('#old_status_conf').val();
		$.ajax({
			type: "POST",
			url: base_url + 'Selection_Controller/edit_status_paper/',
			data: {
				id_project: id_project,
				id_paper: id_paper,
				status: status
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
				table_conf_paper_selection.row(index).remove().draw();
				new_status_paper(old_status, status);
				status_paper(status);
			}
		});
	});


});

function new_status_paper(old_status, new_status) {
	$('#old_status_conf').val(new_status);
	let old_count = 0;
	let new_count = 0;
	switch (old_status) {
		case "Accepted":
		case "1":
			old_count = parseInt($('#count_acc').text());
			old_count--;
			$('#count_acc').text(old_count);
			break;
		case "Rejected":
		case "2":
			old_count = parseInt($('#count_rej').text());
			old_count--;
			$('#count_rej').text(old_count);
			break;
		case "Unclassified":
		case "3":
			old_count = parseInt($('#count_unc').text());
			old_count--;
			$('#count_unc').text(old_count);
			break;
		case "Duplicate":
		case "4":
			old_count = parseInt($('#count_dup').text());
			old_count--;
			$('#count_dup').text(old_count);
			break;
		case "Removed":
		case "5":
			old_count = parseInt($('#count_rem').text());
			old_count--;
			$('#count_rem').text(old_count);
			break;
	}

	switch (new_status) {
		case "Accepted":
		case "1":
			new_count = parseInt($('#count_acc').text());
			new_count++;
			$('#count_acc').text(new_count);
			update_progress();
			break;
		case "Rejected":
		case "2":
			new_count = parseInt($('#count_rej').text());
			new_count++;
			$('#count_rej').text(new_count);
			update_progress();
			break;
		case "Unclassified":
		case "3":
			new_count = parseInt($('#count_unc').text());
			new_count++;
			$('#count_unc').text(new_count);
			update_progress();
			break;
		case "Duplicate":
		case "4":
			new_count = parseInt($('#count_dup').text());
			new_count++;
			$('#count_dup').text(new_count);
			update_progress();
			break;
		case "Removed":
		case "5":
			new_count = parseInt($('#count_rem').text());
			new_count++;
			$('#count_rem').text(new_count);
			update_progress();
			break;
	}
}

function change_old_status(old_status) {
	let old_count = 0;
	switch (old_status) {
		case "Accepted":
		case "1":
			old_count = parseInt($('#count_acc').text());
			old_count--;
			$('#count_acc').text(old_count);
			break;
		case "Rejected":
		case "2":
			old_count = parseInt($('#count_rej').text());
			old_count--;
			$('#count_rej').text(old_count);
			break;
		case "Unclassified":
		case "3":
			old_count = parseInt($('#count_unc').text());
			old_count--;
			$('#count_unc').text(old_count);
			break;
		case "Duplicate":
		case "4":
			old_count = parseInt($('#count_dup').text());
			old_count--;
			$('#count_dup').text(old_count);
			break;
		case "Removed":
		case "5":
			old_count = parseInt($('#count_rem').text());
			old_count--;
			$('#count_rem').text(old_count);
			break;
	}
}

function status_paper(status) {
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
				type: 'warning',
				title: 'Duplicate',
				html: 'This paper as <label class="font-weight-bold text-warning">Duplicate</label>'
			});
			break;
		case"5":
			Swal({
				type: 'info',
				title: 'Removed',
				html: 'This paper as <label class="font-weight-bold text-info">Removed</label>'
			});
			break;
	}
}

function update_progress() {
	let pro_acc = $('#prog_acc');
	let pro_rej = $('#prog_rej');
	let pro_unc = $('#prog_unc');
	let pro_dup = $('#prog_dup');
	let pro_rem = $('#prog_rem');
	let total = parseInt($('#count_total').text());
	let acc = parseInt($('#count_acc').text());
	let rej = parseInt($('#count_rej').text());
	let unc = parseInt($('#count_unc').text());
	let dup = parseInt($('#count_dup').text());
	let rem = parseInt($('#count_rem').text());
	let pro = 0;

	for (let i = 1; i < 6; i++) {

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
				pro = parseFloat(Math.round(dup * 100) / total).toFixed(2);
				pro_dup.attr('aria-valuenow', pro);
				pro_dup.css('width', pro + "%");
				pro_dup.text(pro + "%");
				break;
			case 5:
				pro = parseFloat(Math.round(rem * 100) / total).toFixed(2);
				pro_rem.attr('aria-valuenow', pro);
				pro_rem.css('width', pro + "%");
				pro_rem.text(pro + "%");
				break;
		}
	}

}

function change_new_status(id_paper, status, index) {
	let criteria_a = $('#criteria_analiese');
	let new_count = 0;
	let paper = $('#' + id_paper);
	let edit = $('#edit_status_selection');
	let text = $('#text_selection');

	let size = table_papers.columns().data().length;

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
			table_papers.cell(index, (size - 1)).data("Accepted");
			paper.addClass("text-success");
			text.text("Accepted");
			text.show();
			new_count = parseInt($('#count_acc').text());
			new_count++;
			$('#count_acc').text(new_count);
			criteria_a.show();
			update_progress();
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
			table_papers.cell(index, (size - 1)).data("Rejected");
			text.text("Rejected");
			paper.addClass("text-danger");
			text.show();
			new_count = parseInt($('#count_rej').text());
			new_count++;
			$('#count_rej').text(new_count);
			criteria_a.show();
			update_progress();
			break;
		case "3":
			text.val(3);
			text.hide();
			paper.removeClass("text-danger");
			paper.removeClass("text-success");
			paper.removeClass("text-info");
			paper.removeClass("text-warning");
			table_papers.cell(index, (size - 1)).data("Unclassified");
			paper.addClass("text-dark");
			edit.val(3);
			edit.show();
			new_count = parseInt($('#count_unc').text());
			new_count++;
			$('#count_unc').text(new_count);
			criteria_a.show();
			update_progress();
			break;
		case "4":
			text.val(4);
			text.hide();
			paper.removeClass("text-danger");
			paper.removeClass("text-success");
			paper.removeClass("text-dark");
			paper.removeClass("text-info");
			table_papers.cell(index, 5).data("Duplicate");
			paper.addClass("text-warning");
			edit.val(4);
			edit.show();
			new_count = parseInt($('#count_dup').text());
			new_count++;
			$('#count_dup').text(new_count);
			criteria_a.hide();
			update_progress();
			break;
		case "5":
			text.val(5);
			text.hide();
			paper.removeClass("text-danger");
			paper.removeClass("text-success");
			paper.removeClass("text-dark");
			paper.removeClass("text-warning");
			table_papers.cell(index, (size - 1)).data("Removed");
			paper.addClass("text-info");
			edit.val(5);
			edit.show();
			new_count = parseInt($('#count_rem').text());
			new_count++;
			$('#count_rem').text(new_count);
			criteria_a.hide();
			update_progress();
			break;
	}
}

function evaluation_criteria(indexes, selected, inclusion) {
	let data = null;
	if (inclusion) {
		data = table_inclusion_criteria.rows(indexes).data().toArray();
	} else {
		data = table_exclusion_criteria.rows(indexes).data().toArray();
	}

	let id_project = $('#id_project').val();
	let id = data[0][1];
	let old_status = $('#text_selection').val();
	let id_paper = $('#id_paper').val();
	let index = $('#index_paper').val();


	$.ajax({
		type: "POST",
		url: base_url + 'Selection_Controller/evaluation_criteria/',
		data: {
			id_project: id_project,
			id_paper: id_paper,
			id: id,
			selected: selected,
			old_status: old_status
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
			data = JSON.parse(data);
			let cont = 0;
			let colum = 0;
			table_papers.columns().every(function () {
				if (this.title() == id) {
					colum = cont;
				}
				cont++;
			});

			table_papers.cell(index, colum).data(selected ? '<i class=\"fas fa-check text-success\"></i> True' : '<i class=\"fas fa-times text-danger\"></i> False');

			if (data.change) {
				change_old_status(old_status.toString());
				change_new_status(id_paper, data.status.toString(), index);
				status_paper(data.status.toString());
			}
		}
	});


}
