<?php 
include ('../../config/config.php');
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Oferta educativa</a></li>
                    <li class="breadcrumb-item active">Licenciaturas</li>
                </ol>
            </div>
            <h4 class="page-title">Licenciaturas</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="javascript: void(0);" class="btn btn-success btn-lg my-3" onClick="Vista('licenciaturas','abc','agregar')"><i class="fal fa-plus"></i> Agregar nueva licenciatura </a>

                <table class="table table-striped table-centered mb-0" id="tabla">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Modalidad</th>
                            <th>Periodo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $consulta = mysqli_query($conexion,"SELECT * FROM si_licenciaturas");
                        while ($d = mysqli_fetch_array($consulta))
                        {
                            $consulta1 = mysqli_query($conexion,"SELECT * FROM si_modalidad WHERE id = '".$d['modalidad']."'");
                            $d1 = mysqli_fetch_array($consulta1);

                            $consulta2 = mysqli_query($conexion,"SELECT * FROM si_periodo WHERE id = '".$d['periodo']."'");
                            $d2 = mysqli_fetch_array($consulta2);

                            ?>
							<tr>
                                <td><?php echo $d['nombre'];?></td>
                                <td><?php echo $d1['nombre'];?></td>
                                <td><?php echo $d2['nombre'];?></td>
                                <td class="table-action">
                                    <a href="javascript: void(0);" class="btn btn-success mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" onClick="Vista('licenciaturas','abc','editar','<?php echo md5($d['id']);?>')"> <i class="fal fa-pencil"></i></a>
                                    <a href="javascript: void(0);" class="btn btn-danger mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" onClick="Vista('licenciaturas','abc','eliminar','<?php echo md5($d['id']);?>')"> <i class="fal fa-trash-alt"></i></a>
                                </td>
                            </tr>
							<?php
                        }
                        ?>
                    </tbody>
                </table>

            </div> 
        </div> 
    </div>
</div> 

<script>
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	});
	$('#tabla').DataTable( {
		"language": { url:"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"},
		"ordering": true,
		"paging": true,
		"searching": true,
		"info": true,
		"fixedHeader": true,
		"autoFill": false,
		"colReorder": false,
		"fixedColumns": false,
		"responsive": true,
		"dom": 'Bfrtip',
		"pageLength": 50,
		"order": [[ 2, "desc" ]],
		"buttons": [
			 {
				extend: 'excel',
				exportOptions: {
					columns: [0,1,2]
				},
				text: 'Excel <i class="fal fa-file-excel"></i>',
				messageTop: '',
				footer: true
			 },
			 {
				extend: 'pdfHtml5',
				orientation: 'landscape',
				exportOptions: {
					columns: [0,1,2]
				},
				text: 'PDF <i class="fal fa-file-pdf"></i>',
				messageTop: 'LICENCIATURAS',
				footer: true
			 },
			 {
				extend: 'print',
				exportOptions: {
					columns: [0,1,2]
				},
				text: 'Imprimir <i class="fal fa-print"></i>',
				messageTop: '',
				footer: true
			 },
		]
	} );
</script>

