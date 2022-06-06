	<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div id="navbar" class="navbar-collapse">
            	<ul class="breadcrumb">
        			<li class="breadcrumb-home"><a href="./"><i class="fas fa-home"></i></a></li>
					<li><?php echo $_SESSION['campus']==1?'Mérida':'Ticul';?></li>
        		</ul>
                <ul class="nav navbar-nav navbar-right">
					<li>
                    	<a href="#">
                        	<i class="fas fa-school"></i> Campus <?php echo $_SESSION['campus']==1?'Mérida':'Ticul';?>  
                        </a>
                    </li>
					<?php
					$consulta_alertas = mysqli_query($conexion,"SELECT * FROM prospectos WHERE id_asesor = '".$_SESSION['id_admin']."' AND comentarios = ''");
					?>
					<li class="dropdown" id="notifications-toggle">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">
                        	<i class="fas fa-bell"></i>
                            <span class="label label-danger notification-label"><?php echo mysqli_num_rows($consulta_alertas);?></span>
                        </a>
						<?php 
						if (mysqli_num_rows($consulta_alertas)>0)
						{
						?>
                        <ul class="list-unstyled notifications dropdown-menu">
							<?php
							while ($datos = mysqli_fetch_array($consulta_alertas))
							{
							?>
                        	<li>
                        		<i class="fas fa-user small-icon text-center vcentered"></i>
                        		<span class="notification-title vcentered"> 
                        			<b>
										<a href="prospectos"><?php echo $datos['nombre'];?></a>
									</b>
                        		</span>
                        		<span class="notification-time text-muted">  <?php echo FechaCorta($datos['fecha']);?></span>
                        	</li>
							<?php
							}
							?>
                        </ul>
						<?php
						}
						?>
                    </li>
                    <li>
                    	<a href="logout">
                        	Salir <i class="fa fa-sign-out"></i> 
                        </a>
                    </li>
                    <li class="profile">
                        <a href="perfil">
                            <img alt="<?php echo $_SESSION['nombre'];?>" src="images/avatar.png" class="img-circle">
                            <div class="vcentered">
	                            <p class="profile-name"><?php echo $_SESSION['nombre'];?></p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>