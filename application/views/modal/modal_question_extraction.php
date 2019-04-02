<div class="modal fade" id="modal_question_extraction" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Edit Question Extraction</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="index_de">
				<div class="form-inline">
					<div class="input-group col-md-6">
						<label for="edit_id_data_extraction" class="col-sm-12">ID</label>
						<input type="text" class=" form-control" id="edit_id_data_extraction">
					</div>
					<div class="input-group col-md-6">
						<label for="edit_type_data_extraction" class="col-sm-12">Type of Data</label>
						<select class="form-control" id="edit_type_data_extraction">
							<?php foreach ($question_types as $type) { ?>
								<option value="<?= $type ?>"><?= $type ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="input-group col-md-12">
						<label for="edit_desc_data_extraction" class="col-sm-12">Description</label>
						<input type="text" class=" form-control" id="edit_desc_data_extraction">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a class="btn btn-danger" data-dismiss="modal">Cancel</a>
				<a class="btn btn-success" onclick="edit_de();">Save</a>
			</div>
		</div>
	</div>
</div>
