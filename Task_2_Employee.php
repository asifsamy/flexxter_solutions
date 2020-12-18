<?php

/**
* To connect with database
* Database class is required
*/
$filepath = realpath(dirname(__FILE__)); 
include_once ($filepath.'/Database.php');

class Employee
{
	/**
	* Employee's unique id
	* @var int $id
	*/
	public $id;
	/**
	* Employee's surname
	* @var string $surname
	*/

	public $surname;
	/**
	* Hashed als salted password
	* @var string $password
	*/
	public $password;
}

?>