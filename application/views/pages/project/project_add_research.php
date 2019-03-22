<input type="hidden" id="id_project" value="<?= $project->get_id(); ?>">
<div class="row justify-content-md-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h4>Add Research at <?= $project->get_title() ?></h4>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="add_user">E-mail </label>
					<select id="add_email_user" class="form-control">
						<?php foreach ($users as $user) { ?>
							<option value="<?= $user->get_email() ?>"><?= $user->get_email() ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="add_level_user">Level </label>
					<select id="add_level_user" class="form-control">
						<?php foreach ($levels as $level) { ?>
							<option value="<?= $level ?>"><?= $level ?></option>
						<?php } ?>
					</select>
				</div>
				<button class="btn btn-success float-right" type="button" onclick="add_research()"><span
						class="fas fa-plus"></span>
				</button>
			</div>
		</div>
	</div>
</div>
