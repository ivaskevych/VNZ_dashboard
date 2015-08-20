<?php
 $data = new data();
 $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
 $result = $data->showProfile($id);
?>
<form method="post" class="pure-form">
	<p>
		E-mail:<br>
		<input type="email" name="email" size="35" value="<?=$result->email;?>">
	</p>
	<p>
		Пароль: <br>
		<input type="password" name="password" size="35" value=""><br>
		<em>Залиште поле пустим якщо не хочете змінювати пароль! </em>
	</p>
	<p>
		Ім'я:<br>
		<input type="text" name="name" size="35" value="<?=$result->name;?>">
	</p>
	<p>
		Вік:<br>
		<input type="text" name="age" size="35" value="<?=$result->age;?>">
	</p>
	<p>
		Країна:<br>
		<input type="text" name="country" size="35" value="<?=$result->country;?>">
		<input type="hidden" name="id" value="<?php echo $id;?>">
	</p>
 <button type="submit" class="pure-button pure-button-primary" name="profile">Зберегти зміни</button>
</form>
