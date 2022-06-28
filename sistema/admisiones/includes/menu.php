	<style>	
	.left-nav-label {
		margin-top: 2px;
	}
	</style>
	<div class="navigation">
        <a class="navbar-brand">
            PANEL
            <i class="fas fa-bars text-primary left-nav-toggle pull-right vcentered"></i>
        </a>
        <ul class="nav primary">
			<li>
                <a href="./">
                    <i class="fas fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>
			<?php
			if ($_SESSION['campus']==1)
			{
			?>
			<!-- <li>
                <a href="prospectos_eventos">
                    <i class="fas fa-door-open"></i>
                    <span>Open House</span>
                </a>
            </li> -->
			<?php
			}
			?>
			<li>
                <a href="prospectos">
                    <i class="fas fa-user-plus"></i>
                    <span>Prospectos</span>
                </a>
            </li>
			<li>
                <a href="aspirantes">
                    <i class="fas fa-user-check"></i>
                    <span>Aspirantes</span>
                </a>
            </li>
			<li>
                <a href="alumnos">
                    <i class="fas fa-user"></i>
                    <span>Alumnos</span>
                </a>
            </li>
            <li>
                <a href="reimpresion_fichas">
                    <i class="fas fa-print"></i>
                    <span>Reimpresión de ficha</span>
                </a>
            </li>
            <li>
                <a href="reportes">
                    <i class="fas fa-file-chart-line"></i>
                    <span>Reportes</span>
                </a>
            </li>
			<!--li>
                <a href="test_aspirantes">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Test vocacional</span>
                </a>
            </li-->
		<?php
		if ($_SESSION['nivel']==1)
		{
		?>
			<li>
                <a href="usuarios">
                    <i class="fas fa-user-tie"></i>
                    <span>Usuarios</span>
					<?php
					$query2 = mysqli_query($conexion,"SELECT * FROM usuarios");
					?>
					<span class="label label-danger left-nav-label" style="margin-top: 6px;"> <?php echo mysqli_num_rows($query2);?></span>
                </a>
            </li>
		<?php
		}
		?>
        </ul>
		

        <div class="time text-center">
            <h5 class="current-time2">&nbsp;</h5>
            <h5 class="current-time">&nbsp;</h5>
        </div>
    </div>