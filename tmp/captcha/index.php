<?php
  session_start();

  if(!empty($_POST)){

  if($_SESSION['captcha'] == $_POST['captcha']){
  	 echo "Правильна відповідь";

  }else{
  	echo "Ви ввели неправильну відповідь";
  }
    exit;
  }

?>
<form method="post">
<p>Введіть результат: <br>
	<img src="img.php">
	<br>
	<input type="text" size="35" name="captcha">

</p>
<input type="submit" value="Готово" name="button">
</form>

