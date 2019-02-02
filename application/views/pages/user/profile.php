<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4><?= $this->session->name; ?></h4>
			</div>
			<div class="card-body">
				<div class="form-inline">
					<div class="form-group opt col-md-5">
						<label class="opt" for="name">Name</label>
						<input type="text" name="name" class="form-control col-md-12" id="name" placeholder="Name"
							   required>
					</div>
					<div class="form-group opt col-md-5">
						<label class="opt" for="email">Email address</label>
						<input type="email" name="email" class="form-control col-md-12" id="email"
							   aria-describedby="emailHelp"
							   placeholder="Enter email" required>
					</div>
				</div>
				<div class="form-inline">
					<div class="form-group opt col-md-5">
						<label class="opt" for="new_password">New Password</label>
						<input type="password" name="new_password" class="form-control col-md-12" id="new_password"
							   placeholder="Password">
					</div>
					<div class="form-group opt col-md-5">
						<label class="opt" for="InputPassword">Confirm Password</label>
						<input type="password" name="confirm_password" class="form-control col-md-12" id="confirm_password"
							   placeholder="Confirm Password">
					</div>
				</div>
				<div class="form-inline">
					<div class="form-group opt col-md-5">
						<label class="opt" for="name">Institution</label>
						<input type="text" name="institution" class="form-control col-md-12" id="institution"
							   placeholder="Institution">
					</div>
					<div class="form-group opt col-md-5">
						<label class="opt" for="lattes_link">Lattes Link</label>
						<input type="email" name="lattes_link" class="form-control col-md-12" id="lattes_link"
							   placeholder="Lattes Link">
					</div>
				</div>
				<button type="submit" class="btn btn-success float-right opt">Save</button>
			</div>
		</div>
	</div>
</div>
