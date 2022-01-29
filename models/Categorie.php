<?php

/**
 * 
 */
class Category
{
	private $Id;
	private $name;
	private $status_id;
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
			$strSql = "SELECT u.*, s.status as status FROM categories u INNER JOIN statuses s ON s.Id = u.status_id ORDER BY u.Id ASC";
			$query =$this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}	

	public function newCategories($data)
	{

	    try {
	    	$data['status_id'] =1;
	    	$this->pdo->insert('categories',$data);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}

	}

	public function getCategoriesById($Id)
		{
			try {
				$strSql = "SELECT * FROM categories WHERE Id = :Id";
				$arrayData = ['Id' => $Id];
				$query = $this->pdo->select($strSql, $arrayData);
				return $query; 
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}

		public function editCategories($data)
		{
			try {
				$strWhere = 'Id = '. $data['Id'];
				$this->pdo->update('categories', $data, $strWhere);				
			} catch(PDOException $e) {
				die($e->getMessage());
			}		
		}

		public function deleteCategories($data)
		{
			try {
				$strWhere = 'Id = '. $data['Id'];
				$this->pdo->delete('categories', $strWhere);
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}
}