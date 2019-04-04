<div class="card">
	<div class="text-center card-header">
		<h4><?= $project->get_title(); ?></h4>
		<input type="hidden" id="id_project" value="<?= $project->get_id(); ?>">
		<br>
		<a href="<?= base_url('open/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Review</a>
		<a href="<?= base_url('planning/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Planning</a>
		<a href="<?= base_url('conducting/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Conducting</a>
		<a href="<?= base_url('reporting/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Reporting</a>
	</div>
	<div class="card-body">
		<div class="row justify-content-between">
			<div class="col-sm-12 col-md-2">
				<h4>Planning</h4>
			</div>
		</div>
		<ul class="nav nav-pills nav-justified">
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link active" href="#tab_overall">Overall information</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tab_research">Research Questions</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tab_databases">Data Bases</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tab_search_string">Search
					String</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tab_search_strategy">Search Strategy</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tab_criteria">Criteria</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tab_quality">Quality Assessment</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tab_data">Data Extraction</a>
			</li>
		</ul>
	</div>

	<div class="tab-content">
		<div class="tab-pane active container" id="tab_overall">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<label><strong>Domains</strong></label>
					<br>
					<ul>
						<?php
						foreach ($project->get_domains() as $domain) { ?>
							<li><?= $domain ?></li>
						<?php } ?>
					</ul>
				</div>

				<div class="col-sm-12 col-md-6">
					<label><strong>Select languages</strong></label>
					<br>
					<ul>
						<?php
						foreach ($project->get_languages() as $language) { ?>
							<li><?= $language ?></li>
						<?php } ?>
					</ul>
				</div>
				<br>
				<div class="col-sm-12 col-md-6">
					<label><strong>Select study type</strong></label>
					<br>
					<ul>
						<?php
						foreach ($project->get_study_types() as $types) { ?>
							<li><?= $types ?></li>
						<?php } ?>
					</ul>
				</div>
				<div class="col-sm-12 col-md-6">
					<label for="keywords"><strong>Keywords</strong></label>
					<br>
					<ul>
						<?php
						foreach ($project->get_keywords() as $keyword) { ?>
							<li><?= $keyword ?></li>
						<?php } ?>
					</ul>
				</div>
				<div class="col-sm-12 col-md-4">
					<div class="input-group">
						<strong>Start Date: </strong><?= $project->get_start_date() ?>
					</div>
					<div class="input-group">
						<strong>End Date: </strong><?= $project->get_end_date() ?>
					</div>
				</div>
			</div>
			<br>
			<div class="form-inline container justify-content-between">
				<a href="#" class="btn btn-secondary disabled"><span class="fas fa-backward"></span> Previous</a>
				<a class="btn btn-secondary" href="#tab_research">Next <span class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container" id="tab_research">
			<div class="form-inline">
				<label><strong>Research Questions</strong></label>
			</div>
			<br>
			<table id="table_research_question" class="table table-responsive-sm">
				<caption>List of Research Questions</caption>
				<thead>
				<tr>
					<th>ID</th>
					<th>Research Question</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_research_questions() as $rq) { ?>
					<tr>
						<td><?= $rq->get_id() ?></td>
						<td><?= $rq->get_description() ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<br>
			<div class="form-inline container justify-content-between">
				<a href="#tab_overall" class="btn btn-secondary"><span class="fas fa-backward"></span> Previous</a>
				<a href="#tab_databases" class="btn btn-secondary">Next <span class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container" id="tab_databases">
			<div class="form-inline">
				<label for="databases"><strong>Data Bases</strong></label>
			</div>
			<br>
			<ul>
				<?php
				foreach ($project->get_databases() as $database) { ?>
					<li><?= $database->get_name() ?></li>
				<?php } ?>
			</ul>
			<br>
			<div class="form-inline container justify-content-between">
				<a href="#tab_research" class="btn btn-secondary"><span class="fas fa-backward"></span> Previous</a>
				<a href="#tab_search_string" class="btn btn-secondary">Next <span
						class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container" id="tab_search_string">
			<div class="form-inline">
				<label><strong>Search String</strong></label>
			</div>
			<br>
			<table id="table_search_string" class="table table-responsive-sm">
				<caption>List of Term</caption>
				<thead>
				<tr>
					<th>Term</th>
					<th>Synonyms</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_terms() as $term) { ?>
					<tr>
						<td><?= $term->get_description() ?></td>
						<td>
							<?php
							$array = $term->get_synonyms();
							foreach ($array as $key => $synonym) {
								end($array);
								if ($key === key($array)) { ?>
									<?= $synonym ?>
								<?php } else { ?>
									<?= $synonym . " OR " ?>
									<?php
								}
							} ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<br>
			<div id="strings">
				<div class="form-inline">
					<label><strong>Strings</strong></label>
				</div>
				<?php foreach ($project->get_search_strings() as $search_string) { ?>
					<div class="form-group" id="div_string_<?= $search_string->get_database() ?>">
						<label><?= $search_string->get_database() ?></label>
						<p><?= $search_string->get_description() ?></p>
						<hr>
					</div>
				<?php } ?>
			</div>
			<div class="form-inline container justify-content-between">
				<a href="#tab_databases" class="btn btn-secondary"><span
						class="fas fa-backward"></span> Previous</a>
				<a href="#tab_search_strategy" class="btn btn-secondary opt">Next <span
						class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container" id="tab_search_strategy">
			<div class="form-inline">
				<label><strong>Search Strategy</strong></label>
			</div>
			<p><?= $project->get_search_strategy() ?></p>
			<div class="form-inline container justify-content-between">
				<a href="#tab_search_string" class="btn btn-secondary"><span
						class="fas fa-backward"></span> Previous</a>
				<a href="#tab_criteria" class="btn btn-secondary opt">Next <span
						class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container" id="tab_criteria">
			<div class="form-inline">
				<label><strong>Criteria</strong></label>
			</div>
			<br>
			<label><strong>Inclusion Criteria</strong></label>
			<table id="table_criteria_inclusion" class="table table-responsive-sm">
				<caption>List of Inclusion Criteria</caption>
				<thead>
				<tr>
					<th>Select</th>
					<th>ID</th>
					<th>Criteria</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_inclusion_criteria() as $ic) {
					if ($ic->get_pre_selected()) {
						$checked = 'Selected';
					} else {
						$checked = '';
					}
					?>
					<tr>
						<td>
							<?= $checked ?>
						</td>
						<td><?= $ic->get_id() ?></td>
						<td><?= $ic->get_description() ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<div class="form-inline col-md-3">
				<strong>Inclusion Rule: </strong><?= $project->get_inclusion_rule() ?>
			</div>
			<br/>
			<label><strong>Exclusion Criteria</strong></label>
			<table id="table_criteria_exclusion" class="table table-responsive-sm">
				<caption>List of Exclusion Criteria</caption>
				<thead>
				<tr>
					<th>Select</th>
					<th>ID</th>
					<th>Criteria</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_exclusion_criteria() as $ec) {
					if ($ec->get_pre_selected()) {
						$checked = 'Selected';
					} else {
						$checked = '';
					}
					?>
					<tr>
						<td>
							<?= $checked ?>
						</td>
						<td><?= $ec->get_id() ?></td>
						<td><?= $ec->get_description() ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<div class="input-group col-md-3">
				<strong>Exclusion Rule: </strong><?= $project->get_exclusion_rule() ?>
			</div>
			<br>
			<div class="form-inline container justify-content-between">
				<a href="#tab_search_strategy" class="btn btn-secondary"><span class="fas fa-backward"></span>
					Previous</a>
				<a href="#tab_quality" class="btn btn-secondary opt">Next <span
						class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container" id="tab_quality">
			<div class="form-inline">
				<label><strong>General Score</strong></label>
			</div>
			<div class="input-group col-md-4">
				<?php $mini = $project->get_score_min();
				if (!is_null($mini)) {
					?>
					<strong>Minimum General Score to Approve: </strong><?= $mini->get_description(); ?>
				<?php } else {
					?>
					<strong>Minimum General Score to Approve: </strong><span></span>
				<?php }
				?>
			</div>
			<br>
			<table id="table_general_score" class="table table-responsive-sm">
				<caption>List of General Score</caption>
				<thead>
				<tr>
					<th>Start Score Interval</th>
					<th>End Score Interval</th>
					<th>Score Description</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_quality_scores() as $score) { ?>
					<tr>
						<td><?= $score->get_start_interval() ?></td>
						<td><?= $score->get_end_interval() ?></td>
						<td><?= $score->get_description() ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<br>
			<div class="form-inline">
				<label><strong>Question Quality</strong></label>
			</div>
			<br>
			<table id="table_qa" class="table table-responsive-sm">
				<caption>List of Question Quality</caption>
				<thead>
				<tr>
					<th>ID</th>
					<th>Description</th>
					<th>Scores Rules</th>
					<th>Weight</th>
					<th>Minimum to Approve</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_questions_quality() as $qa) { ?>
					<tr>
						<td><?= $qa->get_id(); ?></td>
						<td><?= $qa->get_description(); ?></td>
						<td>
							<table id="table_<?= $qa->get_id(); ?>" class="table">
								<th>Score Rule</th>
								<th>Score</th>
								<th>Description</th>
								<tbody>
								<?php foreach ($qa->get_scores() as $sc) { ?>
									<tr>
										<td><?= $sc->get_score_rule(); ?></td>
										<td><?= $sc->get_score(); ?>%</td>
										<td><?= $sc->get_description(); ?></td>

									</tr>
								<?php } ?>
								</tbody>
							</table>
						</td>
						<td><?= $qa->get_weight() ?></td>
						<td>

							<?php $mini = $qa->get_min_to_approve();
							if (!is_null($mini)) { ?>
								<?= $mini->get_score_rule(); ?>
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<br>
			<div class="form-inline container justify-content-between">
				<a href="#tab_criteria" class="btn btn-secondary"><span class="fas fa-backward"></span> Previous</a>
				<a href="#tab_data" class="btn btn-secondary opt">Next <span
						class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container" id="tab_data">
			<div class="form-inline">
				<label><strong>Data Extraction</strong></label>
			</div>
			<br>
			<table id="table_data_extraction" class="table table-responsive-sm">
				<caption>List of Data Extraction</caption>
				<thead>
				<tr>
					<th>ID</th>
					<th>Description</th>
					<th>Type</th>
					<th>Options</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_questions_extraction() as $qe) { ?>
					<tr>
						<td><?= $qe->get_id(); ?></td>
						<td><?= $qe->get_description(); ?></td>
						<td><?= $qe->get_type(); ?></td>
						<td>
							<?php if ($qe->get_type() == "Text") { ?>
						</td>
						<?php } else {
								foreach ($qe->get_options() as $op) { ?>
									<?= $op . "</br>" ?>
								<?php } ?>
							</td>
						<?php } ?>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<br>
			<div class="form-inline container justify-content-between">
				<a href="#tab_quality" class="btn btn-secondary"><span class="fas fa-backward"></span> Previous</a>
				<a href="#" class="btn btn-secondary disabled">Next<span
						class="fas fa-forward"></span></a>
			</div>
		</div>
	</div>
	<br>
</div>
