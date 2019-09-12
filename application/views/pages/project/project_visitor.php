<div class="card">
	<div class="text-center card-header">
		<h4><?= $project->get_title(); ?></h4>
		<input type="hidden" id="id_project" value="<?= $project->get_id(); ?>">
		<a href="<?= base_url('open/' . $project->get_id()) ?>"
		   class="btn form-inline btn-primary opt">Overview <i class="fas fa-binoculars"></i></a>

		<a href="<?= base_url('planning/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Planning <i class="fas fa-list"></i></a>


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
		<h4>Review</h4>
		<div class="row">
			<div class="col-sm-12 col-md-4">
				<h5><i class="fas fa-align-justify opt fa-2x"></i> Description</h5>
				<p><?= $project->get_description(); ?></p>
			</div>
			<div class="col-sm-12 col-md-4">
				<h5><i class="fas fa-bullseye opt fa-2x"></i> Objectives</h5>
				<p><?= $project->get_objectives(); ?></p>
			</div>
			<div class="col-sm-12 col-md-4">
				<h5><i class="fas fa-users opt fa-2x"></i> Members</h5>
				<ul>
					<?php foreach ($project->get_members() as $member) { ?>
						<li>
							<?= $member->get_name() . " - " . $member->get_level(); ?>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h5><i class="fas fa-tasks opt fa-2x"></i> Progress of Systematic Review</h5>
				<div class="text-center">
					<h6>Planning</h6>
					<div class="form-inline">
						<div class="col-md-12">
							<div class="progress">
								<div class="progress-bar bg-success" role="progressbar"
									 style="width: <?= $project->get_planning() ?>%"
									 aria-valuenow="<?= $project->get_planning() ?>" aria-valuemin="0"
									 aria-valuemax="100"><?= $project->get_planning() ?>%
								</div>
							</div>
						</div>
					</div>
					<h6>Import Studies</h6>
					<div class="form-inline">
						<div class="col-md-12">
							<div class="progress">
								<div class="progress-bar bg-info" role="progressbar"
									 style="width: <?= $project->get_import() ?>%"
									 aria-valuenow="<?= $project->get_import() ?>" aria-valuemin="0"
									 aria-valuemax="100">
									<?= $project->get_import() ?>%
								</div>
							</div>
						</div>
					</div>
					<h6>Study Selection</h6>
					<div class="form-inline">
						<div class="col-md-12">
							<div class="progress">
								<div class="progress-bar bg-warning" role="progressbar"
									 style="width: <?= $project->get_selection() ?>%"
									 aria-valuenow="<?= $project->get_selection() ?>" aria-valuemin="0"
									 aria-valuemax="100">
									<?= $project->get_selection() ?>%
								</div>
							</div>
						</div>
					</div>
					<h6>Quality Assessment</h6>
					<div class="form-inline">
						<div class="col-md-12">
							<div class="progress">
								<div class="progress-bar bg-secondary" role="progressbar"
									 style="width: <?= $project->get_quality() ?>%"
									 aria-valuenow="<?= $project->get_quality() ?>" aria-valuemin="0"
									 aria-valuemax="100">
									<?= $project->get_quality() ?>%
								</div>
							</div>
						</div>
					</div>
					<h6>Data Extraction</h6>
					<div class="form-inline">
						<div class="col-sm-12">
							<div class="progress">
								<div class="progress-bar bg-danger" role="progressbar"
									 style="width: <?= $project->get_extraction() ?>%"
									 aria-valuenow="<?= $project->get_extraction() ?>" aria-valuemin="0"
									 aria-valuemax="100"><?= $project->get_extraction() ?>%
								</div>
							</div>
						</div>
					</div>
				</div>
				</br>
			</div>
			<div class="col-sm-12 col-md-6">
				<h5><i class="fas fa-history opt fa-2x"></i> Activity Record</h5>
				<div class="scroll">
					<?php foreach ($logs as $log) { ?>
						<div class="card">
							<div class="card-header">
								<?= $log['name']; ?>
							</div>
							<div class="card-body">
								<?= $log['activity']; ?>
							</div>
							<div class="card-footer">
								<small class="text-muted"><?= $log['time']; ?></small>
							</div>
						</div>
						<br>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

