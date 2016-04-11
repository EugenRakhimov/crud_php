<?php require('core/init.php'); ?>

<?php
//Create Tasks Object
$task = new Task;

//Get category From URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

//Get user From URL
$user_id = isset($_GET['user_id']) ? $_GET['user'] : null;



//Get Template & Assign Vars
$template = new Template('templates/tasks.php');

//Assign Template Variables
if(isset($category)){
	$template->tasks = $task->getByCategory($category);
	$template->title = 'Posts In "'.$task->getCategory($category)->name.'"';
}

//Check For User Filter
if(isset($user_id)){
	$template->tasks = $task->getByUser($user_id);
	//$template->title = 'Posts By "'.$user->getUser($user_id)->username.'"';

}

//Check For Category Filter
if(!isset($category) && !isset($user_id)){
	$template->tasks = $task->getAllTasks();
  
}

$template->totalTasks = $task->getTotalTasks();
$template->totalCategories = $task->getTotalCategories();

//Display template
echo $template;
