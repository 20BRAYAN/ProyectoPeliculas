<main class="container">
	<div class="row">
		<h1>Editar Estados</h1>
	</div>
	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información de Estados</h2>
			</div>

			<div class="card-body">
				<form action="?controller=Statuses&method=update" method="post">
					<input type="hidden" name="Id" value="<?php echo $data[0]->Id ?>" >
					<div class="form-group">
						<label>Estado</label>
						<input type="text" name="status" class="form-control" placeholder="Ingrese estado" value="<?php echo $data[0]->status?>">
					</div>
					    <div class="form-group">
                        <label>Tipos de estado</label>
                        <select name="type_status_id" class="form-control">
                        	<option value="">Seleccione...</option>
                            <?php
                                foreach ($Type_statusesses as 	$name ) {
                                    if ($name ->id == $data[0]->type_statuses_id) {
                                ?>
                                        <option selected value="<?php echo $name ->id ?>"><?php echo $name ->name ?></option>
                                <?php
                                    } else { 
                                ?>
                                        <option value="<?php echo $name->id ?>"><?php echo $name ->name ?></option>
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