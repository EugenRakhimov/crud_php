<?php include('includes/header.php'); ?>
<div class="row">
  <div class="col-lg-12">
      <h1 class="page-header">You tasks</h1>
  </div>
</div>
<ul id="tasks">
	<?php if($tasks) : ?>
		<div class="row">
			<table class="table">
				<thead>
				<tr>
					<th>Task</th>
					<th>Time of enter</th>
					<th>Category</th>
					<th colspan="3"></th>
				</tr>
			</thead>
				<?php foreach($tasks as $task) : ?>
					<tr>
          <td><?php echo $task->task; ?></td>
          <td><?php echo $task->time; ?></td>
          <td><a href="tasks.php?category=<?php echo urlFormat($task->category_id); ?>">
            <?php echo $task->category; ?> </a></td>
          <td>
            <form action="/edit.php" method="post">
							<input type="hidden" name="id" value="<?php echo $task->id; ?>" />
              <input type="submit" id="edit-task-<?php echo $task->id; ?>" class="btn btn-danger" value="Edit">
                  <i class="fa fa-btn fa-trash"></i>
              </input>
            </form>
          </td>
          <td>
            <form action="/delete.php?id=" method="POST">
              <input type="hidden" method="delete"/>
							<input type="hidden" value="<?php echo $task->id; ?>" />
              <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                  <i class="fa fa-btn fa-trash"></i>Delete
              </button>
            </form>
          </td>
        </tr>
				<?php endforeach ; ?>
			</table>
		</div>
	<?php else : ?>
		<p>No Tasks To Display</p>
	<?php endif; ?>
						<h3>Your tasks statistics</h3>
					<ul>
						<li>Total Number of Tasks: <strong><?php echo $totalTasks; ?></strong></li>
						<li>Total Number of Categories: <strong><?php echo $totalCategories; ?></strong></li>
					</ul>
<?php include('includes/footer.php'); ?>
