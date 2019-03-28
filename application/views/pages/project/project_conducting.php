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
		<label for="database_import"><strong>Import Studies</strong></label>
		<div class="form-inline">
			<label for="database_import" class="col-sm-12 col-md-2">Database</label>
		</div>
		<div class="row">
			<div class="input-group col-md-3">
				<select class="form-control" id="database_import">
					<?php foreach ($project->get_databases() as $database) { ?>
						<option><?= $database->get_name() ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="input-group col-md-3">
				<a class="btn btn-outline-primary"><span class="fas fa-file-upload "></span> BibTex File Upload</a>
			</div>
			<div class="input-group col-md-3">
				<a class="btn btn-outline-primary"><span class="fas fa-search"></span> Automated Search</a>
			</div>
			<div class="input-group col-md-3">
				<a class="btn btn-outline-primary"><span class="fas fa-copy"></span> Check for Duplicates</a>
			</div>
		</div>
		<br>
		<table id="table_imported_studies" class="table">
			<caption>List of Imports of Data Tables</caption>
			<thead>
			<tr>
				<th>Database</th>
				<th>Imported Studies</th>
				<th>Delete Studies</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>Scopus</td>
				<td>1542</td>
				<td>
					<button class="btn btn-danger"><span class="far fa-trash-alt"></span></button>
				</td>
			</tr>
			<tr>
				<td>IEEE</td>
				<td>1000</td>
				<td>
					<button class="btn btn-danger"><span class="far fa-trash-alt"></span></button>
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
