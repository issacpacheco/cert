<?php
require_once('../includes/PHPMailer-master/PHPMailerAutoload.php');
require_once('../includes/Mobile_Detect.php');
require_once('../includes/globals.php');
//$_POST['correo'] = 'christhian.sosa@gmail.com';
if (isset($_POST['correo']))
{
	if ($_POST['correo'] == "")
	{
		header("location:./");
	}
	//Validar correo
	if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) 
	{
		$message = '<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title></title>

</head>

<body style="font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif; background-color:#fff; margin:0; padding:0; color:#002843;">

<table width="100%" bgcolor="#002843" cellpadding="0" cellspacing="0" border="0" style="padding:30px 0">
	<tbody>
		<tr>
			<td>
				<table cellpadding="0" cellspacing="0" width="600" border="0" align="center" bgcolor="#fff">
					<tbody>					
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" border="0" width="100%">
									<tbody>
										<tr>
											<td width="100%" align="center" bgcolor="#fff" style="padding:24px">
												<img src="'.$GLOBALS['config_host'].'/assets/images/logos/logo_mail.png">
											</td>	
										</tr>										
									</tbody>
								</table>
							</td>
						</tr>
												
						<tr>
							<td>
								<table cellpadding="0" cellspacing="0" border="0" width="100%">
									<tbody>
										<tr>
											<td width="100%" height="200" style="padding: 20px 5px" align="center">
											<p>Nombre: '. $_POST['nombre'].'</p>
											<p>Teléfono: '. $_POST['telefono'].'</p>
											<p>Correo: '. $_POST['correo'].'</p>
											<p>Mensaje:</p>
											<p>'. $_POST['mensaje'].'</p>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>	
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>';
			
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
		
		$mail->Host = $GLOBALS['config_mail_host'];
		$mail->Port = $GLOBALS['config_mail_port'];
		$mail->Username = $GLOBALS['config_mail_username'];
		$mail->Password = $GLOBALS['config_mail_password'];
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
		
        $mail->setFrom( "noreply@cert.edu.mx", "CERT" );
        $mail->Subject = 'Nuevo mensaje de la sección de contacto';
        $mail->CharSet = 'UTF-8';
        $mail->addAddress('contacto@cert.edu.mx','Contacto');
        $mail->MsgHTML($message);
        $mail->IsHTML(true);
        if ($mail->Send())
        {
            echo "1";
        }
        else
        {
            echo "-1";
        }
	}
	else
	{
		echo "-2";//Correo no válido
	}
}
else
{
	header("location:./");	
}
?>