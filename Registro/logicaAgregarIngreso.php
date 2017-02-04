<?php 
include_once "../conexion.php";

class LogicaAgregarIngreso
{

    public function Ingreso($dpi)
    {
        $mensaje="";
		$conexion = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
		if($conexion->connect_error){
				die("coneccion fallida".$conexion->connect_error);
				header("Location: index.php");
				exit();	
		} 

		date_default_timezone_set('America/Guatemala');
        $now = new DateTime();
        $now->format('Y-m-d H:i:s');

		$sql = "insert into Registro(alumno,fecha,laboratorio,tipo) values(".$dpi.", '".$now->format('Y-m-d H:i:s')."',013,1)";

		#echo '<script type="text/javascript">alert("'.$sql.'");</script>';

		if ($conexion->query($sql) === TRUE) {
			$mensaje = "Ingreso Exitoso" ;
		} else {
			$mensaje = "El documento de identificacion no existe en la base de datos";
		}	
        return $mensaje;
    }

    public function RecuperarDPI($carnet)
    {
    	$mensaje="";
		$conexion = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
		if($conexion->connect_error){
				die("coneccion fallida".$conexion->connect_error);
				header("Location: index.php");
				exit();	
		} 

		

		$sql = "select DPI from Estudiante where Carnet=".$carnet.";";

		if ($result = $conexion->query($sql) and $result->num_rows > 0) 
		{ 
			while($obj = $result->fetch_object())
				{ 
					$dpi = $obj->DPI;
					$mensaje = $dpi;
				} 
		}

        return $mensaje;
    }
            
}
	

if( isset($_POST['btnDPI']))
{
	$dpi = $_POST['txtDPI'];
	#echo '<script type="text/javascript">alert("'.$dpi.'");</script>';
	$instancia = new LogicaAgregarIngreso();
	$resultado = $instancia->Ingreso($dpi);
	echo '<script type="text/javascript">alert("'.$resultado.'");</script>';
}

if( isset($_POST['btnCarnet']))
{
	$carnet = $_POST['txtCarnet'];
	$instancia = new LogicaAgregarIngreso();
	$rdpi = $instancia->RecuperarDPI($carnet);
	if ($rdpi!="")
	{
		$resultado = $instancia->Ingreso($rdpi);
	    echo '<script type="text/javascript">alert("'.$resultado.'");</script>';
	}
	else
	{
		echo '<script type="text/javascript">alert("El numero de carnet no existe en la base de datos");</script>';	
	}
	
}
						
?>




 