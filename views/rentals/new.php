<main class="container">
	<div class="row">
		<h1>Agregar Alquiler</h1>
	</div>
	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información del Usuario</h2>
			</div>

			<div class="card-body">
				<!--<form action="?controller=rentals&method=save" method="post">-->
					<div class="form-group">
						<label>fecha inicio</label>
						<input type="date" id="start_date" class="form-control" placeholder="2020-05-14 12:02:02">
					</div>
					<div class="form-group">
						<label>Fecha final</label>
						<input type="date" id="end_date" class="form-control" placeholder="2020-05-14 12:02:02">
					</div>					
                    <div class="form-group">
						<label>Total</label>
						<input type="int" id="total" class="form-control" placeholder="ingrese valor">
					</div>	
						<div class="form-group">
                        <label>Usuarios</label>
                        <select id="user_id" class="form-control">
                        	<option value="">Seleccione...</option>
                            <?php
                                foreach ($users as $user) {
                                    if ($user->id == $data[0]->user_id) {
                                ?>
                                        <option selected value="<?php echo $users->id ?>"><?php echo $users->name ?></option>
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
                            <select id="movie" class="form-control">
                                <option value="">Seleccione...</option>                                
                                <?php
                                    foreach ($movies as $movie) {
                                        ?>
                                            <option value="<?php echo $movie->Id ?>"><?php echo $movie->name ?></option>
                                        <?php                                           
                                    }
                                ?>
                            </select>
                       </div>
                        <!---Contenedor vacio en donde se carga una lista la cual se carga con JS-->
                        <div class="col-md-4 mt-4">
                            <a href="#" id="addElement" class="btn btn-secondary">+</a>
                        </div>
                    </div>
                         <?php
                        if(isset($moviesCategorie)) {
                        ?>
                            <script>
                                var arrMovies = <?php echo json_encode($moviesCategorie); ?>
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
                 
                   
                    <div class="form-group" id="list-movies">                        
                    </div>
					<div class="form-group">
						<button class="btn btn-primary" id="submit" >Guardar</button>
					</div>
				<!--</form>-->			
			</div>
		</div>
	</section>
</main>
<script src="assets/js/rentals.js"></script>