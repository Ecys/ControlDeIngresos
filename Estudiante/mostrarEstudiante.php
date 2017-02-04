<?php 
	include('../session.php');
	include("../Master/masterpage/cabecera.php");
	
?>
<script type="text/javascript" language="javascript" src="js/ajax.js"></script>	
<section id="four">
	<header id="header">
		<h1><a>Estudiantes</a></h1>
		<a href="#nav">Menu</a>
	</header>
</section>

<section id="four" class="wrapper style2 special">
	<div class="inner">
		<header class="major narrow">
			<h2>Consultar Estudiante</h2>
		</header>
		<form class="form-inline" role="form" method="post" action="">
		<table  WIDTH=50%>
		<tr>
			<td>
		    <input type="text" name="txtCarnet" class="form-control" id="txtCarnet" placeholder="Introduzca el Carnet">
			</td>
			<td>
		    <input type="text" name="txtDPI" class="form-control" id="txtDPI" placeholder="Intruduzca el DPI">
			</td>
		</tr>
		<tr>
		  <td>
		  	<center>
		  <button type="submit" name="btnCarnet" class="btn btn-default">Buscar por Carnet</button>
		  </center>
		  </td>
		  <td>
		  	<center>
		  <button type="submit" name="btnDPI" class="btn btn-default">Buscar por DPI</button>
			</center>
		</td>
		</tr>
	</table>
		</form>	
	</div>
</section>

<?php include("../Estudiante/logicaMostrarEstudiante.php");?>
<?php include("../Master/masterpage/supermenu.php"); ?>
<?php include("../Master/masterpage/pie.php"); ?>		

