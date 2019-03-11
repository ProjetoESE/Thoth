function done_paper() {
	let id = document.getElementById("paper_id").value;
}

function generate_string(database) {
	let id_project = $("#id_project").val();
	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/generate_string/',
		data: {
			id_project: id_project,
			database: database
		},
		success: function (string) {
			let id = 'string_' + database;
			document.getElementById(id).value = string;
		}
	});
}

$(window).on("popstate", function () {
	var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
	$("a[href='" + anchor + "']").tab("show");
});


function add_domain() {
	let id_project = $("#id_project").val();
	let domain = $("#domain").val();

	if (!validate_domain(domain)) {
		return;
	}

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

			$("#domain")[0].value = "";
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
			domain: row.data()[0]
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
	let now = $('#modal_domain #edit_domain').val();
	let id_project = $("#id_project").val();
	let row = table_domains.row($('#modal_domain #index_domain').val());
	let old = row.data()[0];

	if (!validate_domain(now)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/edit_domain/',
		data: {
			id_project: id_project,
			old: old,
			now: now
		},
		success: function () {
			row.remove();
			table_domains.row.add([
				now,
				'<button class="btn btn-warning opt" onClick="modal_domain($(this).parents(\'tr\'));">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_domain($(this).parents(\'tr\'));">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			$("#domain")[0].value = "";
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
	let language = $("#language").val();
	let id_project = $("#id_project").val();

	if (!validate_language(language)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/add_language/',
		data: {
			id_project: id_project,
			language: language
		},
		success: function () {
			table_languages.row.add([
				language[0].value,
				'<button class="btn btn-danger" onClick="delete_language($(this).parents(\'tr\'));">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			$("#language")[0].value = "";
		}
	});

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
	let id_project = $("#id_project").val();

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/delete_language/',
		data: {
			id_project: id_project,
			language: row.data()[0]
		},
		success: function () {
			row.remove();
			table_languages.draw();
		}
	});

}

function add_study_type() {
	let id_project = $("#id_project").val();
	let study_type = $("#study_type").val();

	if (!validate_study_type(study_type)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/add_study_type/',
		data: {
			id_project: id_project,
			study_type: study_type
		},
		success: function () {
			table_study_type.row.add([
				study_type,
				'<button class="btn btn-danger" onClick="delete_study_type($(this).parents(\'tr\'));">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			$("#study_type")[0].value = "";
		}
	});

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
	let id_project = $("#id_project").val();

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/delete_study_type/',
		data: {
			id_project: id_project,
			study_type: row.data()[0]
		},
		success: function () {
			row.remove();
			table_study_type.draw();
		}
	});
}

function add_keywords() {
	let id_project = $("#id_project").val();
	let keywords = $("#keywords").val();

	if (!validate_keywords(keywords)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/add_keywords/',
		data: {
			id_project: id_project,
			keywords: keywords
		},
		success: function () {
			table_keywords.row.add([
				keywords,
				'<button class="btn btn-warning opt" onClick="modal_keywords($(this).parents(\'tr\'));">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_keywords($(this).parents(\'tr\'));">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			$("#keywords")[0].value = "";
		}
	});

}

function modal_keywords(value) {
	let row = table_keywords.row(value);
	$('#modal_keyword #index_keyword').val(row.index());
	$('#modal_keyword #edit_keyword').val(row.data()[0]);
	$('#modal_keyword').modal('show');
}

function edit_keyword() {
	let now = $('#modal_keyword #edit_keyword').val();
	let id_project = $("#id_project").val();
	let row = table_keywords.row($('#modal_keyword #index_keyword').val());
	let old = row.data()[0];

	if (!validate_keywords(now)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/edit_keywords/',
		data: {
			id_project: id_project,
			now: now,
			old: old
		},
		success: function () {
			row.remove();
			table_keywords.row.add([
				now,
				'<button class="btn btn-warning opt" onClick="modal_keywords($(this).parents(\'tr\'));">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_keywords($(this).parents(\'tr\'));">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();
		}
	});

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
	let id_project = $("#id_project").val();

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/delete_keywords/',
		data: {
			id_project: id_project,
			keywords: row.data()[0]
		},
		success: function () {
			row.remove();
			table_keywords.draw();
		}
	});
}

function add_date() {
	let start_date = $('#start_date').val();
	let end_date = $('#end_date').val();
	let id_project = $("#id_project").val();

	if (!validate_date(start_date, end_date)) {
		return false;
	}
	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/add_date/',
		data: {
			id_project: id_project,
			start_date: start_date,
			end_date: end_date
		},
		success: function () {
			Swal({
				title: 'Success',
				text: "The dates was edited",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		}
	});
}

function validate_date(start_date, end_date) {
	if (!start_date) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The start date can not be empty!'
		});
		return false;
	}

	if (!end_date) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The end date can not be empty!'
		});
		return false;
	}

	if (!(start_date < end_date)) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The end date can not be greater than start date!'
		});
		return false;
	}

	return true;
}

