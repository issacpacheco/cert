<?php 
include ('../../config/config.php');
$consulta = mysqli_query($conexion,"SELECT * FROM si_educacion_continua_cursos WHERE MD5(id) = '".$_POST['token']."' LIMIT 1");
$d = mysqli_fetch_array($consulta);
$titulo = $d['nombre'];
?>
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="javascript: void(0);">Programa de educación continua</a></li>
					<li class="breadcrumb-item">Cursos</li>
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
						<h2><?php echo $d['nombre'];?></h2>
						
						<h4>Objetivo: </h4>
                        <p>Reconocer los componentes que integran una rúbrica de evaluación de aprendizaje a través del análisis de instrumentos para su diseño efectivo, viable y verás.</p>
						<p><?php echo $d['descripcion'];?></p>
						
						<h4>Modalidad: <strong><?php echo $d['modalidad'];?></strong></h4>
						<h4>Duración: <strong><?php echo $d['duracion'];?></strong></h4>
						<h4>Fecha: <strong><?php echo $d['fecha'];?></strong></h4>
					</div>
					
					

					<div class="row">
						<div class="col-sm-4">
							<input type="hidden" name="modulo" value="<?php echo $_POST['modulo'];?>">
							<input type="hidden" name="opcion" value="<?php echo $_POST['opcion'];?>">
							<div class="d-grid gap">
								<button type="submit" class="btn btn-success btn-lg btn-block" id="boton_guardar">Registrarme <i class="fas fa-pencil"></i></button>
							</div>	
						</div>
                        <div class="col-sm-4">
							<div class="d-grid gap">
								<a class="btn btn-info btn-lg btn-block">Descargar Constantancia <i class="fas fa-times"></i></a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="d-grid gap">
								<a href="javascript:void(0);" class="btn btn-danger btn-lg btn-block" onClick="Vista('<?php echo $_POST['modulo'];?>','catalogo_cursos')">Cancelar <i class="fas fa-times"></i></a>
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
		Swal.fire({
			icon: 'success',
  			title: 'Tu registro se llevó a cabo con éxito',
  			showConfirmButton: false,
  			timer: 1500
		});
		return false;
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
	
</script>
