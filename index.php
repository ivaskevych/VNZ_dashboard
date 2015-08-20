<?php
/**
 * @desc вхідний файл
 */
session_start();
//Перевірка версії ПхП
if(version_compare(phpversion(), '5.3.0', '<') == true){
    die ('Ваша версія PHP старіша 5.3. 
          Для коректної роботи скрипта, потрібна версія 5.3 або вище!');
}

/**
* Константа повного шляху до кореня
*/
define("ROOT_DIR", dirname(__FILE__));

/**
 * Шлях до папки з бібліотеками (libs)
 * */
 define("LIBS", ROOT_DIR.'/libs');
 /**
  * Шлях до шаблонів
  * */
  define("TMP", ROOT_DIR.'/tmp');
 

//Ініціалізуємо скрипт
require_once ROOT_DIR.'/inc/main_script.php';
Mainscript::init();
?>
