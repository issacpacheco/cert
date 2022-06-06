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
        <!--link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" /-->
		
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<meta name="google-signin-client_id" content="959186263420-hvavgup9468luiv6rjjeldjhp9if0d8r.apps.googleusercontent.com">

    </head>

    <body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-start">
                            <a href="./" class="logo-dark">
                                <span><img src="assets/images/logo.png" alt=""></span>
                            </a>
                            <a href="./" class="logo-light">
                                <span><img src="assets/images/logo.png" alt=""></span>
                            </a>
                        </div>

                        <!-- title-->
                        <h4 class="mt-0">Inicia tu sesión</h4>
                        <p class="text-muted mb-4">Ingresa con tu correo institucional y tu contraseña.</p>

                        <!-- form -->
                        <form action="#">
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Correo</label>
                                <input class="form-control" type="email" id="emailaddress" required="" placeholder="Correo">
                            </div>
                            <div class="mb-3">
                                <a href="" class="text-muted float-end"><small>¿Olvidaste tu contraseña?</small></a>
                                <label for="password" class="form-label">Contraseña</label>
                                <input class="form-control" type="password" required="" id="password" placeholder="Contraseña">
							</div>
                            <div class="d-grid mb-0 text-center">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Entrar </button>
                            </div>
                            <!-- social-->
                            <div class="text-center mt-4">
                                <p class="text-muted font-16">Entrar con</p>
								<div class="g-signin2" data-onsuccess="onSignIn"></div>
                            </div>
                        </form>
                        <!-- end form-->

                       

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3">Familia CERT</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> Somos CERT somos FAMILIA CERT. <i class="mdi mdi-format-quote-close"></i>
					</p>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
		<script>
			function onSignIn(googleUser) {
			  var profile = googleUser.getBasicProfile();
			  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
			  console.log('Name: ' + profile.getName());
			  console.log('Image URL: ' + profile.getImageUrl());
			  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
			}
		</script>

    </body>

</html>