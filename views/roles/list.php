<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Roles</h1>

		<div>
			<h2>Roles</h2>
			
		</div>

		<section class="col-md-12 table-responsive">
			<table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Nombre</th>
			      <th>Estado</th>
			      <th>Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($roles as $roles) : ?>
				    <tr>
				      <td><?php echo $roles->id ?></td>
				      <td><?php echo $roles->name ?></td>
				      <td><?php echo $roles->status ?></td>
				      <td>
				      	<?php
				      	if ($roles->status_id ==1) {
				    	?>
                         <a href="?controller=roles&method=updateStatus&id=<?php echo $roles->id ?>" class="btn btn-danger">Inactivar</a>
                         <?php
                           }else  {
                           	?> 
                           	<a href="?controller=roles&method=updateStatus&id=<?php echo $roles->id ?>" class="btn btn-success">Activar</a>
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