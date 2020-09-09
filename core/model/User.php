<?php

/*
	Класс пользователя
*/
class User
{
	// ID, Имя и пароль пользователя
	public $userID;
	public $username;
	public $password;
	
	function __construct($userID, $username, $password)
	{
		$this->userID   = $userID;
		$this->username = $username;
		$this->password = $password;
	}
	
	/*
		Аксессоры
	*/
	// Нету, причины см. в "task.php"
}
