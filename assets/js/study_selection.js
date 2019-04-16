$(document).ready(function () {

	$("#edit_status_selection").on('change', function () {
		let status = this.value;
		let id_paper = $('#id_paper').val();
		let id_project = $('#id_project').val();
		let index = $('#index_paper').val();
		let old_status = table_papers.cell(index, 5).data();
		$.ajax({
			type: "POST",
			url: base_url + 'Project_Controller/edit_status_selection/',
			data: {
				id_project: id_project,
				id_paper: id_paper,
				status: status
			},
			success: function () {
				change_old_status(old_status);
				change_new_status(id_paper, status, index)
				status_paper(status)
			}
		});
	});

	table_papers.on('select', function (e, dt, type, indexes) {
		let rowData = table_papers.rows(indexes).data().toArray();
		let id_project = $("#id_project").val();

		$.ajax({
			type: "POST",
			url: base_url + 'Project_Controller/get_paper/',
			data: {
				id_project: id_project,
				id: rowData[0][0]
			},
			error: function () {
				Swal({
					type: 'error',
					title: 'Error',
					html: '<label class="font-weight-bold text-danger">Error</label>'
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
				$('#paper_author').text(rowData[0][2]);
				$('#paper_year').text(rowData[0][3]);
				$('#paper_database').text(rowData[0][4]);
				switch (rowData[0][5]) {
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
						txt_sel.text(rowData[0][5]);
						txt_sel.val(2);
						txt_sel.show();
						break;
					case "Accepted":
						edit.hide();
						criteria_a.show();
						txt_sel.removeClass("text-danger");
						txt_sel.addClass("text-success");
						txt_sel.text(rowData[0][5]);
						txt_sel.val(1);
						txt_sel.show();
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

				if (data['doi'] != "") {
					$('#paper_doi').text(data['doi']);
				} else {
					$('#paper_doi').text("This article does not have Doi");
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
		Swal({
			type: 'success',
			title: 'Added Note',
			html: 'Added <label class="font-weight-bold text-success">Note</label> as paper!'
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
});

function change_old_status(old_status) {
	let old_count = 0;
	switch (old_status) {
		case "1":
			old_count = parseInt($('#count_acc').text());
			old_count--;
			$('#count_acc').text(old_count);
			break;
		case "2":
			old_count = parseInt($('#count_rej').text());
			old_count--;
			$('#count_rej').text(old_count);
			break;
		case "3":
			old_count = parseInt($('#count_unc').text());
			old_count--;
			$('#count_unc').text(old_count);
			break;
		case "4":
			old_count = parseInt($('#count_dup').text());
			old_count--;
			$('#count_dup').text(old_count);
			break;
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

function change_new_status(id_paper, status, index) {
	let criteria_a = $('#criteria_analiese');
	let new_count = 0;
	let paper = $('#' + id_paper);
	let edit = $('#edit_status_selection');
	let text = $('#text_selection');
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
			table_papers.cell(index, 5).data("Accepted").draw();
			paper.addClass("text-success");
			text.text("Accepted");
			text.show();
			new_count = parseInt($('#count_acc').text());
			new_count++;
			$('#count_acc').text(new_count);
			criteria_a.show();
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
			table_papers.cell(index, 5).data("Rejected").draw();
			text.text("Rejected");
			paper.addClass("text-danger");
			text.show();
			new_count = parseInt($('#count_rej').text());
			new_count++;
			$('#count_rej').text(new_count);
			criteria_a.show();
			break;
		case "3":
			text.val(3);
			text.hide();
			paper.removeClass("text-danger");
			paper.removeClass("text-success");
			paper.removeClass("text-info");
			paper.removeClass("text-warning");
			table_papers.cell(index, 5).data("Unclassified").draw();
			paper.addClass("text-dark");
			edit.val(3);
			edit.show();
			new_count = parseInt($('#count_unc').text());
			new_count++;
			$('#count_unc').text(new_count);
			criteria_a.show();
			break;
		case "4":
			text.val(4);
			text.hide();
			paper.removeClass("text-danger");
			paper.removeClass("text-success");
			paper.removeClass("text-dark");
			paper.removeClass("text-info");
			table_papers.cell(index, 5).data("Duplicate").draw();
			paper.addClass("text-warning");
			edit.val(4);
			edit.show();
			new_count = parseInt($('#count_dup').text());
			new_count++;
			$('#count_dup').text(new_count);
			criteria_a.hide();
			break;
		case "5":
			text.val(5);
			text.hide();
			paper.removeClass("text-danger");
			paper.removeClass("text-success");
			paper.removeClass("text-dark");
			paper.removeClass("text-warning");
			table_papers.cell(index, 5).data("Removed").draw();
			paper.addClass("text-info");
			edit.val(5);
			edit.show();
			new_count = parseInt($('#count_rem').text());
			new_count++;
			$('#count_rem').text(new_count);
			criteria_a.hide();
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
		url: base_url + 'Project_Controller/evaluation_criteria/',
		data: {
			id_project: id_project,
			id_paper: id_paper,
			id: id,
			selected: selected,
			old_status: old_status
		},
		success: function (data) {
			data = JSON.parse(data);

			console.log(data.status.toString());

			if (data.change) {
				change_old_status(old_status);
				change_new_status(id_paper, data.status.toString(), index);
				status_paper(data.status.toString());
			}
		}
	});


}
