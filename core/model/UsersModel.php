<?php

/*
    Модель Пользователей
*/
class UsersModel extends DBHandler
{
    // Название файла cookie с именем пользователя
    public const COOKIE_USERNAME = "username";

    // Имя текущего пользователя
    private static $currentUsername = null;

    /*
        Метод добавления нового пользователя
    */
	public function addUser(User $user)
	{
		// Запрос добавления новой записи
		$queryResult = $this->query(
                "INSERT INTO Users (`Username`, `Password`) VALUES (?, ?)",
                [
                    $user->username,
                    $user->password
                ]
            );

		// Возвращаем результат запроса
		return $queryResult;
    }

    /*
        Метод обновления пользователя
    */
	public function updateUser(User $user)
	{
		// Запрос обновления записи
		$queryResult = $this->query(
                "UPDATE Users SET `Username`=?, `Password`=? WHERE UserID = ?",
                [
                    $user->username,
                    $user->password,
                    $user->userID
                ]
            );

		// Возвращаем результат запроса
		return $queryResult;
    }

    /*
        Метод удаления пользователя
    */
	public function deleteUser($userID)
	{
		// Запрос удаления записи
		$queryResult = $this->query(
                "DELETE FROM Users WHERE UserID = ?",
                [$userID]
            );

		// Возвращаем результат запроса
		return $queryResult;
    }
    
    /*
        Метод получения одного пользователя по его ID
    */
	public function getUserById($userID)
	{
		// Запрос по ключевому полю
		$queryResult = $this->query("SELECT * FROM Users WHERE UserID = ?", [$userID]);
		// Получение первой записи
        $row = $queryResult->fetch();

        // Если в результате пусто, то пользователя в записях нету
        if (!$row)
        {
            return null;
        }

		// Создаём объект "Пользователь" и вносим в него полученные данные
		$user = new User(
				$userID,
				$row['Username'],
				$row['Password']
			);

		// Возвращаем объект "Пользователь"
		return $user;
    }
    
    /*
        Метод получения одного пользователя по его логину
    */
	public function getUserByName($username)
	{
		// Запрос по ключевому полю
		$queryResult = $this->query("SELECT * FROM Users WHERE Username = ?", [$username]);
		// Получение первой записи
        $row = $queryResult->fetch();

        // Если в результате пусто, то пользователя в записях нету
        if (!$row)
        {
            return null;
        }

		// Создаём объект "Пользователь" и вносим в него полученные данные
		$user = new User(
                $row['UserID'],
				$row['Username'],
				$row['Password']
			);

		// Возвращаем объект "Пользователь"
		return $user;
    }
    
    /*
        Метод авторизации пользователя
    */
	public function tryLogIn(User $newUser)
	{
        // Пробуем найти пользователя в базе данных
        $user = $this->getUserByName($newUser->username);

        // Если пользователь не найден в БД, то выкидываем исключение
        if ($user == null)
        {
            throw new Exception("Пользователя с таким логином не существует", 1);
        }

        // Если указанный пароль не совпадает с записью в БД, то тоже выкидываем исключение
        if ($newUser->password != $user->password)
        {
            throw new Exception("Неверный пароль", 1);
        }

        // Если всё нормально, то записываем данные в куки
        // это, конечно, детский сад, но мне сейчас не до написания полной аутентификации
        UsersModel::$currentUsername = $user->username;
		setcookie(self::COOKIE_USERNAME, $user->username, time() + (86400 * 30), "/");
	}
    
    /*
        Метод проверки авторизации пользователя (вошёл ли он на сайт)
    */
	public static function userIsLoggedIn()
	{
        // Тоже детсад, но что поделать
        if(isset($_COOKIE[self::COOKIE_USERNAME]) && ($_COOKIE[self::COOKIE_USERNAME] != null))
        {
            return true;
        }
        return false;
	}
    
    /*
        Метод получения текущего имени пользователя
    */
	public static function getCurrentUsername()
	{
		//return isset($currentUsername) ? $currentUsername : null;
		return isset($_COOKIE[self::COOKIE_USERNAME]) ? $_COOKIE[self::COOKIE_USERNAME] : null;
	}
    
    /*
        Метод выхода пользователя из системы (разлогинивание)
    */
	public function logOut()
	{
        UsersModel::$currentUsername = null;
		setcookie(self::COOKIE_USERNAME, null, time() - 3600, "/");
    }
}