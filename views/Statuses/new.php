<main class="container">
	<div class="row">
		<h1>Agregar Estado</h1>
	</div>
	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información del Estado</h2>
			</div>

			<div class="card-body">
				<form action="?controller=Statuses&method=save" method="post">
					<div class="form-group">
						<label>Estados</label>
						<input type="text" name="status" class="form-control" placeholder="Ingrese Estado">
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Guardar</button>
					</div>
				</form>			
			</div>
		</div>
	</section>
</main>