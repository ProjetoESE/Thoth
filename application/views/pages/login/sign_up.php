<div class="row justify-content-md-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h4>Join Thoth</h4>
			</div>
			<div class="card-body">
				<?php echo form_open('login/log_up', array('class' => 'form-signup')); ?>
				<div class="form-group">
					<label for="inputName">Name</label>
					<input type="text" class="form-control" id="inputName" placeholder="Your Name">
				</div>
				<div class="form-group">
					<label for="InputEmail1">Email address</label>
					<input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
						   placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="InputPassword">Password</label>
					<input type="password" name="password" class="form-control" id=InputPassword"
						   placeholder="Password">
				</div>
				<button type="submit" class="btn btn-success">Create a new account</button>
				</form>
			</div>
		</div>
	</div>
</div>
