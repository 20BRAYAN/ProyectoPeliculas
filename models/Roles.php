<?php
	
	/**
	 * Modelo de la Tabla users
	 */
	class Roles
	{
		private $id;
		private $name;
		private $status_id;
		private $pdo;
		
		public function __construct()
		{
			try{ 
				$this->pdo = new Database;
			} catch(PDOException $e) {
				die($e->getMessage());
			}
		}

		public function getAll()
		{
			try {
				$strSql = "SELECT r.*, s.status as status FROM roles r INNER JOIN statuses s ON s.id = r.status_id ORDER BY r.id ASC";
				//Llamado al metodo general que ejecuta un select a la BD
				$query = $this->pdo->select($strSql);
				//retorna el objeto del query
				return $query;
			} catch(PDOException $e) {
				die($e->getMessage());
			}
		}

				public function getActiveRoles()
		{
			try {
				$strSql = "SELECT r.*, s.status as status FROM roles r INNER JOIN statuses s ON s.id = r.status_id  WHERE r.status_id=1 ORDER BY r.id ASC";
				//Llamado al metodo general que ejecuta un select a la BD
				$query = $this->pdo->select($strSql);
				//retorna el objeto del query
				return $query;
			} catch(PDOException $e) {
				die($e->getMessage());
			}
		}


			public function getById($id)
		{
			try {
				$strSql = "SELECT * FROM roles WHERE id = :id";
				$arrayData = ['id' => $id];
				$query = $this->pdo->select($strSql, $arrayData);
				return $query; 
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}

		public function editStatus($data)
		{
			try {	
			    $strWhere = 'id = '. $data['id'];
				$this->pdo->update('roles', $data, $strWhere);				
			} catch(PDOException $e) {
				die($e->getMessage());
			}		
		}

	}