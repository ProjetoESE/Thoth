<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand"
	   href="<?= (isset($_SESSION['logged_in']) ? base_url('user_controller') : base_url()) ?>"><img id="logo"
																									 src="<?= base_url('assets/img/icone.svg'); ?>"
																									 width="30"
																									 height="30"
																									 class="d-inline-block align-top"
																									 alt="">
		Thoth</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu"
			aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="menu">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('about') ?>">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('help') ?>">Help</a>
			</li>
			<li class="nav-item">
				<form class="form-inline my-2 my-lg-0" action="<?= base_url('search')?>">
					<input class="form-control opt" name="search" type="search" placeholder="Search in Thoth" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0 opt"><span class="fas fa-search"></span>
						Search
					</button>
				</form>
			</li>
		</ul>
		<ul class="navbar-nav mr-5">
			<?php
			if (isset($_SESSION['logged_in'])) {
				?>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('user_controller/profile') ?>"><span
							class="fas fa-address-card fa-lg"></span> <?= $this->session->name;?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url("login/sign_out/"); ?>"><span
							class="fas fa-sign-out-alt fa-lg"></span>
						Sign out</a>
				</li>
				<?php
			} else {
				?>
				<li class="nav-item">
					<a class="nav-link aut" href="<?= base_url("login/sign_in/"); ?>"><span
							class="fas fa-sign-in-alt fa-lg"></span>
						Sign in</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url("login/sign_up/"); ?>"><span
							class="fas fa-user-plus fa-lg"></span>
						Sign up</a>
				</li>
				<?php
			}
			?>
		</ul>
	</div>
</nav>

<br>
<?php
if (isset($_SESSION['error'])) {
	?>
	<div class="alert alert-danger container" role="alert">
		<strong>
			<?= $_SESSION['error']; ?>
		</strong>
	</div>
	<br>
	<?php
}
?>

<?php
if (isset($_SESSION['success'])) {
	?>
	<div class="alert alert-success container" role="alert">
		<strong>
			<?= $_SESSION['success']; ?>
		</strong>
	</div>
	<br>
	<?php
}
?>

<?php
if (isset($_SESSION['info'])) {
	?>
	<div class="alert alert-info container" role="alert">
		<strong>
			<?= $_SESSION['info']; ?>
		</strong>
	</div>
	<br>
	<?php
}
?>

<?php
if (isset($_SESSION['warning'])) {
	?>
	<div class="alert alert-warning container" role="alert">
		<strong>
			<?= $_SESSION['warning']; ?>
		</strong>
	</div>
	<br>
	<?php
}
?>
<div class="container">