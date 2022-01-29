<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Estados</h1>

		<div>
			<h2>Estados</h2>
			<a href="?controller=Statuses&method=add" class="btn btn-success">Agregar</a>
		</div>

		<section class="col-md-12 table-responsive">
			<table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Estados</th>
			      <th>Tipos de estado</th>			      
			      <th>Acciones</th>
			      
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($StatusesSave as $Statuses) : ?>
				    <tr>
				      <td><?php echo $Statuses->Id ?></td>
				      <td><?php echo $Statuses->status?></td>
				      <td><?php echo $Statuses->name?></td>
				      <td>
				      	<a href="?controller=Statuses&method=edit&Id=<?php echo $Statuses->Id ?>" class="btn btn-primary"">Editar</a>
				      	<a href="#" class="btn btn-danger">Eliminar</a>
				      </td>
				    </tr>
				  <?php endforeach ?> 
			  </tbody>
			</table>
		</section>	
	</section>
</main>