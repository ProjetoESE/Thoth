<h4>Sign In</h4>

<div>
	<?php echo form_open('login/log_into', array('class' => 'form-signin')); ?>
	<div class="form-group">
		<label for="InputEmail1">Email address</label>
		<input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
			   placeholder="Enter email">
		<small id="emailHelp" class="form-text text-muted">Enter your login information.</small>
	</div>
	<div class="form-group">
		<label for="InputPassword">Password</label>
		<input type="password" name="password" class="form-control" id="InputPassword" placeholder="Password">
	</div>
	<div class="form-group form-check">
		<input type="checkbox" class="form-check-input" id="remember">
		<label class="form-check-label" for="remember">Remember?</label>
	</div>
	<button type="submit" class="btn btn-success">Sign In</button>
	</form>
</div>

