<main>
	<section class="container text-center">
	   <!--aqui se coloca el  nombre de quien inicio sesion -->
		<h1>BIENVENIDO <?php echo $_SESSION['user']->name ?></h1>
		<h1>Su Rol es <?php echo $_SESSION['user']->role ?></h1>		

	</section>
</main>