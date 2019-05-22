function add_research_question() {
	let description = $("#description_research_question").val();
	let id_rq = $("#id_research_question").val();
	let id_project = $("#id_project").val();

	if (!validate_research(id_rq, description, null)) {
		return false;
	}
	$.ajax({
		type: "POST",
		url: base_url + 'Research_Controller/add_research_question/',
		data: {
			id_project: id_project,
			id_rq: id_rq,
			description: description
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
		url: base_url + 'Research_Controller/edit_research_question/',
		data: {
			id_project: id_project,
			now_id: now_id,
			now_question: now_question,
			old_id: old_id,
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

	if(!validate_text(id)){
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'This field can not contain special characters or space!'
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
				url: base_url + 'Research_Controller/delete_research_question/',
				data: {
					id_project: id_project,
					id_rq: row.data()[0]
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
					table_research_question.draw();
				}
			});
			Swal.fire(
				'Deleted!',
				'Research question has been deleted.',
				'success'
			)
		}
	});
}
