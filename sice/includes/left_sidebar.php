			<div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="./" class="logo text-center logo-light my-2">
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="FAMILIA CERT" width="60">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo-dark.png" alt="FAMILIA CERT" width="60">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="./" class="logo text-center logo-dark my-2">
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
                </a>
    
                <div class="h-100 mt-3" id="leftside-menu-container" data-simplebar>
                    <ul class="side-nav">
							<li class="side-nav-item">
								<a href="./" class="side-nav-link">
									<i class="fal fa-home"></i>
									<span> Inicio </span>
								</a>
							</li>
							<?php
							switch ($_SESSION['id_area'])
							{
								//alumnos
								case 0:{
									?>
									<li class="side-nav-title side-nav-item">Apps</li>

									<li class="side-nav-item">
										<a href="pagos" class="side-nav-link">
											<i class="fal fa-cash-register"></i>
											<span> Pagos </span>
										</a>
									</li>
									<?php
									break;
								}
								case 3:{
									?>
									<li class="side-nav-title side-nav-item">Desarrollo académico</li>

									<li class="side-nav-item">
										<a data-bs-toggle="collapse" href="#oferta_educativa" aria-expanded="false" aria-controls="oferta_educativa" class="side-nav-link">
											<i class="fal fa-graduation-cap"></i>
											<span class="badge bg-success float-end">4</span>
											<span> Oferta educativa </span>
										</a>
										<div class="collapse" id="oferta_educativa">
											<ul class="side-nav-second-level">
												<li>
													<a href="javascript:void(0);" class="menu" onClick="Vista('licenciaturas','catalogo')" id="menu_licenciaturas">Licenciaturas</a>
												</li>
												<li>
													<a href="javascript:void(0);" class="menu" onClick="Vista('especialidades','catalogo')" id="menu_especialidades">Especialidades</a>
												</li>
												<li>
													<a href="javascript:void(0);" class="menu" onClick="Vista('maestria','catalogo')" id="menu_maestrias">Maestrías</a>
												</li>
												<li>
													<a href="javascript:void(0);" class="menu" onClick="Vista('doctorado','catalogo')" id="menu_doctorados">Doctorados</a>
												</li>
											</ul>
										</div>
									</li>

									<li class="side-nav-item">
										<a data-bs-toggle="collapse" href="#asignaturas" aria-expanded="false" aria-controls="asignaturas" class="side-nav-link">
											<i class="fal fa-pencil"></i>
											<span> Asignaturas </span>
										</a>
										<div class="collapse" id="asignaturas">
											<ul class="side-nav-second-level">
												<li>
													<a href="javascript:void(0);">Licenciatura</a>
												</li>
												<li>
													<a href="javascript:void(0);">Especialidad</a>
												</li>
												<li>
													<a href="javascript:void(0);">Maestría</a>
												</li>
												<li>
													<a href="javascript:void(0);">Doctorado</a>
												</li>
											</ul>
										</div>
									</li>

									<?php
									break;
								}
								case 10:{
								?>
								<li class="side-nav-title side-nav-item">Planta Docente</li>

								<li class="side-nav-item">
									<a data-bs-toggle="collapse" href="#educacion_continua" aria-expanded="false" aria-controls="educacion_continua" class="side-nav-link">
										<i class="fal fa-chalkboard-teacher"></i>
										<span> Educación continua </span>
									</a>
									<div class="collapse" id="educacion_continua">
										<ul class="side-nav-second-level">
											<li>
												<a href="javascript:void(0);" class="menu" onClick="Vista('educacion_continua','catalogo_cursos')" id="menu_educacion_continua_cursos">Cursos</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="side-nav-item">
									<a data-bs-toggle="collapse" href="#anuncios" aria-expanded="false" aria-controls="anuncios" class="side-nav-link">
										<i class="fal fa-bullhorn"></i>
										<span> Anuncios </span>
									</a>
								</li>
								<li class="side-nav-item">
									<a data-bs-toggle="collapse" href="#autoevaluacion_docente" aria-expanded="false" aria-controls="autoevaluacion_docente" class="side-nav-link">
										<i class="fal fa-ballot-check"></i>
										<span> Autoevaluación docente </span>
									</a>
								</li>
								<li class="side-nav-item">
									<a data-bs-toggle="collapse" href="#programa_tutorias" aria-expanded="false" aria-controls="programa_tutorias" class="side-nav-link">
										<i class="fal fa-users-class"></i>
										<span> Programa de tutorías </span>
									</a>
								</li>
								<?php
								break;
								}
							}
						?>
						
						</ul>
                    <div class="clearfix"></div>
                </div>

            </div>