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
		<div class="row">
			<div class="col-sm-4 col-12"></div>
			<div class="col-sm-4 col-12">
			<div class="card mt-3">
				<div class="card-body">
					<div class="row">
						<div class="col-12 text-center">
							<img src="images/user.png" style="max-width: 100px;">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<form action="validar.php" method="post">
								<div class="mt-3">
									<label for="usuario"
									class="form-label">Usario:</label>
									<input type="text" class="form-control" 
									id="usuario" placeholder="Usuario BUAP" 
									name="usuario" required>
								</div>
								<div class="mt-3">
									<label for="pass"
									class="form-label">Usario:</label>
									<input type="password" class="form-control" 
									id="pass" placeholder="Pasword BUAP" 
									name="pass" required>
								</div>
								<div class="mt-3">
									<button type="submit" class="btn btn-primary form-control">Ingresar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="col-sm-4 col-12"></div>
		</div>
	</div>
	<script src="js/jquery-3.6.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>