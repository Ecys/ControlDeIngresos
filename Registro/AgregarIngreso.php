<?php 
	include("../Master/masterpage/cabecera.php"); 
?>

<script type="text/javascript" language="javascript" src="js/ajax.js"></script>	

	<section id="four">
		<!-- Header -->
		<header id="header">
			<h1><a >
			REGISTRAR INGRESO
		</a></h1>
		<a href="#nav">Menu</a>
		</header>
	</section>

<?php include("../Master/masterpage/menu.php"); ?>

<section id="four" class="wrapper style2 special">
	<div class="inner">
		<header class="major narrow">
			<h2>REGISTRAR INGRESO</h2>
		</header>
		<!-- Aqui cuerpo y atributos -->
		<form name="frmIngresoDPI" action=""  method="post">
		<DIV ALIGN=left><h4> Ingrese el numero de DPI </h4> </DIV>
		<div class="12u$">
		<div class="select-wrapper">
			<input type="text" name="txtDPI" value="">
			<br>
			<li><input type="submit" class="special" value="Aceptar" name="btnDPI"/></li>
		</div>
		</div>
		</form>

		<form name="frmIngresoCarnet" action=""  method="post">
		<DIV ALIGN=left><h4> Ingrese el numero de Carnet </h4> </DIV>
		<div class="12u$">
		<div class="select-wrapper">
			<input type="text" name="txtCarnet" value="">
			<br>
			<li><input type="submit" class="special" value="Aceptar" name="btnCarnet"/></li>
		</div>
		</div>
		</form>			
	</div>
	<?php include("LogicaAgregarIngreso.php"); ?>
</section>
<?php include("../Master/masterpage/pie.php"); ?>		

