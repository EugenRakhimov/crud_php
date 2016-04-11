<?php
class User{
	//Init DB Variable
	private $db;

	/*
	 *	Constructor
	 */
	 public function __construct(){
		$this->db = new Database;
	 }

	/*
	 * Register User
	 */
	public function register($data){

      //create table users(id int primary key auto_increment, username varchar(20), password_hash varchar(64));
			//Insert Query
			$this->db->query('INSERT INTO users (username, password_hash)
											VALUES (:username, :password_hash)');

			//Bind Values
			$this->db->bind(':username', $data['username']);

			$this->db->bind(':password_hash', $data['password_hash']);

			//Execute
			if($this->db->execute()){
				return true;
			} else {
				return false;
			}
			//echo $this->db->lastInsertId();
	}

  /*
	 * User Login
	 */
	public function login($username, $password){

		$this->db->query("SELECT * FROM users
									WHERE username = :username");

		//Bind Values
		$this->db->bind(':username', $username);

		$row = $this->db->single();

		$hash = $row->password_hash;

		//Check Rows
		if(($this->db->rowCount() > 0)&&password_verify($password, $hash)){
			$this->setUserData($row);
			return true;
		}
		else
		{		
			return false;
		}
	}

	/*
	 * Set User Data
	 */
	private function setUserData($row){
		$_SESSION['isLoggedIn'] = true;
		$_SESSION['user_id'] = $row->id;
		$_SESSION['username'] = $row->username;
	}

	/*
	 * User Logout
	*/
	public function logout(){
		unset($_SESSION['isLoggedIn']);
		unset($_SESSION['user_id']);
		unset($_SESSION['username']);
		session_destroy();
		return true;
	}

	/*
	 * Get Total # Of Users
	 */
	public function getTotalUsers(){
		$this->db->query('SELECT * FROM users');
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}


}
