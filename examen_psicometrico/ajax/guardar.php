<?php
include('../../includes/conexion.php');
include('../includes/config.php');
session_start();
$id_l = $_POST['id_l'];
$pregunta_l = "0";
$alerta_l = "";
$datos_aux = 0;
if(isset($_SESSION['factores']))
{
	//Después de la primera iteración
	$factores = $_SESSION['factores'];
	//Verificar conteo para escala de mentira
	if ($_SESSION['cuenta_l']==5)
	{
		$mentira = $_SESSION['mentira'];
		$_SESSION['cuenta_l']=0;
		//Enviar los datos de la escala de mentira
		foreach($mentira as $men => $m)
		{
			$consulta_l = mysqli_query($conexion2,"SELECT * FROM escala_mentira WHERE id = '".$mentira[$m['id']]['id']."'");
			$d_l = mysqli_fetch_array($consulta_l);
			$id_l = $d_l['id'];
			$pregunta_l = $d_l['nombre'];
			$alerta_l = $d_l['alerta'];
			break;	
		}	
		//Sacar el la pregunta de mentira del array
		unset($mentira[$id_l]);
		$_SESSION['mentira'] = $mentira;
	}
	if (isset($_POST['id_reactivo']) && isset($_POST['id_factor']) && isset($_POST['respuesta']))
	{
		$_SESSION['cuenta_l']++;
		//Verificar que el reactivo esté guardado en la encuesta con el id del aspirante
		$consulta_encuesta = mysqli_query($conexion2,"SELECT * FROM encuesta WHERE id_reactivo = '".$_POST['id_reactivo']."' AND id_aspirante = '".$_SESSION['id']."' LIMIT 1");
		if (mysqli_num_rows($consulta_encuesta)>0)
		{
			//Ya se guardó la respuesta enviar otra pregunta
			$consulta_factor = mysqli_query($conexion2,"SELECT * FROM factores WHERE id = '".$_POST['id_factor']."'");
			$d = mysqli_fetch_array($consulta_factor);
				
			$consulta_reactivo = mysqli_query($conexion2,"SELECT * FROM reactivos WHERE id_factor = '".$d['id']."'");
			while($reactivo = mysqli_fetch_array($consulta_reactivo))
			{		
				//Verificar que no haya sido preguntada y respondida con anterioridad
				$consulta_encuesta = mysqli_query($conexion2,"SELECT * FROM encuesta WHERE id_reactivo = '".$reactivo['id']."' AND id_aspirante = '".$_SESSION['id']."' LIMIT 1");
				if (mysqli_num_rows($consulta_encuesta)==1)
				{
					//Ya se guardó el reactivo en la encuesta
					continue;
				}
				else
				{
					//Enviar el reactivo actual
					$datos[] = array(
						"id_factor" => $d['id'],
						"id_reactivo" => $reactivo['id'],
						"reactivo" => $_SESSION['genero'] == 'H' ? $reactivo['reactivo_h'] : $reactivo['reactivo_m'],
						"factor" => $d['nombre'],
						"cuenta" => $cuenta,
						"id_l" => $id_l,
						"pregunta_l" => $pregunta_l,
						"cuenta_l" => $_SESSION['cuenta_l'],
						"alerta_l" => $alerta_l,
						"finalizar"=> 0,
						"console" => "En proceso con cuenta menor a 4, con reactivo guardado con anterioridad"
					);
					break;
				}
			}				
		}
		else
		{			
			//Evaluar para la cuenta
			$cuenta = $_POST['cuenta'];
			$consulta_factor = mysqli_query($conexion2,"SELECT * FROM factores WHERE id = '".$_POST['id_factor']."' LIMIT 1");
			$factor = mysqli_fetch_array($consulta_factor);

			$consulta_reactivo = mysqli_query($conexion2,"SELECT * FROM reactivos WHERE id = '".$_POST['id_reactivo']."' LIMIT 1");
			$reactivo = mysqli_fetch_array($consulta_reactivo);
			// v = -1 * 1  = -1 (No = -1) => La respuesta es la esperada
			// v = -1 * -1 = 1  (Si =  1) => La respuesta es la esperada
			$respuesta = ($factor['tipo'] * $reactivo['tipo']) == $_POST['respuesta'] ? 1 : 0;
			$cuenta = ($factor['tipo'] * $reactivo['tipo']) == $_POST['respuesta']  ? $cuenta+1 : $cuenta;
			
			if ($_POST['respuesta']==1)
			{
				$respuesta_capturada = "Sí";
			}
			else if ($_POST['respuesta'] == -1)
			{
				$respuesta_capturada = "No";
			}
			else if ($_POST['respuesta']==0)
			{
				$respuesta_capturada = "No sé";
			}
			
			//Guardar respuesta
			mysqli_query($conexion2,"ALTER TABLE encuesta AUTO_INCREMENT = 0");
			mysqli_query($conexion2,"INSERT INTO encuesta VALUES ('0', '".$_SESSION['id']."', '".$_POST['id_factor']."', '".$_POST['id_reactivo']."', '".$respuesta_capturada."', '".$respuesta."', '".$hoy."', '".$hora."')");
			
			//Verificar si la cuenta es 4 para sacar el factor del array
			if ($cuenta == 4)
			{
				$contador_factores = 0;
				$cuenta = 0;
				//Sacar el factor del array
				unset($factores[$_POST['id_factor']]);
				$_SESSION['factores'] = $factores;
				
				foreach($factores as $fac => $v)
				{
					$contador_factores++;
					$consulta_factor = mysqli_query($conexion2,"SELECT * FROM factores WHERE id = '".$factores[$v['id']]['id']."'");
					$d = mysqli_fetch_array($consulta_factor);
					
					$consulta_reactivo = mysqli_query($conexion2,"SELECT * FROM reactivos WHERE id_factor = '".$d['id']."'");
					$reactivo = mysqli_fetch_array($consulta_reactivo);
					$datos[] = array(
						"id_factor" => $d['id'],
						"id_reactivo" => $reactivo['id'],
						"reactivo" => $_SESSION['genero'] == 'H' ? $reactivo['reactivo_h'] : $reactivo['reactivo_m'],
						"factor" => $d['nombre'],
						"cuenta" => $cuenta,
						"id_l" => $id_l,
						"pregunta_l" => $pregunta_l,
						"cuenta_l" => $_SESSION['cuenta_l'],
						"alerta_l" => $alerta_l,
						"finalizar"=> 0,
						"console" => "SELECT * FROM factores WHERE id = '".$factores[$v['id']]['id']."'"
					);
					break;
				}	
				if ($contador_factores==0)
				{
					//Actualiza tabla aspirantes_validacion
					$datos[] = array(
						"id_factor" => 0,
						"id_reactivo" => 0,
						"reactivo" => "",
						"factor" => "",
						"cuenta" => 4,
						"id_l" => $id_l,
						"pregunta_l" => $pregunta_l,
						"cuenta_l" => $_SESSION['cuenta_l'],
						"alerta_l" => $alerta_l,
						"finalizar"=> 1,
						"console" => "Acabo el proceso"
					);
				}
			}
			else
			{
				//Verificar 
				$consulta_factor = mysqli_query($conexion2,"SELECT * FROM factores WHERE id = '".$_POST['id_factor']."'");
				$d = mysqli_fetch_array($consulta_factor);
				
				$consulta_reactivo = mysqli_query($conexion2,"SELECT * FROM reactivos WHERE id_factor = '".$d['id']."'");
				while($reactivo = mysqli_fetch_array($consulta_reactivo))
				{
					$consulta_encuesta = mysqli_query($conexion2,"SELECT * FROM encuesta WHERE id_reactivo = '".$reactivo['id']."' AND id_aspirante = '".$_SESSION['id']."' LIMIT 1");
					if (mysqli_num_rows($consulta_encuesta)==1)
					{
						continue;
					}
					else
					{
						$datos[] = array(
							"id_factor" => $d['id'],
							"id_reactivo" => $reactivo['id'],
							"reactivo" => $_SESSION['genero'] == 'H' ? $reactivo['reactivo_h'] : $reactivo['reactivo_m'],
							"factor" => $d['nombre'],
							"cuenta" => $cuenta,
							"id_l" => $id_l,
							"pregunta_l" => $pregunta_l,
							"cuenta_l" => $_SESSION['cuenta_l'],
							"alerta_l" => $alerta_l,
							"finalizar"=> 0,
							"console" => "En proceso con cuenta menor a 4"
						);
						$datos_aux = 1;
						break;
					}
				}	
				//Si acaba el recorrido y datos[] esta vació: cambiar el factor y enviar reactivo
				if ($datos_aux == 0)
				{
					//No hay reactivo para enviar, sacar el id_factor del array y enviar nuevo reactivo.
					$contador_factores = 0;
					$cuenta = 0;
					//Sacar el factor del array
					unset($factores[$_POST['id_factor']]);
					$_SESSION['factores'] = $factores;

					foreach($factores as $fac => $v)
					{
						$contador_factores++;
						$consulta_factor = mysqli_query($conexion2,"SELECT * FROM factores WHERE id = '".$factores[$v['id']]['id']."'");
						$d = mysqli_fetch_array($consulta_factor);

						$consulta_reactivo = mysqli_query($conexion2,"SELECT * FROM reactivos WHERE id_factor = '".$d['id']."'");
						$reactivo = mysqli_fetch_array($consulta_reactivo);
						$datos[] = array(
							"id_factor" => $d['id'],
							"id_reactivo" => $reactivo['id'],
							"reactivo" => $_SESSION['genero'] == 'H' ? $reactivo['reactivo_h'] : $reactivo['reactivo_m'],
							"factor" => $d['nombre'],
							"cuenta" => $cuenta,
							"id_l" => $id_l,
							"pregunta_l" => $pregunta_l,
							"cuenta_l" => $_SESSION['cuenta_l'],
							"alerta_l" => $alerta_l,
							"finalizar"=> 0,
							"console" => "En proceso con cuenta igual a 4, se respondió todo el factor sin que el conteo llegue a 4"
						);
						break;
					}	
					if ($contador_factores==0)
					{
						//Actualizar tabla aspirantes_validacion
						$datos[] = array(
							"id_factor" => 0,
							"id_reactivo" => 0,
							"reactivo" => "",
							"factor" => "",
							"cuenta" => 4,
							"id_l" => $id_l,
							"pregunta_l" => $pregunta_l,
							"cuenta_l" => $_SESSION['cuenta_l'],
							"alerta_l" => $alerta_l,
							"finalizar"=> 1,
							"console" => "Acabo el proceso"
						);
					}
				}				
			}
		}
	}
	else
	{
		$datos[] = array(
			"id_factor" => 0,
			"id_reactivo" => 0,
			"reactivo" => "",
			"factor" => "",
			"cuenta" => 4,
			"id_l" => $id_l,
			"pregunta_l" => $pregunta_l,
			"cuenta_l" => $_SESSION['cuenta_l'],
			"alerta_l" => $alerta_l,
			"finalizar"=> 1,
			"console" => "Sin variables"
		);
	}
}
else 
{
	//Primera vez
	$_SESSION['cuenta_l'] = 0;
	$aux = 0;
	$cuenta = 0;
	
	$cuenta_l = 0;
	$id_l = 0;
	
	$consulta_l = mysqli_query($conexion2,"SELECT * FROM escala_mentira ORDER BY rand()");
	while($d_l = mysqli_fetch_array($consulta_l))
	{
		//Crear el array de preguntas de mentira en orden aleatoreo
		$mentira[$d_l['id']] = array('id'=>$d_l['id'], 'nombre'=>$d_l['nombre'], 'alerta'=>$d_l['alerta']);		
	}
	
	$consulta_factor = mysqli_query($conexion2,"SELECT * FROM factores ORDER BY rand()");
	//$consulta_factor = mysqli_query($conexion2,"SELECT * FROM factores WHERE id = '7' OR id = '8' OR id = '9'");
	while ($d = mysqli_fetch_array($consulta_factor))
	{
		//Crear el array de factores en orden aleatoreo
		$factores[$d['id']] = array('id'=>$d['id'], 'id_dimension'=>$d['id_dimension'], 'nombre'=>$d['nombre'], 'tipo'=>$d['tipo']);
		//Primer reactivo
		if ($aux==0)
		{
			$consulta_reactivo = mysqli_query($conexion2,"SELECT * FROM reactivos WHERE id_factor = '".$d['id']."'");
			$reactivo = mysqli_fetch_array($consulta_reactivo);
			$datos[] = array(
				"id_factor" => $d['id'],
				"id_reactivo" => $reactivo['id'],
				"reactivo" => $_SESSION['genero'] == 'H' ? $reactivo['reactivo_h'] : $reactivo['reactivo_m'],
				"factor" => $d['nombre'],
				"cuenta" => $cuenta,
				"id_l" => $id_l,
				"pregunta_l" => $pregunta_l,
				"cuenta_l" => $cuenta_l,
				"alerta_l" => $alerta_l,
				"finalizar"=> 0,
				"console" => "Primera vez"
			);
			$aux = 1;
		}
	}	
	$_SESSION['factores'] = $factores;	
	$_SESSION['mentira'] = $mentira;	
}

$row = array(
	"datos" => $datos
);
echo json_encode($row);
exit();
?>