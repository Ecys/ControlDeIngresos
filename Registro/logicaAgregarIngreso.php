<?php 
include_once "../conexion.php";

class LogicaAgregarIngreso
{

    public function Ingreso($dpi)
    {
        $mensaje="";
		$conexion = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

		if(!$conexion)
		{
				die("coneccion fallida ".mysqli_connect_error() . PHP_EOL);
				header("Location: index.php");
				exit();	
		} 

		date_default_timezone_set('America/Guatemala');
        $now = new DateTime();
        $now->format('Y-m-d H:i:s');

		$sql = "insert into Registro(alumno,fecha,laboratorio,tipo) values(".$dpi.", '".$now->format('Y-m-d H:i:s')."',013,1)";

		#echo '<script type="text/javascript">alert("'.$sql.'");</script>';

		if (mysqli_query($conexion,$sql) === TRUE) 
		{
			$mensaje = "Ingreso Exitoso" ;
		} 
		else 
		{
			$mensaje = "El documento de identificacion no existe en la base de datos";
		}	

		mysqli_close($conexion);
        return $mensaje;
    }

    public function RecuperarDPI($carnet)
    {
    	$mensaje="";
		$conexion = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
		
		if(!$conexion)
		{
				die("coneccion fallida ".mysqli_connect_error() . PHP_EOL);
				header("Location: index.php");
				exit();	
		} 

		$sql = "select DPI from Estudiante where Carnet=".$carnet.";";

		if ($result = mysqli_query($conexion,$sql) and mysqli_num_rows($result) > 0) 
		{ 
			while($obj = mysqli_fetch_object($result))
				{ 
					$dpi = $obj->DPI;
					$mensaje = $dpi;
				} 
		}

		mysqli_close($conexion);
        return $mensaje;
    }
            
}
	

if( isset($_POST['btnDPI']))
{
	$dpi = $_POST['txtDPI'];
	#echo '<script type="text/javascript">alert("'.$dpi.'");</script>';
	$instancia = new LogicaAgregarIngreso();
	$resultado = $instancia->Ingreso($dpi);
	echo '<label>'.$resultado.'</label>';
}

if( isset($_POST['btnCarnet']))
{
	$carnet = $_POST['txtCarnet'];
	$instancia = new LogicaAgregarIngreso();
	$rdpi = $instancia->RecuperarDPI($carnet);
	if ($rdpi!="")
	{
		$resultado = $instancia->Ingreso($rdpi);
	    echo "<label>".$resultado."</label>";
	}
	else
	{
		echo "<label>El numero de carnet no existe en la base de datos</label>";	
	}
	
}
						
?>




 