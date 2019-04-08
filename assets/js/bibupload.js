function readFileAsString() {
	let files = this.files;
	let database = $('#database_import').val();
	let id_project = $("#id_project").val();
	let id = "table_" + database;

	if (!validate_upload(files, database, id)) {
		return false;
	}
	let name = files[0].name;

	let reader = new FileReader();
	reader.onload = function (event) {
		let text = event.target.result;
		let papers = BibtexParser(text);
		if (papers.entries.length > 0) {
			$.ajax({
				type: "POST",
				url: base_url + 'Project_Controller/bib_upload/',
				data: {
					papers: papers.entries,
					database: database,
					id_project: id_project,
					name: name
				},
				success: function () {
					let table_bib = document.getElementById(id);
					let p = table_bib.parentNode.parentNode.cells.item(1).innerHTML;
					table_bib.parentNode.parentNode.cells.item(1).innerHTML = parseInt(p) + papers.entries.length;

					let row = table_bib.insertRow();
					let cell1 = row.insertCell(0);
					let cell2 = row.insertCell(1);
					cell1.innerHTML = name;
					cell2.innerHTML =
						'<button class="btn btn-danger" onClick="delete_bib(this)">' +
						'<span class="far fa-trash-alt"></span>' +
						'</button>';
					if (papers.errors.length > 0) {
						Swal({
							title: 'Success',
							text: "The " + papers.entries.length + " was upload and " + papers.errors.length + " not upload!",
							type: 'success',
							showCancelButton: false,
							confirmButtonText: 'Ok'
						});
					} else {
						Swal({
							title: 'Success',
							text: "The " + papers.entries.length + " papers was upload",
							type: 'success',
							showCancelButton: false,
							confirmButtonText: 'Ok'
						});
					}
				}
			});
		} else {
			Swal({
				title: 'Error',
				text: "The all papers not upload!",
				type: 'success',
				showCancelButton: false,
				confirmButtonText: 'Ok'
			});
		}

	};

	reader.readAsText(files[0]);
	$("#name_bib_upload")[0].innerHTML = name;
}

$(document).ready(function () {
	document.getElementById('upload_bib').addEventListener('change', readFileAsString);
});

function validate_upload(files, database, id) {
	if (files.length === 0) {
		Swal({
			type: 'warning',
			title: 'Warning',
			text: 'Select a file!'
		});
		return false;
	}

	if (!database) {
		Swal({
			type: 'warning',
			title: 'Warning',
			text: 'Select a database!'
		});
		return false;
	}

	let size = document.getElementById(id).rows.length;
	let rows = document.getElementById(id).rows;
	for (let i = 0; i < size; i++) {
		if (files[0].name.toLowerCase().trim() == rows[i].cells.item(0).innerHTML.toLowerCase().trim()) {

			Swal({
				type: 'warning',
				title: 'Warning',
				text: 'The file name has already been registered!'
			});
			return false;
		}
	}
	return true
}

function delete_bib(value) {
	let row = value.parentNode.parentNode;
	let bib = row.cells.item(0).innerHTML;
	let id_project = $("#id_project").val();
	let database = row.parentNode.parentNode.parentNode.parentNode.cells.item(0).innerHTML;
	let id = 'table_' + database;

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
				url: base_url + 'Project_Controller/delete_bib/',
				data: {
					database: database,
					id_project: id_project,
					name: bib
				},
				success: function (papers) {
					let table_bib = document.getElementById(id);
					let p = table_bib.parentNode.parentNode.cells.item(1).innerHTML;
					table_bib.parentNode.parentNode.cells.item(1).innerHTML = parseInt(p) - papers;
					row.parentNode.removeChild(row);
					$("#name_bib_upload")[0].innerHTML = "";
				}
			});
			Swal.fire(
				'Deleted!',
				'Your bib file has been deleted.',
				'success'
			)
		}
	});
}
