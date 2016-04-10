<?php
class Task{
	//Init DB Variable
	private $db;

	/*
	 *	Constructor
	 */
	 public function __construct(){
		$this->db = new Database;
	 }

	 /*
	  *	Get All Tasks
	  */
	  public function getAllTasks(){
		$this->db->query("SELECT tasks.*, users.username, categories.category FROM tasks
							INNER JOIN users
							ON tasks.user_id = users.id
							INNER JOIN categories
							ON tasks.category_id = categories.id
							");

  // create table categories (id int primary key auto_increment, category varchar(20));
  // create table tasks (id int primary key auto_increment, category_id int, task text, user_id int);
		//Assign Result Set
		$results = $this->db->resultset();

		return $results;
	  }

	  /*
	 * Get Tasks By Category
	 */
	public function getByCategory($category_id){
		$this->db->query("SELECT tasks.*, categories.*, users.username FROM tasks
						INNER JOIN categories
						ON tasks.category_id = categories.id
						INNER JOIN users
						ON tasks.user_id=users.id
						WHERE tasks.category_id = :category_id
		");
		$this->db->bind(':category_id', $category_id);

		//Assign Result Set
		$results = $this->db->resultset();

		return $results;
	}

	/*
	 * Get Tasks By Username
	 */
	public function getByUser($user_id){
		$this->db->query("SELECT tasks.*, categories.*, users.username FROM tasks
						INNER JOIN categories
						ON tasks.category_id = categories.id
						INNER JOIN users
						ON tasks.user_id=users.id
						WHERE tasks.user_id = :user_id
		");
		$this->db->bind(':user_id', $user_id);

		//Assign Result Set
		$results = $this->db->resultset();

		return $results;
	}

	  /*
	 * Get Total # of Tasks
	 */
	public function getTotalTasks(){
		$this->db->query('SELECT * FROM tasks');
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}

	/*
	 * Get Total # of Categories
	*/
	public function getTotalCategories(){
		$this->db->query('SELECT * FROM categories');
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}

	/*
	 * Get Category By ID
	*/
	public function getCategory($category_id){
		$this->db->query("SELECT * FROM categories WHERE id = :category_id
		");
		$this->db->bind(':category_id', $category_id);

		//Assign Row
		$row = $this->db->single();

		return $row;
	}

	/*
	 * Get Task By ID
	 */
	public function getTask($id){
		$this->db->query("SELECT tasks.*, users.username, users.name FROM tasks
						INNER JOIN users
						ON tasks.user_id = users.id
						WHERE tasks.id = :id
		");
		$this->db->bind(':id', $id);

		//Assign Row
		$row = $this->db->single();

		return $row;
	}

}
?>
