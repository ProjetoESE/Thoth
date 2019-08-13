<div class="modal fade bd-example-modal-lg" id="modal_paper_ex" tabindex="-1" role="dialog"
	 aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<input type="hidden" id="id_paper_ex">
				<h5 class="modal-title" id="paper_title_ex">Title Paper</h5>
				<small id="paper_id_ex"></small>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="index_paper_ex">
				<div class="form-inline">
					<div class="col-md-6">
						<h6>Doi</h6><a class="float-right opt"><i class="fas fa-question-circle"></i></a>
						<a target="_blank" id="paper_doi_ex"><i class="fas fa-external-link-alt"></i></a>
					</div>
					<div class="col-md-6">
						<h6>URL</h6>
						<a target="_blank" id="paper_url_ex"><i class="fas fa-external-link-alt"></i></a>
					</div>
					<div class="col-md-6">
						<h6>Author</h6>
						<p id="paper_author_ex"></p>
					</div>
					<div class="col-md-2">
						<h6>Year</h6>
						<p id="paper_year_ex"></p>
					</div>
					<div class="col-md-4">
						<h6>Database</h6>
						<p id="paper_database_ex"></p>
					</div>
					<div id="paper_status_ex" class="col-md-12">
						<h6>Status Extraction</h6>
						<p id="text_ex"></p>
						<select class="form-control" id="edit_status_ex">
							<option value="3">Removed</option>
							<option value="2">To Do</option>
						</select>
					</div>
					</hr>
					<div class="col-md-12">
						<h6>Abstract</h6>
						<p id="paper_abstract_ex"</p>
					</div>
					<div class="col-md-12">
						<h6>Keywords</h6>
						<p id="paper_keywords_ex"</p>
					</div>
				</div>
				<hr>
				<div class="col-md-12" id="ex_analiese">
					<h6>Extraction Questions</h6>
					<div class="form-inline" id="extraction_questions">
					</div>
					<br>
					<hr>
				</div>
				<div class="col-md-12">
					<h6>Note</h6>
					<textarea id="paper_note_ex" class="form-control"></textarea>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	let questions = [];
	let options = [];
	let question = null;
	<?php foreach ($project->get_questions_extraction() as $qe) { ?>
	options = [];
	<?php foreach ($qe->get_options() as $op) { ?>
	options.push("<?=$op?>");
	<?php } ?>
	question = new Extraction_Answer("<?= $qe->get_id()?>", "<?=$qe->get_description()?>", "<?=$qe->get_type()?>", options);
	questions.push(question);
	<?php } ?>

	for (const qe of questions) {
		qe.show();
	}
</script>
