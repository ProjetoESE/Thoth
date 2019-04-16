<div class="card">
	<div class="text-center card-header">
		<h4><?= $project->get_title(); ?></h4>
		<input type="hidden" id="id_project" value="<?= $project->get_id(); ?>">
		<a href="<?= base_url('open/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Review</a>
		<a href="<?= base_url('planning/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Planning</a>
		<?php if ($this->session->level == "4") { ?>
			<a href="<?= base_url('study_selection_adm/' . $project->get_id()) ?>"
			   class="btn form-inline btn-outline-primary opt">Conducting</a>
		<?php } else {?>
			<a href="<?= base_url('conducting/' . $project->get_id()) ?>"
			   class="btn form-inline btn-outline-primary opt">Conducting</a>
		<?php }?>
		<a href="<?= base_url('reporting/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Reporting</a>
	</div>
	<div class="card-body">
		<h4>Reporting</h4>
		<?php
		if (strval($progress_planning['progress']) == strval(100) && strval($progress_import_studies['progress']) == strval(100)) {
			?>
			<script src="<?= base_url('assets/js/chars.js'); ?>"></script>
			<br>
			<div id="chart_line"></div>
			<br>
			<div id="basic_bar"></div>
			<br>
			<div id="stacked_bar"></div>
			<br>
			<div id="pier_chart"></div>
			<br>
			<div id="bubble_chart"></div>
			<br>
			<div id="boxplot_chart"></div>
			<br>
			<div id="funnel_chart"></div><?php
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
