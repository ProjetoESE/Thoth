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
					<a class="nav-link active flex-sm-fill text-sm-center" href="<?= base_url('quality_adm/' . $project->get_id()) ?>">Review
						Quality Assessment <i class="fas fa-book-reader"></i></a>
				</li>
			<?php } ?>
			<?php if ($this->session->level != "4") { ?>
				<li class="nav-item ">
					<a class=" nav-link flex-sm-fill text-sm-center" href="<?= base_url('data_extraction/' . $project->get_id()) ?>">Data
						Extraction <i class="fas fa-table"></i></a>
				</li>
			<?php } ?>
		</ul>
		<br>
		<div class="form-inline">
			<label for="id_qa"><strong>Review Quality Assessment</strong></label>
			<a class="float-right opt"><i
					class="fas fa-question-circle "></i></a>
		</div>
		<br>
		<?php
		if ($project->get_planning() == 100 && $project->get_import() == 100 && $project->get_selection() > 0) {
			?>
			<?php foreach ($project->get_members() as $member) {
				if ($member->get_level() == "Administrator" || $member->get_level() == "Researcher") {

					$acc = number_format((float)($count_papers[$member->get_email()][1] * 100) / $count_papers[$member->get_email()][5], 2);
					$rej = number_format((float)($count_papers[$member->get_email()][2] * 100) / $count_papers[$member->get_email()][5], 2);
					$unc = number_format((float)($count_papers[$member->get_email()][3] * 100) / $count_papers[$member->get_email()][5], 2);
					$rem = number_format((float)($count_papers[$member->get_email()][4] * 100) / $count_papers[$member->get_email()][5], 2);


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
										<label class="text-info">
											<span class="fas fa-trash-alt fa-lg"></span>
											Removed: <span><?= $value ?></span>
										</label>
									</div>
									<?php
									break;
								case 5:
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
			<table id="table_conf_paper_qa" class="table table-responsive-sm">
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
							switch ($paper[$mem[0]][0]) {
								case 1:
									$class = "text-success";
									$score = $paper[$mem[0]][1];
									break;
								case 2:
									$class = "text-danger";
									$score = $paper[$mem[0]][1];
									break;
								case 4:
									$class = "text-info";
									$score = $paper[$mem[0]][1];
									break;
							} ?>
							<td id="<?= $paper['id']; ?>" class="font-weight-bold <?= $class ?>"><?= $score ?></td>
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
			$acc = number_format((float)($count_project[1] * 100) / $count_project[5], 2);
			$rej = number_format((float)($count_project[2] * 100) / $count_project[5], 2);
			$unc = number_format((float)($count_project[3] * 100) / $count_project[5], 2);
			$rem = number_format((float)($count_project[4] * 100) / $count_project[5], 2);
			?>
			<h5 class="text-center"><?= $project->get_title(); ?></h5>
			<div class="progress">
				<div id="prog_acc_qa" class="progress-bar bg-success" role="progressbar"
					 style="width: <?= $acc ?>%"
					 aria-valuenow="<?= $acc ?>"
					 aria-valuemin="0"
					 aria-valuemax="100"><?= $acc ?>%
				</div>
				<div id="prog_rej_qa" class="progress-bar bg-danger" role="progressbar"
					 style="width: <?= $rej ?>%"
					 aria-valuenow="<?= $rej ?>"
					 aria-valuemin="0"
					 aria-valuemax="100"><?= $rej ?>%
				</div>
				<div id="prog_unc_qa" class="progress-bar bg-dark" role="progressbar"
					 style="width: <?= $unc ?>%"
					 aria-valuenow="<?= $unc ?>"
					 aria-valuemin="0"
					 aria-valuemax="100"><?= $unc ?>%
				</div>
				<div id="prog_rem_qa" class="progress-bar bg-info" role="progressbar"
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
									Accepted: <span id="count_acc_qa"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
						case 2:
							?>
							<div class="input-group col-md-2">
								<label class="text-danger">
									<span class="fas fa-times fa-lg"></span>
									Rejected: <span id="count_rej_qa"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
						case 3:
							?>
							<div class="input-group col-md-2">
								<label class="text-dark">
									<span class="fas fa-question fa-lg"></span>
									Unclassified: <span id="count_unc_qa"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
						case 4:
							?>
							<div class="input-group col-md-2">
								<label class="text-info">
									<span class="fas fa-trash-alt fa-lg"></span>
									Removed: <span id="count_rem_qa"><?= $value ?></span>
								</label>
							</div>
							<?php
							break;
						case 5:
							?>
							<div class="input-group col-md-2">
								<label class="text-secondary">
									<span class="fas fa-bars fa-lg"></span>
									Total: <span id="count_total_qa"><?= $value ?></span>
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
$this->load->view('modal/modal_paper_conflict_qa');
?>
