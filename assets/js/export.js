$(document).ready(function () {
	$("input[name='inlineRadioOptions']").click(function () {
		let step = $("input[name='inlineRadioOptions']:checked").val();

		let id_project = $("#id_project").val();
		$.ajax({
			type: "POST",
			url: base_url + 'Project_Controller/export_bib/',
			data: {
				id_project: id_project,
				step: step,
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
			success: function (bib) {
				$('#bib_tex').val(bib);
				Swal({
					title: 'Generate Bib',
					html: '<strong>BibTex file generated</strong>',
					type: 'success',
					showCancelButton: false,
					confirmButtonText: 'Ok'
				})
			}
		});

	});

	$("input:checkbox[name=step]").on('change', function () {
		let steps = [];
		$("input:checkbox[name=step]:checked").each(function () {
			steps.push($(this).val());
		});

		let id_project = $("#id_project").val();
		if (steps.length > 0) {
			$.ajax({
				type: "POST",
				url: base_url + 'Project_Controller/export_latex/',
				data: {
					id_project: id_project,
					steps: steps,
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
				success: function (latex) {
					$('#latex').val(latex);
					Swal({
						title: 'Generate Latex',
						html: '<strong>LaTex file generated</strong>',
						type: 'success',
						showCancelButton: false,
						confirmButtonText: 'Ok'
					})
				}
			});
		} else {
			$('#latex').val("");
		}

	});
});

function export_bib() {

	let element = $('#bib_tex');

	let data = new Blob([element.val()], {type: 'text/plain'});

	let url = window.URL.createObjectURL(data);

	document.getElementById('export_bib').href = url;

}
