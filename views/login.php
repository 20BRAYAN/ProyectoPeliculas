<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistema de Administración de Peliculas</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>

<body>
     
	<main class="container">
		<div class="row">
			<!--titulo-->
			<h1 class="col-12 d-flex justify-content-center">Iniciar Sesión</h1>
		</div>
		<section class="row mt-5">
			<div class="card w-50 m-auto">
				<div class="card-body w-100">
					<!--busca el metodo     y metodo a trabajar post-->
					<form action="?controller=login&method=login" method="post">

						<?php
						/* si error existe*/
							if(isset($error['errorMessage'])) {
						?>
						<!-- NOTA: el times simula el boton de cerrar la ventana emergente-->
								<div class="alert alert-danger alert-dismissable alert-width" role="alert">
									<button class="close" data-dismiss="alert">&times;</button>
									<!-- nos imprime el error-->
									<p class="text-dark"><?php echo $error['errorMessage']; ?></p>
								</div>
						<?php
							}
						?>

						<div class="form-group">
							<label>Email</label>
							<!--atributo unico es el email 

							  condicional paternario  isset($error['email']) ? $error['email'] :
							  si existe la variable error en la variable email coloque error pero si es falso lo coloca vacio -->
							<input type="email" name="email" class="form-control" placeholder="test@test.com" value="<?php echo isset($error['email']) ? $error['email'] : '' ?>">
						</div>
						<div class="form-group">

							<label>Contraseña</label>
							<input type="password" name="password" class="form-control" placeholder="******">
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Iniciar</button>
						</div>
					</form>
				</div>
			</div>
		</section>	
	</main>	
	

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>