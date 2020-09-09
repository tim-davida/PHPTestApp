<?php

/*
	Задача
*/
class Task
{
	// Служебные константы
	public const TASK_IS_DONE = 1;
	public const TASK_IS_NOT_DONE = 0;
	
	public const SORT_BY_ID = 0;
	public const SORT_BY_USER = 1;
	public const SORT_BY_EMAIL = 2;
	public const SORT_BY_STATE = 3;

	/*
		Можно было бы реализовать доступ к свойствам через аксессоры,
		но мне кажется для такой задачи они будут лишними
	*/
	public $taskId;		// ИД задачи
	public $username;	// Имя пользователя
	public $email;		// Почта пользователя
	public $content;	// Содержимое задачи
	public $isDone;		// Статус (выполнено/ не выполнено)
	
	function __construct($taskId, $username, $email, $content, $isDone)
	{
		// Заполнение полей
		$this->taskId   = $taskId;
		$this->username = $username;
		$this->email    = $email;
		$this->content  = $content;
		$this->isDone   = $isDone;
	}
}
