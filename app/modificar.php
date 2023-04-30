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
		<style type="text/css">
			.foto {
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

	<div class="modal" tabindex="-1" id="actualizarModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Moificar</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body" id="modalText">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" onclick="guardar()">Guardar</button>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery-3.6.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script>
		$(document).ready(function() {
			$("#btn2").attr("disabled", true)
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

		(function() {
			load();
		})();

		function load() {
			var url = "procesos.php?tipo=2&r=" + Math.random();
			$.get(url, function(result) {
				$("#tabla").html(result);
			});
		}

		function guardar() {
			var id = $("#id").val();
			var contacto = $("#contacto").val();
			var empresa = $("#empresa").val();
			var puesto = $("#puesto").val();
			var prioridad = $("#prioridad").val();
			var telefono = $("#telefono").val();
			var correo = $("#correo").val();
			var nota = $("#nota").val();
			var clasificacion = $("#clasificacion").val();

			var element = document.getElementById("foto");

			var error ="";

			if (contacto == "") {
				error += "falta el contacto\n";
			}
			if (puesto == "") {
				error += "falta el puesto\n";
			}
			if (prioridad == "") {
				error += "falta la prioridad\n";
			}
			if (telefono == "") {
				error += "falta el telefono\n";
			}
			if (correo == "") {
				error += "falta el correo\n";
			}
			if (nota == "") {
				error += "falta la nota\n";
			}
			if (clasificacion == "") {
				error += "falta la clasificacion\n";
			}
			if (element.files.length == 0) {
				error += "falta la foto\n";
			}

			if (error == "") {
				var formData = new FormData();

				formData.append("tipo", 4);
				formData.append("id", id);
				formData.append("contacto", contacto);
				formData.append("empresa", empresa);
				formData.append("puesto", puesto);
				formData.append("clasificacion", clasificacion);
				formData.append("prioridad", prioridad);
				formData.append("telefono", telefono);
				formData.append("correo", correo);
				formData.append("nota", nota);
				formData.append("foto", element.files[0]);

				var request = new XMLHttpRequest();

				request.onreadystatechange = function (){
					if (this.readyState == 4 && this.status == 200) {
						console.log(this.responseText);
						alert(this.responseText);
						load();
						$("#actualizarModal").modal("hide");
					}
				}

				request.open("POST", "procesos.php");
				request.send(formData);
			}
			else{
				alert(error);
			}
		}

		function actualizar(id){
			var url = "procesos.php?tipo=3&id=" + id + "&r" + Math.random();
			$.get(url, function(result) {
				$("#modalText").html(result);
			});
			$("#actualizarModal").modal("show");
		}
	</script>
</body>

</html>