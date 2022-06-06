<?php
	require_once('includes/PHPMailer-master/PHPMailerAutoload.php');
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 1;
	$mail->Debugoutput = 'html';
	$mail->SMTPAuth = false;
	$mail->SMTPSecure = 'ssl';
	$mail->CharSet = 'UTF-8';
	$mail->IsHTML(true);

	$mail->Host = 'relay-hosting.secureserver.net';
	$mail->Port = 25;
	$mail->SMTPAutoTLS = false;
	//$mail->Username = $GLOBALS['config_mail_username'];
	//$mail->Password = $GLOBALS['config_mail_password'];

	$mail->setFrom( "noreply@cert.edu.mx","Centro Educativo Rodríguez Tamayo"  );
	$mail->Subject = 'Prueba';
	
	$mail->addAddress('christhian.sosa@gmail.com', 'Christhian');
	
	$mail->MsgHTML('<p>hola</p>');
	echo $mail->Send()?'-1':'1';
?>