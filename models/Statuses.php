	<?php

/**
 * 
 */
class Statuses
{
	private $Id;
	private $status;
	private $type_statuses_id;
	private $pdo;
	
	function __construct()
	{
		try {
			$this->pdo =new Database;
		} catch (PDOExeption $e) {
			die($e->getMessage());
		}
	}

	public function getALL()
	{
		try {
				$strSql = "SELECT r.*, s.name as name FROM statuses r INNER JOIN type_statuses s ON s.id = r.type_statuses_id ORDER BY r.id ASC";
			$query =$this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}	

	public function newStatuses($data)
	{

	    try {
	    	
	    	$this->pdo->insert('statuses',$data);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}

	}

	public function getUserById($Id)
		{
			try {
				$strSql = "SELECT * FROM statuses WHERE Id = :Id";
				$arrayData = ['Id' => $Id];
				$query = $this->pdo->select($strSql, $arrayData);
				return $query; 
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}

		public function editStatuses($data)
		{
			try {
				$strWhere = 'Id = '. $data['Id'];
				$this->pdo->update('statuses', $data, $strWhere);				
			} catch(PDOException $e) {
				die($e->getMessage());
			}		
		}

		public function deleteStatuses($data)
		{
			try {
				$strWhere = 'Id = '. $data['Id'];
				$this->pdo->delete('statuses', $strWhere);
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}
}