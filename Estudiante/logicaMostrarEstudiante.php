<?php 

class ObjetoEstudiante
{
	
	public function BuscarEstudiante($carnet,$id)
	{
		$mensaje="";
		$conexion = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
		
		if(!$conexion)
		{
			die("coneccion fallida. Error: ".mysqli_connect_error() . PHP_EOL);
			header("Location: index.php");
			exit();
		}

		if ($id==1)
			$sql = "Select * from Estudiante  where Carnet = ".$carnet.";";
		else
			$sql = "Select * from Estudiante  where DPI = ".$carnet.";";


		if ($result = mysqli_query($conexion,$sql) and mysqli_num_rows($result) > 0) { 

			echo '<section id="four" class="wrapper style2 special">';
			echo '<div class="inner">';
			echo '<header class="major narrow">';
			echo '<h2>DATOS DEL ESTUDIANTE</h2>';
			echo '</header>';
			echo '<form class="form-inline" role="form" method="post" action="">';
		    echo '<table  WIDTH=50%>';

			while($obj = mysqli_fetch_object($result))
			{ 
				$nombres = $obj->Nombres;
				$apellidos = $obj->Apellidos;
				$id =$obj->Carnet;
				$correo = $obj->Correo;
				$telefono = $obj->Telefono;
				$direccion = $obj->Direccion;
				$carrera = $obj->Carrera;
				$dpi = $obj->DPI;
				echo "<tr>";
				echo "<td>CARNET</td>";
				echo '<td><input type="text" value="'.$id.'"name="ModCarnet" id="ModCarnet" class="form-control" readonly></td>';
				echo "<td>DPI</td>";
				echo '<td><input type="text" value="' .$dpi.'" name="txtModDpi" readonly></td>';
				echo "</tr>";
 				 
				echo "<tr>";
		  		echo "<td>NOMBRES</td>";
				echo '<td><input type="text" value="' .$nombres.'" name="txtModNombres"></td>';
				echo "<td>APELLIDOS</td>";
				echo '<td><input type="text" value="' .$apellidos.'" name="txtModApellidos"></td>';
				echo '</tr>';
				
				echo '<tr>';
				echo "<td>E-MAIL</td>";
				echo '<td><input type="text" value="' .$correo.'" name="txtModCorreo"></td>';
				echo "<td>NUMERO DE TELEFONO</td>";
				echo '<td><input type="text" value="' .$telefono.'" name="txtModTelefono"></td>';
				echo '</tr>';

				echo "<tr>";
		  		echo "<td>DIRECCION</td>";
				echo '<td><input type="text" value="' .$direccion.'" name="txtModDireccion"></td>';
				echo "<td>CARRERA</td>";
				echo '<td><input type="text" value="' .$carrera.'" name="txtModCarrera"></td>';
				echo "</tr>";

				echo "<tr>";
		  		echo "<td>* Los cambios son irrebersibles</td>";
				echo "</tr>";
		  		
		  		echo "<tr>";

		  		echo "<td>";
		  		echo "<center>";
		  		echo '<a href="Estudiante.php">Ir a inicio</a>';
		  		echo '</center>';
		  		echo '</td>';

		  		echo "<td>";
		  		echo "<center>";
		  		echo '<button type="submit" name="btnCancelar" class="btn btn-default">Cancelar</button>';
		  		echo '</center>';
		  		echo '</td>';

		  		echo '<td>';
		  		echo '<center>';
		  		echo '<button type="submit" name="btnGuardar" class="btn btn-default">Guardar Cambios</button>';
			    echo '</center>';
				echo '</td>';
				
				echo '<td>';
		  		echo '<center>';
		  		echo '<button type="submit" name="btnEliminar" class="btn btn-default">Eliminar</button>';
			    echo '</center>';
				echo '</td>';
				
				echo '</tr>';

				echo '</table>';	
			} 
			
			echo "</form>";	
			echo "</div>";
			echo "</section>";

			$mensaje = "";
		}
		else
		{
			$mensaje = "No se ha encontrado ninguna coincidencia";
		}

		mysqli_close($conexion);
		return $mensaje;
	}

	public function EliminarEstudiante($carnet)
	{
		$mensaje="";
		$conexion = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
		
		if(!$conexion)
		{
			die("coneccion fallida. Error: ".mysqli_connect_error() . PHP_EOL);
			header("Location: index.php");
			exit();
		}

		
		$sql = "delete from Estudiante  where Carnet = ".$carnet.";";
		
		if(mysqli_query($conexion,$sql))
		{
			$mensaje = "Estudiante eliminardo exitosamente";
		}
		else
		{
			$mensaje = "No se ha podido eliminar al estudiante";
		}

		mysqli_close($conexion);
		return $mensaje;
	}

	public function ModificarEstudiante($carnet,$nombres,$apellidos,$correo,$telefono,$direccion,$carrera)
	{
		$mensaje="";
		$conexion = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
		if(!$conexion)
		{
			die("coneccion fallida".$con->connect_error);
			header("Location: index.php");
			exit();
		}

		
		$sql = "update Estudiante SET Nombres='".$nombres."', Apellidos='".$apellidos."', Correo='".$correo."', Telefono=".$telefono.", Direccion='".$direccion."', Carrera=".$carrera." where Carnet = ".$carnet.";";
		
		if(mysqli_query($conexion,$sql))
		{
			$mensaje = "Estudiante modificado exitosamente";
		}
		else
		{
			$mensaje = "Ha ocurrido un error";
		}
		mysqli_close($conexion);
		return $mensaje;
	}
	
}

	
if(isset($_POST["btnCarnet"]))
{
	$carnet=$_POST["txtCarnet"];
	$obj = new ObjetoEstudiante();
	$resultado = $obj->BuscarEstudiante($carnet,1);
	echo '"'.$resultado.'"';
}

if(isset($_POST["btnDPI"]))
{
	$dpi=$_POST["txtDPI"];
	$obj = new ObjetoEstudiante();
	$resultado = $obj->BuscarEstudiante($dpi,2);
	echo '"'.$resultado.'"';
}

if(isset($_POST["btnEliminar"]))
{
	$carnet=$_POST["ModCarnet"];
	#echo '<script type="text/javascript">alert("'.$carnet.'");</script>';
	$obj = new ObjetoEstudiante();
	$resultado = $obj->EliminarEstudiante($carnet);
	echo '"'.$resultado.'"';
}

if(isset($_POST["btnGuardar"]))
{
	$carnet=$_POST["ModCarnet"];
	$nombres=$_POST["txtModNombres"];
	$apellidos=$_POST["txtModApellidos"];
	$correo=$_POST["txtModCorreo"];
	$telefono=$_POST["txtModTelefono"];
	$direccion=$_POST["txtModDireccion"];
	$carrera=$_POST["txtModCarrera"];
	#echo '<script type="text/javascript">alert("'.$carnet.'");</script>';
	$obj = new ObjetoEstudiante();
	$resultado = $obj->ModificarEstudiante($carnet,$nombres,$apellidos,$correo,$telefono,$direccion,$carrera);
	echo '"'.$resultado.'"';
}
					
?>




 