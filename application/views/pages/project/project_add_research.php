<input type="hidden" id="id_project" value="<?= $project->get_id(); ?>">
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4>Add Research</h4>
			</div>
			<div class="card-body">
				<div class="form-inline">
					<label for="add_user">E-mail </label>
					<select id="add_email_user" class="col-md-4 col-sm-8">
						<?php foreach ($users as $user) { ?>
							<option value="<?= $user->get_email() ?>"><?= $user->get_email() ?></option>
						<?php } ?>
					</select>
					<label for="add_level_user">Level </label>
					<select id="add_level_user" class="col-md-2 col-sm-8">
						<?php foreach ($levels as $level) { ?>
							<option value="<?= $level ?>"><?= $level ?></option>
						<?php } ?>
					</select>
					<button class="btn btn-success" type="button" onclick="add_research()"><span
							class="fas fa-plus"></span>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
