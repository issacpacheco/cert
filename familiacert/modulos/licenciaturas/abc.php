<?php 
include ('../../config/config.php');
$tabla = 'si_'.$_POST['modulo'];
if (!isset($_POST['token']))
{
	//Nueva 
	$titulo = 'Nuevo';
}
else if (isset($_POST['token']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE MD5(id) = '".$_POST['token']."' LIMIT 1");
	$d = mysqli_fetch_array($consulta);	
	
	if ($_POST['opcion'] == 'editar')
	{
		//Editar
		$titulo = 'Editar';
	}
	else if ($_POST['opcion'] == 'eliminar')
	{
		//Eliminar
		$titulo = 'Eliminar';
		$read = 'readonly';
		$disabled = 'disabled';
	}
}

?>
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="javascript: void(0);">Oferta académica</a></li>
					<li class="breadcrumb-item">Licenciaturas</li>
					<li class="breadcrumb-item active"><?php echo $titulo;?></li>
				</ol>
			</div>
			<h4 class="page-title"><?php echo $titulo;?></h4>
		</div>
	</div>
</div> 

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="#" method="post" id="form_abc" enctype="multipart/form-data">

					<div class="row mb-3">
						<div class="col-lg-6">
							<label>Clave</label>
							<input type="text" class="form-control" placeholder="Clave" name="clave" value="<?php echo $d['clave'];?>" <?php echo $read;?>>
						</div>
						<div class="col-lg-6">
							<label>Nombre</label>
							<input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" value="<?php echo $d['nombre'];?>" <?php echo $read;?>>
						</div>
					</div>


					<div class="row mb-3">
						<div class="form-wrapper col-sm-12">
							<label>Descripción</label>
							<div class="form-group">
								<textarea name="descripcion" class="form-control" rows="4" placeholder="Descripción" <?php echo $read;?>><?php echo $d['descripcion'];?></textarea>
							</div>
						</div>
					</div>
					
					<div class="row mb-3">
						<div class="col-sm-6">
							<label>Modalidad</label>
							<select class="form-select" name="modalidad">
								<?php
									$consulta1 = mysqli_query($conexion,"SELECT * FROM si_modalidad");
									while ($d1 = mysqli_fetch_array($consulta1))
									{
										if ($d['modalidad'] == $d1['id'])
										{
											echo '<option value="'.$d1['id'].'" selected>'.$d1['nombre'].'</option>';
										}
										else
										{
											echo '<option value="'.$d1['id'].'">'.$d1['nombre'].'</option>';
										}
									}
								?>
							</select>
						</div>
						<div class="col-sm-6">
							<label>Periodo</label>
							<select class="form-select" name="periodo">
								<?php
									$consulta1 = mysqli_query($conexion,"SELECT * FROM si_periodo");
									while ($d1 = mysqli_fetch_array($consulta1))
									{
										if ($d['periodo'] == $d1['id'])
										{
											echo '<option value="'.$d1['id'].'" selected>'.$d1['nombre'].'</option>';
										}
										else
										{
											echo '<option value="'.$d1['id'].'">'.$d1['nombre'].'</option>';
										}
									}
								?>
							</select>
						</div>
					</div>


					<div class="row">
						<div class="col-sm-8">
							<input type="hidden" name="modulo" value="<?php echo $_POST['modulo'];?>">
							<input type="hidden" name="opcion" value="<?php echo $_POST['opcion'];?>">
							<?php
							if ($_POST['opcion'] == 'editar')
							{
								echo '
								<input type="hidden" name="token" value="'.$_POST['token'].'">
								<div class="d-grid gap">
									<button type="submit" class="btn btn-success btn-lg btn-block">Guardar <i class="fal fa-save"></i></button>
								</div>
								';
							}
							else if ($_POST['opcion'] == 'eliminar')
							{
								echo '
								<input type="hidden" name="token" value="'.$_POST['token'].'">
								<div class="d-grid gap">
									<button type="button" class="btn btn-danger btn-lg btn-block" id="boton_guardar" onClick="Confirmar()">Eliminar <i class="fal fa-trash-alt"></i></button>
								</div>
								';
							}
							else
							{
								echo '
								<div class="d-grid gap">
									<button type="submit" class="btn btn-success btn-lg btn-block" id="boton_guardar">Guardar <i class="fal fa-save"></i></button>
								</div>
								';
							}
							?>
						</div>
						<div class="col-sm-4">
							<div class="d-grid gap">
								<a href="javascript:void(0);" class="btn btn-info btn-lg btn-block" onClick="Vista('<?php echo $_POST['modulo'];?>','catalogo')">Cancelar <i class="fas fa-times"></i></a>
							</div>
						</div>
					</div>
				</form>

			</div> 
		</div> 
	</div>
</div> 


<script>
	$('#form_abc').validate({
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
            nombre: {
                required: true,
            }
        },

        submitHandler: function (form) {
            Guardar();
        }
    });

    $('#form_abc input').keypress(function (e) {
        if (e.which == 13) {
            if ($('#form_abc').validate().form()) 
            {
                Guardar();
            }
            return false;
        }
    });	
				
    function Guardar()
    {
		
		//var data = new FormData($('#form_abc'));
        $('#boton_guardar').empty();
        $('#boton_guardar').prop('disabled',true);
        $('#boton_guardar').append('<i class="fas fa-spinner fa-spin"></i> Enviando...');
        // Enviamos el formulario usando AJAX
        $.ajax({
            type: 'POST',
            url: 'modulos/<?php echo $_POST['modulo'];?>/guardar',
            cache:false,
            data: $('#form_abc').serialize(),
			//data:data,
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
                          text: 'Ocurrío un error en el sistema.',
                        });
                        break;
                    }
                    case "1":
                    {
                       Swal.fire({
                          icon: 'success',
                          title: 'Éxito',
                          text: 'El registro se guardó correctamente.',
                        });
						$('#form_abc').closest('form').find("input[type=text], input[type=email], input[type=tel], input[type=password], textarea").val("");
                    	break;
                    }
					 case "2":
                    {
                       Swal.fire({
                          icon: 'success',
                          title: 'Éxito',
                          text: 'El registro se actualizó correctamente.',
                        });
                    	break;
                    }
					 case "3":
                    {
                    	Vista('<?php echo $_POST['modulo'];?>','catalogo');
                    	break;
                    }
                    default:
                    {
                        //Error
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Ocurrío un error, por favor intente de nuevo.',
                        });
                    break;
                    }
                }
                $('#boton_guardar').empty();
                $('#boton_guardar').append('<i class="fal fa-save"></i> Guardar');
                $('#boton_guardar').prop('disabled',false);
				
            }
        })        
        return false;
    }	
	
	function Confirmar() {
					
					Swal.fire({
						title: 'ATENCIÓN',
						icon: 'info',
						width: 500,
						html:
							'<h4>¿Esta seguro que deseas eliminar este registro?</h4>',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: '<i class="fas fa-thumbs-up"></i> Sí, estoy seguro',
						cancelButtonText: '<i class="fas fa-thumbs-down"></i> ¡No!, aborta la misión',
						}).then((result) => {
						if (result.isConfirmed) {
							//Acept
							Guardar();
						}
					});
				}
</script>