function add_research_question() {
	let description = $("#description_research_question").val();
	let id_rq = $("#id_research_question").val();
	let id_project = $("#id_project").val();

	if (!validate_research(id_rq, description, null)) {
		return false;
	}
	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/add_research_question/',
		data: {
			id_project: id_project,
			id_rq: id_rq,
			description: description
		},
		success: function () {
			table_research_question.row.add([id_rq,
				description,
				'<button class="btn btn-warning opt" onClick="modal_research_question($(this).parents(\'tr\'));">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger opt" onClick="delete_research_question($(this).parents(\'tr\'));">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			$("#description_research_question")[0].value = "";
			$("#id_research_question")[0].value = "";
		}
	});
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
	let now_id = $('#modal_research #edit_research_id').val();
	let now_question = $('#modal_research #edit_research_question').val();
	let id_project = $("#id_project").val();
	let row = table_research_question.row(index);
	let old_id = row.data()[0];

	if (!validate_research(now_id, now_question, index)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/edit_research_question/',
		data: {
			id_project: id_project,
			now_id: now_id,
			now_question: now_question,
			old_id: old_id,
		},
		success: function () {
			row.remove();
			table_research_question.row.add([now_id,
				now_question,
				'<button class="btn btn-warning opt" onClick="modal_research_question($(this).parents(\'tr\'));">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger opt" onClick="delete_research_question($(this).parents(\'tr\'));">' +
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
	});

}

function validate_research(id, description, index) {
	if (!id) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The ID of research question can not be empty!'
		});
		return false;
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
		if (i != index) {
			if (id.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'The ID of research question has already been registered!'
				});
				return false;
			}
		}
	}
	for (let i = 0; i < data.length; i++) {
		if (i != index) {
			if (description.toLowerCase().trim() == data[i][1].toLowerCase().trim()) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'The description of research question has already been registered!'
				});
				return false;
			}
		}
	}

	return true;
}

function delete_research_question(value) {
	let row = table_research_question.row(value);
	let id_project = $("#id_project").val();

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/delete_research_question/',
		data: {
			id_project: id_project,
			id_rq: row.data()[0]
		},
		success: function () {
			row.remove();
			table_research_question.draw();
		}
	});
}

function add_database() {
	let databases = $("#databases").val();
	let id_project = $("#id_project").val();

	if (!databases) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The database can not be empty!'
		});
		return;
	}

	let data = table_databases.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (databases.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
			swal({
				type: 'warning',
				title: 'Warning',
				text: 'The database has already been registered!'
			});
			return;
		}
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/add_database/',
		data: {
			id_project: id_project,
			database: databases
		},
		success: function () {
			table_databases.row.add([
				databases,
				'<button class="btn btn-danger" onClick="delete_database($(this).parents(\'tr\'));">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			$("#databases")[0].value = "";


			let node = document.createElement("DIV");
			node.id = 'div_string_' + databases;
			node.classList.add("form-group")
			node.innerHTML = '<label>' + databases + '</label>' +
				'<textarea class="form-control" id="string_' + databases + '"></textarea>' +
				'<button type="button" class="btn btn-info opt" onclick="generate_string(\'' + databases + '\');">Generate</button>' +
				'<hr>';

			document.getElementById("strings").appendChild(node);

		}
	});

}

function delete_database(value) {
	let row = table_databases.row(value);
	let id_project = $("#id_project").val();
	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/delete_database/',
		data: {
			id_project: id_project,
			database: row.data()[0]
		},
		success: function () {
			let elem = document.getElementById('div_string_' + row.data()[0]);
			elem.parentNode.removeChild(elem);
			row.remove();
			table_databases.draw();


		}
	});
}

