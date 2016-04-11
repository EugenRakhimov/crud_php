<?php require('core/init.php'); ?>

<?php
//Create Task Object
$task = new Task;
$user_id = set_current_user();
$id = $_POST['id'];
$task ->getTask($id, $user_id);

if(isset($_POST['do_delete'])){
	if($task->delete($user_id))
  {
    redirect('tasks.php', 'Your task has been updated', 'success');
  }
  else
  {
    redirect('tasks.php', 'Delete failed', 'error');
  }
}
?>
