<main id="Movie" class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de peliculas</h1>


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
				    
				    </tr>
				  <?php endforeach ?> 
			  </tbody>
			</table>
		</section>	
	</section>
</main>