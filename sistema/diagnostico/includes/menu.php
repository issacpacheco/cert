<div class="navigation">
        <a class="navbar-brand">
            PANEL
            <i class="fa fa-bars text-primary left-nav-toggle pull-right vcentered"></i>
        </a>
        <ul class="nav primary">
            <li>
                <a href="./">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>
			<?php
			if ($_SESSION['nivel']=='1')
			{
			?>
			<li class="nav-item-expandable">
                <a href="#catalogos" data-toggle="collapse" aria-expanded="false"> 
                    <i class="fa fa-list-ul"></i>
                    <span> Catálogos </span>
                    <span class="nav-item-icon"> <i class="fa fa-chevron-down"></i> </span>
                </a>
                <ul id="catalogos" class="nav nav-item collapse">
                    <li>
						<a href="areas">
							<i class="fa fa-object-group"></i>
							<span>Áreas</span>
						</a>
					</li>
					<li>
						<a href="reactivos">
							<i class="fa fa-sliders"></i>
							<span>Reactivos</span>
						</a>
					</li>
					<li>
						<a href="extras">
							<i class="fa fa-file-text"></i>
							<span>Extras (Lecturas)</span>
						</a>
					</li>
                </ul>
            </li>
			<?php
			}
			?>
            <li>
                <a href="aspirantes">
                    <i class="fa fa-users"></i>
                    <span>Aspirantes</span>
                </a>
            </li>
			<li>
                <a href="aspirantes_completos">
                    <i class="fa fa-users"></i>
                    <span>Aspirantes Completos</span>
                </a>
            </li>
			<li>
                <a href="aspirantes_lista_resultados">
                    <i class="fa fa-check"></i>
                    <span>Resultados</span>
                </a>
            </li>
        </ul>

        <div class="time text-center">
            <h5 class="current-time2">&nbsp;</h5>
            <h5 class="current-time">&nbsp;</h5>
        </div>
    </div>