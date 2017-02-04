
<?php 
	include('../session.php');
	include("../Master/masterpage/cabecera.php"); 
?>
<script>

jQuery.datepicker.regional['eu'] = {
 closeText: 'Egina',
 prevText: '<Aur',
 nextText: 'Hur>',
 currentText: 'Gaur',
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Ab','May','Jun',
 'Jul','Ago','Sep','Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 dateFormat: 'yy-mm-dd', firstDay: 1,
 isRTL: false};
 $.datepicker.setDefaults($.datepicker.regional['eu']);

$(function () {

$("#datepicker").datepicker();
$("#datepicker2").datepicker();
});
</script>

		<header id="header">
				<h1><a > GENERAR REPORTES DE INGRESO	</a></h1>
			<a href="#nav">Menu</a>
		</header>




<?php include("../Master/masterpage/supermenu.php"); ?>

<?php include("../Reportes/cuerpoReporte.php"); ?>

<?php include('logica.php'); ?>

<?php include("../Master/masterpage/pie.php"); ?>		