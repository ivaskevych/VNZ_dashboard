<?php
/**
 * @desc Mail class
 */
 class Mail{
   //Надсилання листа
   public static function new_mail($to, $subject, $message){
   	
   	 $headers = "MIME-Version: 1.0" . "\r\n";
	 $headers .= "Content-type:text/html;charset=windows-1251" . "\r\n";
   	 $headers .= 'From: mail@mail.com' . "\r\n";

     if(mail($to, $subject, $message, $headers)) return true;
	
	 return false;
   }
   	
 }
