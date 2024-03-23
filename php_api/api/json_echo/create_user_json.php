<?php
include $_SERVER['DOCUMENT_ROOT'] . '/api/user/check_symbols_create_user.php';
include $_SERVER['DOCUMENT_ROOT'] . '/api/requests_mysql/requests.php';
include $_SERVER['DOCUMENT_ROOT'] . '/api/connect_mysql/mysql.php';
include $_SERVER['DOCUMENT_ROOT'] . '/api/config_text/text.php';

class CreateUserJson extends CheckSymbolsCreateUser {
	public $connect;
	
	public function __construct() { 
		$this->HTMLSetingsStart();
		if ($this->checkKeyArray()) {
			if ($this->checkMinLength()) {
				if ($this->checkMaxLength()) {
					if ($this->passwordsEqual()) {
						if ($this->CheckSymbolsCreateUser($_GET['login'], $_GET['password'], $_GET['retryPassword'])) {
							if ($this->objectConnect()) {
								if ($this->checkUserInDatabase()) {
									if($this->createUser()) {
										$this->HTMLSetingsEnd();
										echo REGISTRATION_MESSAGE;
									}
									else {
										echo CALL_ADMIN_ERROR;
									}
								}
								else {
									echo LOGIN_IN_DATABASE_ERROR;
								}
							}
							else {
								echo CONNECT_MYSQL_ERROR;
							}
						}
						else {
							echo PASSWORD_LOGIN_SYMBOL_ERROR;
						}
					}
					else {
						echo PASSWORDS_NOT_EQUAL_ERROR;
					}
				}
				else {
					echo PASSWORD_LOGIN_LENGTH;
				}
			}
			else {
				echo PARAMETERS_ERROR;
			}
		}
		else {
			echo PARAMETERS_ERROR;
		}
	}

	public function passwordsEqual() {
		if ($_GET['password'] == $_GET['retryPassword']) {
			return true;
		}
		else {
			return false;
		}
	}

	public function checkMaxLength() {
		if (strlen($_GET['login']) <= 12 and strlen($_GET['password']) < 32) {
			return true;
		}
		else {
			return false;
		}
	}

	public function checkMinLength() {
		if (strlen($_GET['login']) > 0 and strlen($_GET['password']) > 0 and strlen($_GET['retryPassword']) > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function checkKeyArray() {
		if (array_key_exists('login', $_GET) and array_key_exists('password', $_GET) and array_key_exists('retryPassword', $_GET)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function objectConnect(){
		$this->connect = new MysqlConnect;
		if ($this->connect = $this->connect->connectMysql()) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function checkUserInDatabase() {
		$checkConnection = new Requests;
		if ($checkConnection->userInDatabase($_GET['login'], $this->connect)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function createUser() {
		$checkConnection = new Requests;
		
		if ($checkConnection->createUser($_GET['login'], $_GET['password'] ,$this->connect)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function HTMLSetingsStart() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		http_response_code(401);
	}
	
	public function HTMLSetingsEnd() {
		http_response_code(200);
	}
	
}

new CreateUserJson;
?>
