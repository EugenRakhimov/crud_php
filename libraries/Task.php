<?php
class Task{
	//Init DB Variable
	private $db;

	/*
	 *	Constructor
	 */
	 public function __construct(){
		$this->db = new Database;
		$this->category_id = 1;
		$this->task = "";
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
	// insert into categories (category) values ('business'),('vacation'),('family');
	// insert into categories (category) values ('home'),('work');
  // create table tasks (id int primary key auto_increment, category_id int, task text, user_id int,
// time DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);
	// alter table tasks add time DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
		//Assign Result Set
		$results = $this->db->resultset();
		// echo "here";
		// foreach($results  as $task){
		// 	echo $task->task;
		// }
		// echo "string";
		// exit();
		return $results;
	  }

	  /*
	 * Get Tasks By Category
	 */
	public function getByCategory($category_id, $user_id){
		$this->db->query("SELECT tasks.*, categories.*, users.username FROM tasks
						INNER JOIN categories
						ON tasks.category_id = categories.id
						INNER JOIN users
						ON tasks.user_id=users.id
						WHERE tasks.category_id = :category_id
						and tasks.user_id = :user_id");
						$this->db->bind(':user_id', $user_id);
		$this->db->bind(':category_id', $category_id);

		//Assign Result Set
		$results = $this->db->resultset();

		return $results;
	}

	/*
	 * Get Tasks By Username
	 */
	public function getByUser($user_id){
		$this->db->query("SELECT tasks.*, categories.category, users.username FROM tasks
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
	public function getTotalTasks($user_id){
		$this->db->query('SELECT * FROM tasks WHERE user_id = :user_id');
		$this->db->bind(':user_id', $user_id);
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
	public function getTask($id, $user_id){
		$this->db->query("SELECT tasks.*, users.username FROM tasks
						INNER JOIN users
						ON tasks.user_id = users.id
						WHERE tasks.id = :id and
						user_id = :user_id");
		$this->db->bind(':user_id', $user_id);
		$this->db->bind(':id', $id);

		//Assign Row
		$row = $this->db->single();
		$this->category_id = $row->category_id;
		$this->task = $row->task;
		$this->id = $id;
		return $row;
	}

	/*
 * Create Task
*/
public function create($data){
	//Insert Query
	  // create table tasks (id int primary key auto_increment, category_id int, task text, user_id int);
	$this->db->query("INSERT INTO tasks (category_id, user_id, task)
										VALUES (:category_id, :user_id, :task)");
	//Bind Values
	$this->db->bind(':category_id', $data['category_id']);
	$this->db->bind(':user_id', $data['user_id']);
	$this->db->bind(':task', $data['body']);
	//Execute
	return $this->tryExecute();
}
public function tryExecute()
{
	try {
		if($this->db->execute()){
			return true;
		} else {
			return false;
		}
	}
	catch (Exception $e) {
    echo 'Exception: ',  $e->getMessage(), "\n";
	}
}

public function update($data)
{
	$this->db->query("UPDATE tasks SET category_id = :category_id,
										user_id = :user_id,
										task = :task
										WHERE id = :id");
	//Bind Values
	$this->db->bind(':category_id', $data['category_id']);
	$this->db->bind(':user_id', $data['user_id']);
	$this->db->bind(':task', $data['body']);
	$this->db->bind(':id',$data['id']);
	//Execute
	return $this->tryExecute();
}

public function delete($user_id)
{
	$this->db->query("DELETE from tasks WHERE id = :id and user_id = :user_id");
	$this->db->bind(':id',$this->id);
	$this->db->bind(':user_id', $user_id);
	return $this->tryExecute();
}

}
?>
