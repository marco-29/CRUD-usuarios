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
		<style>
			img {
				max-width: 52px;
				border-radius: 50%;
			}
		</style>
</head>

<body>
	<div class="container">
		<?php
		include("menu.php")
		?>
		<div id="tabla"></div>
	</div>

	<div class="modal" tabindex="-1" id="eliminarModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Eliminar</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Seguro eliminar usuraio</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
					<button type="button" class="btn btn-primary" onclick="eliminaDatoOk()">Si</button>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.6.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script>
		var id = 0;

		function load() {
			var url = "procesos.php?tipo=5&r=" + Math.random();
			$.get(url, function(result) {
				$("#tabla").html(result);
			});
		}

		$(document).ready(function() {
			$("#btn3").attr("disabled", true)
			load()
		});

		function salir() {
			location.href = "salir.php";
		}

		function crear() {
			location.href = "crear.php";
		}

		function modificar() {
			location.href = "modificar.php";
		}

		function eliminar() {
			location.href = "eliminar.php";
		}

		function eliminarItem(id1) {
			id = id1;
			$("#eliminarModal").modal("show");
		}

		function eliminaDatoOk() {
			var url = "procesos.php?tipo=6&id=" + id + "&r=" + Math.random();
			$.get(url, function(result) {
				$("#eliminarModal").modal("hide")
				$("#tabla").html(result);
			});
		}
	</script>
</body>

</html>