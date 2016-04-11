<?php include('includes/header.php'); ?>
<?php echo $task->task;
      echo $task->id;
  exit(); ?>
<form role="form" method="post" action="edit.php">
<?php include('includes/task_form.php'); ?>
<?php include('includes/footer.php'); ?>
