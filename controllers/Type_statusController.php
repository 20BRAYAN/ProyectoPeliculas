<?php
	
	/**
	 * Clase UserController
	 */

	require 'models/Type_status.php';

	class Type_statusController
	{
		private $model;
		
		public function __construct()
		{
			try{
			$this->model = new TypeStatus;
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
				require 'views/type_status/list.php'; 
			} else {
				require 'views/login.php';
			}
		}

		//muestra la vista de crear
		public function add() 
		{
			require 'views/layout.php';
			require 'views/type_status/new.php';
		}

		// Realiza el proceso de guardar
		public function save()
		{
			$this->model->newTypeStatus($_REQUEST);			
			header('Location: ?controller=type_status');
		}

		//muestra la vista de editar
		public function edit()
		{
			if(isset($_REQUEST['id'])) {
				$id = $_REQUEST['id'];
				$data = $this->model->getTypeStatus($id);
				require 'views/layout.php';
				require 'views/type_status/edit.php';
			} else {
				echo "Error";
			}
		}

		// Realiza el proceso de actualizar
		public function update()
		{
			if(isset($_POST)) {
				$this->model->editTypeStatus($_POST);			
				header('Location: ?controller=type_status');				
			} else {
				echo "Error";
			}
		}

		// Realiza el proceso de borrar
		public function delete()
		{			
			$this->model->deleteStatuses($_REQUEST);		
			header('Location: ?controller=type_status');
		}
	}