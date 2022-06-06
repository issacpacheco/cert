<?php
$hoy = date("Y-m-d");
$hora = date('H:i:s');
$device = new Mobile_Detect;

//CONFIG
$GLOBALS['config_host'] = 'http://cert.edu.mx/';
$GLOBALS['hoy'] = $hoy;
$GLOBALS['hora'] = $hora;
$GLOBALS['device'] = $device;

//MAIL
$GLOBALS['config_mail_host'] = 'smtp.gmail.com';
$GLOBALS['config_mail_port'] = 465;
$GLOBALS['config_mail_username'] = 'noreply@cert.edu.mx';
$GLOBALS['config_mail_password'] = 'UfQtHxZ7gxpGbwaH';
?>