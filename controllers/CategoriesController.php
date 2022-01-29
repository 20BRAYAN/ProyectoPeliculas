<?php
	
	/**
	 * Clase UserController
	 */

	require 'models/Categorie.php';
    require 'models/Statuses.php';

	class CategoriesController
	{
		private $model;
	    private $status;
		
		public function __construct()
		{
           try{

			$this->model = new Category;
			$this->status = new Statuses;
		   if (!isset($_SESSION['user']))
            header('Location: ?controller=login');
          }catch(PDOException $e){
            die($e->getMessage());
        }
    }
  
		public function index() 
		{
			if(isset($_SESSION['user'])){
				$categoriesSave= $this->model->getAll();
				require 'views/layout.php';
				require 'views/Categories/list.php';
			} else {
				require 'views/login.php';
			}
		}


		//muestra la vista de crear
		public function add() 
		{
			require 'views/layout.php';
			require 'views/Categories/new.php';
		}

		// Realiza el proceso de guardar
		public function save()
		{
			$this->model->newCategories($_REQUEST);			
			header('Location: ?controller=Categories');
		}

		//muestra la vista de editar
		public function edit()
		{
			if(isset($_REQUEST['Id'])) {
				$Id = $_REQUEST['Id'];
				$data = $this->model->getCategoriesById($Id);
				$statuses= $this->status->getAll();
				require 'views/layout.php';
				require 'views/Categories/edit.php';
			} else {
				echo "Error";
			}
		}

		// Realiza el proceso de actualizar
		public function update()
		{
			if(isset($_POST)) {
				$this->model->editCategories($_POST);			
				header('Location: ?controller=Categories');				
			} else {
				echo "Error";
			}
		}

		// Realiza el proceso de borrar
		public function delete()
		{			
			$this->model->deleteCategories($_REQUEST);		
			header('Location: ?controller=Categories');
		}

			public function updateStatus()
		{
            
           $Categories = $this->model->getCategoriesById($_REQUEST['Id']);
           $data = [];
           if ($Categories[0]->status_id ==1 ) {	
           $data = [
           	          'Id' => $Categories[0]->Id,
                       'status_id' => 2
           	      ];
           }
           elseif($Categories[0]->status_id ==2){

           	$data = [
           	          'Id' => $Categories[0]->Id,
                       'status_id' => 1
                    ];  

           }
           	  $this->model->editCategories($data);
              header('location: ?controller=Categories'); 
		}
	}