<?php require 'core/init.php'; ?>
<?php
if(!isLoggedIn()) {
  $template = new Template('templates/frontpage.php');
  echo $template;
}
else {
  redirect('tasks.php','','success');
}

?>
