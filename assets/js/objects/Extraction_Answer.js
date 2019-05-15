class Extraction_Answer {
	constructor(id, description, type, options) {

		this.id = id;
		this.description = description;
		this.type = type;
		this.options = options;
		this.answer = null;
	}

	show() {
		let parent = document.getElementById('extraction_questions');

		let id = document.createElement('strong');
		id.innerText = this.id;

		let label = document.createElement('span');

		label.appendChild(id);
		parent.appendChild(label);

		let description = document.createElement('label');
		description.innerText = this.description;
		parent.appendChild(description);

		switch (this.type) {
			case "Text":
				this.answer = document.createElement('textarea');
				this.answer.classList.add("form-control");
				this.answer.classList.add("col-md-12");
				this.answer.id = this.id.replace(" ","").trim();

				this.answer.dataset.id = this.id;

				this.answer.addEventListener("change", function () {
					let old_status = $('#text_ex').val();
					let id_paper = $('#id_paper_ex').val();
					let id_project = $('#id_project').val();
					let index = $('#index_paper_ex').val();


					$.ajax({
						type: "POST",
						url: base_url + 'Extraction_Controller/edit_txt_qe/',
						data: {
							id_project: id_project,
							id_qe: this.dataset.id,
							text: this.value,
							id_paper: id_paper,
							old: old_status
						}, error: function () {
							Swal({
								type: 'error',
								title: 'Error',
								html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
								showCancelButton: false,
								confirmButtonText: 'Ok'
							});
						},
						success: function (data) {
							let dados = JSON.parse(data);
							if (dados.change) {
								change_old_status_ex(old_status);
								change_new_status_ex(id_paper, dados.status.toString(), index);
								status_paper_ex(dados.status.toString());
							}
						}
					});
				});

				parent.appendChild(this.answer);
				break;
			case "Multiple Choice List":
				this.answer = document.createElement('div');
				this.answer.classList.add("form-check");
				this.answer.classList.add("form-check-inline");
				this.answer.classList.add("col-md-12");
				this.answer.id = this.id.replace(" ","").trim();

				for (let op of this.options) {

					let input = document.createElement('input');

					input.dataset.id = this.id;

					input.classList.add("form-check-input");
					input.type = "checkbox";
					input.value = op;
					input.id = op.replace(" ","").trim();

					input.addEventListener("change", function () {
						let old_status = $('#text_ex').val();
						let id_paper = $('#id_paper_ex').val();
						let id_project = $('#id_project').val();
						let index = $('#index_paper_ex').val();


						$.ajax({
							type: "POST",
							url: base_url + 'Extraction_Controller/edit_check_qe/',
							data: {
								id_project: id_project,
								id_qe: this.dataset.id,
								option: this.value,
								id_paper: id_paper,
								old: old_status
							}, error: function () {
								Swal({
									type: 'error',
									title: 'Error',
									html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
									showCancelButton: false,
									confirmButtonText: 'Ok'
								});
							},
							success: function (data) {
								let dados = JSON.parse(data);
								if (dados.change) {
									change_old_status_ex(old_status);
									change_new_status_ex(id_paper, dados.status.toString(), index);
									status_paper_ex(dados.status.toString());
								}
							}
						});
					});

					let label = document.createElement('label');
					label.for = input.id;
					label.classList.add("form-check-label");
					label.innerText = op;

					this.answer.appendChild(input);
					this.answer.appendChild(label);
				}

				parent.appendChild(this.answer);
				break;
			case "Pick One List":
				this.answer = document.createElement('select');
				this.answer.classList.add("form-control");
				this.answer.classList.add("col-md-12");
				this.answer.id = this.id.replace(" ","").trim();


				this.answer.dataset.id = this.id;

				let option = document.createElement('option');
				option.value = "";
				this.answer.appendChild(option);

				for (let op of this.options) {

					option = document.createElement('option');
					option.value = op;
					option.id = op.replace(" ","").trim();
					option.innerText = op;

					this.answer.appendChild(option);
				}

				this.answer.addEventListener("change", function () {
					let old_status = $('#text_ex').val();
					let id_paper = $('#id_paper_ex').val();
					let id_project = $('#id_project').val();
					let index = $('#index_paper_ex').val();


					$.ajax({
						type: "POST",
						url: base_url + 'Extraction_Controller/edit_op_qe/',
						data: {
							id_project: id_project,
							id_qe: this.dataset.id,
							option: this.value,
							id_paper: id_paper,
							old: old_status
						}, error: function () {
							Swal({
								type: 'error',
								title: 'Error',
								html: 'Something caused an <label class="font-weight-bold text-danger">Error</label>',
								showCancelButton: false,
								confirmButtonText: 'Ok'
							});
						},
						success: function (data) {
							let dados = JSON.parse(data);
							if (dados.change) {
								change_old_status_ex(old_status);
								change_new_status_ex(id_paper, dados.status.toString(), index);
								status_paper_ex(dados.status.toString());
							}
						}
					});
				});

				parent.appendChild(this.answer);
				break;
		}
	}

}
