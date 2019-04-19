function add_domain() {
	let id_project = $("#id_project").val();
	let domain = $("#domain").val();

	if (!validate_domain(domain)) {
		return;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'Overall_Controller/add_domain/',
		data: {
			id_project: id_project,
			domain: domain
		},
		error: function(){
			Swal({
				type: 'error',
				title: 'Error',
				html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
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
				url: base_url + 'Overall_Controller/delete_domain/',
				data: {
					id_project: id_project,
					domain: row.data()[0]
				},
				error: function(){
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
					table_domains.draw();
				}
			});
			Swal.fire(
				'Deleted!',
				'Domain has been deleted.',
				'success'
			)
		}
	})


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
		url: base_url + 'Overall_Controller/edit_domain/',
		data: {
			id_project: id_project,
			old: old,
			now: now
		},
		error: function(){
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
		url: base_url + 'Overall_Controller/add_language/',
		data: {
			id_project: id_project,
			language: language
		},
		error: function(){
			Swal({
				type: 'error',
				title: 'Error',
				html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		},
		success: function () {
			table_languages.row.add([
				language,
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
				url: base_url + 'Overall_Controller/delete_language/',
				data: {
					id_project: id_project,
					language: row.data()[0]
				},
				error: function(){
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
					table_languages.draw();
				}
			});
			Swal.fire(
				'Deleted!',
				'Language has been deleted.',
				'success'
			)
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
		url: base_url + 'Overall_Controller/add_study_type/',
		data: {
			id_project: id_project,
			study_type: study_type
		},
		error: function(){
			Swal({
				type: 'error',
				title: 'Error',
				html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
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
				url: base_url + 'Overall_Controller/delete_study_type/',
				data: {
					id_project: id_project,
					study_type: row.data()[0]
				},
				error: function(){
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
					table_study_type.draw();
				}
			});
			Swal.fire(
				'Deleted!',
				'Study Type has been deleted.',
				'success'
			)
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
		url: base_url + 'Overall_Controller/add_keywords/',
		data: {
			id_project: id_project,
			keywords: keywords
		},
		error: function(){
			Swal({
				type: 'error',
				title: 'Error',
				html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
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
		url: base_url + 'Overall_Controller/edit_keywords/',
		data: {
			id_project: id_project,
			now: now,
			old: old
		},
		error: function(){
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
				url: base_url + 'Overall_Controller/delete_keywords/',
				data: {
					id_project: id_project,
					keywords: row.data()[0]
				},
				error: function(){
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
					table_keywords.draw();
				}
			});
			Swal.fire(
				'Deleted!',
				'Keyword has been deleted.',
				'success'
			)
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
		url: base_url + 'Overall_Controller/add_date/',
		data: {
			id_project: id_project,
			start_date: start_date,
			end_date: end_date
		},
		error: function(){
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
