<?php 
	include "seguridad.php";

	//echo "<br>muy bien<br>";

	//echo "<a href='salir.php'>salir</a>";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<metam http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<?php 	
			include("menu.php")
		?>
	</div>
	<script src="js/jquery-3.6.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script>
		$(document).ready(function (){
			//$("#btn1").attr("disabled",true)
		});
		function salir(){
			location.href="salir.php";
		}
		function crear(){
			location.href="crear.php";		
		}
		function modificar(){
			location.href="modificar.php";
		}
		function eliminar() {
			location.href="eliminar.php";
		}
	</script>
</body>
</html>