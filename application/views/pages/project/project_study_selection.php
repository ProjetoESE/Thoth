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
					<a class="nav-link active flex-sm-fill text-sm-center" href="<?= base_url('study_selection/' . $project->get_id()) ?>">Study
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
			<li class="nav-item">
				<a class=" nav-link flex-sm-fill text-sm-center" href="<?= base_url('data_extraction/' . $project->get_id()) ?>">Data
					Extraction <i class="fas fa-table"></i></a>
			</li>
		</ul>
		<br>
		<div class="form-inline">
			<label for="id_qa"><strong>Study Selection</strong></label>
			<a class="float-right opt"><i
					class="fas fa-question-circle "></i></a>
		</div>
		<br>
		<?php
		if ($project->get_planning() == 100 && $project->get_import() == 100) {

			$acc = number_format((float)($count_papers[1] * 100) / $count_papers[6], 2);
			$rej = number_format((float)($count_papers[2] * 100) / $count_papers[6], 2);
			$unc = number_format((float)($count_papers[3] * 100) / $count_papers[6], 2);
			$dup = number_format((float)($count_papers[4] * 100) / $count_papers[6], 2);
			$rem = number_format((float)($count_papers[5] * 100) / $count_papers[6], 2)

			?>
			<h6>Progress Study Selection</h6>
			<div class="progress">
				<div id="prog_acc" class="progress-bar bg-success" role="progressbar"
					 style="width: <?= $acc ?>%"
					 aria-valuenow="<?= $acc ?>"
					 aria-valuemin="0"
					 aria-valuemax="100"><?= $acc ?>%
				</div>
				<div id="prog_rej" class="progress-bar bg-danger" role="progressbar"
					 style="width: <?= $rej ?>%"
					 aria-valuenow="<?= $rej ?>"
					 aria-valuemin="0"
					 aria-valuemax="100"><?= $rej ?>%
				</div>
				<div id="prog_unc" class="progress-bar bg-dark" role="progressbar"
					 style="width: <?= $unc ?>%"
					 aria-valuenow="<?= $unc ?>"
					 aria-valuemin="0"
					 aria-valuemax="100"><?= $unc ?>%
				</div>
				<div id="prog_dup" class="progress-bar bg-warning" role="progressbar"
					 style="width: <?= $dup ?>%"
					 aria-valuenow="<?= $dup ?>"
					 aria-valuemin="0"
					 aria-valuemax="100"><?= $dup ?>%
				</div>
				<div id="prog_rem" class="progress-bar bg-info" role="progressbar"
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
									Accepted: <span id="count_acc"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
						case 2:
							?>
							<div class="input-group col-md-2">
								<label class="text-danger">
									<span class="fas fa-times fa-lg"></span>
									Rejected: <span id="count_rej"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
						case 3:
							?>
							<div class="input-group col-md-2">
								<label class="text-dark">
									<span class="fas fa-question fa-lg"></span>
									Unclassified: <span id="count_unc"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
						case 4:
							?>
							<div class="input-group col-md-2">
								<label class="text-warning">
									<span class="fas fa-copy fa-lg"></span>
									Duplicate: <span id="count_dup"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
						case 5:
							?>
							<div class="input-group col-md-2">
								<label class="text-info">
									<span class="fas fa-trash-alt fa-lg"></span>
									Removed: <span id="count_rem"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
						case 6:
							?>
							<div class="input-group col-md-2">
								<label class="text-secondary">
									<span class="fas fa-bars fa-lg"></span>
									Total: <span id="count_total"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
					}
				}
				?>
			</div>
			<br>
			<table class="table table-responsive-sm" id="table_papers">
				<caption>List of Papers Imported</caption>
				<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<?php foreach ($project->get_inclusion_criteria() as $ic) { ?>
						<th><?= $ic->get_id() ?></th>
					<?php } ?>
					<?php foreach ($project->get_exclusion_criteria() as $ec) { ?>
						<th><?= $ec->get_id() ?></th>
					<?php } ?>
					<th>Database</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($project->get_papers() as $paper) { ?>
					<tr>
						<td><?= $paper->get_id(); ?></td>
						<td><?= $paper->get_title(); ?></td>

						<?php
						$cs = $criterias[$paper->get_id()];
						foreach ($project->get_inclusion_criteria() as $ic) { ?>
							<td><?= $cs[$ic->get_id()] =="True"?"<i class=\"fas fa-check text-success\"></i> True":"<i class=\"fas fa-times text-danger\"></i> False" ?></td>
						<?php } ?>
						<?php foreach ($project->get_exclusion_criteria() as $ec) { ?>
							<td><?= $cs[$ec->get_id()] =="True"?"<i class=\"fas fa-check text-success\"></i> True":"<i class=\"fas fa-times text-danger\"></i> False" ?></td>
						<?php } ?>
						<td><?= $paper->get_database(); ?></td>
						<?php
						$class = "text-dark";
						$status = "Unclassified";
						switch ($paper->get_status_selection()) {
							case 1:
								$class = "text-success";
								$status = "Accepted";
								break;
							case 2:
								$class = "text-danger";
								$status = "Rejected";
								break;
							case 4:
								$class = "text-warning";
								$status = "Duplicate";
								break;
							case 5:
								$class = "text-info";
								$status = "Removed";
								break;
						} ?>
						<td id="<?= $paper->get_id(); ?>" class="font-weight-bold <?= $class ?>"><?= $status ?></td>
					</tr>
				<?php } ?>
				<tfoot>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<?php foreach ($project->get_inclusion_criteria() as $ic) { ?>
						<th><?= $ic->get_id() ?></th>
					<?php } ?>
					<?php foreach ($project->get_exclusion_criteria() as $ec) { ?>
						<th><?= $ec->get_id() ?></th>
					<?php } ?>
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
		<?php }
		?>
	</div>
</div>
<?php
$this->load->view('modal/modal_paper_selection');
?>
