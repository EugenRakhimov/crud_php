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
  $data['id'] = $id;
	//Required Fields
	$field_array = array('body', 'category', 'id');

	if($validate->isRequired($field_array)){
		//Register User
		if($task->update($data)){
			redirect('index.php', 'Your task has been updated', 'success');
		} else {
			redirect('topic.php?id='.$task_id, 'Something went wrong with your task', 'error');
		}
	} else {
		redirect('edit.php', 'Please fill in all required fields', 'error');
	}
}

//Get Template & Assign Vars
$template = new Template('templates/edit.php');


//Assign Vars
$template->task = $task;
//Display template
echo $template;
