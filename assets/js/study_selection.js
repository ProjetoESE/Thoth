$(document).ready(function () {

	$("#edit_status_selection").on('change', function () {
		let status = this.value;
		let id_paper = $('#id_paper').val();
		let id_project = $('#id_project').val();
		let index = $('#index_paper').val();
		$.ajax({
			type: "POST",
			url: base_url + 'Project_Controller/edit_status_selection/',
			data: {
				id_project: id_project,
				id_paper: id_paper,
				status: status
			},
			success: function () {
				let old_status = $('#' + id_paper).text();
				let old_count = 0;

				switch (old_status) {
					case "Accepted":
						old_count = parseInt($('#count_acc').text());
						old_count--;
						$('#count_acc').text(old_count);
						break;
					case "Rejected":
						old_count = parseInt($('#count_acc').text());
						old_count--;
						$('#count_acc').text(old_count);
						break;
					case "Unclassified":
						old_count = parseInt($('#count_unc').text());
						old_count--;
						$('#count_unc').text(old_count);
						break;
					case "Duplicate":
						old_count = parseInt($('#count_dup').text());
						old_count--;
						$('#count_dup').text(old_count);
						break;
					case "Removed":
						old_count = parseInt($('#count_rem').text());
						old_count--;
						$('#count_rem').text(old_count);
						break;
				}
				let new_count = 0;
				switch (status) {
					case "3":
						$('#text_selection').hide();
						$('#' + id_paper).removeClass("text-danger");
						$('#' + id_paper).removeClass("text-success");
						$('#' + id_paper).removeClass("text-info");
						$('#' + id_paper).removeClass("text-warning");
						table_papers.cell(index, 5).data("Unclassified").draw();
						$('#' + id_paper).addClass("text-dark");
						$('#edit_status_selection').val(3);
						$('#edit_status_selection').show();
						new_count = parseInt($('#count_rem').text());
						new_count++;
						$('#count_rem').text(new_count);
						break;
					case "4":
						$('#text_selection').hide();
						$('#' + id_paper).removeClass("text-danger");
						$('#' + id_paper).removeClass("text-success");
						$('#' + id_paper).removeClass("text-dark");
						$('#' + id_paper).removeClass("text-info");
						table_papers.cell(index, 5).data("Duplicate").draw();
						$('#' + id_paper).addClass("text-warning");
						$('#edit_status_selection').val(4);
						$('#edit_status_selection').show();
						new_count = parseInt($('#count_dup').text());
						new_count++;
						$('#count_dup').text(new_count);
						break;
					case "5":
						$('#text_selection').hide();
						$('#' + id_paper).removeClass("text-danger");
						$('#' + id_paper).removeClass("text-success");
						$('#' + id_paper).removeClass("text-dark");
						$('#' + id_paper).removeClass("text-warning");
						table_papers.cell(index, 5).data("Removed").draw();
						$('#' + id_paper).addClass("text-info");
						$('#edit_status_selection').val(5);
						$('#edit_status_selection').show();
						new_count = parseInt($('#count_rem').text());
						new_count++;
						$('#count_rem').text(new_count);
						break;
				}
				Swal({
					title: 'Success',
					text: "The status selection was edited",
					type: 'success',
					showCancelButton: false,
					confirmButtonText: 'Ok'
				});
			}
		});
	});
	next_index_paper = [];
	prev_index_paper = [];
	next_index_paper[0] = 0;
	prev_index_paper[0] = 0;

	$("#next_paper").on('click', function () {
		let rowData = table_papers.rows(next_index_paper).data().toArray();
		let size = table_papers.rows().data().toArray().length;
		let id_project = $("#id_project").val();

		if (prev_index_paper[0] > 0 && next_index_paper[0] < size) {
			$("#next_paper").removeClass('disabled');
			$("#prev_paper").removeClass('disabled');
			next_index_paper[0] = prev_index_paper[0] + 1;
			prev_index_paper[0] = prev_index_paper[0] - 1;

		} else if (prev_index_paper[0] <= 0) {
			$("#prev_paper").addClass('disabled');
			$("#next_paper").removeClass('disabled');
		} else if (next_index_paper[0] >= size) {
			$("#next_paper").addClass('disabled');
			$("#prev_paper").removeClass('disabled');
		}


		$.ajax({
			type: "POST",
			url: base_url + 'Project_Controller/get_paper/',
			data: {
				id_project: id_project,
				id: rowData[0][0]
			},
			success: function (data) {

				let txt_sel = $('#text_selection');
				let edit = $('#edit_status_selection');
				data = JSON.parse(data);

				$('#index_paper').val(next_index_paper);
				$('#id_paper').val(rowData[0][0]);
				$('#paper_title').text(rowData[0][1]);
				$('#paper_author').text(rowData[0][2]);
				$('#paper_year').text(rowData[0][3]);
				$('#paper_database').text(rowData[0][4]);
				switch (rowData[0][5]) {
					case "Unclassified":
						txt_sel.hide();
						edit.val(3);
						edit.show();
						break;
					case "Rejected":
						edit.hide();
						txt_sel.removeClass("text-dark");
						txt_sel.removeClass("text-success");
						txt_sel.addClass("text-danger");
						txt_sel.text(rowData[0][5]);
						txt_sel.show();
						break;
					case "Accepted":
						edit.hide();
						txt_sel.removeClass("text-dark");
						txt_sel.removeClass("text-danger");
						txt_sel.addClass("text-success");
						txt_sel.text(rowData[0][5]);
						txt_sel.show();
						break;
					case "Duplicate":
						txt_sel.hide();
						edit.val(4);
						edit.show();
						break;
					case "Removed":
						txt_sel.hide();
						edit.val(5);
						edit.show();
						break;
				}

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
					url.text(data['url']);
					url.attr("href", data['url']);
				} else {
					url.text("This article does not have URL");
					url.attr("href", "");
					url.addClass("disabled");
				}
				$('#modal_paper_selection').modal('show');
			}
		});
	});

	$("#prev_paper").on('click', function () {
		let rowData = table_papers.rows(prev_index_paper).data().toArray();
		let size = table_papers.rows().data().toArray().length;
		let id_project = $("#id_project").val();

		if (prev_index_paper[0] > 0 && next_index_paper[0] < size) {
			$("#prev_paper").removeClass('disabled');
			$("#next_paper").removeClass('disabled');
			next_index_paper[0] = prev_index_paper[0] + 1;
			prev_index_paper[0] = prev_index_paper[0] - 1;

		} else if (prev_index_paper[0] <= 0) {
			$("#prev_paper").addClass('disabled');
		} else if (next_index_paper[0] >= size) {
			$("#next_paper").addClass('disabled');
		}

		$.ajax({
			type: "POST",
			url: base_url + 'Project_Controller/get_paper/',
			data: {
				id_project: id_project,
				id: rowData[0][0]
			},
			success: function (data) {

				let txt_sel = $('#text_selection');
				let edit = $('#edit_status_selection');
				data = JSON.parse(data);

				$('#index_paper').val(prev_index_paper);
				$('#id_paper').val(rowData[0][0]);
				$('#paper_title').text(rowData[0][1]);
				$('#paper_author').text(rowData[0][2]);
				$('#paper_year').text(rowData[0][3]);
				$('#paper_database').text(rowData[0][4]);
				switch (rowData[0][5]) {
					case "Unclassified":
						txt_sel.hide();
						edit.val(3);
						edit.show();
						break;
					case "Rejected":
						edit.hide();
						txt_sel.removeClass("text-dark");
						txt_sel.removeClass("text-success");
						txt_sel.addClass("text-danger");
						txt_sel.text(rowData[0][5]);
						txt_sel.show();
						break;
					case "Accepted":
						edit.hide();
						txt_sel.removeClass("text-dark");
						txt_sel.removeClass("text-danger");
						txt_sel.addClass("text-success");
						txt_sel.text(rowData[0][5]);
						txt_sel.show();
						break;
					case "Duplicate":
						txt_sel.hide();
						edit.val(4);
						edit.show();
						break;
					case "Removed":
						txt_sel.hide();
						edit.val(5);
						edit.show();
						break;
				}

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
					url.text(data['url']);
					url.attr("href", data['url']);
				} else {
					url.text("This article does not have URL");
					url.attr("href", "");
					url.addClass("disabled");
				}
				$('#modal_paper_selection').modal('show');
			}
		});
	});

	table_papers.on('select', function (e, dt, type, indexes) {
		let rowData = table_papers.rows(indexes).data().toArray();
		let size = table_papers.rows().data().toArray().length;
		let id_project = $("#id_project").val();

		next_index_paper[0] = indexes[0] + 1;
		prev_index_paper[0] = indexes[0] - 1;

		if (prev_index_paper[0] > 0 && next_index_paper[0] < size) {
			$("#prev_paper").removeClass('disabled');
			$("#next_paper").removeClass('disabled');

		} else if (prev_index_paper[0] <= 0) {
			$("#prev_paper").addClass('disabled');

		} else if (next_index_paper[0] >= size) {
			$("#next_paper").addClass('disabled');
		}

		$.ajax({
			type: "POST",
			url: base_url + 'Project_Controller/get_paper/',
			data: {
				id_project: id_project,
				id: rowData[0][0]
			},
			success: function (data) {

				let txt_sel = $('#text_selection');
				let edit = $('#edit_status_selection');
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
						txt_sel.hide();
						edit.val(3);
						edit.show();
						break;
					case "Rejected":
						edit.hide();
						txt_sel.removeClass("text-dark");
						txt_sel.removeClass("text-success");
						txt_sel.addClass("text-danger");
						txt_sel.text(rowData[0][5]);
						txt_sel.show();
						break;
					case "Accepted":
						edit.hide();
						txt_sel.removeClass("text-dark");
						txt_sel.removeClass("text-danger");
						txt_sel.addClass("text-success");
						txt_sel.text(rowData[0][5]);
						txt_sel.show();
						break;
					case "Duplicate":
						txt_sel.hide();
						edit.val(4);
						edit.show();
						break;
					case "Removed":
						txt_sel.hide();
						edit.val(5);
						edit.show();
						break;
				}

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
					url.attr("href", data['url']);
				} else {
					url.attr("href", "");
					url.addClass("disabled");
				}
				$('#modal_paper_selection').modal('show');
			}
		});
	});
});

