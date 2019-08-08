<div class="card">
	<div class="text-center card-header">
		<h4><?= $project->get_title(); ?></h4>
		<input type="hidden" id="id_project" value="<?= $project->get_id(); ?>">
		<br>
		<a href="<?= base_url('open/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Overview</a>
		<a href="<?= base_url('planning/' . $project->get_id()) ?>"
		   class="btn form-inline btn-primary opt">Planning</a>
		<a href="<?= base_url('reporting/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Reporting</a>
	</div>
	<div class="card-body">
		<h4>Planning</h4>
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
		<div class="tab-pane active container-fluid" id="tab_overall">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<br>
					<table id="table_domains" class="table table-responsive-sm">
						<caption>List of Domains</caption>
						<thead>
						<tr>
							<th>Domain <a onclick="modal_help('modal_help_domain')" class="float-right opt"><i
										class="fas fa-question-circle "></i></a></th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($project->get_domains() as $domain) { ?>
							<tr>
								<td><?= $domain ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>

				<div class="col-sm-12 col-md-6">
					<br>
					<table id="table_languages" class="table table-responsive-sm">
						<caption>List of Languages</caption>
						<thead>
						<tr>
							<th>Language <a onclick="modal_help('modal_help_languages')" class="float-right opt"><i
										class="fas fa-question-circle "></i></a></th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($project->get_languages() as $language) { ?>
							<tr>
								<td><?= $language ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<br>
				<div class="col-sm-12 col-md-6">
					<br>
					<table id="table_study_type" class="table table-responsive-sm">
						<caption>List of Study Type</caption>
						<thead>
						<tr>
							<th>Study Type <a onclick="modal_help('modal_help_study_type')" class="float-right opt"><i
										class="fas fa-question-circle "></i></a></th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($project->get_study_types() as $types) { ?>
							<tr>
								<td><?= $types ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="col-sm-12 col-md-6">
					<br>
					<table id="table_keywords" class="table table-responsive-sm">
						<caption>List of Keywords</caption>
						<thead>
						<tr>
							<th>Keyword <a onclick="modal_help('modal_help_keyword')" class="float-right opt"><i
										class="fas fa-question-circle "></i></a></th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($project->get_keywords() as $keyword) { ?>
							<tr>
								<td><?= $keyword ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="col-sm-12 col-md-4">
					<label for="start_date"><strong>Start and End Date</strong></label>
					<a onclick="modal_help('modal_help_date')" class="float-right opt"><i
							class="fas fa-question-circle "></i></a>
					<div class="input-group">
						<div class="input-group-prepend">
							<button class="btn btn-success"><span class="far fa-calendar-check "></span></button>
						</div>
						<span><?= $project->get_start_date() ?></span>
					</div>
					<div class="input-group">
						<button class="btn btn-danger"><span class="far fa-calendar-check "></span></button>
						<span><?= $project->get_end_date() ?></span>
					</div>
				</div>
			</div>
			<br>
			<div class="form-inline container-fluid justify-content-between">
				<a href="#" class="btn btn-secondary disabled"><span class="fas fa-backward"></span> Previous</a>
				<a class="btn btn-secondary" href="#tab_research">Next <span class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container-fluid" id="tab_research">
			<br>
			<table id="table_research_question" class="table table-responsive-sm">
				<caption>List of Research Questions</caption>
				<thead>
				<tr>
					<th>ID</th>
					<th>Research Question <span onclick="modal_help('modal_help_rq')" class="float-right opt"><i
								class="fas fa-question-circle "></i></span></th>
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
			<div class="form-inline container-fluid justify-content-between">
				<a href="#tab_overall" class="btn btn-secondary"><span class="fas fa-backward"></span> Previous</a>
				<a href="#tab_databases" class="btn btn-secondary">Next <span class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container-fluid" id="tab_databases">
			<br>
			<table id="table_databases" class="table table-responsive-sm">
				<caption>List of Databases</caption>
				<thead>
				<tr>
					<th>Database <a onclick="modal_help('modal_help_database')" class="float-right opt"><i
								class="fas fa-question-circle "></i></a></th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_databases() as $database) { ?>
					<tr>
						<td>
							<?= $database->get_name() ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<br>
			<div class="form-inline container-fluid justify-content-between">
				<a href="#tab_research" class="btn btn-secondary"><span class="fas fa-backward"></span> Previous</a>
				<a href="#tab_search_string" class="btn btn-secondary">Next <span
						class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container-fluid" id="tab_search_string">
			<br>
			<table id="table_search_string" class="table table-responsive-sm">
				<caption>List of Term</caption>
				<thead>
				<tr>
					<th>Term</th>
					<th>Synonyms <a onclick="modal_help('modal_help_ss')" class="float-right opt"><i
								class="fas fa-question-circle "></i></a></th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_terms() as $term) { ?>
					<tr>
						<td><?= $term->get_description() ?></td>
						<td>
							<table id="table_<?= $term->get_description() ?>" class="table">
								<th>Synonym</th>

								<tbody>
								<?php foreach ($term->get_synonyms() as $synonym) { ?>
									<tr>
										<td><?= $synonym ?></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<br>
			<div id="strings">
				<div class="form-inline">
					<label><strong>Strings</strong></label>
					<a onclick="modal_help('modal_help_strings')" class="float-right opt"><i
							class="fas fa-question-circle "></i></a>
				</div>
				<?php foreach ($project->get_search_strings() as $search_string) { ?>
					<div class="form-group" id="div_string_<?= $search_string->get_database()->get_name() ?>">
						<a target="_blank"
						   href="<?= $search_string->get_database()->get_link() ?>"><?= $search_string->get_database()->get_name() ?></a>
						<textarea class="form-control" disabled="true"
								  id="string_<?= $search_string->get_database()->get_name() ?>"><?= $search_string->get_description() ?></textarea>
					</div>
				<?php } ?>
			</div>
			<div class="form-inline container-fluid justify-content-between">
				<a href="#tab_databases" class="btn btn-secondary"><span
						class="fas fa-backward"></span> Previous</a>
				<a href="#tab_search_strategy" class="btn btn-secondary opt">Next <span
						class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container-fluid" id="tab_search_strategy">
			<div class="form-inline">
				<label for="search_strategy"><strong>Search Strategy</strong></label>
				<a onclick="modal_help('modal_help_strategy')" class="float-right opt"><i
						class="fas fa-question-circle "></i></a>
			</div>
			<textarea rows="8" class="form-control" disabled="true"
					  id="search_strategy"><?= $project->get_search_strategy() ?></textarea>
			</button>
			<br>
			<div class="form-inline container-fluid justify-content-between">
				<a href="#tab_search_string" class="btn btn-secondary"><span
						class="fas fa-backward"></span> Previous</a>
				<a href="#tab_criteria" class="btn btn-secondary opt">Next <span
						class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container-fluid" id="tab_criteria">
			<br>
			<div class="form-inline">
				<label><strong>Inclusion Criteria</strong></label>
				<a onclick="modal_help('modal_help_criteria')" class="float-right opt"><i
						class="fas fa-question-circle "></i></a>
			</div>
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
						<td><?= $checked ?></td>
						<td><?= $ic->get_id() ?></td>
						<td><?= $ic->get_description() ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<div class="form-inline">
				<label><strong>Inclusion Rule: </strong></label>
				<span><?= $project->get_inclusion_rule() ?></span>
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
						<td><?= $checked ?></td>
						<td><?= $ec->get_id() ?></td>
						<td><?= $ec->get_description() ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<div class="form-inline">
				<label><strong>Exclusion Rule: </strong></label>
				<span><?= $project->get_exclusion_rule() ?></span>
			</div>
			<br>
			<div class="form-inline container-fluid justify-content-between">
				<a href="#tab_search_strategy" class="btn btn-secondary"><span class="fas fa-backward"></span>
					Previous</a>
				<a href="#tab_quality" class="btn btn-secondary opt">Next <span
						class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container-fluid" id="tab_quality">
			<div class="form-inline">
				<label for="start_interval"><strong>General Score</strong></label>
				<a onclick="modal_help('modal_help_general_score')" class="float-right opt"><i
						class="fas fa-question-circle "></i></a>
			</div>
			<br>
			<div class="form-inline">
				<label><strong>Minimum General Score to Approve: </strong></label>
				<?php $mini = $project->get_score_min();
				if ($mini != null) {
					?> <span><?= $mini->get_description() ?></span>
					<?php
				}
				?>
			</div>
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
				<label for="id_qa"><strong>Question Quality</strong></label>
				<a onclick="modal_help('modal_help_qa')" class="float-right opt"><i
						class="fas fa-question-circle "></i></a>
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
							<?php
							$min = $qa->get_min_to_approve();
							if (!is_null($min)) {
								echo  $min->get_score_rule();
							}
							?>
						</td>

					</tr>
				<?php } ?>
				</tbody>
			</table>
			<br>
			<div class="form-inline container-fluid justify-content-between">
				<a href="#tab_criteria" class="btn btn-secondary"><span class="fas fa-backward"></span> Previous</a>
				<a href="#tab_data" class="btn btn-secondary opt">Next <span
						class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container-fluid" id="tab_data">
			<div class="form-inline">
				<label for="id_data_extraction"><strong>Data Extraction</strong></label>
				<a onclick="modal_help('modal_help_data_extraction')" class="float-right opt"><i
						class="fas fa-question-circle "></i></a>
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
						<?php } else { ?>
							<table id="table_<?= $qe->get_id(); ?>" class="table">
								<th>Option</th>
								<tbody>
								<?php foreach ($qe->get_options() as $op) { ?>
									<tr>
										<td><?= $op ?></td>

									</tr>
								<?php } ?>
								</tbody>
							</table>
							</td>
						<?php } ?>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<br>
			<div class="form-inline container-fluid justify-content-between">
				<a href="#tab_quality" class="btn btn-secondary"><span class="fas fa-backward"></span> Previous</a>
				<a href="#" class="btn btn-secondary disabled">Next<span
						class="fas fa-forward"></span></a>
			</div>
		</div>
	</div>
	<br>
</div>
<?php
$this->load->view('modal/modal_inclusion_criteria');
$this->load->view('modal/modal_exclusion_criteria');
$this->load->view('modal/modal_synonym');
$this->load->view('modal/modal_general_score');
$this->load->view('modal/modal_term');
$this->load->view('modal/modal_research');
$this->load->view('modal/modal_keyword');
$this->load->view('modal/modal_domain');
$this->load->view('modal/modal_question_quality');
$this->load->view('modal/modal_score_quality');
$this->load->view('modal/modal_question_extraction');
$this->load->view('modal/modal_option');
$this->load->view('modal/modal_help_domain');
$this->load->view('modal/modal_help_languages');
$this->load->view('modal/modal_help_study_type');
$this->load->view('modal/modal_help_keyword');
$this->load->view('modal/modal_help_date');
$this->load->view('modal/modal_help_research_question');
$this->load->view('modal/modal_help_database');
$this->load->view('modal/modal_help_ss');
$this->load->view('modal/modal_help_strings');
$this->load->view('modal/modal_help_criteria');
$this->load->view('modal/modal_help_general_score');
$this->load->view('modal/modal_help_qa');
$this->load->view('modal/modal_help_data_extraction');
$this->load->view('modal/modal_help_strategy');
?>
