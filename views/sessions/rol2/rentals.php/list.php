<main class="container">
	<section class="col-md-12 text-center">
		<h1>Listado de Alquileres</h1>

			<div>
			<h2>Alquileres</h2>
			<a href="?controller=rentals&method=add" class="btn btn-success">Agregar</a>
		</div>


		<section class="col-md-12 table-responsive">
			<table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Fecha inicio</th>
			      <th>Fecha final </th>
			      <th>Estados</th>
			      <th>Total</th>
			      <th>usuario</th>			      
			      
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($rentalsSave as $rentals) : ?>
				    <tr>
				      <td><?php echo $rentals->id ?></td>
				      <td><?php echo $rentals->start_date?></td>
				      <td><?php echo $rentals->end_date?></td>
				      <td><?php echo $rentals->status?></td>
				      <td><?php echo $rentals->total?></td>
				      <td><?php echo $rentals->users?></td>

				  
				    </tr>
				  <?php endforeach ?> 
			  </tbody>
			</table>
		</section>	
	</section>
</main>