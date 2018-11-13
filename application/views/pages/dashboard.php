
<div class="card">
	<div class="card-header">
		<h4>My Projects</h4>
	</div>
	<div class="card-body table-responsive">
		<table id="tableMyProjects" class="table">
			<thead>
			<a href="<?= base_url('project_controller/new_project/');?>" class="btn btn-success new-project"><span class="fas fa-folder-plus"></span> Create New Project</a>
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
				<td>
					<a href="<?= base_url('project_controller/open/1');?>" class="btn btn-outline-success opt"><span class="fas fa-folder-open"></span> Open</a>
					<a href="<?= base_url('project_controller/edit/1');?>" class="btn btn-outline-warning opt"><span class="fas fa-edit"></span> Edit</a>
					<a href="<?= base_url('project_controller/add_research/1');?>" class="btn btn-outline-info opt"><span class="fas fa-users-cog"></span> Add</a>
					<a href="<?= base_url('project_controller/delete/1');?>"  data-toggle="modal" data-target="#modaldelete" class="btn btn-outline-danger opt"><span class="fas fa-trash-alt"></span> Delete</a>
				</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Do you want to delete this project?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">No</button>
				<button type="button" class="btn btn-outline-success" data-dismiss="modal">Yes</button>
			</div>
		</div>
	</div>
</div>