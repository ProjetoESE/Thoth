<div class="card">
	<div class="card-header">
		<h4>Results of <?= $search;?></h4>
	</div>
	<div class="card-body table-responsive">
		<table id="tableSearch" class="table">
			<thead>
			<tr>
				<th scope="col">Title</th>
				<th scope="col">Created By</th>
				<th scope="col">Actions</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>Projeto 01</td>
				<td>Guilherme Bolfe</td>
				<td><a class="btn btn-outline-success opt" href="<?= base_url('Project_Controller/open/1');?>"><span class="far fa-folder-open"></span> Open</a>
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
