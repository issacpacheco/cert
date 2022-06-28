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
        <title>Sistema Integral de Control Escolar | CERT</title>
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
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
								<h2>Sistema Integral de Control Escolar</h2>
                            </a>
                            <a href="./" class="logo-light">
                                <span><img src="assets/images/logo.png" alt=""></span>
                            </a>
                        </div>

                       
                        <h4 class="mt-0">Inicia tu sesión</h4>
                        <p class="text-muted mb-4">Ingresa con tu correo institucional y tu contraseña.</p>
						<div id="g_id_onload" 
							 data-client_id="168925560407-e60d6qr86g7h9jk6b1obihbqsja9bn1i.apps.googleusercontent.com" 
							 data-callback1="handleCredentialResponse" 
							 data-login_uri="https://sice.cert.edu.mx/"
							 data-auto_prompt="false">
							<!--data-login_uri="https://sice.cert.edu.mx/"-->
						</div>
						<div class="g_id_signin"
							 data-type="standard"
							 data-size="large"
							 data-theme="outline"
							 data-text="sign_in_with"
							 data-shape="rectangular"
							 data-theme="filled_blue"
							 data-logo_alignment="left">
						</div>
                       
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
		<!--SweetAlert-->
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		
		<script>
			function decodeJwtResponse (token) {
				var base64Url = token.split('.')[1];
				var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
				var jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
					return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
				}).join(''));

				return JSON.parse(jsonPayload);
			};
			
			
			function handleCredentialResponse(response) {
				// decodeJwtResponse() is a custom function defined by you
				// to decode the credential response.
				console.log(response.credential);
				const responsePayload = decodeJwtResponse(response.credential);

				console.log("ID: " + responsePayload.sub);
				console.log('Full Name: ' + responsePayload.name);
				console.log('Given Name: ' + responsePayload.given_name);
				console.log('Family Name: ' + responsePayload.family_name);
				console.log("Image URL: " + responsePayload.picture);
				console.log("Email: " + responsePayload.email);
			}
		</script>
    </body>

</html>