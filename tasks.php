<?php require('core/init.php'); ?>

<?php
//Create Tasks Object
$task = new Task;


//Get category From URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

//Get user From URL
if(isLoggedIn()) {
	$user_id = getUser()['user_id'];
}
else {
	redirect('index.php','You need to log in first','error');
}




//Get Template & Assign Vars
$template = new Template('templates/tasks.php');

//Assign Template Variables
if(isset($category)){
	$template->tasks = $task->getByCategory($category, $user_id);
	$template->title = 'Posts In "'.$task->getCategory($category)->name.'"';
}

//Check For User Filter
if(isset($user_id)){
	$template->tasks = $task->getByUser($user_id, $user_id);
	//$template->title = 'Posts By "'.$user->getUser($user_id)->username.'"';

}


$template->totalTasks = $task->getTotalTasks($user_id);
$template->totalCategories = $task->getTotalCategories();

//Display template
echo $template;
