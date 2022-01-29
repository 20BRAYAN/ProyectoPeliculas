<main class="container">
	<div class="row">
		<h1>Editar Usuario</h1>
	</div>
	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información del Usuario</h2>
			</div>

			<div class="card-body">
				<form action="?controller=user&method=update" method="post">
					<input type="hidden" name="id" value="<?php echo $data[0]->id ?>" >
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" placeholder="Ingrese Nombre Completo" value="<?php echo $data[0]->name ?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" placeholder="Ingrese Email" value="<?php echo $data[0]->email ?>">
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
                        <label>Roles</label>
                        <select name="roles_id" class="form-control">
                        	<option value="">Seleccione...</option>
                            <?php
                                foreach ($roles as $roles) {
                                    if ($roles->id == $data[0]->roles_id) {
                                ?>
                                        <option selected value="<?php echo $roles->id ?>"><?php echo $roles->name ?></option>
                                <?php
                                    } else { 
                                ?>
                                        <option value="<?php echo $roles->id ?>"><?php echo $roles->name ?></option>
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