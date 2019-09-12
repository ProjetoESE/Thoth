<div class="card">
	<div class="text-center card-header">
		<h4><?= $project->get_title(); ?></h4>
		<input type="hidden" id="id_project" value="<?= $project->get_id(); ?>">
		<a href="<?= base_url('open/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Overview <i class="fas fa-binoculars"></i></a>
		<a href="<?= base_url('planning/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Planning <i class="fas fa-list"></i></a>
		<?php if ($this->session->level == "4") { ?>
			<a href="<?= base_url('study_selection_adm/' . $project->get_id()) ?>"
			   class="btn form-inline btn-primary opt">Conducting <i class="fas fa-play-circle"></i></a>
		<?php } else { ?>
			<a href="<?= base_url('conducting/' . $project->get_id()) ?>"
			   class="btn form-inline btn-primary opt">Conducting <i class="fas fa-play-circle"></i></a>
		<?php } ?>
		<a href="<?= base_url('reporting/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Reporting <i class="fas fa-chart-line"></i></a>
		<?php
		if ($project->get_planning() == 100) {
			?>
			<a href="<?= base_url('export/' . $project->get_id()) ?>"
			   class="btn form-inline btn-outline-primary opt">Export <i class="fas fa-file-download"></i></a>
			<?php
		}
		?>
	</div>
	<div class="card-body">
		<h4>Conducting</h4>
		<ul class="nav nav-pills nav-justified flex-column flex-sm-row">
			<?php if ($this->session->level != "4") { ?>
				<li class="nav-item">
					<a class="nav-link flex-sm-fill text-sm-center"
					   href="<?= base_url('conducting/' . $project->get_id()) ?>">Import Studies <i class="fas fa-upload"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link flex-sm-fill text-sm-center" href="<?= base_url('study_selection/' . $project->get_id()) ?>">Study
						Selection <i class="fas fa-clipboard-check"></i></a>
				</li>
			<?php } ?>
			<?php if ($this->session->level == "4") { ?>
				<li class="nav-item">
					<a class="nav-link flex-sm-fill text-sm-center" href="<?= base_url('study_selection_adm/' . $project->get_id()) ?>">Review
						Study
						Selection <i class="fas fa-book-reader"></i></a>
				</li>
			<?php } ?>
			<?php if ($this->session->level != "4") { ?>
				<li class="nav-item">
					<a class="nav-link flex-sm-fill text-sm-center"
					   href="<?= base_url('quality_assessment/' . $project->get_id()) ?>">Quality
						Assessment <i class="fas fa-star-half-alt"></i></a>
				</li>
			<?php } ?>
			<?php if ($this->session->level == "4") { ?>
				<li class="nav-item">
					<a class="nav-link flex-sm-fill text-sm-center" href="<?= base_url('quality_adm/' . $project->get_id()) ?>">Review
						Quality Assessment <i class="fas fa-book-reader"></i></a>
				</li>
			<?php } ?>
			<?php if ($this->session->level != "4") { ?>
				<li class="nav-item">
					<a class=" nav-link active flex-sm-fill text-sm-center" href="<?= base_url('data_extraction/' . $project->get_id()) ?>">Data
						Extraction <i class="fas fa-table"></i></a>
				</li>
			<?php } ?>
		</ul>
		<br>
		<label><strong>Data Extraction</strong></label>
		<br>
		<?php
		if ($project->get_planning() == 100 && $project->get_import() == 100 && $project->get_selection() > 0 && $project->get_quality() > 0) {
			$done = number_format((float)($count_papers[1] * 100) / $count_papers[4], 2);
			$to_do = number_format((float)($count_papers[2] * 100) / $count_papers[4], 2);
			$rem = number_format((float)($count_papers[3] * 100) / $count_papers[4], 2)

			?>
			<h6>Progress Data Extraction</h6>
			<div class="progress">
				<div id="prog_done" class="progress-bar bg-success" role="progressbar"
					 style="width: <?= $done ?>%"
					 aria-valuenow="<?= $done ?>"
					 aria-valuemin="0"
					 aria-valuemax="100"><?= $done ?>%
				</div>
				<div id="prog_to_do" class="progress-bar bg-dark" role="progressbar"
					 style="width: <?= $to_do ?>%"
					 aria-valuenow="<?= $to_do ?>"
					 aria-valuemin="0"
					 aria-valuemax="100"><?= $to_do ?>%
				</div>
				<div id="prog_rem_ex" class="progress-bar bg-info" role="progressbar"
					 style="width: <?= $rem ?>%"
					 aria-valuenow="<?= $rem ?>"
					 aria-valuemin="0"
					 aria-valuemax="100"><?= $rem ?>%
				</div>
			</div>
			<br>
			<div class="form-inline">
				<?php
				foreach ($count_papers as $key => $value) {
					switch ($key) {
						case 1:
							?>
							<div class="input-group col-md-2">
								<label class="text-success">
									<span class="fas fa-check fa-lg"></span>
									Done: <span id="count_done"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
						case 2:
							?>
							<div class="input-group col-md-2">
								<label class="text-dark">
									<span class="fas fa-times fa-lg"></span>
									To Do: <span id="count_to_do"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
						case 3:
							?>
							<div class="input-group col-md-2">
								<label class="text-info">
									<span class="fas fa-trash-alt fa-lg"></span>
									Removed: <span id="count_rem_ex"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
						case 4:
							?>
							<div class="input-group col-md-2">
								<label class="text-secondary">
									<span class="fas fa-bars fa-lg"></span>
									Total: <span id="count_total_ex"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
					}
				}
				?>
			</div>
			<br>
			<table class="table table-responsive-sm" id="table_papers_extraction">
				<caption>List of Papers for Data Extraction</caption>
				<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Author</th>
					<th>Year</th>
					<th>Database</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_papers() as $paper) { ?>
					<tr>
						<td><?= $paper->get_id() ?></td>
						<td><?= $paper->get_title() ?></td>
						<td><?= $paper->get_author() ?></td>
						<td><?= $paper->get_year() ?></td>
						<td><?= $paper->get_database() ?></td>
						<?php
						$class = "text-dark";
						$status = "To Do";
						switch ($paper->get_status_extraction()) {
							case 1:
								$class = "text-success";
								$status = "Done";
								break;
							case 3:
								$class = "text-info";
								$status = "Removed";
								break;
						} ?>
						<td id="<?= $paper->get_id(); ?>" class="font-weight-bold <?= $class ?>"><?= $status ?></td>
					</tr>
				<?php } ?>
				</tbody>
				<tfoot>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Author</th>
					<th>Year</th>
					<th>Database</th>
					<th>Status</th>
				</tr>
				</tfoot>
			</table>
			<?php
		} else {
			?>
			<div class="alert alert-warning container-fluid alert-dismissible fade show" role="alert">
				<h5>Complete these tasks to advance</h5>
				<ul>
					<?php
					foreach ($project->get_errors() as $error) {
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
<?php
$this->load->view('modal/modal_paper_extraction');
?>
