<?php

  /*
   *	Get Categories
   */
  function getCategories(){
  	$db = new Database;
  	$db->query('SELECT * FROM categories');

  	//Assign Result Set
  	$results = $db->resultset();

  	return $results;
  }

?>
