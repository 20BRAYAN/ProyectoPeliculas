<main class="container">
	<div class="row">
		<h1>Agregar Pelicula</h1>
	</div>
	<section class="row mt-5">
		<div class="card w-75 m-auto">
			<div class="card-header container">
				<h2 class="m-auto">Información de las peliculas</h2>
			</div>

			<div class="card-body">
				<!--Ya no se utiliza el form, se reemplaza por js, y los names se reemplazan por id 
				<form action="?controller=Movie&method=save" method="post">-->
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" id="name" class="form-control" placeholder="Ingrese nombre de la pelicula">
					</div>
					<div class="form-group">
						<label>Descripción</label>
                        <!--El texarea es un espacio mas grande -->
						<textarea type="text" id="description" class="form-control" placeholder="Ingrese Descripción"></textarea>
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
                            <label>Categorías</label>
                            <select id="category" class="form-control">
                                <option value="">Seleccione...</option>                                
                                <?php
                                    foreach ($categories as $category) {
                                        ?>
                                            <option value="<?php echo $category->Id ?>"><?php echo $category->name ?></option>
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
                        if(isset($categoriesMovie)) {
                        ?>
                            <script>
                                var arrCategories = <?php echo json_encode($categoriesMovie); ?>
                            </script>
                        <?php
                        } else {
                            ?>
                            <script>
                                var arrCategories = []
                            </script>
                        <?php
                        }
                    ?>
                    <div class="form-group" id="list-categories">                        
                    </div>
                     <div class="form-group">
                        <button class="btn btn-primary" id="submit" >Guardar</button>
                        
                    </div>
				<!--</form>-->			
			</div>
		</div>
	</section>
</main>
<!--se llama al archivo JS (solo en new porque solo lo vamos a usar  para agregar)-->
<script src="assets/js/movie.js"></script>