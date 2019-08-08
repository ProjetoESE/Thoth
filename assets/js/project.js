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
				html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		},
		success: function (name) {
			let x = document.getElementById("add_email_user");
			x.remove(index);

			let adm = "";
			let viw = "";
			let res = "";
			let rev = "";

			switch (level) {
				case "Administrator":
					adm = "selected";
					break;
				case "Viewer":
					viw = "selected";
					break;
				case "Researcher":
					res = "selected";
					break;
				case "Reviser":
					rev = "selected";
					break;
			}


			table_members.row.add([
				name,
				email,
				'<select class="form-control" onchange="edit_level(this)">' +
				'<option value="Viewer"  ' + viw + '>Viewer</option>' +
				'<option value="Researcher" ' + res + '>Researcher</option>' +
				'<option value="Reviser" ' + rev + '>Reviser</option>' +
				'</select>',
				'<button class="btn btn-danger"' +
				'onClick="delete_member($(this).parents(\'tr\'))">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

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
				html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
				showCancelButton: false,
				confirmButtonText: 'Ok'
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
						html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
						showCancelButton: false,
						confirmButtonText: 'Ok'
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

function edit_level(element) {
	let level = element.value;
	let id_project = $("#id_project").val();
	let row = table_members.row($(element).parents('tr'));

	Swal.fire({
		title: 'Are you sure?',
		text: "Changing the role of this member will result in the loss of all actions performed by him in his old role.",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#28a745',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, change it!'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: base_url + 'Project_Controller/edit_level/',
				data: {
					id_project: id_project,
					level: level,
					email: row.data()[1]
				},
				error: function (msg) {
					Swal({
						type: 'error',
						title: 'Error',
						html: msg
					});
				},
				success: function (msg) {
					if (msg) {
						Swal({
							title: 'Warning',
							text: msg,
							type: 'warning',
							showCancelButton: false,
							confirmButtonText: 'Ok'
						});
					} else {
						Swal({
							title: 'Success',
							text: 'The level was edited',
							type: 'success',
							showCancelButton: false,
							confirmButtonText: 'Ok'
						});
					}


				}
			});
		}
	});
}

function delete_member(value) {
	let row = table_members.row(value);
	let id_project = $("#id_project").val();

	if (table_members.rows().data().length == 1) {
		Swal({
			type: 'warning',
			title: 'A Member',
			html: 'There must be at least <strong>one member!</strong>'
		});
		return false;
	}

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
				url: base_url + 'Project_Controller/delete_member/',
				data: {
					id_project: id_project,
					email: row.data()[1]
				},
				error: function (msg) {
					Swal({
						type: 'error',
						title: 'Error',
						html: msg
					});
				},
				success: function (msg) {
					if (msg) {
						Swal({
							title: 'Warning',
							text: msg,
							type: 'warning',
							showCancelButton: false,
							confirmButtonText: 'Ok'
						});
					} else {
						row.remove();
						table_members.draw();
						Swal({
							title: 'Success',
							text: 'The member was deleted',
							type: 'success',
							showCancelButton: false,
							confirmButtonText: 'Ok'
						});
					}
				}
			});
		}
	});
}

