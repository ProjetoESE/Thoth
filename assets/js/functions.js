function done_paper() {
	let id = document.getElementById("paper_id").value;
}

function generateString(database) {
	switch (database) {
		case 0:
			$('#string_generic').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\" " +
				"\"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer " +
				"Framework Suite Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 1:
			$('#string_scopus').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\"" +
				" \"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer Framework Suite" +
				" Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 2:
			$('#string_acm').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\" " +
				"\"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer Framework Suite" +
				" Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 3:
			$('#string_ieee').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\" " +
				"\"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer Framework Suite" +
				" Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 4:
			$('#string_science').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\" " +
				"\"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer Framework Suite" +
				" Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 5:
			$('#string_enginnering').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\"" +
				" \"Spike Test\" \"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor " +
				"Analyzer Framework Suite Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 6:
			$('#string_springer').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" " +
				"\"Spike Test\" \"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor " +
				"Analyzer Framework Suite Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 7:
			$('#string_google').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\"" +
				" \"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer Framework Suite " +
				"Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
	}
}


function showString() {
	$('#div_string_scopus').hide();
	$('#div_string_acm').hide();
	$('#div_string_enginnering').hide();
	$('#div_string_google').hide();
	$('#div_string_ieee').hide();
	$('#div_string_science').hide();
	$('#div_string_springer').hide();

	let data = table_databases.rows().data().toArray();
	for (let i = 0; i < data.length; i++) {
		switch (data[i][0]) {
			case "Scopus":
				$('#div_string_scopus').show();
				break;
			case "ACM":
				$('#div_string_acm').show();
				break;
			case "IEEE":
				$('#div_string_ieee').show();
				break;
			case "Science Direct":
				$('#div_string_science').show();
				break;
			case "Enginnering Village":
				$('#div_string_enginnering').show();
				break;
			case "Springer Link":
				$('#div_string_springer').show();
				break;
			case "Google":
				$('#div_string_google').show();
				break;
		}
	}
}

$(window).on("popstate", function () {
	var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
	$("a[href='" + anchor + "']").tab("show");
});


function add_domain () {
	let id_project = $("#id_project").val();
	let domain = $("#domain");

	if (!validate_domain(domain[0].value)) {
		return;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/add_domain/',
		data: {
			id_project: id_project,
			domain: domain[0].value
		},
		success: function () {
			table_domains.row.add([
				domain[0].value,
				'<button class="btn btn-warning opt" onClick="modal_domain($(this).parents(\'tr\'));">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_domain($(this).parents(\'tr\'));">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			domain[0].value = "";
		}
	});

}

function delete_domain(value) {
	let row = table_domains.row(value);
	let id_project = $("#id_project").val();
	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/delete_domain/',
		data: {
			id_project: id_project,
			domain: row.data()[0][0]
		},
		success: function () {
			row.remove();
			table_domains.draw();
		}
	});


}

function modal_domain(value) {
	let row = table_domains.row(value);
	$('#modal_domain #edit_domain').val(row.data()[0]);
	$('#modal_domain #index_domain').val(row.index());
	$('#modal_domain').modal('show');
}

function edit_domain() {
	let index = $('#modal_domain #index_domain').val();
	let domain = $('#modal_domain #edit_domain').val();
	let id_project = $("#id_project").val();

	if (!validate_domain(domain)) {
		return false;
	}

	delete_domain(index);

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/add_domain/',
		data: {
			id_project: id_project,
			domain: domain
		},
		success: function () {
			table_domains.row.add([
				domain,
				'<button class="btn btn-warning opt" onClick="modal_domain($(this).parents(\'tr\'));">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_domain($(this).parents(\'tr\'));">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			domain[0].value = "";
		}
	});

	Swal({
		title: 'Success',
		text: "The domain was edited",
		type: 'success',
		showCancelButton: false,
		confirmButtonText: 'Ok'
	}).then((result) => {
		if (result.value) {
			$('#modal_domain').modal('hide');
		}
	});
}

