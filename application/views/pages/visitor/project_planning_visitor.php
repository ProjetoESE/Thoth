<div class="card">
	<div class="text-center card-header">
		<h4>Projeto 01</h4>
		<a href="<?= base_url('project_controller/open/1')?>" class="btn form-inline btn-outline-primary opt">Review</a>
		<a href="<?= base_url('project_controller/planning/1')?>" class="btn form-inline btn-outline-primary opt">Planning</a>
		<a href="<?= base_url('project_controller/conducting/1')?>"class="btn form-inline btn-outline-primary opt">Conducting</a>
		<a href="<?= base_url('project_controller/reporting/1')?>"class="btn form-inline btn-outline-primary opt">Reporting</a>
	</div>
	<div class="card-body">
		<h4>Planning</h4>
		<ul class="nav nav-pills nav-justified">
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link active" href="#taboveral">Overall information</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tabresearch" >Research Questions</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tabdatabases" >Data Bases</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tabsearchstring" >Search String</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tabsearchstrategy" >Search Strategy</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tabcriteria" >Criteria</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tabquality" >Quality Assessment</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tabdata" >Data Extraction</a>
			</li>
		</ul>
	</div>

	<div class="tab-content">
		<div class="tab-pane active container" id="taboveral">
			<h5>Overal Information</h5>
		</div>
		<div class="tab-pane container" id="tabresearch">
			<h5>Research Questions</h5>
		</div>
		<div class="tab-pane container" id="tabdatabases">
			<h5>Data Bases</h5>
		</div>
		<div class="tab-pane container" id="tabsearchstring">
			<h5>Search String</h5>
		</div>
		<div class="tab-pane container" id="tabsearchstrategy">
			<h5>Search Strategy</h5>
		</div>
		<div class="tab-pane container" id="tabcriteria">
			<h5>Criteria</h5>
		</div>
		<div class="tab-pane container" id="tabquality">
			<h5>Quality Assessment</h5>
		</div>
		<div class="tab-pane container" id="tabdata">
			<h5>Data Extraction</h5>
		</div>
	</div>
</div>
