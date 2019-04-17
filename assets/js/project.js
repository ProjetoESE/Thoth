function add_research() {
	let id_project = $("#id_project").val();
	let email = $("#add_email_user").val();
	let level = $("#add_level_user").val();
	let index = document.getElementById("add_email_user").selectedIndex;

	if (!validate_add_research(email, level)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'Project_Controller/add_member/',
		data: {
			id_project: id_project,
			email: email,
			level: level
		},
		error: function () {
			Swal({
				type: 'error',
				title: 'Error',
				html: '<label class="font-weight-bold text-danger">Error</label>'
			});
		},
		success: function () {
			let x = document.getElementById("add_email_user");
			x.remove(index);
			Swal({
				title: 'Add member',
				html: "The <strong>member</strong> was added",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		}
	});
}

function validate_add_research(email, level) {
	if (!email) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The email can not be empty!'
		});
		return false;
	}
	if (!level) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The level can not be empty!'
		});
		return false;
	}
	return true;
}

function edit_project() {
	let id_project = $("#id_project").val();
	let objectives = $("#edit_objectives").val();
	let description = $("#edit_description").val();
	let title = $("#edit_title").val();

	console.log(objectives);
	console.log(description);
	console.log(title);

	if (!validate_edit_project(objectives, description, title)) {
		return false;
	}

	$.ajax({
		type: "POST",
		url: base_url + 'Project_Controller/edited_project/',
		data: {
			id_project: id_project,
			objectives: objectives,
			description: description,
			title: title
		},
		error: function () {
			Swal({
				type: 'error',
				title: 'Error',
				html: '<label class="font-weight-bold text-danger">Error</label>'
			});
		},
		success: function () {
			$("#title_project").text('Edit ' + title);
			Swal({
				title: 'Success',
				text: "The project was edited",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		}
	});
}

function validate_edit_project(objectives, description, title) {
	if (!title) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The title can not be empty!'
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
	if (!objectives) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The objectives can not be empty!'
		});
		return false;
	}
	return true;
}

function delete_project(id, value) {
	let row = table_my_projects.row(value);
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
				url: base_url + 'Project_Controller/deleted_project/',
				data: {
					id_project: id
				},
				error: function () {
					Swal({
						type: 'error',
						title: 'Error',
						html: '<label class="font-weight-bold text-danger">Error</label>'
					});
				},
				success: function () {
					row.remove();
					table_my_projects.draw();
					Swal.fire(
						'Deleted!',
						'Your project has been deleted.',
						'success'
					)
				}
			});
		}
	});
}
