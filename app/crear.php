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
		<div class="row">
			<div class="col-12 col-sm-4"></div>
			<div class="col-12 col-sm-4">
				<div class="mb-3 mt-3">
				   <label for="contacto" class="form-label">Contacto:</label>
				   <input type="text" class="form-control" id="contacto" name="contacto">
				</div>
				<div class="mb-3 mt-3">
				   <label for="puesto" class="form-label">Puesto:</label>
				   <input type="text" class="form-control" id="puesto" name="puesto">
				</div>
				<div class="mb-3 mt-3">
				   <label for="empresa" class="form-label">Empresa:</label>
				   <input type="text" class="form-control" id="empresa" name="empresa">
				</div>
				<div class="mb-3 mt-3">
				   <label for="tipo" class="form-label">Tipo:</label>
				   <input type="text" class="form-control" id="tipo" name="tipo">
				</div>
				<div class="mb-3 mt-3">
				   <label for="prioridad" class="form-label">Prioridad:</label>
				   <input type="text" class="form-control" id="prioridad" name="prioridad">
				</div>
				<div class="mb-3 mt-3">
				   <label for="telefono" class="form-label">Telefono:</label>
				   <input type="text" class="form-control" id="telefono" name="telefono">
				</div>
				<div class="mb-3 mt-3">
				   <label for="correo" class="form-label">Correo:</label>
				   <input type="text" class="form-control" id="correo" name="correo">
				</div>
				<div class="mb-3 mt-3">
				   <label for="nota" class="form-label">Nota:</label>
				   <input type="text" class="form-control" id="nota" name="nota">
				</div>
				<div class="mb-3 mt-3">
				   <label for="foto" class="form-label">Foto:</label>
				   <input type="file" class="form-control" id="foto" name="foto">
				</div>
				<button type="Button" class="btn btn-primary form-control" onclick="enviar()">Crear</button>
			</div>
			<div class="col-12 col-sm-4"></div>
		</div>
	</div>
	<script src="js/jquery-3.6.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script>
		$(document).ready(function (){
			$("#btn1").attr("disabled",true)
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
		function enviar() {
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

				formData.append("tipo", 1);
				formData.append("id", "gl");
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
					}
				}

				request.open("POST", "procesos.php");
				request.send(formData);
			}
			else{
				alert(error);
			}
		}
	</script>
</body>
</html>