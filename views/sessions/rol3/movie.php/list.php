<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de peliculas</h1>

		<div>
			<h2>Peliculas</h2>
			<a href="?controller=Movie&method=add" class="btn btn-success">Agregar</a>
		</div>

		<section class="col-md-12 table-responsive">
			<table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Nombre</th>
			      <th>Descripción</th>
			      <th>Id usuario</th>
			      <th>Id Estado</th>
			      <th>Categorias</th>
			      <th>Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($MovieControllers as $Movie) : ?>
				    <tr>
				      <td><?php echo $Movie->Id ?></td>
				      <td><?php echo $Movie->name ?></td>
				      <td><?php echo $Movie->description?></td>
				      <td><?php echo $Movie->users ?></td>
				      <td><?php echo $Movie->status?></td>
				      <td><button class="btn btn-danger">categorias</button></td>
				      <td>
				      	<a href="?controller=Movie&method=edit&Id=<?php echo $Movie->Id ?>" class="btn btn-primary">Editar</a>
				       	<?php
				      	if ($Movie->status_id ==1) {
				    	?>
                         <a href="?controller=Movie&method=updateStatus&Id=<?php echo $Movie->Id ?>" class="btn btn-danger">Inactivar</a>

                        <?php
                         }else  {
                           	?> 
                           	<a href="?controller=Movie&method=updateStatus&Id=<?php echo $Movie->Id ?>" class="btn btn-success">Activar</a>
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