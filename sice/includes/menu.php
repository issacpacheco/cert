<ul class="side-nav">
	<li class="side-nav-item">
        <a href="inicio" class="side-nav-link">
            <i class="fal fa-home"></i>
            <span> Inicio </span>
        </a>
    </li>
	<?php
	echo $_SESSION['id_area'];
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
                            <a href="licenciaturas">Licenciaturas</a>
                        </li>
                        <li>
                            <a href="">Especialidades</a>
                        </li>
                        <li>
                            <a href="">Maestrías</a>
                        </li>
                        <li>
                            <a href="">Doctorados</a>
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
                            <a href="asignaturas_lic">Licenciatura</a>
                        </li>
                        <li>
                            <a href="">Especialidad</a>
                        </li>
                        <li>
                            <a href="">Maestría</a>
                        </li>
                        <li>
                            <a href="">Doctorado</a>
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
                    <i class="fal fa-graduation-cap"></i>
                    <span class="badge bg-success float-end">4</span>
                    <span> Programa de educación continua </span>
                </a>
                <div class="collapse" id="educacion_continua">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="cursos">Cursos</a>
                        </li>
                        <li>
                            <a href="registro_">Inscripción</a>
                        </li>
                    </ul>
                </div>
            </li>
			<?php
			break;
		}
	}
    

    ?>

</ul>