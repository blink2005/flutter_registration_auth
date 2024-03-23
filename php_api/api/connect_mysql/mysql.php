<?php
include $_SERVER['DOCUMENT_ROOT'] . '/api/config_mysql/config.php';

class MysqlConnect {
	public $databaseIsCreate = false;
	public $tableUser = false;
	
	public function connectMysql() { # Возвращает подключение к базе данных
		$connect = mysqli_connect(SERVER, USER, PASSWORD); # Подключение к базе данных MySQL, если данные в config.php указаны не верно, выдаст ошибку (PHP 8)
		$showDatabase = $connect->query('SHOW DATABASES;')->fetch_all(); # Показать базы данных

		for($i = 0; $i < count($showDatabase); ++$i) { # Если базы данных с именем из конфига существует, подключиться к ней
			if ($showDatabase[$i][0] == DATABASE_NAME) {
				$this->databaseIsCreate = true;
				$connect->select_db(DATABASE_NAME);
				break;
			}
		}

		if ($this->databaseIsCreate == false) { # Если базы данных нет, создаст её и выберет
			$connect->query('CREATE DATABASE ' . DATABASE_NAME . ';');
			$connect->select_db(DATABASE_NAME);
		}
		
		$tables = $connect->query('SHOW TABLES;')->fetch_all(); # Показать таблицы
		
		for($i = 0; $i < count($tables); ++$i) { # Поиск на наличие таблицы user и comment в базе данных
			if ($tables[$i][0] == 'users')
			{
				$this->tableUser = true;
				break;
			}
			
		}
		
		if ($this->tableUser == false) { # Если таблицы user нет, создаст её
			$connect->query('CREATE TABLE `users` (`id` INT NOT NULL AUTO_INCREMENT , `login` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `password` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `count` INT NOT NULL , PRIMARY KEY (`id`), `is_ban` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `is_admin` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL);');
		}
				
		return $connect;
	}
}
?>
