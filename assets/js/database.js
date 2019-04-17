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
		url: base_url + 'Database_Controller/add_database/',
		data: {
			id_project: id_project,
			database: databases
		},
		error: function(){
			Swal({
				type: 'error',
				title: 'Error',
				html: '<label class="font-weight-bold text-danger">Error</label>'
			});
		},
		success: function (link) {
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
			node.innerHTML = '<a target="_blank" href="' + link + '">' + databases + '</a>' +
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
				url: base_url + 'Database_Controller/delete_database/',
				data: {
					id_project: id_project,
					database: row.data()[0]
				},
				error: function(){
					Swal({
						type: 'error',
						title: 'Error',
						html: '<label class="font-weight-bold text-danger">Error</label>'
					});
				},
				success: function () {
					let elem = document.getElementById('div_string_' + row.data()[0]);
					elem.parentNode.removeChild(elem);
					row.remove();
					table_databases.draw();


				}
			});
			Swal.fire(
				'Deleted!',
				'Database has been deleted.',
				'success'
			)
		}
	});
}

function new_database() {
	let database = $("#new_database").val();
	let id_project = $("#id_project").val();
	let link = $("#new_database_link").val();

	if (!database) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The database can not be empty!'
		});
		return;
	}

	if (!link) {
		swal({
			type: 'warning',
			title: 'Warning',
			text: 'The link can not be empty!'
		});
		return;
	}


	let data = table_databases.rows().data().toArray();

	for (let i = 0; i < data.length; i++) {
		if (database.toLowerCase().trim() == data[i][0].toLowerCase().trim()) {
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
		url: base_url + 'Database_Controller/new_database/',
		data: {
			id_project: id_project,
			database: database,
			link: link
		},
		error: function(){
			Swal({
				type: 'error',
				title: 'Error',
				html: '<label class="font-weight-bold text-danger">Error</label>'
			});
		},
		success: function () {
			table_databases.row.add([
				database,
				'<button class="btn btn-danger" onClick="delete_database($(this).parents(\'tr\'));">' +
				'<span class="far fa-trash-alt"></span>' +
				'</button>'
			]).draw();

			$("#new_database")[0].value = "";
			$("#new_database_link")[0].value = "";

			let x = document.getElementById("databases");
			let option = document.createElement("option");
			option.text = database;
			x.add(option);

			let node = document.createElement("DIV");
			node.id = 'div_string_' + database;
			node.classList.add("form-group")
			node.innerHTML = '<a target="_blank" href="' + link + '">' + database + '</a>' +
				'<textarea class="form-control" id="string_' + database + '"></textarea>' +
				'<button type="button" class="btn btn-info opt" onclick="generate_string(\'' + database + '\');">Generate</button>' +
				'<hr>';

			document.getElementById("strings").appendChild(node);


		}
	});
}
