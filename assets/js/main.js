$(document).ready(function () {
	let lang = {
		"sZeroRecords": "No options added"
	};


	let configDataTables = {
		language: lang,
		responsive: true,
		order: [[1, "asc"]],
		paginate: false,
		info: false,
		searching: false,
		ordering: false,
		select: {
			style: 'single'
		}
	};

	table_domains = $('#table_domains').DataTable(configDataTables);

	table_domains.on('select', function (e, dt, type, indexes) {
		var rowData = table_domains.rows(indexes).data().toArray();
		alertify.prompt( 'Prompt Message', rowData[0][0]
			, function(evt, value) {
			alertify.success('You entered: ' + value)
				rowData[0]=value;
			}
			, function() {
			alertify.error('Cancel')
		});
	});

	table_languages = $('#table_languages').DataTable(configDataTables);
	table_study_type = $('#table_study_type').DataTable(configDataTables);
	table_keywords = $('#table_keywords').DataTable(configDataTables);
	table_research_question = $('#table_research_question').DataTable(configDataTables);
	table_databases = $('#table_databases').DataTable(configDataTables);
	table_search_string = $('#table_search_string').DataTable(configDataTables);
	$('#table_criteria').DataTable(configDataTables);
	$('#table_qa').DataTable(configDataTables);
	$('#table_question_quality').DataTable(configDataTables);
	$('#table_data_extraction').DataTable(configDataTables);
	$('#table_general_score').DataTable(configDataTables);


	$('#table_imported_studies').DataTable({
		responsive: true,
		order: [[1, "asc"]],
		paginate: false,
		info: false,
		searching: false,
		columnDefs: [
			{"orderable": false, "targets": 2}]

	});
	$('#tableMyProjects').DataTable({
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

	let table_papers = $('#table_papers').DataTable({
		responsive: true,
		order: [[0, "asc"]],
		select: true,
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});

	table_papers.on('select', function (e, dt, type, indexes) {
		let rowData = table_papers.rows(indexes).data().toArray();
		document.getElementById("paper_id").value = rowData[0][0];
		$('#paper_title').text(rowData[0][1]);
		$('#paper_author').text(rowData[0][2]);
		$('#paper_year').text(rowData[0][3]);
		$('#paper_database').text(rowData[0][4]);
		$('#row_quality').hide();
		$('#row_extraction').hide();
		$('#paper_keywords').text("field programmable gate arrays;integrated circuit packaging;integrated circuit testing;integrated optoelectronics;monitoring;smart pixels;test equipment;PGA chip carrier;compact low-cost high-performance test fixture;electrical test;high-speed electrical signal monitoring;smart pixel IC packaging;smart pixel integrated circuit control;smart pixel integrated circuit testing;Circuit testing;Clocks;EPROM;Electronics packaging;Field programmable gate arrays;Fixtures;Hardware design languages;Integrated circuit testing;Smart pixels;Sockets");
		$('#paper_abtract').text("The Internet Engineering Task Force (IETF) has introduced IPv6 with a mission to meet the growing demands of the future Internet. IPv6 is more and more emphasized and moving from the pilot phase to the practical application. In the process of deploying IPv6, performance is one of the key issues to be considered. Test is an effective method to understand IPv6 network performance. We need scalable and available tools to measure IPv6 network performance, but the few existing network performance test software support IPv6. So through the introduction of multi-agent technology, a distributed IPv6 network performance test model integrated with centralized control is proposed. We describe architecture and workflow of the model thoroughly, and a IPv6 network performance test system is designed and implemented based on the model. Finally, using our system, we measure IPv6 performance metrics on CERNET2 which is the largest pure IPv6 network in the world presently. The final experiments show that it is necessary to implement a IPv6 network performance test system and that our system is scalable and available for IPv6 network performance tes");
		$('#modalPaper').modal('show');
	});

	$('#table_inclusion_criteria').DataTable({
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

	$('#table_exclusion_criteria').DataTable({
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

	let table_papers_quality = $('#table_papers_quality').DataTable({
		responsive: true,
		order: [[0, "asc"]],
		select: true,
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});

	table_papers_quality.on('select', function (e, dt, type, indexes) {
		let rowData = table_papers_quality.rows(indexes).data().toArray();
		document.getElementById("paper_id").value = rowData[0][0];
		$('#paper_title').text(rowData[0][1]);
		$('#paper_author').text("F. Kiamilev and R. Rozier and J. Rieve");
		$('#paper_year').text(rowData[0][2]);
		$('#paper_database').text("IEEE");
		$('#paper_keywords').text("field programmable gate arrays;integrated circuit packaging;integrated circuit testing;integrated optoelectronics;monitoring;smart pixels;test equipment;PGA chip carrier;compact low-cost high-performance test fixture;electrical test;high-speed electrical signal monitoring;smart pixel IC packaging;smart pixel integrated circuit control;smart pixel integrated circuit testing;Circuit testing;Clocks;EPROM;Electronics packaging;Field programmable gate arrays;Fixtures;Hardware design languages;Integrated circuit testing;Smart pixels;Sockets");
		$('#paper_abtract').text("The Internet Engineering Task Force (IETF) has introduced IPv6 with a mission to meet the growing demands of the future Internet. IPv6 is more and more emphasized and moving from the pilot phase to the practical application. In the process of deploying IPv6, performance is one of the key issues to be considered. Test is an effective method to understand IPv6 network performance. We need scalable and available tools to measure IPv6 network performance, but the few existing network performance test software support IPv6. So through the introduction of multi-agent technology, a distributed IPv6 network performance test model integrated with centralized control is proposed. We describe architecture and workflow of the model thoroughly, and a IPv6 network performance test system is designed and implemented based on the model. Finally, using our system, we measure IPv6 performance metrics on CERNET2 which is the largest pure IPv6 network in the world presently. The final experiments show that it is necessary to implement a IPv6 network performance test system and that our system is scalable and available for IPv6 network performance tes");
		$('#row_criteria').hide();
		$('#row_extraction').hide();
		$('#modalPaper').modal('show');
	});

	let table_papers_extraction = $('#table_papers_extraction').DataTable({
		responsive: true,
		order: [[0, "asc"]],
		select: true,
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});

	table_papers_extraction.on('select', function (e, dt, type, indexes) {
		let rowData = table_papers_extraction.rows(indexes).data().toArray();
		document.getElementById("paper_id").value = rowData[0][0];
		$('#paper_title').text(rowData[0][1]);
		$('#paper_author').text("F. Kiamilev and R. Rozier and J. Rieve");
		$('#paper_year').text(rowData[0][2]);
		$('#paper_database').text("IEEE");
		$('#paper_keywords').text("field programmable gate arrays;integrated circuit packaging;integrated circuit testing;integrated optoelectronics;monitoring;smart pixels;test equipment;PGA chip carrier;compact low-cost high-performance test fixture;electrical test;high-speed electrical signal monitoring;smart pixel IC packaging;smart pixel integrated circuit control;smart pixel integrated circuit testing;Circuit testing;Clocks;EPROM;Electronics packaging;Field programmable gate arrays;Fixtures;Hardware design languages;Integrated circuit testing;Smart pixels;Sockets");
		$('#paper_abtract').text("The Internet Engineering Task Force (IETF) has introduced IPv6 with a mission to meet the growing demands of the future Internet. IPv6 is more and more emphasized and moving from the pilot phase to the practical application. In the process of deploying IPv6, performance is one of the key issues to be considered. Test is an effective method to understand IPv6 network performance. We need scalable and available tools to measure IPv6 network performance, but the few existing network performance test software support IPv6. So through the introduction of multi-agent technology, a distributed IPv6 network performance test model integrated with centralized control is proposed. We describe architecture and workflow of the model thoroughly, and a IPv6 network performance test system is designed and implemented based on the model. Finally, using our system, we measure IPv6 performance metrics on CERNET2 which is the largest pure IPv6 network in the world presently. The final experiments show that it is necessary to implement a IPv6 network performance test system and that our system is scalable and available for IPv6 network performance tes");
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

});


