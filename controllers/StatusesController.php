<?php
	
	/**
	 * Clase UserController
	 */

	require 'models/Statuses.php';
	require 'models/Type_status.php';

	class StatusesController
	{
		private $model;
		private $Type_statuses;
		
    		
		public function __construct()
		{
	   try{
			$this->model = new Statuses;
			$this->type_state = new TypeStatus;
	  if (!isset($_SESSION['user']))
        header('Location: ?controller=login');
          }catch(PDOException $e){
            die($e->getMessage());
        }
    }
  


		public function index() 
			{	
			if(isset($_SESSION['user'])){
				$StatusesSave = $this->model->getAll();
				require 'views/layout.php';
				require 'views/Statuses/list.php'; 
			} else {
				require 'views/login.php';
			}
		}

		//muestra la vista de crear
		public function add() 
		{
			require 'views/layout.php';
			$Type_statuses=$this->type_state->getAll();
			require 'views/Statuses/new.php';
		}

		// Realiza el proceso de guardar
		public function save()
		{
			$this->model->newStatuses($_REQUEST);			
			header('Location: ?controller=Statuses');
		}

		//muestra la vista de editar
		public function edit()
		{
			if(isset($_REQUEST['Id'])) {
				$Id = $_REQUEST['Id'];
				$data = $this->model->getUserById($Id);
				$Type_statusesses=$this->type_state->getAll();
				require 'views/layout.php';
				require 'views/Statuses/edit.php';
			} else {
				echo "Error";
			}
		}

		// Realiza el proceso de actualizar
		public function update()
		{
			if(isset($_POST)) {
				$this->model->editStatuses($_POST);			
				header('Location: ?controller=Statuses');				
			} else {
				echo "Error";
			}
		}

		// Realiza el proceso de borrar
		public function delete()
		{			
			$this->model->deleteStatuses($_REQUEST);		
			header('Location: ?controller=Statuses');
		}
	}