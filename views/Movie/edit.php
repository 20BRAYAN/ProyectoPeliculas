<main class="container">
    <div class="row">
        <h1>Editar Pelicula</h1>
    </div>
    <section class="row mt-5">
        <div class="card w-75 m-auto">
            <div class="card-header container">
                <h2 class="m-auto">Información de las peliculas</h2>
            </div>

            <div class="card-body">
                <!--<form action="?controller=Movie&method=update" method="post">-->
                    <input type="hidden" id="Id" value="<?php echo $data[0]->Id ?>" >
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="name" class="form-control" placeholder="Ingrese Nombre Completo" value="<?php echo $data[0]->name ?>">
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <input type="text" id="description" class="form-control" placeholder="Ingrese Descripción" value="<?php echo $data[0]->description ?>">
                    </div>
                    <div class="form-group">
                        <label>Usuarios</label>
                        <select id="user_id" class="form-control">
                            <option value="">Seleccione...</option>
                            <?php
                                foreach ($users as  $user) {
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
                    <!--filtrar lo que ya esta --->
                      <?php
                        if(count($categoriesMovie) > 0) {
                            //array en vacio 
                            $arrCategoryMovie = [];
                            //nos recorre las categorias 
                            foreach($categoriesMovie as $categoryMovie) {
                                //
                                array_push($arrCategoryMovie, ['Id' => $categoryMovie->category_id, "name" => $categoryMovie->name]);
                            }
                            ?>
                                <script>
                                    //nos lo guarda como un json 
                            var arrCategories = <?php echo json_encode($arrCategoryMovie); ?>
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
                        <button id="update" class="btn btn-primary">Actualizar</button>
                    </div>
                <!--</form>-->          
            </div>
        </div>
    </section>
</main>
<!--llamado de js-->
<script src="assets/js/movie.js"></script>