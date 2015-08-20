<?php
/**
 * @desc Data class
 */
 class Data{
 	private $db;
 	public function __construct(){
 		$this->db = Connect::_self()->mysql();
    }
	/**
	 * Реєстрація користувачів
	 * */
	 public function signup($data){
	 	if(strlen($data['password']) < 6)
		  throw new Exception('Пароль повинен містити не менше 6 символів');
		if(empty($data['email']))
		  throw new Exception('E-mail не може бути пустим'); 
		if($data['captcha'] != $_SESSION['captcha']){
			throw new Exception("Капча введена неправильно");
		}
	 	$email = validate::clear($data['email']);
		if(!$this->UniqEmail($email)) throw new Exception('Такий Email вже зареєстровано!');
		$password = validate::hashInit($data['password']);
		$name = validate::clear($data['name']);
		if(validate::EmailValidate($email) === false)
		   throw new Exception('Введіть коректний Email');
		$time = time();
	    //Реєструємо користувача
	    $query = $this->db->prepare("INSERT INTO `users` (`email`,`password`,`name`,`date_register`, `activate`) 
	                                 VALUES(:email, :password, :name, $time, 0)");
		$query->bindParam(':email', $email, PDO::PARAM_STR, 155);
		$query->bindParam(':password', $password, PDO::PARAM_STR, 155);	
		$query->bindParam(':name', $name, PDO::PARAM_STR, 100);								 	
	   
	   if($query->execute()){
	    //надсилаємо лист активації
	    $id = $this->db->lastInsertId();
	    $key_hash = validate::hashInit($email."::".$password);
	    $link_activate = HTTP_PATH."activate/".$id."/".$key_hash;
	    mail::new_mail($email, "Активація акаунта!", "Ви зареєструвалися в особистому кабінеті \n\r 
	     Для підтвердження активацїї, перейдіть за посиланням:" .  $link_activate . "\n\r"); 
		 
	     return true;
	   }
	   
	   //Записуємо в лог помилки
	   $info = $this->db->errorInfo();
	   
	   error::ErrLog("- Помилка PDO: ". $info[2] . "\n". __FILE__ . "\n" . __LINE__);
	  }
      /***
	   * Авторизація користувачів
	   * */
	   public function login($data){
	     if(empty($data['weblogin']))
		  throw new Exception('Логін не може бути порожнім'); 
		 if(empty($data['webpassword']))
		  throw new Exception('Пароль не може бути порожнім'); 
	   	 if(strlen($data['weblogin']) < 6)
		  throw new Exception('Логін повинен містити 6 символів'); 
	   	 if(strlen($data['webpassword']) < 6)
		  throw new Exception('Довжина паролю не повинна бути меншою ніж 6 символів');
		 
		 $login = validate::clear($data['weblogin']);
		 $password = validate::clear($data['webpassword']);
		 $query = $this->db->prepare("SELECT `id`, `weblogin`, `webpassword`, `activate` FROM `vnz` WHERE `weblogin` = :weblogin");
		 $query->bindParam(":weblogin", $login, PDO::PARAM_STR);
		 $query->execute();
		 
		 $result = $query->fetch();

		 if($result->weblogin !== $login){
		  throw new Exception('Ви ввели невірний логін'); 
		 }
		 if($result->webpassword !== $password){
		  throw new Exception('Ви ввели невірний пароль'); 
		 }
		 //Перевіряємо чи акаунт користувача активовано
		 if($result->activate == 0){
		 	throw new Exception("Ваш акаунт не активовано!");
		 }
		 if($result->weblogin === $login && $password === $result->webpassword){
		 	//Успіх
		 	if($remember == 1){
		 		setCookie("user_id", $result->id, time() +3600 * 24 * 30);
		 	}
			$_SESSION['user']['id'] = $result->id;
			
			return true;
		 }
		 return false;
	   }
	   /**
	    * Активація акаунта
	    * */
	    public function activate_account($id, $activate_key){
	      $query = $this->db->query("SELECT `email`, `password` FROM `users` WHERE `id` = $id");
		  $result = $query->fetch();
		  if($activate_key === validate::hashInit($result->email."::".$result->password)){
		  	if($this->db->exec("UPDATE `users` SET `activate` = 1")) return true;
		  }	
		  
		  return false;
	    }
		/**
		 * Вивід спистку користувачів
		 **/
		 public function showUsers(){
		 	$query = $this->db->query("SELECT * FROM `users`");
			$return = "";
			while($result = $query->fetch()){
			  $return .= "<tr><td>{$result->id}</td><td>{$result->email}</td>
			             <td>{$result->country}</td><td>{$result->age}</td>
			             <td>".date('d-m-Y', $result->date_register)."</td></tr>";	
			} 
			
			return $return;
		 }
		/**
		   * Вивід інформації про заклад (вибірка даних)
		   **/
		   public function showInfoVnz($id){
		   	 $id = intval($id);
		   	 $query = $this->db->query("SELECT * FROM `vnz` WHERE `id` = $id");
			 
			 return  $query->fetch();
			 
			
		}
		 /**
		 * Вивід інформації про заклад
		 **/
		 public function showInfo($id){
		 	$query = $this->db->query("SELECT * FROM `vnz` WHERE `id` = $id");
			$return = "";
			while($result = $query->fetch()){
			  $return .= "<tr><td>{$result->id}</td><td>{$result->zid}</td>
			             <td>{$result->fullName}</td><td>{$result->shortName}</td>
			             <td>{$result->pidporName}</td><td>{$result->address}</td>
			             <td>{$result->zType}</td><td>{$result->vlasnist}</td>
			             <td>{$result->fax}</td><td>{$result->email}</td>
			             <td>{$result->webSite}</td></tr>";	
			} 
			
			return $return;
		 }
		 /**
		  * Перевірка E-mail на унікальність
		  * */
		  public function UniqEmail($email){
		  	$query = $this->db->prepare("SELECT `id` FROM `users` WHERE `email` = :email");
			$query->bindParam(":email",$email, PDO::PARAM_STR);
			$query->execute();
			$result = $query->fetch();
			if($result->id >= 1) return true;
			
			return false;
		  }
		  /**
		   * Відновлення паролю
		   **/
		   public  function recover($email){
		   	 if(!$this->UniqEmail($email))
			    throw new Exception('Такої email адреси не існує в БД!');
			 //Генеруємо новий пароль
			 $email = $this->db->quote($email);
			 $new_password = rand(10,100) . "hgkl" . rand(1,9);
			 $password = validate::hashInit($new_password);
			 //Перезаписуємо пароль користувачу
			 $query = $this->db->query("UPDATE `users` SET `password` = '$password' WHERE `email` = $email");
			 if(!$query) return false;
			 //Надсилаємо лист користувачу з новим паролем
			 mail::new_mail($email, "Новий пароль", "Ваш новий пароль, для доступу до акаунта\n". $new_password);
			 
			 return true;
		   }
		  /**
		   * Профіль користувача (вибірка даних)
		   **/
		   public function showProfile($id){
		   	 $id = intval($id);
		   	 $query = $this->db->query("SELECT * FROM `users` WHERE `id` = $id");
			 
			 return  $query->fetch();
			 
			
		   }
		   /**
		    * Профіль користувача
		    * */ 
		    public function editProfile($data){
		    	$id = intval($data['id']);	
		    	$query_pass = $this->db->query("SELECT `password` FROM `users` WHERE `id` = $id");
				if($data['password'] === "" || $data['password'] === 0){
					$password = $query_pass->fetch()->password;
				}else{
					$password = validate::hashInit($data['password']);
				}
		    	$query = $this->db->prepare("UPDATE `users` SET `email` = :email, `password` = :password, `name` = :name, `age` = :age, 
		    	                      `country` = :country WHERE `id` = :id");
				$query->bindParam(":email", $data['email'], PDO::PARAM_STR);
				$query->bindParam(":password", $password, PDO::PARAM_STR);
				$query->bindParam(":name", $data['name'], PDO::PARAM_STR);
				$query->bindParam(":age", $data['age'], PDO::PARAM_INT);
				$query->bindParam(":country", $data['country'], PDO::PARAM_STR);
				$query->bindParam(":id", $data['id'], PDO::PARAM_INT);
				
				return $query->execute();
		    }
		/**
		   * Анкета користувача (вибірка даних)
		   **/
		   public function showAnket($id){
		   	 $id = intval($id);
		   	 $query = $this->db->query("SELECT * FROM `vnz` WHERE `id` = $id");
			 
			 return  $query->fetch();
			 
			
		   }
		   /**
		    * Анкета користувача
		    * */ 
		    public function editAnket($data){
		    	$id = intval($data['id']);	
		    	$query = $this->db->prepare("UPDATE `vnz` SET  
			    	`fullName` = :fullName,
			    	`shortName` = :shortName, 
			    	`pidporName` = :pidporName, 
			    	`address` = :address, 
			    	`zType` = :zType, 
			    	`fax` = :fax,
			    	`webSite` = :webSite,
			    	`email` = :email,
			    	`vlasnist` = :vlasnist,
			    	`n1name` = :n1name,
			    	`posada1` = :posada1,
			    	`n1phone` = :n1phone,
			    	`n1mobile` = :n1mobile,
			    	`n1email` = :n1email,
			    	`n1skype` = :n1skype,
			    	`n2name` = :n2name,
			    	`posada2` = :posada2,
			    	`n2phone` = :n2phone,
			    	`n2mobile` = :n2mobile,
			    	`n2email` = :n2email,
			    	`n2skype` = :n2skype,
			    	`n3name` = :n3name,
			    	`posada3` = :posada3,
			    	`n3phone` = :n3phone,
			    	`n3mobile` = :n3mobile,
			    	`n3email` = :n3email,
			    	`n3skype` = :n3skype,
			    	`pcRoomsZ` = :pcRoomsZ,
			    	`pcCountZ` = :pcCountZ,
			    	`pcWithInetZ` = :pcWithInetZ,
			    	`profSubjects` = :profSubjects,
			    	`atestat1` = :atestat1,
			    	`atestat2` = :atestat2,
			    	`atestat3` = :atestat3,
			    	`atestat4` = :atestat4,
			    	`dpa1` = :dpa1,
			    	`dpa2` = :dpa2,
			    	`dpa3` = :dpa3,
			    	`dpa4` = :dpa4,
			    	`all1` = :all1,
			    	`all2` = :all2,
			    	`all3` = :all3,
			    	`all4` = :all4,
			    	`eng1` = :eng1,
			    	`eng2` = :eng2,
			    	`eng3` = :eng3,
			    	`eng4` = :eng4,
			    	`ger1` = :ger1,
			    	`ger2` = :ger2,
			    	`ger3` = :ger3,
			    	`ger4` = :ger4,
			    	`frn1` = :frn1,
			    	`frn2` = :frn2,
			    	`frn3` = :frn3,
			    	`frn4` = :frn4,
			    	`isp1` = :isp1,
			    	`isp2` = :isp2,
			    	`isp3` = :isp3,
			    	`isp4` = :isp4,
			    	`syrdo1` = :syrdo1,
			    	`syrdo2` = :syrdo2,
			    	`syrdo3` = :syrdo3,
			    	`syrdo4` = :syrdo4 WHERE `id` = :id");
				$query->bindParam(":fullName", $data['fullName'], PDO::PARAM_STR);
				$query->bindParam(":shortName", $data['shortName'], PDO::PARAM_STR);
				$query->bindParam(":pidporName", $data['pidporName'], PDO::PARAM_STR);
				$query->bindParam(":address", $data['address'], PDO::PARAM_STR);
				$query->bindParam(":zType", $data['zType'], PDO::PARAM_STR);
				$query->bindParam(":fax", $data['fax'], PDO::PARAM_STR);
				$query->bindParam(":webSite", $data['webSite'], PDO::PARAM_STR);
				$query->bindParam(":email", $data['email'], PDO::PARAM_STR);
				$query->bindParam(":vlasnist", $data['vlasnist'], PDO::PARAM_STR);
				$query->bindParam(":id", $data['id'], PDO::PARAM_INT);
				$query->bindParam(":n1name", $data['n1name'], PDO::PARAM_STR);
				$query->bindParam(":posada1", $data['posada1'], PDO::PARAM_STR);
				$query->bindParam(":n1phone", $data['n1phone'], PDO::PARAM_STR);
				$query->bindParam(":n1mobile", $data['n1mobile'], PDO::PARAM_STR);
				$query->bindParam(":n1email", $data['n1email'], PDO::PARAM_STR);
				$query->bindParam(":n1skype", $data['n1skype'], PDO::PARAM_STR);
				$query->bindParam(":n2name", $data['n2name'], PDO::PARAM_STR);
				$query->bindParam(":posada2", $data['posada2'], PDO::PARAM_STR);
				$query->bindParam(":n2phone", $data['n2phone'], PDO::PARAM_STR);
				$query->bindParam(":n2mobile", $data['n2mobile'], PDO::PARAM_STR);
				$query->bindParam(":n2email", $data['n2email'], PDO::PARAM_STR);
				$query->bindParam(":n2skype", $data['n2skype'], PDO::PARAM_STR);
				$query->bindParam(":n3name", $data['n3name'], PDO::PARAM_STR);
				$query->bindParam(":posada3", $data['posada3'], PDO::PARAM_STR);
				$query->bindParam(":n3phone", $data['n3phone'], PDO::PARAM_STR);
				$query->bindParam(":n3mobile", $data['n3mobile'], PDO::PARAM_STR);
				$query->bindParam(":n3email", $data['n3email'], PDO::PARAM_STR);
				$query->bindParam(":n3skype", $data['n3skype'], PDO::PARAM_STR);
				$query->bindParam(":pcRoomsZ", $data['pcRoomsZ'], PDO::PARAM_INT);
				$query->bindParam(":pcCountZ", $data['pcCountZ'], PDO::PARAM_STR);
				$query->bindParam(":pcWithInetZ", $data['pcWithInetZ'], PDO::PARAM_STR);
				$query->bindParam(":profSubjects", $data['profSubjects'], PDO::PARAM_STR);
				$query->bindParam(":atestat1", $data['atestat1'], PDO::PARAM_INT);
				$query->bindParam(":atestat2", $data['atestat2'], PDO::PARAM_INT);
				$query->bindParam(":atestat3", $data['atestat3'], PDO::PARAM_INT);
				$query->bindParam(":atestat4", $data['atestat4'], PDO::PARAM_INT);
				$query->bindParam(":dpa1", $data['dpa1'], PDO::PARAM_INT);
				$query->bindParam(":dpa2", $data['dpa2'], PDO::PARAM_INT);
				$query->bindParam(":dpa3", $data['dpa3'], PDO::PARAM_INT);
				$query->bindParam(":dpa4", $data['dpa4'], PDO::PARAM_INT);
				$query->bindParam(":all1", $data['all1'], PDO::PARAM_INT);
				$query->bindParam(":all2", $data['all2'], PDO::PARAM_INT);
				$query->bindParam(":all3", $data['all3'], PDO::PARAM_INT);
				$query->bindParam(":all4", $data['all4'], PDO::PARAM_INT);
				$query->bindParam(":eng1", $data['eng1'], PDO::PARAM_INT);
				$query->bindParam(":eng2", $data['eng2'], PDO::PARAM_INT);
				$query->bindParam(":eng3", $data['eng3'], PDO::PARAM_INT);
				$query->bindParam(":eng4", $data['eng4'], PDO::PARAM_INT);
				$query->bindParam(":ger1", $data['ger1'], PDO::PARAM_INT);
				$query->bindParam(":ger2", $data['ger2'], PDO::PARAM_INT);
				$query->bindParam(":ger3", $data['ger3'], PDO::PARAM_INT);
				$query->bindParam(":ger4", $data['ger4'], PDO::PARAM_INT);
				$query->bindParam(":frn1", $data['frn1'], PDO::PARAM_INT);
				$query->bindParam(":frn2", $data['frn2'], PDO::PARAM_INT);
				$query->bindParam(":frn3", $data['frn3'], PDO::PARAM_INT);
				$query->bindParam(":frn4", $data['frn4'], PDO::PARAM_INT);
				$query->bindParam(":isp1", $data['isp1'], PDO::PARAM_INT);
				$query->bindParam(":isp2", $data['isp2'], PDO::PARAM_INT);
				$query->bindParam(":isp3", $data['isp3'], PDO::PARAM_INT);
				$query->bindParam(":isp4", $data['isp4'], PDO::PARAM_INT);
				$query->bindParam(":syrdo1", $data['syrdo1'], PDO::PARAM_INT);
				$query->bindParam(":syrdo2", $data['syrdo2'], PDO::PARAM_INT);
				$query->bindParam(":syrdo3", $data['syrdo3'], PDO::PARAM_INT);
				$query->bindParam(":syrdo4", $data['syrdo4'], PDO::PARAM_INT);
				
				return $query->execute();
		    }
		/**
		 * Вихід користувачів
		 * */
		 public function logout(){
		 	session_destroy();
			setCookie("user_id", "" , time() -3600);
		 }
	   
 }
