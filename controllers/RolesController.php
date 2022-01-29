	<?php
	
	/**
	 * Clase UserController
	 */

	require 'models/Roles.php';
	require 'models/Statuses.php';


	class RolesController
	{
		private $model;
		private $status;
		
		
		public function __construct()
		{
		try{
			$this->model = new Roles;
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
				$roles = $this->model->getAll();
				require 'views/layout.php';
				require 'views/roles/list.php'; 
			} else {
				require 'views/login.php';
			}
		}
		public function updateStatus()
		{
            
           $roles = $this->model->getById($_REQUEST['id']);
           $data = [];
           if ($roles[0]->status_id ==1 ) {	
           $data = [
           	          'id' => $roles[0]->id,
                       'status_id' => 2
           	      ];
           }
           elseif($roles[0]->status_id ==2){

           	$data = [
           	          'id' => $roles[0]->id,
                       'status_id' => 1
                    ];  

           }
           	  $this->model->editStatus($data);
              header('location: ?controller=roles'); 
		}
	}
