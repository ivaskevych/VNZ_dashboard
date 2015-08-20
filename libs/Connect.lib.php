
<?php
/**
 * @desc DatabaseConnect class
 */
class Connect {
   //Connection Varibles
   private $dbname;
   private $host;
   private $user;
   private $password;
   
   
   private $_db;
   public static $_self = null;
 
   private function __construct(){
    
   }
   public static function _self(){
       if(self::$_self == null){
           self::$_self = new self();
       }
       
       return self::$_self;
   }
   /**
    * Метод для роботи з СКБД MySQL
    * */
   public function mysql(){
   	try{
      $this->_db = new PDO("mysql:dbname={$this->dbname};host={$this->host}", $this->user, $this->password,
       array(
         PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",  //кодування
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,   //По замовчуванню робота з даними як з обєктами
         PDO::ATTR_ERRMODE => true  
       ));
      
	}catch(PDOException $e){
		echo $e->getMessage();
	}
      return $this->_db;
   }
   public function setDatabase($user, $pass, $dbname = 'lk', $host = 'localhost'){
     $this->dbname = $dbname;
     $this->host = $host;
     $this->user = $user;
     $this->password = $pass;
   }
}
