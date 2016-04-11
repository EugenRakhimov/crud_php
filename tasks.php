<?php require('core/init.php'); ?>

<?php
//Create Tasks Object
$task = new Task;


//Get category From URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

$user_id=set_current_user();




//Get Template & Assign Vars
$template = new Template('templates/tasks.php');



//Check For User Filter
if(isset($user_id)){
	$template->tasks = $task->getByUser($user_id);
	//$template->title = 'Posts By "'.$user->getUser($user_id)->username.'"';
	//Assign Template Variables
	if(isset($category)){
		$template->tasks = $task->getByCategory($category, $user_id);
		// $template->title = 'Posts In "'.$task->getCategory($category)->category.'"';
	}
}


$template->totalTasks = $task->getTotalTasks($user_id);
$template->totalCategories = $task->getTotalCategories();

//Display template
echo $template;
