<main class="container">
	<div class="row">
		<h1>Agregar categoria</h1>
	</div>
	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información de categorias</h2>
			</div>

			<div class="card-body">
				<form action="?controller=categories&method=save" method="post">
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" placeholder="Ingrese categoria">
					</div>
						<div class="form-group">
						<button class="btn btn-primary">Guardar</button>
					</div>
				</form>			
			</div>
		</div>
	</section>
</main>