<?php
/*se llama los modelos */
require 'models/Movie.php';
require 'models/Statuses.php';
require 'models/User.php';
require 'models/Categorie.php';




/**
 * 
 */
class MovieController
{
    /*Se crean variables privadas*/
    private $model;
    private $status;
    private $users;
    private $category;



  public function __construct()
  {
    
    try{/*se instania la variable con la clase del  modelo*/
    
    $this->model = new Movie;
    $this->status = new Statuses;
    $this->user = new User;
    $this->category = new Category;
        
        if (!isset($_SESSION['user']))
        header('Location: ?controller=login');
          }catch(PDOException $e){
            die($e->getMessage());
        }
    }
  
  

  public function index()

{ 
      if(isset($_SESSION['user'])){
        $MovieControllers = $this->model->getAll();
        $arrCategoriesMovie = [];
        foreach ($MovieControllers as $Movie) {
          $categories = $this->model->getCategoriesMovie($Movie->Id);
          array_push($arrCategoriesMovie, $categories);
        }
        require 'views/layout.php';
        require 'views/movie/list.php';
      } else {
        require 'views/login.php';
      }
    }
  public function add()
  {
    
    require 'views/layout.php';
      $users=$this->user->getActiveUser();
      $categories = $this->category->getAll();
      require 'views/Movie/new.php';
  }

  public function save()
  {
         //aqui se hace la division  de las dos tablas  movie y categoria
        //organizar array para la tabla movie
        $dataMovie = [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'user_id' => $_POST['user_id'],
            'status_id' => 1
        ]; 

        //variable con array de categorias que llegan desde el Frontend
          
        $arrayCategories = isset($_POST['categories']) ? $_POST['categories'] : [];

        //si el array no esta vacio
        if(!empty($arrayCategories)) {

            //inserción Pelicula 
            //se gurdaen variables (respMovie, lastIdMovie)
            $respMovie = $this->model->newMovie($dataMovie);
            //Obtener El ultimo Id registrado de la tabla movie
                                         //el gestLasId es el metodo creado en modelo movie
            $lastIdMovie = $this->model->getLastId();

            //Inserción a la tabla category_movie
                                                                  //parametros que resive
            $repsCategoryMovie = $this->model->saveCategoryMovie($arrayCategories, $lastIdMovie[0]->Id);
        } else {   //si no esta vacio las respuestas se colocan en false
            $respMovie = false;
            $repsCategoryMovie = false;
        }


        //validar si las inserciones se realizaron correctamente
        //se crea una array de respuesta 
        $arrayResp = [];
         
         //si las respuestas fueron correctas
        if($respMovie == true && $repsCategoryMovie == true) {
          //nos muestra
            $arrayResp = [
                'success' => true,
                'message' =>  "Pelicula Creada"
            ];
        } else { //en caso contrario nos muestra error 
            $arrayResp = [
                'error' => false,
                'message' => "Error Creando la Pelicula"
            ];
        }
         //de esta manera el array de respuesta  se pasa a json
        echo json_encode($arrayResp);
        return;
    }

  public function edit()
    {
      if(isset($_REQUEST['Id'])) {
        $Id = $_REQUEST['Id'];
        $data = $this->model-> getMovieById($Id);
        $statuses= $this->status->getAll();
        $categoriesMovie = $this->model->getCategoriesMovie($Id);
        $users=$this->user->getActiveUser();
        $categories = $this->category->getAll();
        require 'views/layout.php';
        require 'views/Movie/edit.php';
      } else {
        echo "Error";
      }
    }

    // Realiza el proceso de actualizar
  

    // Realiza el proceso de borrar
    public function delete()
    {     
      $this->model->deleteMovie($_REQUEST);   
      header('Location: ?controller=Movie');
    }


      public function updateStatus()
    {
            
           $Movie = $this->model-> getMovieById($_REQUEST['Id']);
           $data = [];
           if ($Movie[0]->status_id ==1 ) { 
           $data = [
                      'Id' => $Movie[0]->Id,
                       'status_id' => 2
                  ];
           }
           elseif($Movie[0]->status_id ==2){

            $data = [
                      'Id' => $Movie[0]->Id,
                       'status_id' => 1
                    ];  

           }
              $this->model->editMovie($data);
              header('location: ?controller=Movie'); 
    }
    public function update()
    {
        //validar si las inserciones se realizaron correctamente
        $arrayResp = [];

        if(isset($_POST)) {

            //organizar array para la tabla movie
            $dataMovie = [
                'Id' => $_POST['Id'],
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'user_id' => $_POST['user_id'],
                'status_id' => $_POST['status_id']
            ]; 

            //variable con array de categorias que llegan desde el Frontend
            $arrayCategories = isset($_POST['categories']) ? $_POST['categories'] : [];

            if(!empty($arrayCategories)) {

                //inserción Pelicula
                $respMovie = $this->model->editMovie($dataMovie);

                //crear metodo para eliminar las categorias de category_movie
                $this->model->deleteCategoryMovie($_POST['Id']);
                
                //Inserción a la tabla category_movie                                 //SE PASA EL POST
                $repsCategoryMovie = $this->model->saveCategoryMovie($arrayCategories, $_POST['Id']);
            } else {
                $respMovie = false;
                $repsCategoryMovie = false;
            }
        }else{
            $arrayResp = [
                'error' => false,
                'message' => "Error Actualizando la Pelicula"
            ];
        }

        echo json_encode($arrayResp);
        return;
    }
}

?>