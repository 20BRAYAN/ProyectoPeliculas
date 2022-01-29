<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Usuarios</h1>

		<div>
			<h2>Usuarios</h2>
			<a href="?controller=user&method=add" class="btn btn-success">Agregar</a>
		</div>

		<section class="col-md-12 table-responsive">
			<table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Nombre</th>
			      <th>Email</th>
			      <th>Estado</th>
			      <th>Roles</th>
			      <th>Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($users as $user) : ?>
				    <tr>
				      <td><?php echo $user->id ?></td>
				      <td><?php echo $user->name ?></td>
				      <td><?php echo $user->email ?></td>
				      <td><?php echo $user->status ?></td>
				      <td><?php echo $user->roles ?></td>
				      <td>
				      	<a href="?controller=user&method=edit&id=<?php echo $user->id ?>" class="btn btn-primary">Editar</a>
				      	   	<?php
				      	if ($user->status_id ==1) {
				    	?>
                         <a href="?controller=user&method=updateStatus&id=<?php echo $user->id ?>" class="btn btn-danger">Inactivar</a>
                         <?php
                           }else  {
                           	?> 
                           	<a href="?controller=user&method=updateStatus&id=<?php echo $user->id ?>" class="btn btn-success">Activar</a>
                           	<?php 
                           }
                         ?>
				      </td>
				    </tr>
				  <?php endforeach ?> 
			  </tbody>
			</table>
		</section>	
	</section>
</main>