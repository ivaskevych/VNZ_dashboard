<?php
/**
 * @desc Головний клас системи
 */
class Mainscript{
	/**
	 * Ініціалізація скрипта
	 * */
	public static function init(){
	  //Підключаємо конфігурацію
	  require dirname(__FILE__).'/config.php';
	  new route();
	  //Виводимо шаблон
	  $tmp->show_display('main'); 	
	}
}
