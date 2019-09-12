<div class="card">
	<div class="text-center card-header">
		<h4><?= $project->get_title(); ?></h4>
		<input type="hidden" id="id_project" value="<?= $project->get_id(); ?>">
		<a href="<?= base_url('open/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Overview <i class="fas fa-binoculars"></i></a>
		<a href="<?= base_url('planning/' . $project->get_id()) ?>"
		   class="btn form-inline btn-outline-primary opt">Planning <i class="fas fa-list"></i></a>
		<a href="<?= base_url('reporting/' . $project->get_id()) ?>"
		   class="btn form-inline btn-primary opt">Reporting <i class="fas fa-chart-line"></i></a>
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
		<h4>Reporting</h4>
		<?php
		if ($project->get_planning() == 100 && $project->get_import() == 100 && $project->get_selection() > 0 || $project->get_quality() > 0 || $project->get_extraction() > 0) { ?>

		<script>

            $(document).ready(function () {
                Highcharts.chart('papers_per_database', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Papers per Database'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b> ({point.y})'
                    },
                    plotOptions: {
                        column: {
                            colorByPoint: true
                        },
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Brands',
                        colorByPoint: true,
                        data: <?= json_encode($databases); ?>
                    }]
                });

                Highcharts.chart('papers_per_selection', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Papers per Status Selection'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b> ({point.y})'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Brands',
                        colorByPoint: true,
                        data: <?= json_encode($status_selection); ?>
                    }]
                });

                Highcharts.chart('papers_per_quality', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Papers per Status Quality'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b> ({point.y})'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Brands',
                        colorByPoint: true,
                        data: <?= json_encode($status_qa); ?>
                    }]
                });

                Highcharts.chart('funnel', {
                    chart: {
                        type: 'funnel'
                    },
                    title: {
                        text: '<?=$project->get_title()?> Funnel'
                    },
                    plotOptions: {
                        series: {
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b> ({point.y:,.0f})',
                                softConnector: true
                            },
                            center: ['40%', '50%'],
                            neckWidth: '30%',
                            neckHeight: '25%',
                            width: '80%'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    series: [<?=json_encode($funnel)?>],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                plotOptions: {
                                    series: {
                                        dataLabels: {
                                            inside: true
                                        },
                                        center: ['50%', '50%'],
                                        width: '100%'
                                    }
                                }
                            }
                        }]
                    }
                });

                Highcharts.chart('act', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Failure of Daily Project Activities'
                    },
                    xAxis: {
                        categories: <?=json_encode($activity['categories'])?>
                    },
                    yAxis: {
                        title: {
                            text: 'Activities'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series:  <?=json_encode($activity['series'])?>
                });

                Highcharts.chart('papers_gen_score', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Papers per General Score'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b> ({point.y})'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Brands',
                        colorByPoint: true,
                        data: <?= json_encode($gen_score); ?>
                    }]
                });
                let qe = null;
				<?php
				foreach ($extraction as $qe){
				?>
                qe = new Extraction_Chars('<?=$qe['id']?>', '<?=$qe['type']?>',<?=json_encode($qe['data'])?>);
                qe.show();
				<?php
				}
				?>

                qe = null;
				<?php
				foreach ($multiple as $qe){
				?>
                qe = new Extraction_Chars('<?=$qe['id']?>', '<?=$qe['type']?>',<?=json_encode($qe['data'])?>);
                qe.show();
				<?php
				}
				?>

            });

		</script>
		<ul class="nav nav-pills nav-justified flex-column flex-sm-row">
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link active flex-sm-fill text-sm-center" href="#tab_over">Overview <i
						class="fas fa-binoculars"></i></a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link flex-sm-fill text-sm-center" href="#tab_import">Import Studies <i
						class="fas fa-upload"></i></a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link flex-sm-fill text-sm-center" href="#tab_selection">Study Selection
					<i class="fas fa-clipboard-check"></i></a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link flex-sm-fill text-sm-center" href="#tab_qa">Quality Assessment <i
						class="fas fa-star-half-alt"></i></a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link flex-sm-fill text-sm-center" href="#tab_ex">Data Extraction <i
						class="fas fa-table"></i></a>
			</li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane container-fluid active" id="tab_over">
			<br>
			<div class="card">
				<div class="card-body">
					<div id="funnel"></div>
				</div>
			</div>
			<br>
			<div class="card">
				<div class="card-body">
					<div id="act"></div>
				</div>
			</div>
		</div>
		<div class="tab-pane container-fluid" id="tab_import">
			<br>
			<div class="card">
				<div class="card-body">
					<div id="papers_per_database"></div>
				</div>
			</div>
		</div>
		<div class="tab-pane container-fluid" id="tab_selection">
			<br>
			<div class="card">
				<div class="card-body">
					<?php foreach ($project->get_members() as $member) {
						if ($member->get_level() == "Administrator" || $member->get_level() == "Researcher") {


							$acc = number_format((float)($count_papers_sel[$member->get_email()][1] * 100) / $count_papers_sel[$member->get_email()][6], 2);
							$rej = number_format((float)($count_papers_sel[$member->get_email()][2] * 100) / $count_papers_sel[$member->get_email()][6], 2);
							$unc = number_format((float)($count_papers_sel[$member->get_email()][3] * 100) / $count_papers_sel[$member->get_email()][6], 2);
							$dup = number_format((float)($count_papers_sel[$member->get_email()][4] * 100) / $count_papers_sel[$member->get_email()][6], 2);
							$rem = number_format((float)($count_papers_sel[$member->get_email()][5] * 100) / $count_papers_sel[$member->get_email()][6], 2);


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
								foreach ($count_papers_sel[$member->get_email()] as $key => $value) {
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
					<?php
					$acc = number_format((float)($count_project_sel[1] * 100) / $count_project_sel[6], 2);
					$rej = number_format((float)($count_project_sel[2] * 100) / $count_project_sel[6], 2);
					$unc = number_format((float)($count_project_sel[3] * 100) / $count_project_sel[6], 2);
					$dup = number_format((float)($count_project_sel[4] * 100) / $count_project_sel[6], 2);
					$rem = number_format((float)($count_project_sel[5] * 100) / $count_project_sel[6], 2);
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
						foreach ($count_project_sel as $key => $value) {
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
				</div>
			</div>
			<br>
			<div class="card">
				<div class="card-body">
					<div id="papers_per_selection"></div>
				</div>
			</div>
		</div>
		<div class="tab-pane container-fluid" id="tab_qa">
			<br>
			<div class="card">
				<div class="card-body">
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
					}

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
				</div>
			</div>
			<br>
			<div class="card">
				<div class="card-body">
					<table class="table table-responsive-sm" id="table_papers_quality_rep">
						<caption>List of Papers for Quality Assessment</caption>
						<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<?php foreach ($project->get_questions_quality() as $qa) { ?>
								<th><?= $qa->get_id() ?></th>
							<?php } ?>
							<th>General Score</th>
							<th>Score</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($papers as $paper) { ?>
							<tr>
								<td><?= $paper->get_id() ?></td>
								<td><?= $paper->get_title() ?></td>
								<?php

								$qas = $qas_score[$paper->get_id()];
								foreach ($project->get_questions_quality() as $qa) { ?>
									<td><?= $qas[$qa->get_id()] ?></td>
								<?php } ?>
								<td><?= $paper->get_rule_quality() ?></td>
								<td><?= $paper->get_score() ?></td>
								<?php
								$class = "text-dark";
								$status = "Unclassified";
								switch ($paper->get_status_quality()) {
									case 1:
										$class = "text-success";
										$status = "Accepted";
										break;
									case 2:
										$class = "text-danger";
										$status = "Rejected";
										break;
									case 4:
										$class = "text-info";
										$status = "Removed";
										break;
								} ?>
								<td id="<?= $paper->get_id(); ?>"
									class="font-weight-bold <?= $class ?>"><?= $status ?></td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<?php foreach ($project->get_questions_quality() as $qa) { ?>
								<th><?= $qa->get_id() ?></th>
							<?php } ?>
							<th>General Score</th>
							<th>Score</th>
							<th>Status</th>
						</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<br>
			<div class="card">
				<div class="card-body">
					<div id="papers_per_quality"></div>
				</div>
			</div>
			<br>
			<div class="card">
				<div class="card-body">
					<div id="papers_gen_score"></div>
				</div>
			</div>
		</div>
		<div class="tab-pane container-fluid" id="tab_ex">
		</div>
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
$this->load->view('modal/modal_paper_rep');
?>
