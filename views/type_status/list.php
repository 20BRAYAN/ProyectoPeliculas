<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Tipos de estados</h1>

		<div>
			<h2>Tipos de Estados</h2>
			<a href="?controller=type_status&method=add" class="btn btn-success">Agregar</a>
		</div>

		<section class="col-md-12 table-responsive">
			<table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Nombre</th>
			      <th>Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($StatusesSave as $type_status) : ?>
				    <tr>
				      <td><?php echo $type_status->id ?></td>
				      <td><?php echo $type_status->name ?></td>
				      <td>
				  	   <a href="?controller=type_status&method=edit&id=<?php echo $type_status->id ?>" class="btn btn-primary"">Editar</a>
				      	<a href="#" class="btn btn-danger">Eliminar</a>
                        
				      </td>
				    </tr>
				  <?php endforeach ?> 
			  </tbody>
			</table>
		</section>	
	</section>
</main>