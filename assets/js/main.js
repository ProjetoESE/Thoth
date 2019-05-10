$(document).ajaxStart(function () {
	exibe_loading();
}).ajaxStop(function () {
	remove_loading();
});

$(document).ready(function () {
	base_url = $("#base_url").val();
	remove_loading();
	let lang = {
		"sZeroRecords": "No options added"
	};

	let configDataTables = {
		language: lang,
		responsive: true,
		order: [[0, "asc"]],
		paginate: false,
		info: false,
		searching: false,
		ordering: false
	};

	table_members = $('#table_members').DataTable(configDataTables);

	table_conf_paper_selection = $('#table_conf_paper_selection').DataTable({
		language: lang,
		responsive: true,
		order: [[0, "asc"]],
		paginate: true,
		info: true,
		searching: true,
		ordering: true,
		select: {
			style: 'single'
		}
	});

	table_conf_paper_qa = $('#table_conf_paper_qa').DataTable({
		language: lang,
		responsive: true,
		order: [[0, "asc"]],
		paginate: true,
		info: true,
		searching: true,
		ordering: true,
		select: {
			style: 'single'
		}
	});

	table_qa_eva = $('#table_qa_eva').DataTable({
		columnDefs: [{
			orderable: false,
			targets: 2
		}, {
			width: '20%',
			orderable: false,
			targets: 3
		}],
		autoWidth: false,
		language: lang,
		responsive: true,
		order: [[0, "asc"]],
		paginate: false,
		info: false,
		searching: false,
	});

	table_domains = $('#table_domains').DataTable(configDataTables);
	table_languages = $('#table_languages').DataTable(configDataTables);
	table_study_type = $('#table_study_type').DataTable(configDataTables);
	table_keywords = $('#table_keywords').DataTable(configDataTables);
	table_research_question = $('#table_research_question').DataTable(configDataTables);
	table_databases = $('#table_databases').DataTable(configDataTables);
	table_search_string = $('#table_search_string').DataTable(configDataTables);
	table_general_score = $('#table_general_score').DataTable(configDataTables);
	table_criteria_inclusion = $('#table_criteria_inclusion').DataTable(configDataTables);
	table_criteria_exclusion = $('#table_criteria_exclusion').DataTable(configDataTables);
	table_qa = $('#table_qa').DataTable(configDataTables);
	table_data_extraction = $('#table_data_extraction').DataTable(configDataTables);


	table_imported_studies = $('#table_imported_studies').DataTable({
		responsive: true,
		order: [[1, "asc"]],
		paginate: false,
		info: false,
		searching: false,
		columnDefs: [
			{"orderable": false, "targets": 2}]

	});
	table_my_projects = $('#table_my_projects').DataTable({
		responsive: true,
		order: [[0, "asc"]],
		columnDefs: [
			{"orderable": false, "targets": 2}],
	});

	$('#tableSearch').DataTable({
		responsive: true,
		order: [[0, "asc"]],
		columnDefs: [
			{"orderable": false, "targets": 2}],

	});

	table_papers = $('#table_papers').DataTable({
		initComplete: function () {
			for (let i = 3; i < 5; i++) {
				this.api().columns(i).every(function () {
					let column = this;
					let select = $('<select id="select_status' + i + '" class="form-control" ><option value=""></option></select>')
						.appendTo($(column.footer()).empty())
						.on('change', function () {
							let val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);

							column
								.search(val ? '^' + val + '$' : '', true, false)
								.draw();
						});

					column.data().unique().sort().each(function (d, j) {
						select.append('<option value="' + d + '">' + d + '</option>')
					});
				});
			}
			this.api().columns(5).every(function () {
				let column = this;
				let select = $('<select id="select_status5" class="form-control" ><option value=""></option></select>')
					.appendTo($(column.footer()).empty())
					.on('change', function () {
						let val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search(val ? '^' + val + '$' : '', true, false)
							.draw();
					});

				select.append('<option value="Accepted">Accepted</option>')
				select.append('<option value="Rejected">Rejected</option>')
				select.append('<option value="Unclassified">Unclassified</option>')
				select.append('<option value="Duplicate">Duplicate</option>')
				select.append('<option value="Removed">Removed</option>')

			});
		},
		responsive: true,
		order: [[0, "asc"]],
		select: {
			style: 'single'
		},
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print', {
				text: 'Check Duplicates',
				action: function () {
					exibe_loading();
					let id_project = $('#id_project').val();
					let titles = [];
					let papers = [];
					table_papers.rows().every(function (rowIdx, tableLoop, rowLoop) {
						let data = this.data();
						if (data[5] != 'Duplicate') {
							let title = data[1].replace(/[^a-zA-Z0-9]/g, '');
							if (titles.indexOf(title) == -1) {
								titles.push(title);
							} else {
								papers.push(data[0]);
								let old_count = 0;
								switch (data[5]) {
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
								let paper = $(table_papers.cell(rowIdx, 5).node());
								paper.removeClass("text-danger");
								paper.removeClass("text-success");
								paper.removeClass("text-dark");
								paper.removeClass("text-info");
								paper.addClass("text-warning");
								table_papers.cell(rowIdx, 5).data("Duplicate").draw();
								let new_count = parseInt($('#count_dup').text());
								new_count++;
								$('#count_dup').text(new_count);
								update_progress();
							}
						}
					});

					if (papers.length > 0) {
						$.ajax({
							type: "POST",
							url: base_url + 'Selection_Controller/edit_status_selection_papers/',
							data: {
								id_project: id_project,
								ids_paper: papers,
								status: "4"
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
								let creat = true;
								let y = document.getElementById("select_status5").options;
								for (let i = 0; i < y.length; i++) {
									if (y[i].value == "Duplicate") {
										creat = false;
									}
								}

								if (creat) {
									console.log(y[1].value);
									let op = document.createElement("option");
									op.text = "Duplicate";
									op.value = "Duplicate";
									let select = document.getElementById("select_status5");
									select.add(op);
								}
								Swal({
									title: 'Success',
									html: "The <strong>" + papers.length + "</strong> papers was duplicate",
									type: 'success',
									showCancelButton: false,
									confirmButtonText: 'Ok'
								});

							}
						});
					} else {
						Swal({
							title: 'Success',
							html: "The <strong>" + papers.length + "</strong> papers was duplicate",
							type: 'success',
							showCancelButton: false,
							confirmButtonText: 'Ok'
						});
						remove_loading();
					}
				}
			}
		]
	});

	table_inclusion_criteria = $('#table_inclusion_criteria').DataTable({
		columnDefs: [{
			orderable: false,
			className: 'select-checkbox',
			targets: 0
		}],
		select: {
			style: 'multi'
		},
		order: [[1, 'asc']],
		paginate: false,
		info: false,
		searching: false
	});

	table_exclusion_criteria = $('#table_exclusion_criteria').DataTable({
		columnDefs: [{
			orderable: false,
			className: 'select-checkbox',
			targets: 0
		}],
		select: {
			style: 'multi'
		},
		order: [[1, 'asc']],
		paginate: false,
		info: false,
		searching: false
	});

	table_papers_quality = $('#table_papers_quality').DataTable({
		initComplete: function () {
			let size = this.api().columns().data().length;
			this.api().columns(size - 1).every(function () {
				let column = this;
				let select = $('<select id="select_status5" class="form-control" ><option value=""></option></select>')
					.appendTo($(column.footer()).empty())
					.on('change', function () {
						let val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column.search(val ? '^' + val + '$' : '', true, false).draw();
					});

				select.append('<option value="Accepted">Accepted</option>');
				select.append('<option value="Rejected">Rejected</option>');
				select.append('<option value="Unclassified">Unclassified</option>');
				select.append('<option value="Removed">Removed</option>');

			});
		},
		responsive: true,
		order: [[0, "asc"]],
		select: {
			style: 'single'
		},
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print',]
	});


	let table_papers_extraction = $('#table_papers_extraction').DataTable({
		columnDefs: [{
			targets: 4,
			orderable: false
		}],
		responsive: true,
		order: [[0, "asc"]],
		select: {
			style: 'single',
			selector: 'td:first-child'
		},
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});

	table_papers_extraction.on('select', function (e, dt, type, indexes) {
		let rowData = table_papers_extraction.rows(indexes).data().toArray();
		document.getElementById("paper_id").value = rowData[0][0];
		$('#paper_title').text(rowData[0][1]);
		$('#paper_author').val("F. Kiamilev and R. Rozier and J. Rieve");
		$('#paper_year').val(rowData[0][2]);
		$('#paper_database').val("IEEE");
		$('#paper_keywords').val("field programmable gate arrays;integrated circuit packaging;integrated circuit " +
			"testing;integrated optoelectronics;monitoring;smart pixels;test equipment;PGA chip carrier;compact " +
			"low-cost high-performance test fixture;electrical test;high-speed electrical signal monitoring;smart " +
			"pixel IC packaging;smart pixel integrated circuit control;smart pixel integrated circuit testing;Circuit" +
			" testing;Clocks;EPROM;Electronics packaging;Field programmable gate arrays;Fixtures;Hardware design " +
			"languages;Integrated circuit testing;Smart pixels;Sockets");
		$('#paper_abtract').val("The Internet Engineering Task Force (IETF) has introduced IPv6 with a mission" +
			" to meet the growing demands of the future Internet. IPv6 is more and more emphasized and moving" +
			" from the pilot phase to the practical application. In the process of deploying IPv6, performance" +
			" is one of the key issues to be considered. Test is an effective method to understand IPv6 network " +
			"performance. We need scalable and available tools to measure IPv6 network performance, but the few " +
			"existing network performance test software support IPv6. So through the introduction of multi-agent" +
			" technology, a distributed IPv6 network performance test model integrated with centralized control " +
			"is proposed. We describe architecture and workflow of the model thoroughly, and a IPv6 network performance" +
			" test system is designed and implemented based on the model. Finally, using our system, we measure" +
			" IPv6 performance metrics on CERNET2 which is the largest pure IPv6 network in the world presently. " +
			"The final experiments show that it is necessary to implement a IPv6 network performance test system and " +
			"that our system is scalable and available for IPv6 network performance tes");
		$('#row_criteria').hide();
		$('#row_quality').hide();
		$('#modalPaper').modal('show');
	});

	if (location.hash) {
		$("a[href='" + location.hash + "']").tab("show");
	}
	$(document.body).on("click", "a[data-toggle]", function (event) {
		location.hash = this.getAttribute("href");
	});

	$('#add_email_user').select2({
		placeholder: 'Select an email',
		allowClear: true
	});

	$('#add_level_user').select2({
		placeholder: 'Select an level',
		allowClear: true
	});

	$(window).on("beforeunload", function () {
		exibe_loading();
	});
	$(window).on("popstate", function () {
		var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
		$("a[href='" + anchor + "']").tab("show");
	});
});

