<script src="<?= base_url('assets/js/bibupload.js'); ?>"></script>
<div class="card">
	<div class="text-center card-header">
		<h4><?= $project->get_title(); ?></h4>
		<input type="hidden" id="id_project" value="<?= $project->get_id(); ?>">
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
		<h4>Conducting</h4>
		<?php
		if (strval($progress_planning['progress']) == strval(100)) {
			?>
			<ul class="nav nav-pills nav-justified">
				<li class="nav-item">
					<a class="nav-link active"
					   href="<?= base_url('conducting/' . $project->get_id()) ?>">Import Studies</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('study_selection/' . $project->get_id()) ?>">Study
						Selection</a>
				</li>
				<li class="nav-item">
					<a class="nav-link"
					   href="<?= base_url('quality_assessement/' . $project->get_id()) ?>">Quality
						Assessment</a>
				</li>
				<li class="nav-item">
					<a class=" nav-link" href="<?= base_url('data_extraction/' . $project->get_id()) ?>">Data
						Extraction</a>
				</li>
			</ul>
			<br>
			<div class="form-inline">
				<label for="database_import"><strong>Import Studies</strong></label>
				<a class="float-right opt"><i class="fas fa-question-circle "></i></a>
			</div>
			<div class="form-inline">
				<div class="input-group col-md-3">
					<label for="database_import" class="col-sm-12">Database</label>
					<select class="form-control" id="database_import">
						<?php foreach ($project->get_databases() as $database) { ?>
							<option><?= $database->get_name() ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="input-group col-md-5">
					<label for="upload_bib" class="col-sm-12">Choose file</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="upload_bib" accept=".bib,.csv">
						<label class="custom-file-label" id="name_bib_upload" for="upload_bib"></label>
					</div>
				</div>
			</div>
			<br>
			<table id="table_imported_studies" class="table table-responsive-sm">
				<caption>List of Imports of Data Tables</caption>
				<thead>
				<tr>
					<th>Database</th>
					<th>Imported Studies</th>
					<th>Files Imported</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_databases() as $database) { ?>
					<tr>
						<td><?= $database->get_name() ?></td>
						<td><?= $num_papers[$database->get_name()] ?></td>
						<td>
							<table id="table_<?= $database->get_name() ?>" class="table">
								<th>File</th>
								<th>Delete</th>
								<tbody>
								<?php foreach ($bib[$database->get_name()] as $b) { ?>
									<tr>
										<td><?= $b ?></td>
										<td>
											<button class="btn btn-danger" onClick="delete_bib(this)">
												<span class="far fa-trash-alt"></span>
											</button>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<?php
		} else {
			?>
			<div class="alert alert-warning container alert-dismissible fade show" role="alert">
				<h5>Complete Planning</h5>
				<ul>
					<?php
					foreach ($progress_planning['errors'] as $error) {
						?>
						<li><?= $error ?></li>
						<?php
					}
					?>
				</ul>
			</div>
			<?php
		}
		?>
	</div>
</div>
