<input type="hidden" id="id_project" value="<?= $project->get_id(); ?>">
<div class="card">
	<div class="card-header">
		<h4> Members at <?= $project->get_title() ?></h4>
	</div>
	<div class="card-body">
		<div class="col-md-6">
			<h5> Add Members</h5>
			<div class="form-group">
				<label for="add_user">E-mail </label>
				<select id="add_email_user" class="form-control">
					<option value=""></option>
					<?php foreach ($users as $user) { ?>
						<option value="<?= $user->get_email() ?>"><?= $user->get_email() ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="add_level_user">Level </label>
				<select id="add_level_user" class="form-control">
					<option value=""></option>
					<?php foreach ($levels as $level) { ?>
						<option value="<?= $level ?>"><?= $level ?></option>
					<?php } ?>
				</select>
			</div>
			<button class="btn btn-success" type="button" onclick="add_research()"><span
					class="fas fa-plus"></span>
			</button>
		</div>
	</div>
</div>
