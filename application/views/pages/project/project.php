<div class="card">
	<div class="text-center card-header">
		<h4><?= $project->get_title(); ?></h4>
		<input type="hidden" id="id_project" value="<?= $project->get_id(); ?>">
		<a href="<?= base_url('project_controller/open/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Review</a>
		<a href="<?= base_url('project_controller/planning/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Planning</a>
		<a href="<?= base_url('project_controller/conducting/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Conducting</a>
		<a href="<?= base_url('project_controller/reporting/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Reporting</a>
	</div>
	<div class="card-body">
		<h4>Review</h4>
		<div class="row">
			<div class="col-sm-12 col-md-4">
				<div class="form-inline">
					<i class="fas fa-align-justify opt fa-2x"></i>
					<h5>Description</h5>
				</div>
				<p><?= $project->get_description(); ?></p>
			</div>
			<div class="col-sm-12 col-md-4">
				<div class="form-inline">
					<i class="fas fa-bullseye opt fa-2x"></i>
					<h5>Objectives</h5>
				</div>
				<p><?= $project->get_objectives(); ?></p>
			</div>
			<div class="col-sm-12 col-md-4">
				<div class="form-inline">
					<i class="fas fa-users opt fa-2x"></i>
					<h5>Members</h5>
				</div>
				<ul>
					<?php foreach ($project->get_members() as $member) { ?>
						<li>
							<?= $member ?>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-inline">
					<span class="fas fa-recycle opt fa-2x"></span>
					<h5>Systematic Review Process</h5>
				</div>
				<div class="text-center">
					<img src="<?= base_url('assets/img/slr_process.png'); ?>" class="img-thumbnail">
				</div>
			</div>
		</div>
	</div>
</div>

