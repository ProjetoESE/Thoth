<input type="hidden" id="id_project" value="<?= $project->get_id(); ?>">
<div class="row justify-content-md-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h4 id="title_project">Edit <?= $project->get_title() ?></h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="edit_title">Title</label>
					<input type="text" name="edit_title" class="form-control" id="edit_title" placeholder="Enter title"
						   value="<?= $project->get_title() ?>">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="edit_description" class="form-control min-height" id="edit_description"
							  placeholder="Description"
					><?= $project->get_description() ?></textarea>
				</div>
				<div class="form-group">
					<label for="edit_objectives">Objectives</label>
					<textarea name="edit_objectives" class="form-control min-height" id="edit_objectives" placeholder="Objectives"
					><?= $project->get_objectives() ?></textarea>
				</div>
				<button type="submit" class="btn btn-success" onclick="edit_project();">Edited Project</button>
			</div>
		</div>
	</div>
</div>

