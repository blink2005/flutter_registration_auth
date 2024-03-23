<?php
class Requests {
	public function userInDatabase($login, $connect) {
		$prepare = $connect->prepare("SELECT * FROM users WHERE login=?;");
		$prepare->bind_param("s", $login);
		$prepare->execute();
		$prepare = $prepare->get_result()->num_rows;

		if ($prepare == 0) {
			return true;
		}
		else {
			return false;
		}
		
	}
	
	public function createUser($login, $password, $connect) {
		$zeroForBind = '0';
		$falseForBind = 'false';
		$password = md5($password);
		$prepare = $connect->prepare("INSERT INTO users (login, password, count, is_ban, is_admin) VALUES (?,?,?,?,?);");
		$prepare->bind_param("sssss", $login, $password, $zeroForBind, $falseForBind, $falseForBind);
		
		if ($prepare->execute()) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function chekPasswordAndLogin($login, $password, $connect) {
		$password = md5($password);
		$prepare = $connect->prepare("SELECT * FROM users WHERE login=? AND password=?;");
		$prepare->bind_param("ss", $login, $password);
		$prepare->execute();
		$prepare = $prepare->get_result()->num_rows;

		if ($prepare != 0) {
			return true;
		}
		else {
			return false;
		}
	}
	
}
?>