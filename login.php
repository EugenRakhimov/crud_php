<?php include 'core/init.php'; ?>
<?php
  if (isset($_POST['do_login'])) {
    $username = $_POST['username'];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user = new User;
    if ($user->login($username, $password_hash)) {
      redirect('index.php', 'You have been logged in', 'success');
    }
    else {
      redirect('index.php');
    }
  }
?>
