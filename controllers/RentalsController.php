<?php
	
	/**
	 * Clase UserController
	 */

	require 'models/Rentals.php';
	require 'models/Statuses.php';
	require 'models/User.php';
	require 'models/Movie.php';


	class RentalsController
	{
		private $model;
		private $status;
		private $users;
		private $movie; 

		
		public function __construct()
		{
      try{
        
			$this->model = new Rentals;
			$this->status = new Statuses;
			$this->user = new User;
			$this->movie = new Movie;
        if (!isset($_SESSION['user']))
        header('Location: ?controller=login');
          }catch(PDOException $e){
            die($e->getMessage());
        }
    }
  

		public function index() 
  {
      if(isset($_SESSION['user'])){
        $rentalsSave= $this->model->getAll();
        $arrMovieRentals = [];
        foreach ($rentalsSave as $rentals) {
          $rentals = $this->model->getMovieRentals($rentals->id);
          array_push($arrMovieRentals, $rentals);
        }
        require 'views/layout.php';
        require 'views/rentals/list.php';
      } else {
        require 'views/login.php';
      }
    }


		//muestra la vista de crear
		public function add() 
		{
      if(isset($_SESSION['user'])){
      $status = $this->status->getAll();
   		$users=$this->user->getActiveUser();
			$movies=$this->movie->getActiveMovie();
			require 'views/layout.php';
      require 'views/rentals/new.php';
      }else  {
        require 'views/login.php';
            // require 'views/errors/404/404.php';
        }
		}

		// Realiza el proceso de guardar
	public function save()
  {
  	     //aqui se hace la division  de las dos tablas	movie y categoria
        //organizar array para la tabla movie
        $dataRental = [
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'total' => $_POST['total'],
            'user_id' => $_POST['user_id'],
         
            'status_id' => 1
          
        ]; 

        //variable con array de categorias que llegan desde el Frontend
          
        $arrayMovies = isset($_POST['movies']) ? $_POST['movies'] : [];


        //si el array no esta vacio
        if(!empty($arrayMovies)) {

            //inserción Pelicula 
            //se gurdaen variables (respMovie, lastIdMovie)
            $respRental = $this->model->newRental($dataRental);
            //Obtener El ultimo Id registrado de la tabla movie
                                         //el gestLasId es el metodo creado en modelo movie
            $lastIdRental = $this->model->getLastIdRental();


            //Inserción a la tabla category_movie
                                                                  //parametros que resive
            $repsCategoryRental = $this->model->saveCategoryRental($arrayMovies, $lastIdRental[0]->id);


        } else {   //si no esta vacio las respuestas se colocan en false
            $respRental = false;
            $repsCategoryRental = false;
        }


        //validar si las inserciones se realizaron correctamente
        //se crea una array de respuesta 
        $arrayResp = [];
         
         //si las respuestas fueron correctas
        if($respRental == true && $repsCategoryRental == true) {
        	//nos muestra
            $arrayResp = [
                'success' => true,
                'message' =>  "Alquiler Creado"
            ];
        } else { //en caso contrario nos muestra error 
            $arrayResp = [
                'error' => false,
                'message' => "Error Creando el Alquiler"
            ];
        }
         //de esta manera el array de respuesta  se pasa a json
        echo json_encode($arrayResp);
        return;
    }
		//muestra la vista de editar
		public function edit()
		{
			if(isset($_REQUEST['id'])) {
				$id = $_REQUEST['id'];
				$data = $this->model->getRentalById($id);
				$statuses= $this->status->getAll();
				$users=$this->user->getActiveUser();
        $movies=$this->movie->getAll();
        $movieRentals = $this->model->getMovieRentals($id);
   			require 'views/layout.php';
				require 'views/rentals/edit.php';
			} else {
				echo "Error";
			}
		}

		// Realiza el proceso de actualizar
	public function update()
    {
      if(isset($_SESSION['user'])){
        $arrayResp = [];

        if(isset($_POST)) {
          $dataRentals = [
            'id' => $_POST['id'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'total' => $_POST['total'],
            'status_id' => $_POST['status_id'],
            'user_id' => $_POST['user_id']
          ]; 
          $arrayMovies= isset($_POST['movies']) ? $_POST['movies'] : [];
          $unit_price = $_POST['total'];
          if(!empty($arrayMovies)) {

            $respRentals = $this->model->editRentals($dataRentals);
            $this->model->deleteMovieRentals($_POST['id']);
            $repsMovieRentals = $this->model->saveCategoryRental($arrayMovies, $_POST['id'], $unit_price);
          } else {
            $respMovie = false;
            $repsMovieRentals = false;
          }
        }else{
          $arrayResp = [
            'error' => false,
            'message' => "Error Actualizando el alquiler"
          ];
        }

        echo json_encode($arrayResp);
        return;
      } else {
        require 'views/login.php';
      }
    }

		// Realiza el proceso de borrar
		public function delete()
		{			
			$this->model->deleteRental($_REQUEST);		
			header('Location: ?controller=rentals');
		}

		public function updateStatus()
		{
            
           $user = $this->model->getRentalById($_REQUEST['id']);
           $data = [];
           if ($rentals[0]->status_id ==1 ) {	
           $data = [
           	          'id' => $rentals[0]->id,
                       'status_id' => 2
           	      ];
           }
           elseif($rentals[0]->status_id ==2){

           	$data = [
           	          'id' => $rentals[0]->id,
                       'status_id' => 1
                    ];  

           }
           	  $this->model->editRental($data);
              header('location: ?controller=rentals'); 
		}
	}


?>