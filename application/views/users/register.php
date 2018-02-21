

<?php echo form_open('users/register'); ?>
<div class="row">
	<div class="offset-md-4 col-md-4">

		<h1 class="text-center"><?= $title; ?></h1>
		<?php echo validation_errors(); ?>
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name" placeholder="Name">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" placeholder="Username">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" class="form-control" name="password2" placeholder="Password">
		</div>
		<button type="submit" class="btn btn-primary btn-block">Register</button>
	</div>
</div>
	
<?php echo form_close(); ?>