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
			<li class="nav-item ">
				<a data-toggle="pill" class="nav-link <?= $progress_planning['progress'] == 100 ? :"disabled" ?>" href="#tab_export_planning" onclick="export_to_doc();">Export
					Planning</a>
			</li>
		</ul>
	</div>

	<div class="tab-content">
		<div class="tab-pane active container" id="tab_overall">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<label for="domain"><strong>Domains</strong></label>
					<a onclick="modal_help_domain()" class="float-right opt"><i class="fas fa-question-circle "></i></a>
					<div class="input-group">
						<input type="text" class="form-control" id="domain">
						<div class="input-group-append">
							<button type="button" class="btn btn-success" id="add_domain" onclick="add_domain();"><span
									class="fas fa-plus"></span></button>
						</div>
					</div>
					<br>
					<table id="table_domains" class="table table-responsive-sm">
						<caption>List of Domains</caption>
						<thead>
						<tr>
							<th>Domain</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($project->get_domains() as $domain) { ?>
							<tr>
								<td><?= $domain ?></td>
								<td>
									<button class="btn btn-warning opt" onClick="modal_domain($(this).parents('tr'));">
										<span class="fas fa-edit"></span>
									</button>
									<button class="btn btn-danger" onClick="delete_domain($(this).parents('tr'));">
										<span class="far fa-trash-alt"></span>
									</button>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>

				<div class="col-sm-12 col-md-6">
					<label for="language"><strong>Select languages</strong></label>
					<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
					<div class="input-group">
						<select class="form-control" id="language">
							<?php
							foreach ($languages as $lang) {
								?>
								<option value="<?= $lang ?>"><?= $lang ?></option>
								<?php
							}
							?>
						</select>
						<div class="input-group-append">
							<button class="btn btn-success" type="button" onclick="add_language();"><span
									class="fas fa-plus"></span></button>
						</div>
					</div>
					<br>
					<table id="table_languages" class="table table-responsive-sm">
						<caption>List of Languages</caption>
						<thead>
						<tr>
							<th>Language</th>
							<th>Delete</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($project->get_languages() as $language) { ?>
							<tr>
								<td><?= $language ?></td>
								<td>
									<button class="btn btn-danger" onClick="delete_language($(this).parents('tr'));">
										<span class="far fa-trash-alt"></span>
									</button>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<br>
				<div class="col-sm-12 col-md-6">
					<label for="study_type"><strong>Select study type</strong></label>
					<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
					<div class="input-group">
						<select class="form-control" id="study_type">
							<?php
							foreach ($study_types as $types) {
								?>
								<option value="<?= $types ?>"><?= $types ?></option>
								<?php
							}
							?>
						</select>
						<div class="input-group-append">
							<button class="btn btn-success" type="button" onclick="add_study_type();"><span
									class="fas fa-plus"></span></button>
						</div>
					</div>
					<br>
					<table id="table_study_type" class="table table-responsive-sm">
						<caption>List of Study Type</caption>
						<thead>
						<tr>
							<th>Study Type</th>
							<th>Delete</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($project->get_study_types() as $types) { ?>
							<tr>
								<td><?= $types ?></td>
								<td>
									<button class="btn btn-danger" onClick="delete_study_type($(this).parents('tr'));">
										<span class="far fa-trash-alt"></span>
									</button>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="col-sm-12 col-md-6">
					<label for="keywords"><strong>Keywords</strong></label>
					<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
					<div class="input-group">
						<input type="text" class="form-control" id="keywords">
						<div class="input-group-append">
							<button class="btn btn-success" type="button" onclick="add_keywords();"><span
									class="fas fa-plus"></span></button>
						</div>
					</div>
					<br>
					<table id="table_keywords" class="table table-responsive-sm">
						<caption>List of Keywords</caption>
						<thead>
						<tr>
							<th>Keyword</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($project->get_keywords() as $keyword) { ?>
							<tr>
								<td><?= $keyword ?></td>
								<td>
									<button class="btn btn-warning opt"
											onClick="modal_keywords($(this).parents('tr'));">
										<span class="fas fa-edit"></span>
									</button>
									<button class="btn btn-danger" onClick="delete_keywords($(this).parents('tr'));">
										<span class="far fa-trash-alt"></span>
									</button>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="col-sm-12 col-md-4">
					<label for="start_date"><strong>Start and End Date</strong></label>
					<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
					<div class="input-group">
						<div class="input-group-prepend">
							<button class="btn btn-success"><span class="far fa-calendar-check "></span></button>
						</div>
						<input type="Date" id="start_date" class="form-control" title="Start Date"
							   value="<?= $project->get_start_date() ?>">
					</div>
					<div class="input-group">
						<button class="btn btn-danger"><span class="far fa-calendar-check "></span></button>
						<input type="Date" id="end_date" class="form-control" title="End Date"
							   value="<?= $project->get_end_date() ?>">
						<div class="input-group-append">
							<button class="btn btn-success" type="button" onclick="add_date()"><span
									class="fas fa-check"></span></button>
						</div>
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
				<label for="id_research_question"><strong>Research Questions</strong></label>
				<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
			</div>
			<div class="form-inline">
				<div class="input-group opt col-sm-12 col-md-2">
					<label for="id_research_question" class="col-md-12">ID</label>
					<input type="text" id="id_research_question" placeholder="ID"
						   class="form-control">
				</div>
				<div class="input-group opt  col-sm-12 col-md-8">
					<label for="description_research_question" class="col-md-12">Description</label>
					<input type="text" id="description_research_question" placeholder="Description"
						   class="form-control">
					<div class="input-group-append">
						<button class="btn btn-success" type="button" onclick="add_research_question();"><span
								class="fas fa-plus"></span></button>
					</div>
				</div>
			</div>
			<br>
			<table id="table_research_question" class="table table-responsive-sm">
				<caption>List of Research Questions</caption>
				<thead>
				<tr>
					<th>ID</th>
					<th>Research Question</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_research_questions() as $rq) { ?>
					<tr>
						<td><?= $rq->get_id() ?></td>
						<td><?= $rq->get_description() ?></td>
						<td>
							<button class="btn btn-warning opt"
									onClick="modal_research_question($(this).parents('tr'));">
								<span class="fas fa-edit"></span>
							</button>
							<button class="btn btn-danger opt"
									onClick="delete_research_question($(this).parents('tr'));">
								<span class="far fa-trash-alt"></span>
							</button>
						</td>
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
				<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
			</div>
			<div class="form-inline">
				<div class="input-group col-md-3">
					<label for="databases" class="opt col-sm-12">Database </label>
					<select class="form-control" id="databases">
						<?php foreach ($databases as $database) { ?>
							<option value="<?= $database->get_name() ?>"><?= $database->get_name() ?></option>
						<?php } ?>
					</select>
					<div class="input-group-append">
						<button class="btn btn-success" type="button" onclick="add_database();"><span
								class="fas fa-plus"></span></button>
					</div>
				</div>
			</div>
			<div class="form-inline">
				<div class="input-group col-md-4">
					<label for="new_database" class="opt col-sm-12">Other Database </label>
					<input type="text" class="form-control" id="new_database">
				</div>
				<div class="input-group col-md-4">
					<label for="new_database_link" class="opt col-sm-12">Other Database Link</label>
					<input type="text" class="form-control" id="new_database_link">
					<div class="input-group-append">
						<button class="btn btn-success" type="button" onclick="new_database();"><span
								class="fas fa-plus"></span></button>
					</div>
				</div>
			</div>
			<br>
			<table id="table_databases" class="table table-responsive-sm">
				<caption>List of Databases</caption>
				<thead>
				<tr>
					<th>Database</th>
					<th>Delete</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_databases() as $database) { ?>
					<tr>
						<td>
							<?= $database->get_name() ?>
						</td>
						<td>
							<button class="btn btn-danger" onClick="delete_database($(this).parents('tr'));">
								<span class="far fa-trash-alt"></span>
							</button>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<br>
			<div class="form-inline container justify-content-between">
				<a href="#tab_research" class="btn btn-secondary"><span class="fas fa-backward"></span> Previous</a>
				<a href="#tab_search_string" class="btn btn-secondary">Next <span
						class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container" id="tab_search_string">
			<div class="form-inline">
				<label for="term"><strong>Search String</strong></label>
				<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
			</div>
			<div class="form-inline">
				<div class="input-group col-md-4">
					<label for="term" class="col-sm-12">Term</label>
					<input type="text" class="form-control" id="term">
					<div class="input-group-append">
						<button class="btn btn-success" type="button" onclick="add_term();"><span
								class="fas fa-plus"></span></button>
					</div>
				</div>
			</div>
			<br>
			<div class="form-inline">
				<label for="list_term"><strong>Synonym</strong></label>
				<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
			</div>
			<div class="form-inline">
				<div class="input-group col-md-4">
					<label for="list_term" class="col-sm-12">Term</label>
					<select class="form-control" id="list_term">
						<?php foreach ($project->get_terms() as $term) { ?>
							<option value="<?= $term->get_description() ?>"><?= $term->get_description() ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="input-group col-md-6">
					<label for="list_term" class="col-sm-12">Synonym</label>
					<input type="text" class="form-control" placeholder="Add a Synonym to Term"
						   id="synonym">
					<div class="input-group-append">
						<button class="btn btn-success" type="button" onclick="add_synonym();"><span
								class="fas fa-plus"></span>
						</button>
					</div>
				</div>
			</div>
			<br>
			<table id="table_search_string" class="table table-responsive-sm">
				<caption>List of Term</caption>
				<thead>
				<tr>
					<th>Term</th>
					<th>Synonyms</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_terms() as $term) { ?>
					<tr>
						<td><?= $term->get_description() ?></td>
						<td>
							<table id="table_<?= $term->get_description() ?>" class="table">
								<th>Synonym</th>
								<th>Actions</th>
								<tbody>
								<?php foreach ($term->get_synonyms() as $synonym) { ?>
									<tr>
										<td><?= $synonym ?></td>
										<td>
											<button class="btn btn-warning opt" onClick="modal_synonym(this)">
												<span class="fas fa-edit"></span>
											</button>
											<button class="btn btn-danger" onClick="delete_synonym(this)">
												<span class="far fa-trash-alt"></span>
											</button>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</td>
						<td>
							<button class="btn btn-warning opt" onClick="modal_term($(this).parents('tr'))">
								<span class="fas fa-edit"></span>
							</button>
							<button class="btn btn-danger" onClick="delete_term($(this).parents('tr'));">
								<span class="far fa-trash-alt"></span>
							</button>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<br>
			<div id="strings">
				<div class="form-inline">
					<label><strong>Strings</strong></label>
					<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
				</div>
				<?php foreach ($project->get_search_strings() as $search_string) { ?>
					<div class="form-group" id="div_string_<?= $search_string->get_database() ?>">
						<label><?= $search_string->get_database() ?></label>
						<textarea class="form-control"
								  id="string_<?= $search_string->get_database() ?>"><?= $search_string->get_description() ?></textarea>
						<button type="button" class="btn btn-info opt"
								onclick="generate_string('<?= $search_string->get_database() ?>');">
							Generate
						</button>
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
				<label for="search_strategy"><strong>Search Strategy</strong></label>
				<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
			</div>
			<textarea rows="8" class="form-control"
					  id="search_strategy"><?= $project->get_search_strategy() ?></textarea>
			<button class="btn btn-success opt float-right" type="button" onclick="edit_search_strategy()">Save
			</button>
			<div class="form-inline container justify-content-between">
				<a href="#tab_search_string" class="btn btn-secondary"><span
						class="fas fa-backward"></span> Previous</a>
				<a href="#tab_criteria" class="btn btn-secondary opt">Next <span
						class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container" id="tab_criteria">
			<div class="form-inline">
				<label for="id_criteria"><strong>Criteria</strong></label>
				<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
			</div>
			<div class="form-inline">
				<div class="input-group col-md-2">
					<label for="id_criteria" class="col-sm-12 col-md-12">ID</label>
					<input type="text" id="id_criteria" placeholder="ID" class="form-control">
				</div>
				<div class="input-group col-md-6">
					<label for="description_criteria" class="col-sm-12 col-md-12">Description</label>
					<input type="text" id="description_criteria" placeholder="Description" class="form-control">
				</div>
				<div class="input-group col-md-3">
					<label for="" class="col-sm-12 col-md-12">Type</label>
					<select class="form-control" id="select_type">
						<option value="Inclusion">Inclusion</option>
						<option value="Exclusion">Exclusion</option>
					</select>
					<button class="btn btn-success" type="button" onclick="add_criteria()"><span
							class="fas fa-plus"></span></button>
				</div>
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
					<th>Delete</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_inclusion_criteria() as $ic) {
					if ($ic->get_pre_selected()) {
						$checked = 'checked';
					} else {
						$checked = '';
					}
					?>
					<tr>
						<td>
							<div class="form-check">
								<input id="selected_<?= str_replace(' ', '', $ic->get_id()); ?>"
									   type="checkbox" <?= $checked ?>
									   class="form-check-input"
									   onchange="select_criteria_inclusion($(this).parents('tr'))">
							</div>
						</td>
						<td><?= $ic->get_id() ?></td>
						<td><?= $ic->get_description() ?></td>
						<td>
							<button class="btn btn-warning opt"
									onClick="modal_criteria_inclusion($(this).parents('tr'))">
								<span class="fas fa-edit"></span>
							</button>
							<button class="btn btn-danger"
									onClick="delete_criteria_inclusion($(this).parents('tr'));">
								<span class="far fa-trash-alt"></span>
							</button>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<div class="input-group col-md-2">
				<label for="rule_inclusion" class="col-sm-12 col-md-12">Inclusion Rule</label>
				<select class="form-control col-sm-12 opt" id="rule_inclusion"
						onchange="edit_inclusion_rule();">
					<?php foreach ($rules as $rule) {
						$selected = "";
						if ($rule == $project->get_inclusion_rule()) {
							$selected = "selected";
						}
						?>
						<option <?= $selected ?> value="<?= $rule ?>"><?= $rule ?></option>
					<?php } ?>
				</select>
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
					<th>Delete</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_exclusion_criteria() as $ec) {
					if ($ec->get_pre_selected()) {
						$checked = 'checked';
					} else {
						$checked = '';
					}
					?>
					<tr>
						<td>
							<div class="form-check">
								<input id="selected_<?= str_replace(' ', '', $ec->get_id()) ?>"
									   type="checkbox" <?= $checked ?>
									   class="form-check-input"
									   onchange="select_criteria_exclusion($(this).parents('tr'))">
							</div>
						</td>
						<td><?= $ec->get_id() ?></td>
						<td><?= $ec->get_description() ?></td>
						<td>
							<button class="btn btn-warning opt"
									onClick="modal_criteria_exclusion($(this).parents('tr'))">
								<span class="fas fa-edit"></span>
							</button>
							<button class="btn btn-danger"
									onClick="delete_criteria_exclusion($(this).parents('tr'));">
								<span class="far fa-trash-alt"></span>
							</button>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<div class="input-group col-md-2">
				<label for="rule_exclusion" class="col-sm-12 col-md-12">Exclusion Rule</label>
				<select class="form-control col-sm-12 opt" id="rule_exclusion"
						onchange="edit_exclusion_rule();">
					<?php foreach ($rules as $rule) {
						$selected = "";
						if ($rule == $project->get_exclusion_rule()) {
							$selected = "selected";
						}
						?>
						<option <?= $selected ?> value="<?= $rule ?>"><?= $rule ?></option>
					<?php } ?>
				</select>
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
				<label for="start_interval"><strong>General Score</strong></label>
				<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
			</div>
			<div class="form-inline">
				<div class="input-group col-sm-12 col-md-3">
					<label for="start_interval" class="col-sm-12">General Score Interval</label>
					<input type="number" id="start_interval" class="form-control" step="0.5" placeholder="4.5"
						   min="0">
					<input type="number" id="end_interval" class="form-control" step="0.5" placeholder="5"
						   min="0.1">
				</div>
				<div class="input-group col-sm-12 col-md-5">
					<label for="general_score_desc" class="col-sm-12">General Score Description</label>
					<input type="text" id="general_score_desc" class="form-control" placeholder="Description">
					<div class="input-group-append">
						<button class="btn btn-success" type="button" onclick="add_general_quality_score();"><span
								class="fas fa-plus"></span></button>
					</div>
				</div>
			</div>
			<div class="input-group col-md-4">
				<label for="min_score_to_app" class="col-sm-12">Minimum General Score to Approve</label>
				<select class="form-control" id="min_score_to_app" onchange="edit_min_score();">
					<?php $mini = $project->get_score_min();
					foreach ($project->get_quality_scores() as $scores) {
						$selected = "";
						if ($mini != null) {
							if ($scores->get_description() == $mini->get_description()) {
								$selected = "selected";
							}
						} ?>
						<option <?= $selected ?>
							value="<?= $scores->get_description() ?>"><?= $scores->get_description() ?></option>
					<?php } ?>
				</select>
			</div>
			<br>
			<table id="table_general_score" class="table table-responsive-sm">
				<caption>List of General Score</caption>
				<thead>
				<tr>
					<th>Start Score Interval</th>
					<th>End Score Interval</th>
					<th>Score Description</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_quality_scores() as $score) { ?>
					<tr>
						<td><?= $score->get_start_interval() ?></td>
						<td><?= $score->get_end_interval() ?></td>
						<td><?= $score->get_description() ?></td>
						<td>
							<button class="btn btn-warning opt"
									onClick="modal_general_score($(this).parents('tr'))">
								<span class="fas fa-edit"></span>
							</button>
							<button class="btn btn-danger"
									onClick="delete_general_quality_score($(this).parents('tr'))">
								<span class="far fa-trash-alt"></span>
							</button>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<br>
			<div class="form-inline">
				<label for="id_qa"><strong>Question Quality</strong></label>
				<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
			</div>
			<div class="form-inline">
				<div class="input-group col-md-2">
					<label for="id_qa" class="col-sm-12">ID</label>
					<input type="text" class=" form-control" id="id_qa">
				</div>
				<div class="input-group col-md-7">
					<label for="desc_qa" class="col-sm-12">Description</label>
					<input type="text" class=" form-control" id="desc_qa">
				</div>
				<div class="input-group col-md-2">
					<label for="qa_weight" class="col-sm-12">Weight</label>
					<input type="number" class="form-control" id="weight_qa" step="0.5">
					<div class="input-group-append">
						<button class="btn btn-success" type="button" onclick="add_qa()"><span
								class="fas fa-plus"></span></button>
					</div>
				</div>
			</div>
			<br>
			<div class="form-inline">
				<label for="list_qa"><strong>Question Score</strong></label>
				<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
			</div>
			<div class="form-inline">
				<div class="input-group col-md-2">
					<label for="list_qa" class="col-sm-12">Question</label>
					<select class="form-control" id="list_qa">
						<?php foreach ($project->get_questions_quality() as $qa) { ?>
							<option value="<?= $qa->get_id() ?>"><?= $qa->get_id() ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="input-group col-md-2">
					<label for="score_rule" class="col-sm-12">Score Rule</label>
					<input type="text" class=" form-control" id="score_rule">
				</div>
				<div class="input-group col-md-2">
					<label for="score" id="lbl_score" class="col-sm-12">Score: 50%</label>
					<input type="range" min="0" max="100" class="form-control-range" id="score" step="5"
						   oninput="update_text_score(this.value)" onchange="update_text_score(this.value)"">
				</div>

				<div class="input-group col-md-6">
					<label for="desc_score" class="col-sm-12">Description</label>
					<input type="text" class=" form-control" id="desc_score">
					<div class="input-group-append">
						<button class="btn btn-success" type="button" onclick="add_score_quality()"><span
								class="fas fa-plus"></span></button>
					</div>
				</div>

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
					<th>Actions</th>
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
								<th>Actions</th>
								<tbody>
								<?php foreach ($qa->get_scores() as $sc) { ?>
									<tr>
										<td><?= $sc->get_score_rule(); ?></td>
										<td><?= $sc->get_score(); ?>%</td>
										<td><?= $sc->get_description(); ?></td>
										<td>
											<button class="btn btn-warning opt" onClick="modal_score_quality(this)">
												<span class="fas fa-edit"></span>
											</button>
											<button class="btn btn-danger" onClick="delete_score_quality(this)">
												<span class="far fa-trash-alt"></span>
											</button>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</td>
						<td><?= $qa->get_weight() ?></td>
						<td>
							<select class="form-control" id="min_to_<?= $qa->get_id(); ?>"
									data-qa="<?= $qa->get_id(); ?>" onchange="edit_min_score_qa(this)">
								<option value=""></option>
								<?php
								$min = $qa->get_min_to_approve();
								foreach ($qa->get_scores() as $sc) {
									$selected = "";
									if (!is_null($min)) {
										if ($sc->get_score_rule() == $min->get_score_rule()) {
											$selected = "selected";
										}
									}
									?>
									<option <?= $selected ?>
										value="<?= $sc->get_score_rule() ?>"><?= $sc->get_score_rule() ?></option>
								<?php } ?>
							</select>
						</td>
						<td>
							<button class="btn btn-warning opt" onClick="modal_qa($(this).parents('tr'))">
								<span class="fas fa-edit"></span>
							</button>
							<button class="btn btn-danger" onClick="delete_qa($(this).parents('tr'));">
								<span class="far fa-trash-alt"></span>
							</button>
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
				<label for="id_data_extraction"><strong>Data Extraction</strong></label>
				<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
			</div>
			<div class="form-inline">
				<div class="input-group col-md-2">
					<label for="id_data_extraction" class="col-sm-12">ID</label>
					<input type="text" class=" form-control" id="id_data_extraction">
				</div>
				<div class="input-group col-md-7">
					<label for="desc_data_extraction" class="col-sm-12">Description</label>
					<input type="text" class=" form-control" id="desc_data_extraction">
				</div>
				<div class="input-group col-md-3">
					<label for="type_data_extraction" class="col-sm-12">Type of Data</label>
					<select class="form-control" id="type_data_extraction">
						<?php foreach ($question_types as $type) { ?>
							<option value="<?= $type ?>"><?= $type ?></option>
						<?php } ?>
					</select>
					<div class="input-group-append">
						<button class="btn btn-success" type="button" onclick="add_question_extraction();"><span
								class="fas fa-plus"></span></button>
					</div>
				</div>
			</div>
			<br>
			<div class="form-inline">
				<label for="list_qde"><strong>Option</strong></label>
				<a href="#" class="float-right opt"><i class="fas fa-question-circle "></i></a>
			</div>
			<div class="form-inline">
				<div class="input-group col-md-2">
					<label for="list_qde" class="col-sm-12">Question</label>
					<select class="form-control" id="list_qde">
						<?php foreach ($project->get_questions_extraction() as $qe) {
							if ($qe->get_type() != "Text") { ?>
								<option value="<?= $qe->get_id(); ?>"><?= $qe->get_id(); ?></option>
							<?php }
						} ?>
					</select>
				</div>
				<div class="input-group col-md-7">
					<label for="desc_op" class="col-sm-12">Option</label>
					<input type="text" class=" form-control" id="desc_op">
					<div class="input-group-append">
						<button class="btn btn-success" type="button" onclick="add_option();"><span
								class="fas fa-plus"></span></button>
					</div>
				</div>
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
					<th>Actions</th>
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
								<th>Actions</th>
								<tbody>
								<?php foreach ($qe->get_options() as $op) { ?>
									<tr>
										<td><?= $op ?></td>
										<td>
											<button class="btn btn-warning opt" onClick="modal_option(this)">
												<span class="fas fa-edit"></span>
											</button>
											<button class="btn btn-danger" onClick="delete_option(this)">
												<span class="far fa-trash-alt"></span>
											</button>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
							</td>
						<?php } ?>
						<td>
							<button class="btn btn-warning opt" onClick="modal_extraction($(this).parents('tr'));"><span
									class="fas fa-edit"></span>
							</button>
							<button class="btn btn-danger" onClick="delete_extraction($(this).parents('tr'));"><span
									class="far fa-trash-alt"></span>
							</button>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<br>
			<div class="form-inline container justify-content-between">
				<a href="#tab_quality" class="btn btn-secondary"><span class="fas fa-backward"></span> Previous</a>
				<a href="#tab_export_planning" class="btn btn-secondary <?= $disable ?>" onclick="export_to_doc();">Next <span
						class="fas fa-forward"></span></a>
			</div>
		</div>
		<div class="tab-pane container" id="tab_export_planning">
			<div class="form-inline">
				<a href="<?= base_url('export/P' . $project->get_id() . '.docx') ?>" id="btn_export_planning"
				   class="btn btn-success opt">Export to Doc</a>
			</div>
		</div>
	</div>
	<br>
</div>
