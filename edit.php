<?php require('core/init.php'); ?>

<?php
//Create Task Object
$task = new Task;
$user_id = set_current_user();
$id = $_POST['id'];
$task ->getTask($id, $user_id);



if(isset($_POST['do_update'])){
	//Create Validator Object
	$validate = new Validator;

	//Create Data Array
	$data = array();
	$data['body'] = $_POST['body'];
	$data['category_id'] = $_POST['category'];
	$data['user_id'] = $user_id;

	//Required Fields
	$field_array = array('body', 'category');

	if($validate->isRequired($field_array)){
		//Register User
		if($task->create($data)){
			redirect('index.php', 'Your task has been added', 'success');
		} else {
			redirect('topic.php?id='.$task_id, 'Something went wrong with your post', 'error');
		}
	} else {
		redirect('create.php', 'Please fill in all required fields', 'error');
	}
}

//Get Template & Assign Vars
$template = new Template('templates/edit.php');


//Assign Vars
$template->task = $task;
//Display template
echo $template;
