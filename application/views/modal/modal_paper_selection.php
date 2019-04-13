<div class="modal fade bd-example-modal-lg" id="modal_paper_selection" tabindex="-1" role="dialog"
	 aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<input type="hidden" id="id_paper">
				<h5 class="modal-title" id="paper_title">Title Paper</h5>
				<small id="paper_id"></small>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="index_paper">
				<div class="form-inline">
					<div class="col-md-6">
						<h6>Doi</h6>
						<p id="paper_doi"></p>
					</div>
					<div class="col-md-6">
						<h6>URL</h6>
						<a target="_blank" id="paper_url"><i class="fas fa-external-link-alt"></i></a>
					</div>
					<div class="col-md-6">
						<h6>Author</h6>
						<p id="paper_author"></p>
					</div>
					<div class="col-md-2">
						<h6>Year</h6>
						<p id="paper_year"></p>
					</div>
					<div class="col-md-4">
						<h6>Database</h6>
						<p id="paper_database"></p>
					</div>
					<div id="paper_status_selection" class="col-md-12">
						<h6>Status Selection</h6>
						<p id="text_selection"></p>
						<select class="form-control" id="edit_status_selection">
							<option value="4">Duplicate</option>
							<option value="5">Removed</option>
							<option value="3">Unclassified</option>
						</select>
					</div>
					</hr>
					<div class="col-md-12">
						<h6>Abstract</h6>
						<p id="paper_abstract"</p>
					</div>
					<div class="col-md-12">
						<h6>Keywords</h6>
						<p id="paper_keywords"</p>
					</div>
				</div>
				<hr>
				<div class="row" id="criteria_analiese">
					<div class="col-md-6">
						<h6>Inclusion Criteria Rule</h6>
						<p><?= $project->get_inclusion_rule() ?></p>
						<h6>Inclusion Criteria</h6>
						<table class="table table-responsive" id="table_inclusion_criteria">
							<caption>List of Inclusion Criteria</caption>
							<thead>
							<tr>
								<th></th>
								<th>ID</th>
								<th>Description</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($project->get_inclusion_criteria() as $ic) { ?>
								<tr>
									<td></td>
									<td><?= $ic->get_id() ?></td>
									<td><?= $ic->get_description() ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="col-md-6">
						<h6>Exclusion Criteria Rule</h6>
						<p><?= $project->get_exclusion_rule() ?></p>
						<h6>Exclusion Criteria</h6>
						<table class="table table-responsive" id="table_exclusion_criteria">
							<caption>List of Exclusion Criteria</caption>
							<thead>
							<tr>
								<th></th>
								<th>ID</th>
								<th>Description</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($project->get_exclusion_criteria() as $ec) { ?>
								<tr>
									<td></td>
									<td><?= $ec->get_id() ?></td>
									<td><?= $ec->get_description() ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
