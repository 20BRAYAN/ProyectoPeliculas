<main class="container">
	<div class="row">
		<h1>Editar Tipos de Estados</h1>
	</div>
	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información de Tipos de Estados</h2>
			</div>

			<div class="card-body">
				<form action="?controller=type_status&method=update" method="post">
					<input type="hidden" name="Id" value="<?php echo $data[0]->Id ?>" >
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" placeholder="Ingrese tipo de estado" value="<?php echo $data[0]->name?>">
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Actualizar</button>
					</div>
				</form>			
			</div>
		</div>
	</section>
</main>