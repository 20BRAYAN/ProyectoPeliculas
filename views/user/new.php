<main class="container">
	<div class="row">
		<h1>Agregar Usuario</h1>
	</div>
	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información del Usuario</h2>
			</div>

			<div class="card-body">
				<form action="?controller=user&method=save" method="post">
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="name" class="form-control" placeholder="Ingrese Nombre Completo">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" placeholder="Ingrese Email">
					</div>
					<div class="form-group">
						<label>Contraseña</label>
						<input type="password" name="password" class="form-control" placeholder="Ingrese Contraseña">
					</div>
						<div class="form-group">
                        <label>Roles</label>
                        <select name="roles_id" class="form-control">
                        	<option value="">Seleccione...</option>
                            <?php
                                foreach ($roles as $role) {
                                    if ($role->id == $data[0]->role_id) {
                                ?>
                                        <option selected value="<?php echo $role->id ?>"><?php echo $role->name ?></option>
                                <?php
                                    } else { 
                                ?>
                                        <option value="<?php echo $role->id ?>"><?php echo $role->name ?></option>
                                <?php 
                                    }
                                }
                            ?>
                        </select>
                    </div>
					<div class="form-group">
						<button class="btn btn-primary">Guardar</button>
					</div>
				</form>			
			</div>
		</div>
	</section>
</main>