function add_term() {
	let term = $("#term").val();
	let id_project = $("#id_project").val();

	if (!validate_term(term, null)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/add_term/',
		data: {
			id_project: id_project,
			term: term
		},
		success: function () {
			table_search_string.row.add([
				term, '' +
				'<table id="table_' + term + '" class="table">' +
				'<th>Synonym</th>' +
				'<th>Actions</th>' +
				'<tbody>' +
				'</tbody>' +
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
			option.text = term;
			x.add(option);
			$("#term")[0].value = "";
		}
	});
}

function modal_term(value) {
	let row = table_search_string.row(value);
	$('#modal_term #index_term').val(row.index());
	$('#modal_term #edit_term').val(row.data()[0]);
	$('#modal_term').modal('show');
}

function edit_term() {
	let index = $('#modal_term #index_term').val();
	let now = $('#modal_term #edit_term').val();
	let id_project = $("#id_project").val();

	if (!validate_term(now)) {
		return false;
	}

	let row = table_search_string.row(index);
	let old = row.data()[0];
	let id = "table_" + old;
	let table_syn = document.getElementById(id);
	let id_now = "table_" + now;
	table_syn.id = id_now;

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/edit_term/',
		data: {
			id_project: id_project,
			now: now,
			old: old
		},
		success: function () {
			row.remove();
			let x = document.getElementById("list_term");
			let option = document.createElement("option");
			option.text = now;
			x.remove(index);
			x.add(option);

			table_search_string.row.add([
				now,
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
	});
}

function validate_term(term, index) {
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
		if (i != index) {
			if (term.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
				swal({
					type: 'warning',
					title: 'Warning',
					text: 'The term has already been registered!'
				});
				return false;
			}
		}
	}
	return true;
}

function delete_term(value) {
	let row = table_search_string.row(value);
	let index = row.index();
	let id_project = $("#id_project").val();

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/delete_term/',
		data: {
			id_project: id_project,
			term: row.data()[0]
		},
		success: function () {
			row.remove();
			table_search_string.draw();

			let x = document.getElementById("list_term");
			x.remove(index);
		}
	});

}

function add_synonym() {
	let term = $("#list_term").val();
	let syn = $("#synonym").val();
	let id = "table_" + term;
	let id_project = $("#id_project").val();


	if (!validate_synonym(term, syn, id)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/add_synonym/',
		data: {
			id_project: id_project,
			term: term,
			syn: syn
		},
		success: function () {
			let table_syn = document.getElementById(id);
			let row = table_syn.insertRow();
			let cell1 = row.insertCell(0);
			let cell2 = row.insertCell(1);
			cell1.innerHTML = syn;
			cell2.innerHTML = '<button class="btn btn-warning opt" onClick="modal_synonym(this)">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_synonym(this)">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>';
			$("#synonym")[0].value = "";
		}
	});
}

function modal_synonym(value) {
	let row = value.parentNode.parentNode;
	let term = row.parentNode.parentNode.parentNode.parentNode.cells.item(0).innerHTML;

	$('#modal_synonym #index_synonym').val(row.rowIndex);
	$('#modal_synonym #old_synonym').val(row.cells.item(0).innerHTML);
	$('#modal_synonym #now_synonym').val(row.cells.item(0).innerHTML);
	$('#modal_synonym #term_synonym').val(term);
	$('#modal_synonym').modal('show');
}

function edit_synonym() {
	let index = $('#modal_synonym #index_synonym').val();
	let old = $('#modal_synonym #old_synonym').val();
	let now = $('#modal_synonym #now_synonym').val();
	let id_project = $("#id_project").val();
	let term = $('#modal_synonym #term_synonym').val();
	let id = "table_" + term;

	if (!validate_synonym(term, now, id)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/edit_synonym/',
		data: {
			id_project: id_project,
			term: term,
			old: old,
			now: now
		},
		success: function () {
			let table_syn = document.getElementById(id);
			table_syn.deleteRow(index);
			let row = table_syn.insertRow();
			let cell1 = row.insertCell(0);
			let cell2 = row.insertCell(1);
			cell1.innerHTML = now;
			cell2.innerHTML = '<button class="btn btn-warning opt" onClick="modal_synonym(this)">' +
				'<span class="fas fa-edit"></span>' +
				'</button>' +
				'<button class="btn btn-danger" onClick="delete_synonym(this)">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>';
			Swal({
				title: 'Success',
				text: "The synonym was edited",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			}).then((result) => {
				if (result.value) {
					$('#modal_synonym').modal('hide');
				}
			});
		}
	});
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
	let syn = row.cells.item(0).innerHTML;
	let id_project = $("#id_project").val();
	let term = row.parentNode.parentNode.parentNode.parentNode.cells.item(0).innerHTML;

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/delete_synonym/',
		data: {
			id_project: id_project,
			term: term,
			syn: syn
		},
		success: function () {
			row.parentNode.removeChild(row);
		}
	});
}

