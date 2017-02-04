<?php

class logicaCrearEstudiante 
{
	
	public function agregar_Estudiante($carnet,$dpi,$nombre,$apellido,$email,$telefono,$direccion,$carrera){
	$mensaje="";
	$conexion = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	if($conexion->connect_error){
		die("coneccion fallida".$con->connect_error);
		header("Location: index.php");
		exit();
	}
	$sql = "insert into Estudiante (DPI,Carnet,Nombres,Apellidos,Telefono, Correo, Direccion, Carrera)" 
			." values (".$dpi.",".$carnet.",'".$nombre."','".$apellido."',".$telefono.",'".$email."','".$direccion."',".$carrera.");";
	
	if($conexion->query($sql)===TRUE){
		$mensaje = "Estudiante agregado exitosamente";
	}
	else{
		$mensaje = $sql;
	}
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
	echo '<script type="text/javascript">alert("'.$resultado.'");</script>';
}
?>