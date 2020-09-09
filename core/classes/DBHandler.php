<?php

class DBHandler
{
	/*
		Данные для подключения к БД
	*/
	private const DB_HOST     = "localhost";
	private const DB_NAME     = "TestAppDB";
	private const DB_LOGIN    = "root";
	private const DB_PASSWORD = "";

	private $dbConnect;
	
	function __construct()
	{
		$this->dbConnect = $this->connect();
	}
	
	/*
		Метод подключения к БД
	*/
	private function connect()
	{
		// Данные для подключения к БД
		$connStr = "mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME.";charset=utf8";
		// Подключение к БД
		$pdo = new PDO($connStr, self::DB_LOGIN, self::DB_PASSWORD);
		// Вид возвращаемых данных
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		// Вид возвращаемого исключения
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $pdo;
	}
	
	/*
		Метод обработки SQL запросов к БД
	*/
	public function query($query, $params = array())
	{
		// Подготовка запроса
		$stmt = $this->dbConnect->prepare($query);
		// Выполнение запроса с параметрами
		$stmt->execute($params);
		// Получение данных
		//$data = $stmt->fetchAll();

		//return $data;
		return $stmt;
	}
}
