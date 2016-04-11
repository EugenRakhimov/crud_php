<?php include('includes/header.php'); ?>
<form role="form" method="post" action="edit.php">
  <input type="hidden" name="id" value="<?php echo $task->id; ?>" />
  <?php include('includes/task_form.php'); ?>
  <button name="do_update" type="submit" class="btn btn-default">Submit</button>
</form>
<?php include('includes/footer.php'); ?>
