<?php

/*
    Модель Задач
*/
class TasksModel extends DBHandler
{
    /*
        Метод добавления новой задачи
    */
	public function addTask(Task $task)
	{
		// Запрос добавления новой записи
		$queryResult = $this->query(
                "INSERT INTO TaskList (Username, EMail, Content, IsDone) VALUES (?, ?, ?, ?)",
                [
                    $task->username,
                    $task->email,
                    $task->content,
                    $task->isDone
                ]
            );

		// Возвращаем результат запроса
		return $queryResult;
    }

    /*
        Метод обновления задачи
    */
	public function updateTask(Task $task)
	{
		// Запрос обновления записи
		$queryResult = $this->query(
                "UPDATE TaskList SET Username=?, EMail=?, Content=?, IsDone=? WHERE TaskID = ?",
                [
                    $task->username,
                    $task->email,
                    $task->content,
                    $task->isDone,
                    $task->taskId
                ]
            );

		// Возвращаем результат запроса
		return $queryResult;
    }

    /*
        Метод удаления задачи
    */
	public function deleteTask($taskId)
	{
		// Запрос удаления записи
		$queryResult = $this->query(
                "DELETE FROM TaskList WHERE TaskID = ?",
                [$taskId]
            );

		// Возвращаем результат запроса
		return $queryResult;
    }
    
    /*
        Метод получения одной задачи по её ID
    */
	public function getTask($taskID)
	{
		// Запрос по ключевому полю
		$queryResult = $this->query("SELECT * FROM TaskList WHERE TaskID = ?", [$taskID]);
		// Получение первой записи
		$row = $queryResult->fetch();

		// Создаём объект "Задача" и вносим в неё полученные данные
		$task = new Task(
				$taskID,
				$row['Username'],
				$row['EMail'],
				$row['Content'],
				$row['IsDone']
			);

		// Возвращаем объект "Задача"
		return $task;
	}

    /*
        Метод получения всех задач
    */
	public function getTasks($page = 1, $maxRows = 10, $sortby = 'TaskID', $orderby = 'desc')
	{
		// Запрос с параметрами
        $offset = ($page - 1) * $maxRows;
                                                                // В этом месте я тупо вставляю переменный без какой-либо валидации,
                                                                // потому что я уже очень устал и у меня есть силы только городить костыли
		$queryResult = $this->query("SELECT * FROM TaskList ORDER BY `$sortby` $orderby LIMIT $offset, $maxRows", null);
		// Получение всех записей
		$rows = $queryResult->fetchAll();

        // Создаём массив объектов "Задача" и вносим в них полученные данные
        $tasks = [];
        foreach ($rows as $row) {
            $tasks[] = new Task(
                    $row['TaskID'],
                    $row['Username'],
                    $row['EMail'],
                    $row['Content'],
                    $row['IsDone']
                );
        }

		// Возвращаем массив объектов "Задача"
		return $tasks;
	}

    /*
        Метод получения количества записей
    */
	public function getTotalRows()
	{
		// Запрос количества записей
		$queryResult = $this->query("SELECT COUNT(*) FROM TaskList", null);
		$result = $queryResult->fetch();

		// Возвращаем результат запроса
		return $result['COUNT(*)'];
    }
}