function validate_domain(domain) {
	if (!domain) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The domain can not be empty!'
		});
		return false;
	}

	let data = table_domains.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (domain.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			swal({
				type: 'warning',
				title: 'Warning',
				text: 'The domain has already been registered!'
			});
			return false;
		}
	}
	return true;
}

function add_language() {
	let language = $("#language");

	if (!validate_language(language[0].value)) {
		return false;
	}

	table_languages.row.add([
		language[0].value,
		'<button class="btn btn-danger" onClick="delete_language($(this).parents(\'tr\'));">' +
		'<span class="far fa-trash-alt"></span>' +
		'</button>'
	]).draw();

	language[0].value = "";

}

function validate_language(language) {
	if (!language) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The language can not be empty!'
		});
		return false;
	}

	let data = table_languages.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (language.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			swal({
				type: 'warning',
				title: 'Warning',
				text: 'The language has already been registered!',
			});
			return false;
		}
	}

	return true;
}

function delete_language(value) {
	let row = table_languages.row(value);
	row.remove();
	table_languages.draw();
}

function add_study_type() {
	let study_type = $("#study_type");

	if (!validate_study_type(study_type[0].value)) {
		return false;
	}

	table_study_type.row.add([
		study_type[0].value,
		'<button class="btn btn-danger" onClick="delete_study_type($(this).parents(\'tr\'));">' +
		'<span class="far fa-trash-alt"></span>' +
		'</button>'
	]).draw();

	study_type[0].value = "";

}

function validate_study_type(study_type) {
	if (!study_type) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The study type can not be empty!'
		});
		return false;
	}

	let data = table_study_type.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (study_type.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			swal({
				type: 'warning',
				title: 'Warning',
				text: 'The study type has already been registered!'
			});
			return false;
		}
	}

	return true;
}

function delete_study_type(value) {
	let row = table_study_type.row(value);
	row.remove();
	table_study_type.draw();
}

function add_keywords() {
	let keywords = $("#keywords");

	if (!validate_keywords(keywords[0].value)) {
		return false;
	}

	table_keywords.row.add([
		keywords[0].value,
		'<button class="btn btn-warning opt" onClick="modal_keywords($(this).parents(\'tr\'));">' +
		'<span class="fas fa-edit"></span>' +
		'</button>' +
		'<button class="btn btn-danger" onClick="delete_keywords($(this).parents(\'tr\'));">' +
		'<span class="far fa-trash-alt"></span>' +
		'</button>'
	]).draw();

	keywords[0].value = "";

}

function modal_keywords(value) {
	let row = table_keywords.row(value);
	$('#modal_keyword #index_keyword').val(row.index());
	$('#modal_keyword #edit_keyword').val(row.data()[0]);
	$('#modal_keyword').modal('show');
}


function edit_keyword() {
	let index = $('#modal_keyword #index_keyword').val();
	let keyword = $('#modal_keyword #edit_keyword').val();

	if (!validate_keywords(keyword)) {
		return false;
	}

	let row = table_keywords.row(index);
	row.remove();
	table_keywords.row.add([
		keyword,
		'<button class="btn btn-warning opt" onClick="modal_keywords($(this).parents(\'tr\'));">' +
		'<span class="fas fa-edit"></span>' +
		'</button>' +
		'<button class="btn btn-danger" onClick="delete_keywords($(this).parents(\'tr\'));">' +
		'<span class="far fa-trash-alt"></span>' +
		'</button>'
	]).draw();

	Swal({
		title: 'Success',
		text: "The keyword was edited",
		type: 'success',
		showCancelButton: false,
		confirmButtonText: 'Ok'
	}).then((result) => {
		if (result.value) {
			$('#modal_keyword').modal('hide');
		}
	});
}

