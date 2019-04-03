<script src="<?= base_url('assets/js/chars.js'); ?>"></script>
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
		<h4>Reporting</h4>
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
		<div id="funnel_chart"></div>
	</div>
</div>
