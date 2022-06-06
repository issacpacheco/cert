<?php
//ID
//168925560407-ps67lbhpne685dn9v32thep9nhmmibv4.apps.googleusercontent.com
//LLAVE SECRETA
//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
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8" />
        <title>FAMILIA CERT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
		<!--Font awesome-->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
		<!--SweetAlert-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">
		
		<script src="https://accounts.google.com/gsi/client" async defer></script>
		
		

    </head>

    <body class="authentication-bg pb-0">

        <div class="auth-fluid">
            
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        
                        <div class="auth-brand text-center text-lg-start">
                            <a href="./" class="logo-dark">
                                <span><img src="assets/images/logo.png" alt=""></span>
                            </a>
                            <a href="./" class="logo-light">
                                <span><img src="assets/images/logo.png" alt=""></span>
                            </a>
                        </div>

                       
                        <h4 class="mt-0">Inicia tu sesión</h4>
                        <p class="text-muted mb-4">Ingresa con tu correo institucional y tu contraseña.</p>

                       
                        <form action="#" method="post" id="LoginForm">
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input class="form-control" type="email" id="correo" placeholder="Correo" name="correo">
                            </div>
                            <div class="mb-3">
                                <!--a href="" class="text-muted float-end"><small>¿Olvidaste tu contraseña?</small></a-->
                                <label for="pass" class="form-label">Contraseña</label>
                                <input class="form-control" type="password" id="pass" placeholder="Contraseña" name="pass">
							</div>
                            <div class="d-grid mb-0 text-center">
                                <button class="btn btn-primary" type="submit" id="boton_login"><i class="mdi mdi-login"></i> Entrar </button>
                            </div>
                            <!-- social-->
                            <div class="text-center mt-4">
                                <p class="text-muted font-16">Entrar con</p>
								<!--div id="g_id_onload"
     data-client_id="168925560407-ps67lbhpne685dn9v32thep9nhmmibv4.apps.googleusercontent.com"
     data-context="use"
     data-ux_mode="popup"
     data-login_uri="http://cert.edu.mx/familiacert/login"
     data-auto_prompt="false">
</div>

<div class="g_id_signin"
     data-type="standard"
     data-shape="pill"
     data-theme="filled_blue"
     data-text="$ {button.text}"
     data-size="large"
     data-locale="es-419"
     data-logo_alignment="left">
</div-->
                            </div>
                        </form>
                       
                    </div> 
                </div> 
            </div>
           
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3">Familia CERT</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> Somos CERT somos FAMILIA CERT. <i class="mdi mdi-format-quote-close"></i>
					</p>
                </div> 
            </div>
            
        </div>
       

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
		
		<!--Validación-->
		<script src="assets/js/jquery.validate.min.js" type="text/javascript" ></script>
		<script src="assets/js/localization/messages_es.min.js" type="text/javascript"></script>
		<!--SweetAlert-->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<script>
			window.onload = function () {
    google.accounts.id.initialize({
      client_id: '168925560407-ps67lbhpne685dn9v32thep9nhmmibv4.apps.googleusercontent.com'
	});
    google.accounts.id.prompt();
  };
		
		$('#LoginForm').validate({
			errorElement: 'span', //default input error message container
			errorClass: 'text-danger', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			onfocusout: function(element) {
					this.element(element);
			},//Validate on blur
			onkeyup: function(element) {
					this.element(element);
			}, //Validate on keyup
			focusCleanup:true, //If enabled, removes the errorClass from the invalid elements and hides all error messages whenever the element is focused
			ignore: "",
			rules: {
				correo: {
					required: true,
					email: true
				},
				pass: {
					required: true
				},
			},
			
			submitHandler: function (form) {
				Login();
			}
		});
			
		$('#LoginForm input').keypress(function (e) {
			if (e.which == 13) {
				if ($('#LoginForm').validate().form()) 
				{
					Login();
				}
				return false;
			}
		});	
				
		function Login()
		{
			$('#boton_login').empty();
			$('#boton_login').prop('disabled',true);
			$('#boton_login').append('<i class="fas fa-spinner fa-spin"></i> Enviando...');
			// Enviamos el formulario usando AJAX
			$.ajax({
				type: 'POST',
				url: "ajax/login",
				cache:false,
				data: $('#LoginForm').serialize(),
				// Mostramos un mensaje con la respuesta de PHP
				success: function(data) 
				{
					console.log(data);
					switch (data)
					{
						case "-1":
						{
							//Error
							Swal.fire({
							  icon: 'error',
							  title: 'Oops...',
							  text: 'El correo o la contraseña son incorrectos.',
							})
							break;
						}
						case "1":
						{
							//Redireccionar a perfil
							window.location.replace("./");
							break;
						}
						default:
						{
							//Error
							Swal.fire({
							  icon: 'error',
							  title: 'Oops...',
							  text: 'Ocurrío un error, por favor intente de nuevo.',
							})
						break;
						}
					}
					$('#boton_login').empty();
					$('#boton_login').append('<i class="fas fa-sign-in-alt"></i> Entrar');
					$('#boton_login').prop('disabled',false);
				}
			})        
			return false;
		}	

	
		
			
    	</script>

    </body>

</html>