function validate_keywords(keyword) {
	if (!keyword) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The keyword can not be empty!'
		});
		return false;
	}

	let data = table_keywords.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (keyword.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			swal({
				type: 'warning',
				title: 'Warning',
				text: 'The keyword has already been registered!'
			});
			return false;
		}
	}
	return true;
}

function delete_keywords(value) {
	let row = table_keywords.row(value);
	row.remove();
	table_keywords.draw();
}

function add_research_question() {
	let description = $("#description_research_question");
	let id = $("#id_research_question");

	if (!validate_research(id[0].value, description[0].value)) {
		return false;
	}

	table_research_question.row.add([id[0].value,
		description[0].value,
		'<button class="btn btn-warning opt" onClick="modal_research_question($(this).parents(\'tr\'));">' +
		'<span class="fas fa-edit"></span>' +
		'</button>' +
		'<button class="btn btn-danger" onClick="delete_research_question($(this).parents(\'tr\'));">' +
		'<span class="far fa-trash-alt"></span>' +
		'</button>'
	]).draw();

	description[0].value = "";
	id[0].value = "";

}

function modal_research_question(value) {
	let row = table_research_question.row(value);
	$('#modal_research #index_research').val(row.index());
	$('#modal_research #edit_research_id').val(row.data()[0]);
	$('#modal_research #edit_research_question').val(row.data()[1]);
	$('#modal_research').modal('show');
}

function edit_research() {
	let index = $('#modal_research #index_research').val();
	let id = $('#modal_research #edit_research_id').val();
	let question = $('#modal_research #edit_research_question').val();

	if (!validate_research(id, question)) {
		return false;
	}

	let row = table_research_question.row(index);
	row.remove();
	table_research_question.row.add([
		id,
		question,
		'<button class="btn btn-warning opt" onClick="modal_research_question($(this).parents(\'tr\'));">' +
		'<span class="fas fa-edit"></span>' +
		'</button>' +
		'<button class="btn btn-danger" onClick="delete_research_question($(this).parents(\'tr\'));">' +
		'<span class="far fa-trash-alt"></span>' +
		'</button>'
	]).draw();

	Swal({
		title: 'Success',
		text: "The research question was edited",
		type: 'success',
		showCancelButton: false,
		confirmButtonText: 'Ok'
	}).then((result) => {
		if (result.value) {
			$('#modal_research').modal('hide');
		}
	});
}

function validate_research(id, description) {
	if (!id) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The ID of research question can not be empty!'
		});
		return;
	}

	if (!description) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The description of research question can not be empty!'
		});
		return false;
	}

	let data = table_research_question.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (id.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			swal({
				type: 'warning',
				title: 'Warning',
				text: 'The ID of research question has already been registered!'
			});
			return false;
		}
	}
	for (let i = 0; i < data.length; i++) {
		if (description.toLowerCase().trim() == data[i][1].toLowerCase().trim()) {
			swal({
				type: 'warning',
				title: 'Warning',
				text: 'The description of research question has already been registered!'
			});
			return false;
		}
	}

	return true;
}

function delete_research_question(value) {
	let row = table_research_question.row(value);
	row.remove();
	table_research_question.draw();
}

function add_database() {
	let databases = $("#databases");

	if (!databases[0].value) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The database can not be empty!'
		});
		return;
	}

	let data = table_databases.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (databases[0].value.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			swal({
				type: 'warning',
				title: 'Warning',
				text: 'The database has already been registered!'
			});
			return;
		}
	}


	table_databases.row.add([
		databases[0].value,
		'<button class="btn btn-danger" onClick="delete_database($(this).parents(\'tr\'));">' +
		'<span class="far fa-trash-alt"></span>' +
		'</button>'
	]).draw();

	databases[0].value = "";
}

function delete_database(value) {
	let row = table_databases.row(value);
	row.remove();
	table_databases.draw();
}

