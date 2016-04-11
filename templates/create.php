<?php include('includes/header.php'); ?>
<form role="form" method="post" action="create.php">
  <?php $task = new Task; ?>
  <?php include('includes/task_form.php'); ?>
  <button name="do_create" type="submit" class="btn btn-default">Submit</button>
</form>
<?php include('includes/footer.php'); ?>
