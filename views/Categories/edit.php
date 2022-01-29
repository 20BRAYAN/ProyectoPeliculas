<main class="container">
	<div class="row">
		<h1>Editar Categorias</h1>
	</div>
	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información de Categorias</h2>
			</div>

			<div class="card-body">
				<form action="?controller=Categories&method=update" method="post">
					<input type="hidden" name="Id" value="<?php echo $data[0]->Id ?>" >
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" placeholder="Ingrese Nombre " value="<?php echo $data[0]->name ?>">
					</div>
				    </div>
					<div class="form-group">
						<label>Estado</label>
					<select name="status_id" class="form-control">
                        <option value=""> Seleccione...</option>
						<?php 
						foreach ($statuses as  $status) {
							if ($status->Id == $data[0]->status_id) {
								?>
                                            <option selected value="<?php echo $status->Id?>"><?php echo $status->status?></option>
								<?php
							}else{
								?>
                                   <option  value="<?php echo $status->Id?>"><?php echo $status->status?></option>
								<?php
						     	}
						    }

						?>
											
					</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Actualizar</button>
					</div>
				</form>			
			</div>
		</div>
	</section>
</main>