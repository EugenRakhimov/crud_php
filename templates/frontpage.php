<?php include 'includes/header.php'; ?>

        <h2 class="pull-left">Welcome To Tasklist!</h2>
        <h4 class="pull-right">A simple PHP Tasklist</h4>
        <div class="clearfix"></div>
        <hr>
  <?php if(isLoggedIn()) : ?>
      <div class="userdata">
      Welcome, <?php echo getUser()['username']; ?>
    </div>
    <br>
    <form role="form" method="post" action="logout.php">
      <input type="submit" name="do_logout" class="btn btn-primary" value="Logout" />
    </form>
    <?php else : ?>
    <h3>You have to login to use system</h3>
    <form role="form" method="post" action="login.php">
    <div class="form-group">
      <label>Username</label>
      <input name="username" type="text" class="form-control" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input name="password" type="password" class="form-control" placeholder="Enter Password">
    </div>
    <button name="do_login" type="submit" class="btn btn-primary">Login</button> <a  class="btn btn-default" href="/register.php"> Create Account</a>
    </form>
    <?php endif; ?>
  <div class="clearfix"></div>

<?php include 'includes/footer.php'; ?>
