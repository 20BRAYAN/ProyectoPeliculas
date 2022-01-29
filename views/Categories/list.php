	<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Categorias</h1>

		<div>
			<h2>Categorias</h2>
			<a href="?controller=Categories&method=add" class="btn btn-success">Agregar</a>
		</div>

		<section class="col-md-12 table-responsive">
			<table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Nombre</th>
			      <th>id Estado</th>
			      <th>Acciones</th>
		
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($categoriesSave as $Categories) : ?>
				    <tr>
				      <td><?php echo $Categories->Id ?></td>
				      <td><?php echo $Categories->name?></td>
				      <td><?php echo $Categories->status ?></td>		     	       
				      <td>
				      	<a href="?controller=Categories&method=edit&Id=<?php echo $Categories->Id ?>" class="btn btn-primary">Editar</a>
				      	<?php
				      	if ($Categories->status_id ==1) {
				    	?>
                         <a href="?controller=Categories&method=updateStatus&Id=<?php echo $Categories->Id ?>" class="btn btn-danger">Inactivar</a>
                         <?php
                           }else  {
                           	?> 
                           	<a href="?controller=Categories&method=updateStatus&Id=<?php echo $Categories->Id ?>" class="btn btn-success">Activar</a>
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