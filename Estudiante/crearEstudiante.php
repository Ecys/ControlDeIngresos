<?php 
include('../session.php');
include("../Master/masterpage/cabecera.php");
include("../Estudiante/logicaCrearEstudiante.php");
 ?>

	<section id="four">
		<!-- Header -->
			<header id="header">
				<h1><a >			
				<!-- texto que aparece en el titulo -->
				Estudiantes
			</a></h1>
			<a href="#nav">Menu</a>
	</header>

<?php include("../Master/masterpage/supermenu.php"); ?>

<section id="four" class="wrapper style2 special">
	<div class="inner">
		<header class="major narrow">
			<h2>Crear Estudiante</h2>
		</header>
		<!-- Aqui cuerpo y atributos  -->
		
		<form method="post" action="">
		
		<div align = left><b> Carnet </b></div>
		<input type="text" name="carnet" value=""><br>

		<div align = left><b> DPI </b></div>
		<input type="text" name="dpi" value=""><br>
		
		<div align = left><b> Nombres </b></div>
		<input type="text" name="nombre" value=""><br>

		<div align = left><b> Apellidos </b></div>
		<input type="text" name="apellido" value=""><br>
		
		<div align = left><b> E-mail </b></div>
		<input type="text" name="E_mail" value=""><br>
		
		<div align = left><b> Telefono </b></div>
		<input type="text" name="telefono" value=""><br>
		
		<div align = left><b> Direccion </b></div>
		<input type="text" name="direccion" value=""><br>
		
		<div align = left><b> Carrera </b></div>
		<!--input type="text" name="Carrera" value=""><br-->

		<?php
			mysql_select_db(DB_NAME);
			$result = mysql_query("SELECT codigo, detalle FROM Carrera") 	or die(mysql_error());
			if (mysql_num_rows($result)!=0)
			{
				echo '<select name="Carrera" id="Carrera">
	      		<option value=" " selected="selected">Seleccione una carrera</option>';
		   		while($drop_2 = mysql_fetch_array( $result ))
				{
			  		echo '<option value="'.$drop_2['codigo'].'">'.$drop_2['detalle'].'</option>';
				}
			echo '</select>'
           

		?>
		
		<input type="submit" name="nuevo" value="agregar">
		</form> 
		<!-- Fin de campos -->			
	</div>
</section>

<?php include("../Master/masterpage/pie.php");}?>		