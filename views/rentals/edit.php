<main class="container">
	<div class="row">
		<h1>Editar Alquiler</h1>
	</div>
	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información de Alquileres</h2>
			</div>

			<div class="card-body">
				<!--<form action="?controller=rentals&method=update" method="post">-->
					<input type="hidden" name="id" value="<?php echo $data[0]->id ?>" >
					<div class="form-group">
						<label>Fecha inicio</label>
						<input type="date" id="start_date" class="form-control" placeholder="" value="<?php echo $data[0]->start_date ?>">
					</div>
					<div class="form-group">
					<label>Fecha final</label>
						<input type="date" id="end_date" class="form-control" placeholder="" value="<?php echo $data[0]->end_date ?>">
					</div>
					<div class="form-group">
						<label>Estado</label>
					<select id="status_id" class="form-control">
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
					<label>Total</label>
						<input type="int" id="total" class="form-control" placeholder="ingrese valor" value="<?php echo $data[0]->total ?>">
					</div>
					   <div class="form-group">
                        <label>Usuarios</label>
                        <select id="user_id" class="form-control">
                        	<option value="">Seleccione...</option>
                            <?php
                                foreach ($users as 	$user) {
                                    if ($user->id == $data[0]->user_id) {
                                ?>
                                        <option selected value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
                                <?php
                                    } else { 
                                ?>
                                        <option value="<?php echo $user->id ?>"><?php echo $user->name ?></option>
                                <?php 
                                    }
                                }
                            ?>
                        </select>
                    </div>
				  <div class="form-group row">    
                        <div class="col-md-8">             
                            <label>Peliculas</label>
                            <select id="movie_id" class="form-control">
                                <option value="">Seleccione...</option>                                
                                <?php
                                    foreach ($movies as $movie) {
                                     if ($movie->id == $data[0]->movie_id ) {
                                        ?>
                                            <option value="<?php echo $movie->Id ?>"><?php echo $movie->name ?></option>
                                        <?php    
                                        }
                                        else {
                                ?>
                                <option value="<?php echo $movie->Id ?>"><?php  echo $movie->name?> </option>
                                <?php
                            }                                       
                                    }
                                ?>
                            </select>
                       </div>
                        <!---Contenedor vacio en donde se carga una lista la cual se carga con JS-->
                        <div class="col-md-4 mt-4">
                            <a href="#" id="addElement" class="btn btn-secondary">+</a>
                        </div>
                    </div>
                         <div class="form-group" id="list-movies">                        
                    </div>
                    <?php
                        if(count($movieRentals) > 0) {
                            $arrMovieRentals = [];
                            foreach($movieRentals as $movieRental) {
                                array_push($arrMovieRentals, ['id' => $movieRental->movie_id, "name" => $movieRental->name]);
                            }
                            ?>
                                <script>
                                    var arrMovies = <?php echo json_encode($arrMovieRentals); ?>
                                </script>
                            <?php
                        } else {
                            ?>
                            <script>
                                var arrMovies = []
                            </script>
                        <?php
                        }
                    ?>
                <div class="form-group">
                    <button id="update" class="btn btn-primary">actualizar</button>
                </div>
				<!--</form>-->			
			</div>
		</div>
	</section>
</main>
<script src="assets/js/rentals.js"></script>
