<?php 
	session_start();
	include_once "conexion.php";
    
    function verificar_login($user,$password,&$result) 
    { 
        $sql = "SELECT * FROM usuarios WHERE usuario = '$user' and '$password' = '$password'";
        $rec = mysql_query($sql); 
        $count = 0; 
        while($row = mysql_fetch_object($rec)) 
        { 
            $count++; 
            $result = $row; 
        } 
        if($count == 1) 
        { 
            return 1; 
        } 
        else 
        { 
            return 0; 
        } 
    } 

/*Luego haremos una serie de condicionales que identificaran el momento en el boton de login es presionado y cuando este sea presionado llamaremos a la función verificar_login() pasandole los parámetros ingresados:*/

if(!isset($_SESSION['username'])) //para saber si existe o no ya la variable de sesión que se va a crear cuando el usuario se logee
{ 
    if(isset($_POST['login'])) //Si la primera condición no pasa, haremos otra preguntando si el boton de login fue presionado
    { 
        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1) //Si el boton fue presionado llamamos a la función verificar_login() dentro de otra condición preguntando si resulta verdadero y le pasamos los valores ingresados como parámetros.
        { 
            /*Si el login fue correcto, registramos la variable de sesión y al mismo tiempo refrescamos la pagina index.php.*/
            $_SESSION['username'] = $result->usuario; 
            header("location:index.php"); 
        } 
        else 
        { 
            echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>'; //Si la función verificar_login() no pasa, que se muestre un mensaje de error.
        } 
    } 
?> 

	<!-- Header -->
	<?php  include("Master/masterpage/cabecera.php"); ?>
	<header id="header" class="alt">
		<h1><a href="#">Control Administrativo Laboratorios 013 y 014</a></h1>
		<a href="#nav">Menu</a>
	</header>



	<?php include("Master/masterpage/menu.php"); ?>

	<!-- Banner -->
	<section id="banner">
		<!--<i class="icon fa-diamond"></i>-->
		<h2>ECYS</h2>
		<br/> <br/>
		<p>ESCUELA DE CIENCIAS Y SISTEMAS</p>
		<form action="" method="post" class="login">
		<ul class="actions">
			<li><div align = left><b>Usuario</b></div>
			<input type="text" name="user" value=""><br>
			<div align = left><b>Password</b></div>
			<input type="password" name="password" value=""><br>
			<input type="submit" name="login" class="special" value="loggin" /></li>
		</ul>
		</form>
		<ul class="actions">		
		</ul>
	</section>

<?php include("Master/masterpage/pie.php"); ?>
<?php 
} else { 
    // Si la variable de sesión ‘userid’ ya existe, que muestre el mensaje de saludo.
    ?>
    <!-- Header -->
	<?php  include("Master/masterpage/cabecera.php"); ?>
	<header id="header" class="alt">
		<h1><a href="#">Control Administrativo Laboratorios 013 y 014</a></h1>
		<a href="#nav">Menu</a>
	</header>



	<?php include("Master/masterpage/supermenu.php"); ?>

	<!-- Banner -->
	<section id="banner">
		<!--<i class="icon fa-diamond"></i>-->
		<h2>ECYS</h2>
		<br/> <br/>
		<p>ESCUELA DE CIENCIAS Y SISTEMAS</p>
		<a href="logout.php">Cerrar Sesion</a>
	</section>

<?php include("Master/masterpage/pie.php"); }?>

		

