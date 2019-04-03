function modal_help_domain() {
	$('#modal_help_domain').modal('show');
}

$(document).ready(function () {
	$("#modal_help_domain").on('hidden.bs.modal', function () {
		//$("#cartoonVideo").attr('src', '');
	});
	$("#modal_help_domain").on('show.bs.modal', function () {
		//$("#cartoonVideo").attr('src', "https://www.youtube.com/embed/-1AITswZUPA");
	});
});

