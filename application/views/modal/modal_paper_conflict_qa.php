<div class="modal fade bd-example-modal-lg" id="modal_paper_conflict_qa" tabindex="-1" role="dialog"
	 aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<input type="hidden" id="id_paper_conf_qa">
				<h5 class="modal-title" id="paper_title_conf_qa">Title Paper</h5>
				<small id="paper_id_conf_qa"></small>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="index_paper_conf_qa">
				<input type="hidden" id="old_status_conf_qa">
				<div class="form-inline">
					<div class="col-md-6">
						<h6>Doi</h6><a class="float-right opt"><i
								class="fas fa-question-circle "></i></a>
						<p id="paper_doi_conf_qa"></p>
					</div>
					<div class="col-md-6">
						<h6>URL</h6>
						<a target="_blank" id="paper_url_conf_qa"><i class="fas fa-external-link-alt"></i></a>
					</div>
					<div class="col-md-6">
						<h6>Author</h6>
						<p id="paper_author_conf_qa"></p>
					</div>
					<div class="col-md-2">
						<h6>Year</h6>
						<p id="paper_year_conf_qa"></p>
					</div>
					<div class="col-md-4">
						<h6>Database</h6>
						<p id="paper_database_conf_qa"></p>
					</div>
					<div id="paper_status_selection_conf_qa" class="col-md-12">
						<h6>Status Selection</h6>
						<select class="form-control col-md-3" id="status_conflict_qa">
							<?php foreach ($status as $st) { ?>
								<option value="<?= $st[0] ?>"><?= $st[1] ?></option>
							<?php } ?>
						</select>
					</div>
					</hr>
					<div class="col-md-12">
						<h6>Abstract</h6>
						<p id="paper_abstract_conf_qa"</p>
					</div>
					<div class="col-md-12">
						<h6>Keywords</h6>
						<p id="paper_keywords_conf_qa"</p>
					</div>
				</div>
				<hr>
				<div id="notes_qa">
				</div>
			</div>
		</div>
	</div>
</div>
