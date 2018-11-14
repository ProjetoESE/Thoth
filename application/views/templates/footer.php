</div>
<br>
<footer class="footer">
	<div class="container">
		<small class="text-center text-muted">&copy; 2018 by <a target="_blank"
																href="http://lesse.com.br">Lesse</a></small>
	</div>
</footer>
<div class="modal fade bd-example-modal-lg" id="modalPaper" tabindex="-1" role="dialog"
	 aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="paper_title">Title Paper</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="paper_id">
				<div class="row">
					<div class="col-md-6">
						<h6>Author</h6>
						<p id="paper_author"></p>
					</div>
					<div class="col-md-2">
						<h6>Year</h6>
						<p id="paper_year"></p>
					</div>
					<div class="col-md-4">
						<h6>Database</h6>
						<p id="paper_database"></p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<h6>Abstract</h6>
						<p id="paper_abtract"></p>
					</div>
					<div class="col-md-6">
						<h6>Keywords</h6>
						<p id="paper_keywords"></p>
					</div>
				</div>
				<hr>
				<div class="row" id="row_criteria">
					<div class="col-md-6">
						<h6>Inclusion Criteria</h6>
						<table class="table table-responsive" id="table_inclusion_criteria">
							<caption>List of Inclusion Criteria</caption>
							<thead>
							<tr>
								<th></th>
								<th>ID</th>
								<th>Description</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td></td>
								<td>IC01</td>
								<td>Descrição ssdas das das asd asdas dasd asd</td>
							</tr>
							<tr>
								<td></td>
								<td>IC02</td>
								<td>Descrição ssdas das das asd asdas dasd asd</td>
							</tr>
							<tr>
								<td></td>
								<td>IC03</td>
								<td>Descrição ssdas das das asd asdas dasd asd</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6">
						<h6>Exclusion Criteria</h6>
						<table class="table table-responsive" id="table_exclusion_criteria">
							<caption>List of Exclusion Criteria</caption>
							<thead>
							<tr>
								<th></th>
								<th>ID</th>
								<th>Description</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td></td>
								<td>EC01</td>
								<td>Descrição ssdas das das asd asdas dasd asd</td>
							</tr>
							<tr>
								<td></td>
								<td>EC02</td>
								<td>Descrição ssdas das das asd asdas dasd asd</td>
							</tr>
							<tr>
								<td></td>
								<td>EC03</td>
								<td>Descrição ssdas das das asd asdas dasd asd</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row" id="row_quality">
					<div class="col-md-12">
						<h6>Quality Assesement</h6>
						<label>Score: 3.5</label>
						<br>
						<table class="table" id="table_question_quality">
							<caption>List of Question Quality</caption>
							<thead>
							<tr>
								<th>ID</th>
								<th>Question</th>
								<th>Option</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>QQ1</td>
								<td data-toggle="tooltip" data-placement="right"
									title="Minimo para Aprovar: ">A publicação apresenta uma contribuição para o campo
									de teste de desempenho de
									software?
								</td>
								<td>
									<select class="form-control">
										<option></option>
										<option data-toggle="tooltip" data-placement="right"
												title="Informação sobre o criterio">Total
										</option>
										<option data-toggle="tooltip" data-placement="right"
												title="Informação sobre o criterio">Parcial
										</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>QQ1</td>
								<td data-toggle="tooltip" data-placement="right"
									title="Minimo para Aprovar: ">A publicação apresenta uma contribuição para o campo
									de teste de desempenho de
									software?
								</td>
								<td>
									<select class="form-control">
										<option></option>
										<option data-toggle="tooltip" data-placement="right"
												title="Informação sobre o criterio">Total
										</option>
										<option data-toggle="tooltip" data-placement="right"
												title="Informação sobre o criterio">Parcial
										</option>
									</select>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row" id="row_extraction">
					<div class="col-md-12">
						<h6>Question of Extraction</h6>
						<div class="form-group">
							<label>Question01</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Question02</label>
							<textarea class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Question03</label>
							<select class="form-control">
								<option></option>
								<option>A</option>
								<option>A</option>
							</select>
						</div>
						<div class="form-group">
							<label>Question04</label>
							<div class="row">
								<div class="form-group form-check-inline">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="gridCheck">
										<label class="form-check-label" for="gridCheck">
											Check me out
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="gridCheck">
										<label class="form-check-label" for="gridCheck">
											Check me out
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="gridCheck">
										<label class="form-check-label" for="gridCheck">
											Check me out
										</label>
									</div>
								</div>
							</div>
						</div>
						<a class="btn btn-success opt" onclick="done_paper();">Done</a>
					</div>
				</div>
				<div class="modal-footer">
					<div class="form-inline container justify-content-between">
						<a class="btn btn-secondary" onclick=""><span class="fas fa-backward"></span> Previous</a>
						<a class="btn btn-secondary">Next <span class="fas fa-forward"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>
