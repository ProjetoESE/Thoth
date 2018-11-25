function done_paper() {
	let id = document.getElementById("paper_id").value;
}

function generateString(database) {
	switch (database) {
		case 0:
			$('#string_generic').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\" \"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer Framework Suite Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 1:
			$('#string_scopus').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\" \"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer Framework Suite Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 2:
			$('#string_acm').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\" \"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer Framework Suite Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 3:
			$('#string_ieee').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\" \"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer Framework Suite Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 4:
			$('#string_science').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\" \"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer Framework Suite Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 5:
			$('#string_enginnering').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\" \"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer Framework Suite Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 6:
			$('#string_springer').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\" \"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer Framework Suite Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
				"\n");
			break;
		case 7:
			$('#string_google').text("(\"Performance Test\" \"Load Test\" \"Stress Test\" \"Soak Test\" \"Spike Test\" \"Workload Test\" \"Automation Test\") AND (Tool Generator Injector Monitor Analyzer Framework Suite Environment Plug*in) AND (Software Application System) AND (Teste-Teste)\n" +
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


function add_domain() {
	let domain = $("#domain");

	if (!domain[0].value) {
		alertify.error('The domain can not be empty!');
		return;
	}

	let data = table_domains.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (domain[0].value.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			alertify.error("The domain has already been registered!");
			return;
		}
	}

	table_domains.row.add([
		domain[0].value,
		'<button class="btn btn-danger" onClick="delete_domain($(this).parents(\'tr\'));"><span class="far fa-trash-alt"></span></button>'
	]).draw();

	domain[0].value = "";

}

function delete_domain(value) {
	let row = table_domains.row(value);
	row.remove();
	table_domains.draw();
}

function add_language() {
	let language = $("#language");

	if (!language[0].value) {
		alertify.error('The language can not be empty!');
		return;
	}

	let data = table_languages.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (language[0].value.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			alertify.error("The language has already been registered!");
			return;
		}
	}

	table_languages.row.add([
		language[0].value,
		'<button class="btn btn-danger" onClick="delete_language($(this).parents(\'tr\'));"><span class="far fa-trash-alt"></span></button>'
	]).draw();

	language[0].value = "";

}

function delete_language(value) {
	let row = table_languages.row(value);
	row.remove();
	table_languages.draw();
}

function add_study_type() {
	let study_type = $("#study_type");

	if (!study_type[0].value) {
		alertify.error('The study type can not be empty!');
		return;
	}

	let data = table_study_type.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (study_type[0].value.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			alertify.error("The study type has already been registered!");
			return;
		}
	}

	table_study_type.row.add([
		study_type[0].value,
		'<button class="btn btn-danger" onClick="delete_study_type($(this).parents(\'tr\'));"><span class="far fa-trash-alt"></span></button>'
	]).draw();

	study_type[0].value = "";

}

function delete_study_type(value) {
	let row = table_study_type.row(value);
	row.remove();
	table_study_type.draw();
}

function add_keywords() {
	let keywords = $("#keywords");

	if (!keywords[0].value) {
		alertify.error('The keyword can not be empty!');
		return;
	}

	let data = table_keywords.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (keywords[0].value.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			alertify.error("The keyword has already been registered!");
			return;
		}
	}

	table_keywords.row.add([
		keywords[0].value,
		'<button class="btn btn-danger" onClick="delete_keywords($(this).parents(\'tr\'));"><span class="far fa-trash-alt"></span></button>'
	]).draw();

	keywords[0].value = "";

}

function delete_keywords(value) {
	let row = table_keywords.row(value);
	row.remove();
	table_keywords.draw();
}

function add_research_question() {
	let description = $("#description_research_question");
	let id = $("#id_research_question");

	if (!id[0].value) {
		alertify.error('The ID of research question can not be empty!');
		return;
	}

	if (!description[0].value) {
		alertify.error('The description of research question can not be empty!');
		return;
	}

	let data = table_research_question.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (id[0].value.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			alertify.error("The ID of research question has already been registered!");
			return;
		}
	}
	for (let i = 0; i < data.length; i++) {
		if (description[0].value.toLowerCase().trim() == data[i][1].toLowerCase().trim()) {
			alertify.error("The description of research question has already been registered!");
			return;
		}
	}


	table_research_question.row.add([id[0].value,
		description[0].value,
		'<button class="btn btn-danger" onClick="delete_research_question($(this).parents(\'tr\'));"><span class="far fa-trash-alt"></span></button>'
	]).draw();

	description[0].value = "";
	id[0].value = "";

}

function delete_research_question(value) {
	let row = table_research_question.row(value);
	row.remove();
	table_research_question.draw();
}

function add_database() {
	let databases = $("#databases");

	if (!databases[0].value) {
		alertify.error('The database can not be empty!');
		return;
	}

	let data = table_databases.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (databases[0].value.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			alertify.error("The database has already been registered!");
			return;
		}
	}


	table_databases.row.add([
		databases[0].value,
		'<button class="btn btn-danger" onClick="delete_database($(this).parents(\'tr\'));"><span class="far fa-trash-alt"></span></button>'
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

	if (!term[0].value) {
		alertify.error('The term can not be empty!');
		return;
	}

	let data = table_search_string.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (term[0].value.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			alertify.error("The term has already been registered!");
			return;
		}
	}

	table_search_string.row.add([
		term[0].value, '' +
		'<table id="table_' + term[0].value + '" class="table">' +
		'<th>Synonym</th>' +
		'<th>Delete</th>' +
		'</table>',
		'<button class="btn btn-danger" onClick="delete_term($(this).parents(\'tr\'));"><span class="far fa-trash-alt"></span></button>'
	]).draw();

	let x = document.getElementById("list_term");
	let option = document.createElement("option");
	option.text = term[0].value;
	x.add(option);
	term[0].value = "";
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

	if (!term[0].value) {
		alertify.error('The term can not be empty!');
		return;
	}

	if (!syn[0].value) {
		alertify.error('The synonymous can not be empty!');
		return;
	}

	let size = document.getElementById(id).rows.length;
	let rows = document.getElementById(id).rows;
	for (let i = 0; i < size; i++) {
		if (syn[0].value.toLowerCase().trim() == rows[i].cells.item(0).innerHTML.toLowerCase().trim()) {
			alertify.error("The synonym has already been registered!");
			return;
		}
	}


	let table_syn = document.getElementById(id);
	let row = table_syn.insertRow();
	let cell1 = row.insertCell(0);
	let cell2 = row.insertCell(1);
	cell1.innerHTML = syn[0].value;
	cell2.innerHTML = '<button class="btn btn-danger" onClick="delete_synonym(this)"><span class="far fa-trash-alt"></span></button>';
	syn[0].value = "";
}

function delete_synonym(btn) {
	let row = btn.parentNode.parentNode;
	row.parentNode.removeChild(row);
}
