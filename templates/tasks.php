<?php include('includes/header.php'); ?>
<ul id="tasks">
	<?php if($tasks) : ?>
		<?php foreach($tasks as $task) : ?>
		<li class="task">
			<div class="row">
				<div class="col-md-10">
					<div class="task-content pull-left">
						<div class="task-info">
							<a href="tasks.php?category=<?php echo urlFormat($task->category_id); ?>">
                <?php echo $task->category; ?> </a>
							<p> <?php echo $task->task; ?> </p>
						</div>
					</div>
				</div>
			</div>
		</li>
		<?php endforeach ; ?>

						</ul>
	<?php else : ?>
		<p>No Tasks To Display</p>
	<?php endif; ?>
						<h3>Your tasks statistics</h3>
					<ul>
						<li>Total Number of Users: <strong>52</strong></li>
						<li>Total Number of Tasks: <strong><?php echo $totalTasks; ?></strong></li>
						<li>Total Number of Categories: <strong><?php echo $totalCategories; ?></strong></li>
					</ul>
<?php include('includes/footer.php'); ?>
