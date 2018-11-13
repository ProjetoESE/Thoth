<div class="card">
	<div class="text-center card-header">
		<h4>Projeto 01</h4>
		<a href="<?= base_url('project_controller/open/1') ?>"
		   class="btn form-inline btn-outline-primary opt">Review</a>
		<a href="<?= base_url('project_controller/planning/1') ?>" class="btn form-inline btn-outline-primary opt">Planning</a>
		<a href="<?= base_url('project_controller/conducting/1') ?>" class="btn form-inline btn-outline-primary opt">Conducting</a>
		<a href="<?= base_url('project_controller/reporting/1') ?>" class="btn form-inline btn-outline-primary opt">Reporting</a>
	</div>
	<div class="card-body">
		<h4>Conducting</h4>
		<ul class="nav nav-pills nav-justified">
			<li class="nav-item">
				<a class="nav-link active" href="<?= base_url('project_controller/conducting/1') ?>">Import Studies</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('project_controller/study_selection/1') ?>">Study Selection</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('project_controller/quality_assessement/1') ?>">Quality
					Assessement</a>
			</li>
			<li class="nav-item">
				<a class=" nav-link" href="<?= base_url('project_controller/data_extraction/1') ?>">Data Extraction</a>
			</li>
		</ul>
		<br>
		<label for="database_import"><strong>Import Studies</strong></label>
		<div class="form-inline">
			<label for="database_import" class="col-sm-12 col-md-4">Database</label>
		</div>
		<div class="row">
			<div class="input-group col-md-4">
				<select class="form-control" id="database_import">
					<option>Scopus</option>
					<option>IEEE</option>
					<option>Spring</option>
				</select>
			</div>
			<div class="input-group col-md-2">
				<a class="btn btn-outline-primary"><span class="fas fa-file-upload "></span> BibTex File Upload</a>
			</div>
			<div class="input-group col-md-2">
				<a class="btn btn-outline-primary"><span class="fas fa-search"></span> Automated Search</a>
			</div>
		</div>
		<br>
		<table id="table_imported_studies" class="table">
			<caption>List of Imports of Datatables</caption>
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
