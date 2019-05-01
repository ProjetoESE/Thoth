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
					<a class="nav-link active" href="<?= base_url('study_selection_adm/' . $project->get_id()) ?>">Review
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
				<a class=" nav-link" href="<?= base_url('data_extraction/' . $project->get_id()) ?>">Data
					Extraction</a>
			</li>
		</ul>
		<br>
		<div class="form-inline">
			<label for="id_qa"><strong>Review Study Selection</strong></label>
			<a class="float-right opt"><i
					class="fas fa-question-circle "></i></a>
		</div>
		<br>
		<?php
		if ($project->get_planning() == 100 && $project->get_import() == 100) {
			?>
			<?php foreach ($project->get_members() as $member) {
				if ($member->get_level() == "Administrator" || $member->get_level() == "Researcher") {


					$acc = number_format((float)($count_papers[$member->get_email()][1] * 100) / $count_papers[$member->get_email()][6], 2);
					$rej = number_format((float)($count_papers[$member->get_email()][2] * 100) / $count_papers[$member->get_email()][6], 2);
					$unc = number_format((float)($count_papers[$member->get_email()][3] * 100) / $count_papers[$member->get_email()][6], 2);
					$dup = number_format((float)($count_papers[$member->get_email()][4] * 100) / $count_papers[$member->get_email()][6], 2);
					$rem = number_format((float)($count_papers[$member->get_email()][5] * 100) / $count_papers[$member->get_email()][6], 2);


					?>
					<h5 class="text-center"><?= $member->get_name(); ?></h5>
					<div class="progress">
						<div class="progress-bar bg-success" role="progressbar"
							 style="width: <?= $acc ?>%"
							 aria-valuenow="<?= $acc ?>"
							 aria-valuemin="0"
							 aria-valuemax="100"><?= $acc ?>%
						</div>
						<div class="progress-bar bg-danger" role="progressbar"
							 style="width: <?= $rej ?>%"
							 aria-valuenow="<?= $rej ?>"
							 aria-valuemin="0"
							 aria-valuemax="100"><?= $rej ?>%
						</div>
						<div class="progress-bar bg-dark" role="progressbar"
							 style="width: <?= $unc ?>%"
							 aria-valuenow="<?= $unc ?>"
							 aria-valuemin="0"
							 aria-valuemax="100"><?= $unc ?>%
						</div>
						<div class="progress-bar bg-warning" role="progressbar"
							 style="width: <?= $dup ?>%"
							 aria-valuenow="<?= $dup ?>"
							 aria-valuemin="0"
							 aria-valuemax="100"><?= $dup ?>%
						</div>
						<div class="progress-bar bg-info" role="progressbar"
							 style="width: <?= $rem ?>%"
							 aria-valuenow="<?= $rem ?>"
							 aria-valuemin="0"
							 aria-valuemax="100"><?= $rem ?>%
						</div>
					</div>
					<br>
					<div class="form-inline">
						<?php
						foreach ($count_papers[$member->get_email()] as $key => $value) {
							switch ($key) {
								case 1:
									?>
									<div class="input-group col-md-2">
										<label class="text-success">
											<span class="fas fa-check fa-lg"></span>
											Accepted: <span><?= $value ?></span>
										</label>
									</div>
									<?php
									break;
								case 2:
									?>
									<div class="input-group col-md-2">
										<label class="text-danger">
											<span class="fas fa-times fa-lg"></span>
											Rejected: <span><?= $value ?></span>
										</label>
									</div>
									<?php
									break;
								case 3:
									?>
									<div class="input-group col-md-2">
										<label class="text-dark">
											<span class="fas fa-question fa-lg"></span>
											Unclassified: <span><?= $value ?></span>
										</label>
									</div>
									<?php
									break;
								case 4:
									?>
									<div class="input-group col-md-2">
										<label class="text-warning">
											<span class="fas fa-copy fa-lg"></span>
											Duplicate: <span><?= $value ?></span>
										</label>
									</div>
									<?php
									break;
								case 5:
									?>
									<div class="input-group col-md-2">
										<label class="text-info">
											<span class="fas fa-trash-alt fa-lg"></span>
											Removed: <span><?= $value ?></span>
										</label>
									</div>
									<?php
									break;
								case 6:
									?>
									<div class="input-group col-md-2">
										<label class="text-secondary">
											<span class="fas fa-bars fa-lg"></span>
											Total: <span><?= $value ?></span>
										</label>
									</div>
									<?php
									break;
							}
						}
						?>
					</div>
					<br>
					<hr>
				<?php }
			} ?>
			<div class="form-inline">
				<label><strong>Conflicts</strong></label><a class="float-right opt"><i
						class="fas fa-question-circle "></i></a>
			</div>
			<br>
			<table id="table_conf_paper_selection" class="table table-responsive-sm">
				<caption>List of Papers Conflicts</caption>
				<thead>
				<th>ID</th>
				<?php
				$size = sizeof($conflicts['head']);
				foreach ($conflicts['head'] as $mem) { ?>
					<th><?= $mem[1] ?></th>
				<?php } ?>
				</thead>
				<tbody>
				<?php foreach ($conflicts['papers'] as $key => $paper) { ?>
					<tr>
						<td><?= $paper['id'] ?></td>
						<?php foreach ($conflicts['head'] as $mem) {
							$class = "text-dark";
							$status = "Unclassified";
							switch ($paper[$mem[0]]) {
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
							<td id="<?= $paper['id']; ?>" class="font-weight-bold <?= $class ?>"><?= $status ?></td>
						<?php } ?>
					</tr>
				<?php } ?>
				</tbody>
				<tfoot>
				<th>ID</th>
				<?php foreach ($conflicts['head'] as $mem) { ?>
					<th><?= $mem[1] ?></th>
				<?php } ?>
				</tfoot>
			</table>
			<br>
			<div class="form-inline">
				<label><strong>Papers Project</strong></label><a class="float-right opt"><i
						class="fas fa-question-circle "></i></a>
			</div>
			<?php
			$acc = number_format((float)($count_project[1] * 100) / $count_project[6], 2);
			$rej = number_format((float)($count_project[2] * 100) / $count_project[6], 2);
			$unc = number_format((float)($count_project[3] * 100) / $count_project[6], 2);
			$dup = number_format((float)($count_project[4] * 100) / $count_project[6], 2);
			$rem = number_format((float)($count_project[5] * 100) / $count_project[6], 2);
			?>
			<h5 class="text-center"><?= $project->get_title(); ?></h5>
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
				foreach ($count_project as $key => $value) {
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
			<?php
		} else {
			?>
			<div class="alert alert-warning container-fluid alert-dismissible fade show" role="alert">
				<h5>Complete the pieces to advance</h5>
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
$this->load->view('modal/modal_paper_conflict');
?>
