<?php include('includes/header.php'); ?>
	<form role="form" method="post" action="register.php">
		<div class="form-group">
			<label>Choose Username*</label>
      <input type="text"
				class="form-control" name="username" placeholder="Create A Username">
		</div>
		<div class="form-group">
			<label>Password*</label>
      <input type="password" class="form-control"
				name="password" placeholder="Enter A Password">
		</div>
			<input name="register" type="submit" class="btn btn-default" value="Register" />
</form>
<?php include('includes/footer.php'); ?>
