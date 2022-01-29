<?php
	
	/**
	 * Clase UserController
	 */

	require 'models/User.php';
	require 'models/Statuses.php';
	require 'models/Roles.php';

	class UserController
	{
		private $model;
		private $status;
		private $roles;
		
		public function __construct()
		{
			try{
			$this->model = new User;
			$this->status = new Statuses;
			$this->role = new Roles;
            if (!isset($_SESSION['user']))
            header('Location: ?controller=login');
          }catch(PDOException $e){
            die($e->getMessage());
        }
    }
  

		public function index() 
		{	
			if(isset($_SESSION['user'])){
				$users = $this->model->getAll();
				require 'views/layout.php';
				require 'views/user/list.php'; 
			} else {
				require 'views/login.php';
			}
		}

		//muestra la vista de crear
		public function add() 
		{
			require 'views/layout.php';
			$roles=$this->role->getActiveRoles();
			require 'views/user/new.php';
		}

		// Realiza el proceso de guardar
		public function save()
		{
			$this->model->newUser($_REQUEST);			
			header('Location: ?controller=user');
		}

		//muestra la vista de editar
		public function edit()
		{
			if(isset($_REQUEST['id'])) {
				$id = $_REQUEST['id'];
				$data = $this->model->getUserById($id);
				$statuses= $this->status->getAll();
				$roles=$this->role->getActiveRoles();
				require 'views/layout.php';
				require 'views/user/edit.php';
			} else {
				echo "Error";
			}
		}

		// Realiza el proceso de actualizar
		public function update()
		{
			if(isset($_POST)) {
				$this->model->editUser($_POST);			
				header('Location: ?controller=user');				
			} else {
				echo "Error";
			}
		}

		// Realiza el proceso de borrar
		public function delete()
		{			
			$this->model->deleteUser($_REQUEST);		
			header('Location: ?controller=user');
		}

		public function updateStatus()
		{
            
           $user = $this->model->getUserById($_REQUEST['id']);
           $data = [];
           if ($user[0]->status_id ==1 ) {	
           $data = [
           	          'id' => $user[0]->id,
                       'status_id' => 2
           	      ];
           }
           elseif($user[0]->status_id ==2){

           	$data = [
           	          'id' => $user[0]->id,
                       'status_id' => 1
                    ];  

           }
           	  $this->model->editUser($data);
              header('location: ?controller=user'); 
		}
	}