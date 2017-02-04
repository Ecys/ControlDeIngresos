<?php 

class ObjetoReporte
{
	
	public function GenerarReporte($inicio,$fin)
	{
		$mensaje="";
		$conexion = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
		if($conexion->connect_error)
		{
			die("coneccion fallida".$con->connect_error);
			header("Location: index.php");
			exit();
		}

		$sql = "select Registro.fecha, Estudiante.Carnet, Estudiante.DPI, Estudiante.Nombres, Estudiante.Apellidos, Carrera.Detalle as Carrera, Laboratorio.Descripcion as Laboratorio, Tipo.Descripcion as Tipo 
				from Registro Inner Join Estudiante On Estudiante.DPI = Registro.alumno 
				Inner Join Carrera on Estudiante.Carrera = Carrera.codigo
				Inner Join Laboratorio on Laboratorio.id = Registro.laboratorio
				Inner Join Tipo on Tipo.id=Registro.tipo where fecha > '".$inicio."' and fecha < '".$fin."' order by fecha";


		if ($result = $conexion->query($sql) and $result->num_rows > 0) { 

			echo '<section id="four" class="wrapper style2 special">';
			echo '<div class="inner">';
			echo '<header class="major narrow">';
			echo '<h2>REPORTE</h2>';
			echo '</header>';
			echo '<form class="form-inline" role="form" method="post" action="">';
		    echo '<table  WIDTH=50%>';

		    echo '<tr>';
			echo '<th>FECHA</th>';
			echo '<th>CARNET</th>';
			echo '<th>DPI</th>';
			echo '<th>NOMBRES</th>';
			echo '<th>APELLIDOS</th>';
			echo '<th>CARRERA</th>';
			echo '<th>LABORATORIO</th>';
			echo '<th>TIPO</th>';

			echo '</tr>';

			while($obj = $result->fetch_object())
			{ 
				$fecha = $obj->fecha;
				$Carnet = $obj->Carnet;
				$DPI =$obj->DPI;
				$Nombres = $obj->Nombres;
				$Apellidos = $obj->Apellidos;
				$Carrera = $obj->Carrera;
				$Laboratorio = $obj->Laboratorio;
				$Tipo = $obj->Tipo;

				echo "<tr>";
				echo '<td>'.$fecha.'</td>';
				echo '<td>' .$Carnet.'</td>';
				echo '<td>' .$DPI.'</td>';
				echo '<td>' .$Nombres.'</td>';
				echo '<td>' .$Apellidos.'</td>';
				echo '<td>' .$Carrera.'</td>';
				echo '<td>' .$Laboratorio.'</td>';
				echo '<td>' .$Tipo.'</td>';
				echo "</tr>";					
			} 
			echo '</table>';
			echo "</form>";	
			echo "</div>";
			echo "</section>";
		}
		
		if($conexion->query($sql)===TRUE)
		{
			$mensaje = "Estudiante agregado exitosamente";
		}
		else
		{
			$mensaje = $sql;
		}
		return $mensaje;
	}


	
}


if(isset($_POST["btnCrearReporte"]))
{
	$inicio=$_POST["txtFechaIn"];
	$fin=$_POST["txtFechaFn"];
	#echo '<script type="text/javascript">alert("'.$inicio.'");</script>';
	$obj = new ObjetoReporte();
	$resultado = $obj->GenerarReporte($inicio,$fin);
	echo '<script type="text/javascript">alert("'.$resultado.'");</script>';
}
					
?>




 
