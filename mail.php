<?php
	session_start();
	if (md5($_GET['captcha']) == $_SESSION['random_check'])
	{ 
		echo "Отлично, введено верное слово.</br>";
		
		if (isset($_GET['your_mail']) || isset($_GET['Email']) || isset($_GET['Headline']) || isset($_GET['Message']))
		{
			$to = $_GET['Email'];
			$subject = $_GET['Headline'];
			$subject = '=?utf-8?B?'.base64_encode($subject).'?=';
			$message = $_GET['Message'];
			$headers = "From: <{$_GET['your_mail']}>\r\n";
			$headers .= "Reply-to: {$_GET['your_mail']}\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8';
					
			$message = wordwrap($message, 70, "\r\n");
			if (mail($to, $subject, $message, $headers))
			{
				echo ("Сообщение отправлено: " . $to);
			}
			else
			{
				echo ("Сообщение не отправлено!");	
			}
		}
	}
	else
	{  
		echo "Введено неверное слово!";
	}