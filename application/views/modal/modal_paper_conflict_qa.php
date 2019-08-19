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
						<h6>Doi</h6><a class="float-right opt"><i class="fas fa-question-circle"></i></a>
						<a target="_blank" id="paper_doi_conf_qa"><i class="fas fa-external-link-alt"></i></a>
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
				<h6>Quality Questions Answer</h6>
				<table class="table table-responsive-sm" id="table_qa_answer">
					<thead>
					<tr>
						<th>Research</th>
						<?php foreach ($project->get_questions_quality() as $qa) { ?>
							<th><?= $qa->get_id() ?></th>
						<?php } ?>
						<th>Score</th>
						<th>General Score</th>
						<th>Status</th>
					</tr>
					</thead>
				</table>
				<hr>
				<h5>Quality Questions</h5>
				<div class="form-inline">
					<h6>Score: </h6> <h6 class="font-weight-bold" id="score_paper_qa_conf">0</h6>
				</div>
				<div class="form-inline">
					<h6>General Score: </h6> <h6 class="font-weight-bold" id="gen_score_qa_conf"></h6>
				</div>
				<table class="table table-responsive-sm" id="table_qa_eva_conf">
					<caption>List of Quality Questions</caption>
					<thead>
					<tr>
						<th>ID</th>
						<th>Description</th>
						<th>Minimum to Approve</th>
						<th>Score</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($project->get_questions_quality() as $qa) { ?>
						<tr>
							<td><?= $qa->get_id() ?></td>
							<td><?= $qa->get_description() ?></td>
							<td><?= is_null($qa->get_min_to_approve()) ? "" : $qa->get_min_to_approve()->get_score_rule() ?></td>
							<td>
								<select class="form-control" data-qa="<?= $qa->get_id() ?>"
										id="conf_<?= str_replace(" ", "", $qa->get_id()); ?>">
									<option value=""></option>
									<?php foreach ($qa->get_scores() as $score) { ?>
										<option
											data-toggle="tooltip" data-placement="top"
											title="<?= $score->get_description() ?>"
											value="<?= $score->get_score_rule() ?>">
											<?= $score->get_score_rule() ?>
										</option>
									<?php } ?>
								</select>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
