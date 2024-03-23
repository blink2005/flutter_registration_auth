<?php
include $_SERVER['DOCUMENT_ROOT'] . '/api/user/check_symbols_auth_user.php';
include $_SERVER['DOCUMENT_ROOT'] . '/api/requests_mysql/requests.php';
include $_SERVER['DOCUMENT_ROOT'] . '/api/connect_mysql/mysql.php';
include $_SERVER['DOCUMENT_ROOT'] . '/api/config_text/text.php';

class AuthUserJson extends CheckSymbolsAuthUser {
	public $connect;
	
	public function __construct() {
		$this->HTMLSetingsStart();
		if ($this->checkKeyArray()) {
			if ($this->checkLength()) {
				if ($this->objectConnect()) {
					if ($this->chekPasswordAndLogin()) {
						$this->HTMLSetingsEnd();
						echo AUTH_MESSAGE;
					}
					else {
						echo PASSWORD_LOGIN_ERROR;
					}
				}
				else {
					echo CONNECT_MYSQL_ERROR;
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

	public function chekPasswordAndLogin() {
		$checkConnection = new Requests;
		if ($checkConnection->chekPasswordAndLogin($_GET['login'], $_GET['password'], $this->connect)) {
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

	public function checkKeyArray() {
		if (array_key_exists('login', $_GET) and array_key_exists('password', $_GET)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function checkLength() {
		if (strlen($_GET['login']) > 0 and strlen($_GET['password']) > 0) {
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

new AuthUserJson;
?>
