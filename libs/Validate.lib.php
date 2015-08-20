<?php
  class Validate{
  	public function __construct(){
  		
  	}
	//Перевірка, чи користувач авторизований
	public static function UserStatus(){
		if(isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id']) || isset($_COOKIE['user_id'])){
			return true;
		}
		
		return false;
	}
	/**
	 * Очищення від тегів лінійні змінні
	 * 
	 * @param <string> $field - поле
	 * @param <boolean> $mode - використовувати htmlspecialchars чи strip_tags
	 * 
	 */
	public static function clear($field,$mode = false){
		if($mode === true)
		  return htmlspecialchars($field);
		
		return strip_tags($field);
	}
	/**
	 * Хешування даних
	 * */
	public static function hashInit($data){
		return hash("sha256", $data);
	}
	
	public static function EmailValidate($email){
		return true;
	}
  }
