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
						<h6>Doi</h6><a class="float-right opt"><i
								class="fas fa-question-circle "></i></a>
						<p id="paper_doi_ex"></p>
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
					<?php foreach ($project->get_questions_extraction() as $qe) { ?>
						<div class="form-inline">
							<span><strong><?= $qe->get_id() ?> </strong></span>
							<label><?= $qe->get_description() ?></label>
							<?php

							switch ($qe->get_type()) {
								case "Text":
									?>
									<textarea id="<?= $qe->get_id() ?>" class="form-control col-md-12"></textarea>
									<?php
									break;
								case "Multiple Choice List":
									?>
									<div class="form-check form-check-inline col-md-12" id="<?= $qe->get_id() ?>">
										<?php
										foreach ($qe->get_options() as $op) {
											?>
											<input class="form-check-input" type="checkbox"
												   id="<?= $op ?>"
												   value="<?= $op ?>">
											<label class="form-check-label"
												   for="<?= $op ?>"><?= $op ?></label>

											<?php
										}
										?>
									</div>
									<?php
									break;
								case "Pick One List":
									?>
									<select class="form-control col-md-12" id="<?= $qe->get_id() ?>">
										<?php
										foreach ($qe->get_options() as $op) {
											?>
											<option value="<?= $op ?>"><?= $op ?></option>
											<?php
										}
										?>
									</select>
									<?php
									break;
									?>
								<?php } ?>
						</div>
						<br>
					<?php } ?>
					<button class="btn btn-success float-right">Save <span class="fas fa-save"></span></button>
					<br>
				</div>
				<hr>
				<div class="col-md-12">
					<h6>Note</h6>
					<textarea id="paper_note_ex" class="form-control"></textarea>
				</div>
			</div>
		</div>
	</div>
</div>
