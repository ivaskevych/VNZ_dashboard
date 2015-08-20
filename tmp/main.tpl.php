<!doctype html>
<html>
	<head>
		<title>
		  Особистий кабінет закладу	
		</title>
		<link rel="stylesheet" href="tmp/css/pure-min.css" type="text/css">
		<link rel="stylesheet" href="tmp/css/base-min.css" type="text/css">
		<link rel="stylesheet" href="tmp/css/buttons-min.css" type="text/css">
		<link rel="stylesheet" href="tmp/css/forms-min.css" type="text/css">
		<link rel="stylesheet" href="tmp/css/menus-min.css" type="text/css">
		<link rel="stylesheet" href="tmp/css/style.css" type="text/css">
		<link rel="stylesheet" href="tmp/css/print.css" type="text/css" media="print">
		<!--JS Scripts-->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
 		<script type="text/javascript">
 		$(function(){
		    $(".login").blur(function(){
	        var login = $(".login").val();
	        if(login.length < 6){
	         	$(".login").css({'border-color': 'red'});
	        	$(".result_login").html('<strong style="color:red">Логін повинен складатися з 6 символів</strong>');
	        }else{
	        	$(".login").css({'border-color':'green'});
	        	$(".result_login").html('<strong style="color:green">Логін коректний</strong>');
	      	}
	        });
	      
	       $(".password").blur(function(){
	        var password = $(".password").val();
	        if(password.length < 6){
	         	$(".password").css({'border-color': 'red'});
	        	$(".result_password").html('<strong style="color:red">Пароль повинен складатися з 6 символів</strong>');
	        }else{
	        	$(".password").css({'border-color':'green'});
	        	$(".result_password").html('<strong style="color:green">Пароль коректний</strong>');
	      }
	      })			 
		});
</script> 
<style type='text/css'>
	div.success{
		color:green;
		font-size:1.8em;
		text-align:center;
	}
	div.error{
		color:red;
		font-size:1.8em;
		text-align:center;
	}
	div.copyright{
		/*margin-top:60px;
		border-top: 1px solid silver;
		padding-top: 10px;
		text-align:center;*/
		position: absolute;
		bottom: 10px;
		left: 33%;
		font-size: 80%;
	}
	.pure-form input[type=email] {
    border-radius: 0px;
    padding: 0.6em 1em;    
}
</style>
	</head>
	<body>
		
		<div align="center">
			<!-- <h3>Вітаємо в особистому кабінеті навчального закладу!</h3> -->
			<br>
				
		     <!-- Перевіряємо чи користувач авторизований  -->
			<?php if(Validate::UserStatus() == true): ?>
			  <h3>Вітаємо в особистому кабінеті навчального закладу!</h3>	
			  <div class="pure-menu pure-menu-open pure-menu-horizontal">
    <ul>
        <li><a href="/">Головна</a></li>
        <!-- <li><a href="users">Інші користувачі</a></li>
        <li><a href="profile">Профіль</a></li> -->
        <li><a href="info">Інформація про заклад</a></li>
        <li><a href="anket">Анкета (для редагування)</a></li>
        <li><a href="logout">Вихід</a></li>
    </ul>
</div>	
<br><br>
<?php if(route::dispatcher() == "users"): ?>
	<?php include_once 'users.tpl.php'; ?>
<?php elseif(route::dispatcher() == "info"): ?>
	<?php include_once 'info.tpl.php'; ?>
<?php elseif(route::dispatcher() == "anket"): ?>
	<?php include_once 'anket.tpl.php'; ?>
<?php elseif(route::dispatcher() == "profile"):?>
	<?php include_once 'profile.tpl.php';	?>
<?php else: ?>		 	
<p>Тут відображатиметься інформація для авторизованих користувачів.</p>
	<?php endif; ?>			  	
			 <?php else: ?>
<!-- 			 			 	  	  <div class="pure-menu pure-menu-open pure-menu-horizontal">
    <ul>
        <li><a href="/">Головна</a></li>
        <li><a href="login">Вхід</a></li>
        <li><a href="signup">Реєстрація</a></li>

    </ul>
</div> -->	 <br><br>
<?php include_once 'login.tpl.php'; ?>
			 <?php if(route::dispatcher() == "login"): ?>
			 	  <?php include_once 'login.tpl.php'; ?>
			 	<?php elseif(route::dispatcher() == "signup"): ?>
			 	  <?php include_once 'sign.tpl.php'; ?>
			  <?php elseif(route::dispatcher() == "recover"): ?>
			 	  <?php include_once 'repassword.tpl.php'; ?>
			 	
			 	<?php endif; ?>	
			 <?php endif; ?>
		</div>
<!-- 		<div class="copyright">
			&copy; <?=date('Y');?> ЛРЦОЯО
		</div> -->
	</body>
</html>