function add_term() {
	let term = $("#term");

	if (!validate_term(term[0].value)) {
		return false;
	}

	table_search_string.row.add([
		term[0].value, '' +
		'<table id="table_' + term[0].value + '" class="table">' +
		'<th>Synonym</th>' +
		'<th>Actions</th>' +
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
	option.text = term[0].value;
	x.add(option);
	term[0].value = "";
}

function modal_term(value) {
	let row = table_search_string.row(value);
	$('#modal_term #index_term').val(row.index());
	$('#modal_term #edit_term').val(row.data()[0]);
	$('#modal_term').modal('show');
}

function edit_term() {
	let index = $('#modal_term #index_term').val();
	let term = $('#modal_term #edit_term').val();

	if (!validate_term(term)) {
		return false;
	}

	let row = table_search_string.row(index);
	let data = table_search_string.row(index).data();
	let id = "table_" + data[0];
	let table_syn = document.getElementById(id);
	id = "table_" + term;
	table_syn.id = id;
	row.remove();

	let x = document.getElementById("list_term");
	let option = document.createElement("option");
	option.text = term;
	x.remove(index);
	x.add(option);

	table_search_string.row.add([
		term,
		table_syn.outerHTML,
		'<button class="btn btn-warning opt" onClick="modal_term($(this).parents(\'tr\'));">' +
		'<span class="fas fa-edit"></span>' +
		'</button>' +
		'<button class="btn btn-danger" onClick="delete_term($(this).parents(\'tr\'));">' +
		'<span class="far fa-trash-alt"></span>' +
		'</button>'
	]).draw();

	Swal({
		title: 'Success',
		text: "The term was edited",
		type: 'success',
		showCancelButton: false,
		confirmButtonText: 'Ok'
	}).then((result) => {
		if (result.value) {
			$('#modal_term').modal('hide');
		}
	});
}

function validate_term(term) {
	if (!term) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The term can not be empty!'
		});
		return false;
	}

	let data = table_search_string.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (term.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			swal({
				type: 'warning',
				title: 'Warning',
				text: 'The term has already been registered!'
			});
			return false;
		}
	}
	return true;
}

function delete_term(value) {
	let row = table_search_string.row(value);
	let index = row.index();
	row.remove();
	table_search_string.draw();

	let x = document.getElementById("list_term");
	x.remove(index);
}

function add_synonym() {
	let term = $("#list_term");
	let syn = $("#synonym");
	let id = "table_" + term[0].value;

	if (!validate_synonym(term[0].value, syn[0].value, id)) {
		return false;
	}

	let table_syn = document.getElementById(id);
	let row = table_syn.insertRow();
	let cell1 = row.insertCell(0);
	let cell2 = row.insertCell(1);
	cell1.innerHTML = syn[0].value;
	cell2.innerHTML = '<button class="btn btn-warning opt" onClick="modal_synonym(this)">' +
		'<span class="fas fa-edit"></span>' +
		'</button>' +
		'<button class="btn btn-danger" onClick="delete_synonym(this)">' +
		'<span class="far fa-trash-alt"></span>' +
		'</button>';
	syn[0].value = "";
}

function modal_synonym(value) {
	let row = value.parentNode.parentNode;
	$('#modal_synonym #index_synonym').val($("tr").index(row));
	$('#modal_synonym #edit_synonym').val(row.innerText);
	$('#modal_synonym').modal('show');
}

function edit_synonym() {

}
function validate_synonym(term, syn, id) {
	if (!term) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The term can not be empty!'
		});
		return false;
	}

	if (!syn) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The synonymous can not be empty!'
		});
		return false;
	}

	let size = document.getElementById(id).rows.length;
	let rows = document.getElementById(id).rows;
	for (let i = 0; i < size; i++) {
		if (syn.toLowerCase().trim() == rows[i].cells.item(0).innerHTML.toLowerCase().trim()) {
			swal({
				type: 'warning',
				title: 'Warning',
				text: 'The synonym has already been registered!'
			});
			return false;
		}
	}
	return true;
}

