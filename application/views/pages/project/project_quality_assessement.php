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
				<a class="nav-link" href="<?= base_url('project_controller/conducting/1') ?>">Import Studies</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('project_controller/study_selection/1') ?>">Study Selection</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="<?= base_url('project_controller/quality_assessement/1') ?>">Quality
					Assessement</a>
			</li>
			<li class="nav-item">
				<a class=" nav-link" href="<?= base_url('project_controller/data_extraction/1') ?>">Data Extraction</a>
			</li>
		</ul>
		<br>
		<label><strong>Quality Assessement</strong></label>
		<br>
		<div class="form-inline">
			<div class="input-group col-md-3">
				<label class="text-success">
					<span class="fas fa-check fa-lg"></span>
					Accepted: 1
				</label>
			</div>
			<div class="input-group col-md-3">
				<label class="text-danger">
					<span class="fas fa-times fa-lg"></span>
					Rejected: 1
				</label>
			</div>
			<div class="input-group col-md-3">
				<label class="text-info">
					<span class="fas fa-bars fa-lg"></span>
					Total: 2
				</label>
			</div>
		</div>
		<br>
		<table class="table" id="table_papers_quality">
			<caption>List of Papers for Quality Assessment</caption>
			<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Year</th>
				<th>Score</th>
				<th>Status</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>69</td>
				<td>A novel on-die GHz AC stress test methodology for high speed IO application</td>
				<td>2017</td>
				<td>0.0</td>
				<td class="text-dark">Unclassified</td>
			</tr>
			<tr>
				<td>65</td>
				<td>A IPv6 Network Performance Test System using Multi-Agent</td>
				<td>2007</td>
				<td>3.5</td>
				<td class="text-dark">Unclassified</td>
			</tr>
			</tbody>
			<tfoot>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Year</th>
				<th>Score</th>
				<th>Status</th>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
