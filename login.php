<?php include 'core/init.php'; ?>
<?php
  if (isset($_POST['do_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new User;
    if ($user->login($username, $password)) {
      redirect('index.php', 'You have been logged in', 'success');
    }
    else {
      redirect('index.php');
    }
  }
?>
