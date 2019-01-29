<div class="row justify-content-md-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h4>New Project</h4>
			</div>
			<div class="card-body">
				<?php echo form_open('project_controller/created_project'); ?>
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" id="title" placeholder="Enter title" required>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" class="form-control min-height" id="description" placeholder="Description"
						   required></textarea>
				</div>
				<div class="form-group">
					<label for="objectives">Objectives</label>
					<textarea name="objectives" class="form-control min-height" id="objectives" placeholder="Objectives"
							  required></textarea>
				</div>
				<button type="submit" class="btn btn-success">Created Project</button>
				</form>
			</div>
		</div>
	</div>
</div>
