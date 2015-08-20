<form class="pure-form" method="post">
    <fieldset>
        <legend>Реєстрація</legend>

<br>
        <p><em class='result_email'></em></p>
        <input type="email" class="email" name="email" placeholder="Ваш Email" size="35" required>
        <p><em class='result_password'></em></p>
        <input type="password" placeholder="Ваш пароль" class='password' name="password" size="35" required > <br><br>
  
        <input type="text" name="name" placeholder="Ваше ім'я"  size="35"><br><br>
        <br><br>
        <img src="tmp/captcha/img.php">
        <br>
        <input type="text" name="captcha" placeholder="Введіть суму чисел" size="35">
        <br><br>
     <p><strong>Увага!</strong> - Після реєстрації, на ваш Email прийде лист для активації..</p>
        <br><br>
        <button type="submit" name="signup" class="pure-button pure-button-primary">Зереєструватися</button>
       	
    </fieldset>
  

</form>
<br>
       <h2>АБО</h2>
       <br>
        <a href="/login">
        	<button class="button-warning pure-button">Увійти в кабінет</button>
        </a> 