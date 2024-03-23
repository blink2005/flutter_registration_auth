<?php
class CheckSymbolsCreateUser {
	public $current_login_and_password_words = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890'; # Допустимые символы для логина и пароля
	
	public function checkSymbolsCreateUser(string $login, string $password, string $retryPassword) { # Возвращает true если условия выполнены
			if ($this->checkLoginSymbols($login) and $this->checkPasswordSymbols($password) and $this->checkRetryPasswordSymbols($retryPassword)) {
				return true;
			}
			else {
				return false;
			}
	}
	
	
	public function checkLoginSymbols(string $login) { # Возвращает true если в логине допустимые символы, иначе false
		foreach (str_split($login) as $char) { 
			if(str_contains($this->current_login_and_password_words, $char)){
			}
			else {
				return false;
			}
		}
		
		return true;
	}
	
	public function checkPasswordSymbols(string $password) { # Возвращает true если в пароле допустимые символы, иначе false
		foreach (str_split($password) as $char) {
			if(str_contains($this->current_login_and_password_words, $char)){
			}
			else {
				return false;
			}
		}
		
		return true;
	}
	
	public function checkRetryPasswordSymbols(string $retryPassword) { # Возвращает true если в повторном пароле допустимые символы, иначе false
		foreach (str_split($retryPassword) as $char) {
			if(str_contains($this->current_login_and_password_words, $char)){
			}
			else {
				return false;
			}
		}
		
		return true;
	}
}
?>
