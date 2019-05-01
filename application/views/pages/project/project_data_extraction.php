<div class="card">
	<div class="text-center card-header">
		<h4><?= $project->get_title(); ?></h4>
		<input type="hidden" id="id_project" value="<?= $project->get_id(); ?>">
		<a href="<?= base_url('open/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Overview</a>
		<a href="<?= base_url('planning/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Planning</a>
		<?php if ($this->session->level == "4") { ?>
			<a href="<?= base_url('study_selection_adm/' . $project->get_id()) ?>"
			   class="btn form-inline btn-outline-primary opt">Conducting</a>
		<?php } else { ?>
			<a href="<?= base_url('conducting/' . $project->get_id()) ?>"
			   class="btn form-inline btn-outline-primary opt">Conducting</a>
		<?php } ?>
		<a href="<?= base_url('reporting/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Reporting</a>
	</div>
	<div class="card-body">
		<h4>Conducting</h4>
		<ul class="nav nav-pills nav-justified">
			<?php if ($this->session->level != "4") { ?>
				<li class="nav-item">
					<a class="nav-link "
					   href="<?= base_url('conducting/' . $project->get_id()) ?>">Import Studies</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('study_selection/' . $project->get_id()) ?>">Study
						Selection</a>
				</li>
			<?php } ?>
			<?php if ($this->session->level == "1" || $this->session->level == "4") { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('study_selection_adm/' . $project->get_id()) ?>">Review
						Study
						Selection</a>
				</li>
			<?php } ?>
			<li class="nav-item">
				<a class="nav-link"
				   href="<?= base_url('quality_assessment/' . $project->get_id()) ?>">Quality
					Assessment</a>
			</li>
			<li class="nav-item">
				<a class=" nav-link active" href="<?= base_url('data_extraction/' . $project->get_id()) ?>">Data
					Extraction</a>
			</li>
		</ul>
		<br>
		<label><strong>Data Extraction</strong></label>
		<br>
		<?php
		if ($project->get_planning() == 100 && $project->get_import()== 100 && $project->get_selection() > 0 && $project->get_quality() > 0) {
			?>
			<div class="form-inline">
				<div class="input-group col-md-3">
					<label class="text-success">
						<span class="fas fa-check fa-lg"></span>
						Done: 1
					</label>
				</div>
				<div class="input-group col-md-3">
					<label class="text-warning">
						<span class="fas fa-exclamation fa-lg"></span>
						To do: 1
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
			<table class="table" id="table_papers_extraction">
				<caption>List of Papers for Data Extraction</caption>
				<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Year</th>
					<th>Status</th>
					<th>Delete</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>69</td>
					<td>A novel on-die GHz AC stress test methodology for high speed IO application</td>
					<td>2017</td>
					<td class="text-warning">To do</td>
					<td>
						<button class="btn btn-danger"><span class="far fa-trash-alt"></span></button>
					</td>
				</tr>
				<tr>
					<td>65</td>
					<td>A IPv6 Network Performance Test System using Multi-Agent</td>
					<td>2007</td>
					<td class="text-success">Done</td>
					<td>
						<button class="btn btn-danger"><span class="far fa-trash-alt"></span></button>
					</td>
				</tr>
				</tbody>
				<tfoot>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Year</th>
					<th>Status</th>
					<th>Delete</th>
				</tr>
				</tfoot>
			</table>
			<?php
		} else {
				?>
				<div class="alert alert-warning container-fluid alert-dismissible fade show" role="alert">
					<h5>Complete the pieces to advance</h5>
					<ul>
						<?php
						foreach ($project->get_errors()  as $error) {
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
