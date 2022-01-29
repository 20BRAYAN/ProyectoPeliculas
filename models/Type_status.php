<?php

/**
 * 
 */
class TypeStatus
{
	private $id;
	private $name;
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
			$strSql ="SELECT * FROM type_statuses";
			$query =$this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}	

	public function newTypeStatus($data)
	{

	    try {
	    	
	    	$this->pdo->insert('type_statuses',$data);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}

	}

	public function getTypeStatus($id)
		{
			try {
				$strSql = "SELECT * FROM type_statuses WHERE id = :id";
				$arrayData = ['id' => $id];
				$query = $this->pdo->select($strSql, $arrayData);
				return $query; 
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}

		public function editTypeStatus($data)
		{
			try {
				$strWhere = 'id = '. $data['id'];
				$this->pdo->update('type_statuses', $data, $strWhere);				
			} catch(PDOException $e) {
				die($e->getMessage());
			}		
		}

		public function deleteTypeStatus($data)
		{
			try {
				$strWhere = 'id = '. $data['id'];
				$this->pdo->delete('type_statuses', $strWhere);
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}
}