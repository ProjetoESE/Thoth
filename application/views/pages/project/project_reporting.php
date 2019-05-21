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
		<h4>Reporting</h4>
		<?php
		if ($project->get_planning() == 100 && $project->get_import() == 100 && $project->get_selection() > 0 && $project->get_quality() > 0 && $project->get_extraction() == 100) { ?>

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
		<ul class="nav nav-pills nav-justified">
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link active" href="#tab_over">Overview</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tab_import">Import Studies</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tab_selection">Study Selection</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tab_qa">Quality Assessment</a>
			</li>
			<li class="nav-item">
				<a data-toggle="pill" class="nav-link" href="#tab_ex">Data Extraction</a>
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
					<div id="papers_per_selection"></div>
				</div>
			</div>
		</div>
		<div class="tab-pane container-fluid" id="tab_qa">
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
