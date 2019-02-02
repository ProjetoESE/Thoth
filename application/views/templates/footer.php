</div>
<br>
<footer class="footer">
	<div class="container">
		<small class="text-center text-muted">&copy; 2018 by <a target="_blank"
																href="http://lesse.com.br">Lesse</a></small>
	</div>
</footer>

<div class="modal fade" id="modal_criteria" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Edit Criteria</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="index_term">
				<div class="form-inline">
					<label for="edit_id_criteria" class="col-sm-12 col-md-6">ID</label>
					<label for="edit_select_type" class="col-sm-12 col-md-6">Type</label>
				</div>
				<div class="input-group col-md-11 col-sm-12">
					<input type="text" id="edit_id_criteria" placeholder="ID" class="form-control">
					<div class="input-group-append">
						<select class="form-control" id="edit_select_type">
							<option value="Inclusion">Inclusion</option>
							<option value="Exclusion">Exclusion</option>
						</select>
					</div>
				</div>

				<label for="edit_description_criteria" class="col-sm-12 col-md-6">Description</label>
				<input type="text" id="edit_description_criteria" placeholder="Description" class="form-control">

			</div>
			<div class="modal-footer">
				<a class="btn btn-danger" data-dismiss="modal">Cancel</a>
				<a class="btn btn-success" onclick="edit_criteria()">Save</a>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal_synonym" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Edit Synonym</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="index_synonym">
				<label for="edit_term" class="col-sm-12 col-md-2">Synonym</label>
				<div class="form-inline">
					<input type="text" id="edit_synonym" class="form-control col-sm-12 col-md-12">
				</div>
			</div>
			<div class="modal-footer">
				<a class="btn btn-danger" data-dismiss="modal">Cancel</a>
				<a class="btn btn-success" onclick="edit_synonym()">Save</a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_term" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Edit Term</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="index_term">
				<label for="edit_term" class="col-sm-12 col-md-2">Term</label>
				<div class="form-inline">
					<input type="text" id="edit_term" class="form-control col-sm-12 col-md-12">
				</div>
			</div>
			<div class="modal-footer">
				<a class="btn btn-danger" data-dismiss="modal">Cancel</a>
				<a class="btn btn-success" onclick="edit_term()">Save</a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_research" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Edit Research Question</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="index_research">
				<div class="form-inline">
					<label for="edit_research_id" class="col-md-2">ID</label>
					<label for="edit_research_question" class="col-md-10">Description</label>
				</div>
				<div class="form-inline">
					<input type="text" id="edit_research_id" class="form-control col-sm-12 col-md-2">
					<div class="input-group col-md-10 col-sm-12">
						<input type="text" id="edit_research_question" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a class="btn btn-danger" data-dismiss="modal">Cancel</a>
				<a class="btn btn-success" onclick="edit_research()">Save</a>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal_keyword" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Edit Keyword</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="index_keyword">
				<label for="edit_keyword">Keyword</label>
				<input type="text" class="form-control" id="edit_keyword">
			</div>
			<div class="modal-footer">
				<a class="btn btn-danger" data-dismiss="modal">Cancel</a>
				<a class="btn btn-success" onclick="edit_keyword()">Save</a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_domain" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Edit Domain</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="index_domain">
				<label for="edit_domain">Domain</label>
				<input type="text" class="form-control" id="edit_domain">
			</div>
			<div class="modal-footer">
				<a class="btn btn-danger" data-dismiss="modal">Cancel</a>
				<a class="btn btn-success" onclick="edit_domain()">Save</a>
			</div>
		</div>
	</div>
</div>

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
						<input type="text"  class="form-control" id="paper_author"  placeholder="This paper don't author">
					</div>
					<div class="col-md-2">
						<h6>Year</h6>
						<input type="text"  class="form-control" id="paper_year"  placeholder="This paper don't have year">
					</div>
					<div class="col-md-4">
						<h6>Database</h6>
						<select class="form-control">
							<option value="Scopus">Scopus</option>
							<option value="IEEE">IEEE</option>
						</select>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<h6>Abstract</h6>
						<textarea type="text" class="form-control" id="paper_abtract" placeholder="This paper don't have abstract">
						</textarea>
					</div>
					<div class="col-md-6">
						<h6>Keywords</h6>
						<textarea type="text" class="form-control" id="paper_keywords" placeholder="This paper don't have keywords">
						</textarea>
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
						<a class="btn btn-success opt float-right" onclick="done_paper();">Done</a>
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
<input type="hidden" id="base_url" value="<?=base_url()?>">
</body>

</html>