function delete_synonym(btn) {
	let row = btn.parentNode.parentNode;
	row.parentNode.removeChild(row);
}

function add_criteria() {
	let id = $("#id_criteria");
	let description = $("#description_criteria");
	let type = $("#select_type option:selected").val();

	if (!validate_criteria(id[0].value, description[0].value, type,null)) {
		return false;
	}


	table_criteria.row.add([
		'<div class="form-check">' +
		'<input type="checkbox" class="form-check-input" onchange="select_criteria($(this).parents(\'tr\'))">' +
		'</div>',
		id[0].value,
		description[0].value,
		type,
		'<button class="btn btn-warning opt" onClick="modal_criteria($(this).parents(\'tr\'))">' +
		'<span class="fas fa-edit"></span>' +
		'</button>' +
		'<button class="btn btn-danger" onClick="delete_criteria($(this).parents(\'tr\'));">' +
		'<span class="far fa-trash-alt"></span>' +
		'</button>'
	]).draw();

	id[0].value = "";
	description[0].value = "";
}

function select_criteria() {
	console.log("Selecionado");
}

function validate_criteria(id, description, type, index) {

	if (!id) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The id can not be empty!'
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
	if (!type) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The type can not be empty!'
		});
		return false;
	}


	let data = table_criteria.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (i != index) {
			if (id.toLowerCase().trim() == data[i][1].toLowerCase().trim()) {
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
			if (description.toLowerCase().trim() == data[i][2].toLowerCase().trim()) {
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

function delete_criteria(value) {
	let row = table_criteria.row(value);
	row.remove();
	table_criteria.draw();
}

function modal_criteria(value) {
	let row = table_criteria.row(value);
	$('#modal_criteria #index_term').val(row.index());
	$('#modal_criteria #edit_id_criteria').val(row.data()[1]);
	$('#modal_criteria #edit_description_criteria').val(row.data()[2]);
	$('#modal_criteria #edit_select_type').val(row.data()[3]);
	$('#modal_criteria').modal('show');
}

function edit_criteria() {
	let index = $('#modal_criteria #index_term').val();
	let id = $('#modal_criteria #edit_id_criteria').val();
	let description = $('#modal_criteria #edit_description_criteria').val();
	let type = $('#edit_select_type option:selected').val();

	if (!validate_criteria(id, description, type, index)) {
		return false;
	}

	let row = table_criteria.row(index);
	row.remove();
	table_criteria.row.add([
		'<div class="form-check">' +
		'<input type="checkbox" class="form-check-input" onchange="select_criteria($(this).parents(\'tr\'))">' +
		'</div>',
		id,
		description,
		type,
		'<button class="btn btn-warning opt" onClick="modal_criteria($(this).parents(\'tr\'))">' +
		'<span class="fas fa-edit"></span>' +
		'</button>' +
		'<button class="btn btn-danger" onClick="delete_criteria($(this).parents(\'tr\'));">' +
		'<span class="far fa-trash-alt"></span>' +
		'</button>'
	]).draw();

	Swal({
		title: 'Success',
		text: "The criteria was edited",
		type: 'success',
		showCancelButton: false,
		confirmButtonText: 'Ok'
	}).then((result) => {
		if (result.value) {
			$('#modal_criteria').modal('hide');
		}
	});
}

function add_general_quality_score() {
	let start_interval = $("#start_interval").val();
	let end_interval = $("#end_interval").val();
	let general_score_desc = $("#general_score_desc").val();

	table_general_score.row.add([
		start_interval,
		end_interval,
		general_score_desc,
		'<button class="btn btn-warning opt" onClick="">' +
		'<span class="fas fa-edit"></span>' +
		'</button>' +
		'<button class="btn btn-danger" onClick="">' +
		'<span class="far fa-trash-alt"></span>' +
		'</button>'
	]);
}
