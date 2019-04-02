<div class="modal fade" id="modal_general_score" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Edit General Score</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="index_score">
				<input type="hidden" id="old_desc">
				<div class="form-inline">
					<div class="input-group col-md-5">
						<label for="edit_start_interval" class="col-sm-12'">General Score Interval</label>
						<input type="number" id="edit_start_interval" class="form-control" step="0.5" placeholder="4.5"
							   min="0">
						<input type="number" id="edit_end_interval" class="form-control" step="0.5" placeholder="5"
							   min="0.1">
					</div>
					<div class="input-group col-md-7">
						<label for="edit_general_score_desc" class="col-sm-12">General Score Description</label>
						<input type="text" id="edit_general_score_desc" class="form-control" placeholder="Description">
					</div>
				</div>
				<div class="modal-footer">
					<a class="btn btn-danger" data-dismiss="modal">Cancel</a>
					<a class="btn btn-success" onclick="edit_general_score()">Save</a>
				</div>
			</div>
		</div>
	</div>
</div>
