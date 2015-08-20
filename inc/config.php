<?php
/**
 * @desc Файл конфігурації
 */
 //Помилки виводити на екран
 ini_set('display_errors', false);
 //Відображати всі помилки
 error_reporting(E_ERROR);
 
 //Підключення бібліотек
 spl_autoload_register(function($className){
    if(file_exists(LIBS.'/'.$className.'.lib.php')) 
      require_once LIBS.'/'.$className.'.lib.php'; 
 });
 
 //http шлях до кореня
 $root_url = explode("/", filter_input(INPUT_SERVER, "PHP_SELF"));
 $dirname = empty($root_url[1]) ? '/' : '/'.$root_url[1].'/';
 /**
  * поточний каталог, якшо скрипт в каталозі
  * */
  if($root_url[1] != 'index.php') define("DIR", $root_url[1]);
 
 define("HTTP_PATH", 'http://'.  
        filter_input(INPUT_SERVER, "HTTP_HOST") .$dirname);
 
 //Підключення до БД
 /**
  * - Імя користувача MySQL
  * - Пароль користувача MySQL
  * - Імя Бази Даних
  * 
  * Якщо імя сервера не 'localhost', то прописати його 4тим параметром
  * */
 Connect::_self()->setDatabase("root", "", "lk");
 
 //Екземпляр класу шаблонізатора
 $tmp = new Tmp();