<?php
/**
 * @desc Routing
 */
class Route {
   private static $tmp;
   public function __toString(){}
   public function __construct(){
       self::$tmp = new tmp();   
       self::dispatcher();   
	   self::data(); 
	}
   /**
    * Роут даних
    * */
   public static function dispatcher(){
     if(isset($_GET['route']) && !empty($_GET['route'])){
     	$route = explode("/", strip_tags($_GET['route']));
		$data  = new Data();
		if(count($route) > 1){
			switch($route[0]){
				case "activate":
				 $activate_key = trim($route[2]);
			     $id = intval($route[1]);		
				 
				 if($data->activate_account($id, $activate_key)){
				   self::location(HTTP_PATH.'login', 3);	
				   exit("Акаунт успішно активовано!" . nl2br("\n"). 
				        "Через декілька хвилин, вас направить на сторінку авторизації...");
				 }		
				 else{ 
				   exit("Сталася помилка при активації акаунту! Зверніться до адміністратора сайту.");	
				 }
				break;
				
					
			}
				
		}else{
			switch($route[0]){
				case "signup":
				  return "signup";
				break;
				case "login":
					return "login";
				break;
				case "users":
					return "users";
				break;
				case "profile":
					return "profile";
				break;
				case "info":
					return "info";
				break;
				case "anket":
					return "anket";
				break;
				case "recover":
					return "recover";
			    break;				
				case "logout":
					// self::location('/', 1);
					echo "<meta http-equiv='refresh' content='1;url=/login'>";
					$data->logout();
				break;	
			}
		}
     }
	 
   }
   /**
    * Робота з даними POST / COOKIE / SESSION
    * */
   public static function data(){
   	try{
   	 if(isset($_POST) && !empty($_POST)){
   	 	$data = new Data();
   	 	if(isset($_POST['signup'])){
   	 		if($data->signup($_POST)){
   	 		 die("Успішна реєстрація! На ваш E-mail надіслано лист з їнструкцією до активації акаунту");	
   	 		}else{
   	 			echo "<div class='error'>Сталася помилка в процесі реєстрації!</div>";
   	 		}	
   	 	}
		if(isset($_POST['login'])){
			if($data->login($_POST)){
						self::location('/');
					}else{
						echo "<div class='error'>Помилка при вході</div>";
					}
		}
		if(isset($_POST['recover'])){
			$email = validate::clear($_POST['email']);
			if($data->recover($email)){
				die("На ваш e-mail надіслано новий пароль!");
			}
		}
		if(isset($_POST['profile'])){
			if($data->editProfile($_POST)){
				echo "<div class='success'>Зміни успішно збережено!</div>";
			}else{
				echo "<div class='error'>Помилка збереження!</div>";
			}
		}
		if(isset($_POST['anket'])){
			if($data->editAnket($_POST)){
				echo "<div class='success'>Зміни успішно збережено!</div>";
			}else{
				echo "<div class='error'>Помилка збереження!</div>";
			}
		}
   	 }
	 
	}catch(Exception $e){
		echo "<div class='error'>".$e->getMessage()."</div>";
	
	} 
   } 
   /**
	 * Redirect
	 * */
	 public static function location($url, $time = 0){
	 	if($time == 0)
		  @header("Location:" . $url);
		else 
		  @header("Refresh:". $time . ";url=". $url);	
	 }
}
