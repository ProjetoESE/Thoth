<div class="row justify-content-md-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h4>Sign In</h4>
			</div>
			<div class="card-body">
				<?php echo form_open('Login_Controller/log_into', array('class' => 'form-signin')); ?>
				<div class="form-group">
					<label for="InputEmail1">Email address</label>
					<input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
						   placeholder="Enter email" required>
					<small id="emailHelp" class="form-text text-muted">Enter your login information.</small>
				</div>
				<div class="form-group">
					<label for="InputPassword">Password</label>
					<input type="password" name="password" class="form-control" id="InputPassword"
						   placeholder="Password" required>
				</div>
				<button type="submit" class="btn btn-success">Sign In</button>
				</form>
			</div>
		</div>
	</div>
</div>

