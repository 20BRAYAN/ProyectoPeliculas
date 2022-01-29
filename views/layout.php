<!DOCTYPE html>
<html lang="es">
<head>
	
	<title>App Peliculas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>

	
		<input type="hidden" id="rol" value="<?php echo $_SESSION['user']->role ?>">
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="?controller=home">Inicio</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item" id="buttonUsers">
		        <a class="nav-link" href="?controller=user">Usuarios</a>
		      </li>		    
		      <li class="nav-item"  id="buttonMovies">
		        <a class="nav-link" href="?controller=Movie">Peliculas</a>
		      </li>		      
		      <li class="nav-item" id="buttonCategories">
		        <a class="nav-link" href="?controller=Categories">Categorías</a>
		      </li>
		      <li class="nav-item" id="buttonStatus">
		        <a class="nav-link" href="?controller=Statuses">Estados</a>
		      </li>
		      </li>
		      <li class="nav-item"  id="buttonTypeStatus">
		        <a class="nav-link" href="?controller=type_status">Tipos de Estados</a>
		      </li>
		      </li>
		      <li class="nav-item"  id="buttonRols">
		        <a class="nav-link" href="?controller=roles">Roles</a>
		      </li>	
		      <li class="nav-item" id="buttonRentals">
		        <a class="nav-link" href="?controller=rentals">Alquiler</a>
		      </li>	
		        <li class="nav-item">
		        <a class="nav-link" href="?controller=login&method=logout">Cerrar Sesión</a>
		      </li>	

		    </ul>
		  </div>
		</nav>
	</header>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/menu.js"></script>

</body>
</html>