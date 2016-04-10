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
	public function login($username, $password_hash){
		$this->db->query("SELECT * FROM users
									WHERE username = :username
									AND password_hash = :password_hash
		");

		//Bind Values
		$this->db->bind(':username', $username);
		$this->db->bind(':password_hash', $password_hash);

		$row = $this->db->single();

		//Check Rows
		if($this->db->rowCount() > 0){
			$this->setUserData($row);
			return true;
		} else {
			return false;
		}
	}

	/*
	 * Set User Data
	 */
	private function setUserData($row){
		$_SESSION['is_logged_in'] = true;
		$_SESSION['user_id'] = $row->id;
		$_SESSION['username'] = $row->username;
	}

	/*
	 * User Logout
	*/
	public function logout(){
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_id']);
		unset($_SESSION['username']);
		unset($_SESSION['name']);
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