<?php

class logicaCrearEstudiante 
{
	
	public function agregar_Estudiante($carnet,$dpi,$nombre,$apellido,$email,$telefono,$direccion,$carrera){
	$mensaje="";
	$conexion = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	
	if(!$conexion)
	{
		die("coneccion fallida".mysqli_connect_error() . PHP_EOL);
		header("Location: index.php");
		exit();
	}

	$sql = "insert into Estudiante (DPI,Carnet,Nombres,Apellidos,Telefono, Correo, Direccion, Carrera)" 
			." values (".$dpi.",".$carnet.",'".$nombre."','".$apellido."',".$telefono.",'".$email."','".$direccion."',".$carrera.");";
	
	if(mysqli_query($conexion,$sql))
	{
		$mensaje = "Estudiante agregado exitosamente";
	}
	else
	{
		$mensaje = "Verifique que el carnet o DPI no este registrado ya en el sistema";
	}

	mysqli_close($conexion);
	return $mensaje;
}
	
}


if(isset($_POST["nuevo"]))
{
	$carnet=$_POST["carnet"];
    $dpi=$_POST["dpi"];
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$email=$_POST["E_mail"];
	$telefono=$_POST["telefono"];
	$direccion=$_POST["direccion"];
	$carrera=$_POST["Carrera"];
	$obj = new logicaCrearEstudiante();
	$resultado = $obj->agregar_Estudiante($carnet,$dpi,$nombre,$apellido,$email,$telefono,$direccion,$carrera);
	echo "<label>".$resultado."</label>";
}
?>