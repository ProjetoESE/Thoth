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
				<a class="nav-link "
				   href="<?= base_url('conducting/' . $project->get_id()) ?>">Import Studies</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="<?= base_url('study_selection/' . $project->get_id()) ?>">Study
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
		<label for="id_qa"><strong>Study Selection</strong></label>
		<br>
		<?php
		if (strval($progress_planning['progress']) == strval(100) && strval($progress_import_studies['progress']) == strval(100)) {
			?>
			<div class="form-inline">
				<div class="input-group col-md-3">
					<label class="text-success">
						<span class="fas fa-check fa-lg"></span>
						Accepted: 1
					</label>
				</div>
				<div class="input-group col-md-3 ">
					<label class="text-danger">
						<span class="fas fa-times fa-lg"></span>
						Rejected: 1
					</label>
				</div>
				<div class="input-group col-md-3">
					<label class="text-dark">
						<span class="fas fa-question fa-lg"></span>
						Unclassified: 1
					</label>
				</div>
				<div class="input-group col-md-3">
					<label class="text-info">
						<span class="fas fa-bars fa-lg"></span>
						Total: 3
					</label>
				</div>
			</div>
			<br>
			<table class="table table-responsive" id="table_papers">
				<caption>List of Papers Imported</caption>
				<thead>
				<tr>
					<th>Title</th>
					<th>Author</th>
					<th>Year</th>
					<th>Database</th>
					<th>Status</th>
					<th>Delete</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_papers() as $paper) { ?>
					<tr>
						<td><?=$paper->get_title();?></td>
						<td><?= $paper->get_author(); ?></td>
						<td><?= $paper->get_year(); ?></td>
						<td><?= $paper->get_added_at(); ?></td>
						<td><?= $paper->get_status_selection(); ?></td>
						<td>
							<button class="btn btn-danger">
								<span class="far fa-trash-alt"></span>
							</button>
						</td>
					</tr>
				<?php } ?>
				<tfoot>
				<tr>
					<th>Title</th>
					<th>Author</th>
					<th>Year</th>
					<th>Database</th>
					<th>Status</th>
					<th>Delete</th>
				</tr>
				</tfoot>
			</table>
			<?php
		} else {
			if (sizeof($progress_planning['errors']) > 0) {
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
			<?php }
			if (sizeof($progress_import_studies['errors']) > 0) { ?>
				<div class="alert alert-warning container alert-dismissible fade show" role="alert">
					<h5>Complete Import Studies</h5>
					<ul>
						<?php
						foreach ($progress_import_studies['errors'] as $error) {
							?>
							<li><?= $error ?></li>
							<?php
						}
						?>
					</ul>
				</div>
				<?php
			}
		}
		?>
	</div>
</div>
<?php
$this->load->view('modal/modal_paper');
?>
