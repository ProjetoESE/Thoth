<div class="modal fade bd-example-modal-lg" id="modal_help_database" tabindex="-1" role="dialog"
	 aria-labelledby="ModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTitle">Help Research Question</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>An article database is an online tool that allows you to search within a group of journals for
					articles on a particular topic. There are many different databases to choose from, and each
					individual database covers only a certain type and number of journals. As a standard, our tool
					supports six software engineering databases. These are:</p>
				<ul>
					<?php foreach ($databases as $database) { ?>
						<li><?= $database ?></li>
					<?php } ?>
				</ul>
				<p>You can add any database of your choice, and set a search string for it.</p>
			</div>
		</div>
	</div>
</div>
