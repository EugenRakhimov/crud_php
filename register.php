<?php require('core/init.php'); ?>

<?php

$task = new Task;

//Create User Object
$user = new User;

// Create Validator Object
$validate = new Validator;
//
if(isset($_POST['register'])){
	//Create Data Array
	$data = array();
	$data['username'] = $_POST['username'];
	$data['password_hash'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

	//Required Fields
	$field_array = array('username','password');

	if($validate->isRequired($field_array)){
  	//Register User
  	if($user->register($data)){
  		redirect('index.php', 'You are registered and can now log in', 'success');
  	} else {
  		redirect('index.php', 'Something went wrong with registration', 'error');
  	}
	} else {
		redirect('register.php', 'Please fill in all required fields', 'error');
	}
}

//Get Template & Assign Vars
$template = new Template('templates/register.php');

//Assign Vars

//Display template
echo $template;
