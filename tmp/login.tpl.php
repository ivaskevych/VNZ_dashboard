<div class="login-form">
    <form class="pure-form" method="post">
        <fieldset>
            <legend>Введіть дані щоб увійти на особисту сторінку закладу</legend>

            <div><input type="text" name="weblogin" class="login" placeholder="Ваш логін" value="<?php echo $_POST['weblogin'];?>"></div>
            <br>
            <div><input type="password" placeholder="Ваш пароль" class="password" name="webpassword"></div>
            <!-- <input type="email" name="email" class="email" placeholder="Ваш Email" size="35"><br><br>
            <input type="password" placeholder="Ваш пароль" class="password" name="password" size="35">
             -->
            <!-- <label for="remember">
                <input id="remember" name="remember" value="1" type="checkbox"> Запам'ятати мене
            </label>
        <br><br>
            <a href="/recover">Забули пароль</a>  || <a href="/signup">Реєстрація</a> -->
            <br>
            <button type="submit" class="pure-button pure-button-primary" name="login">Увійти</button>
            <div class="copyright">
            &copy; <?=date('Y');?> ЛРЦОЯО
            </div>
        </fieldset>
    </form>
</div>