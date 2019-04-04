<div class="card">
	<div class="card-header">
		<h4>Results of <?= $search; ?></h4>
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
			<?php
			foreach ($projects as $project) {
				?>
				<tr>
					<td><?= $project['project']->get_title(); ?></td>
					<td><?= $project['project']->get_created_by(); ?></td>
					<td>

						<?php if (!is_null($project['level'])) { ?>
							<a href="<?= base_url('open/' . $project['project']->get_id()); ?>"
							   class="btn btn-outline-success opt"><span class="fas fa-folder-open"></span> Open</a>
						<?php
						}else{
							?>
							<a href="#"
							   class="btn btn-outline-success opt"><span class="fas fa-eye"></span> Viewer</a>
							<?php
						}
						if ($project['level'] == 1) { ?>
							<a href="<?= base_url('edit/' . $project['project']->get_id()); ?>"
							   class="btn btn-outline-warning opt"><span class="fas fa-edit"></span> Edit</a>
							<a href="<?= base_url('add_research/' . $project['project']->get_id()); ?>"
							   class="btn btn-outline-info opt"><span class="fas fa-users-cog"></span> Add</a>
							<button type="button"
									onclick="delete_project(<?= $project['project']->get_id() ?>,$(this).parents('tr'))"
									class="btn btn-outline-danger opt"><span
									class="fas fa-trash-alt"></span> Delete
							</button>
						<?php } ?>
					</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
</div>
