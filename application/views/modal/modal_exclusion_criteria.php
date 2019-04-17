<div class="modal fade" id="modal_exclusion_criteria" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Edit Exclusion Criteria</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="index_term">
				<div class="form-inline">
					<div class="input-group col-md-3">
						<label for="edit_id_criteria_ex" class="col-sm-12">ID</label>
						<input type="text" id="edit_id_criteria_ex" placeholder="ID" class="form-control">
					</div>
					<div class="input-group col-md-9">
						<label for="edit_description_criteria_ex" class="col-sm-12">Description</label>
						<input type="text" id="edit_description_criteria_ex" placeholder="Description"
							   class="form-control">
					</div>
					<div class="input-group col-md-4">
						<label for="edit_select_type" class="col-sm-12">Type</label>
						<select class="form-control" id="edit_select_type_exclusion">
							<option value="Inclusion">Inclusion</option>
							<option value="Exclusion">Exclusion</option>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a class="btn btn-danger" data-dismiss="modal">Cancel</a>
				<a class="btn btn-success" onclick="edit_criteria_exclusion()">Save</a>
			</div>
		</div>
	</div>
</div>
