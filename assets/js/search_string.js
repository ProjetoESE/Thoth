function add_term() {
	let term = $("#term").val();
	let id_project = $("#id_project").val();

	if (!validate_term(term, null)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'Search_String_Controller/add_term/',
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
		url: base_url + 'Search_String_Controller/edit_term/',
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
				url: base_url + 'Search_String_Controller/delete_term/',
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
			Swal.fire(
				'Deleted!',
				'Your term has been deleted.',
				'success'
			)
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
		url: base_url + 'Search_String_Controller/add_synonym/',
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
		url: base_url + 'Search_String_Controller/edit_synonym/',
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
				url: base_url + 'Search_String_Controller/delete_synonym/',
				data: {
					id_project: id_project,
					term: term,
					syn: syn
				},
				success: function () {
					row.parentNode.removeChild(row);
				}
			});
			Swal.fire(
				'Deleted!',
				'Your synonym has been deleted.',
				'success'
			)
		}
	});


}

function generate_string(database) {
	let id_project = $("#id_project").val();
	$.ajax({
		type: "POST",
		url: base_url + 'Search_String_Controller/generate_string/',
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

function validate_search_strategy(search_strategy) {
	if (!search_strategy) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The search string can not be empty!'
		});
		return false;
	}
	return true;
}

function edit_search_strategy() {
	let search_strategy = $("#search_strategy").val();
	let id_project = $("#id_project").val();

	if (!validate_search_strategy(search_strategy)) {
		return false;
	}
	$.ajax({
		type: "POST",
		url: base_url + 'Search_String_Controller/edit_search_strategy/',
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