function add_criteria() {
	let id = $("#id_criteria").val();
	let description = $("#description_criteria").val();
	let type = $("#select_type").val();
	let id_project = $("#id_project").val();

	if (!validate_criteria(id, description, type, null)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/add_criteria/',
		data: {
			id_project: id_project,
			id: id,
			description: description,
			type: type
		},
		success: function () {
			table_criteria.row.add([
				'<div class="form-check">' +
				'<input id="selected_' + id.replace(" ", "").trim() + '" type="checkbox" class="form-check-input" onchange="select_criteria($(this).parents(\'tr\'))">' +
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

			id = $("#id_criteria")[0].value = "";
			description = $("#description_criteria")[0].value = "";
		}
	});
}

function select_criteria(value) {
	let row = table_criteria.row(value);
	let id_project = $("#id_project").val();
	let id = 'selected_' + row.data()[1].replace(" ", "");
	let pre_selected = document.getElementById(id).checked

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/selected_pre_select/',
		data: {
			id_project: id_project,
			id: row.data()[1],
			pre_selected: pre_selected
		},
		success: function () {
			if (pre_selected) {
				Swal({
					title: 'Success',
					text: "The criteria is selected",
					type: 'success',
					showCancelButton: false,
					confirmButtonText: 'Ok'
				})
			} else {
				Swal({
					title: 'Success',
					text: "The criteria is deselected",
					type: 'success',
					showCancelButton: false,
					confirmButtonText: 'Ok'
				})
			}

		}
	});
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
	let id_project = $("#id_project").val();

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/delete_criteria/',
		data: {
			id_project: id_project,
			id: row.data()[1]
		},
		success: function () {
			row.remove();
			table_criteria.draw();
		}
	});
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
	let row = table_criteria.row(index);
	let id_project = $("#id_project").val();
	let id_check = 'selected_' + row.data()[1].replace(" ", "");
	let pre_selected = document.getElementById(id_check).checked

	if (!validate_criteria(id, description, type, index)) {
		return false;
	}


	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/edit_criteria/',
		data: {
			id_project: id_project,
			new_id: id,
			old_id: row.data()[1],
			description: description,
			new_type: type,
			pre_selected: pre_selected
		},
		success: function () {
			row.remove();
			table_criteria.row.add([
				'<div class="form-check">' +
				'<input id="selected_' + id.replace(" ", "").trim() + '" type="checkbox" class="form-check-input" onchange="select_criteria($(this).parents(\'tr\'))">' +
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
	});
}

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
		url: base_url + 'project_controller/add_general_quality_score/',
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

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/delete_general_quality_score/',
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
		url: base_url + 'project_controller/edit_general_score/',
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
		url: base_url + 'project_controller/edit_min_score/',
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

function edit_search_strategy() {
	let search_strategy = $("#search_strategy").val();
	let id_project = $("#id_project").val();

	if (!validate_search_strategy(search_strategy)) {
		return false;
	}
	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/edit_search_strategy/',
		data: {
			id_project: id_project,
			search_strategy: search_strategy
		},
		success: function () {
			Swal({
				title: 'Success',
				text: "The search strategy was edited",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		}
	});
}

function validate_search_strategy(search_strategy) {
	if (!search_strategy) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The term can not be empty!'
		});
		return false;
	}
	return true;
}

function edit_inclusion_rule() {
	let rule = $("#rule_inclusion").val();
	let id_project = $("#id_project").val();

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/edit_inclusion_rule/',
		data: {
			id_project: id_project,
			rule: rule
		},
		success: function () {
			Swal({
				title: 'Success',
				text: "The inclusion rule was edited",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		}
	});
}

function edit_exclusion_rule() {
	let rule = $("#rule_exclusion").val();
	let id_project = $("#id_project").val();

	$.ajax({
		type: "POST",
		url: base_url + 'project_controller/edit_exclusion_rule/',
		data: {
			id_project: id_project,
			rule: rule
		},
		success: function () {
			Swal({
				title: 'Success',
				text: "The inclusion rule was edited",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		}
	});
}
