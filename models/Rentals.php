<?php
	
	/**
	 * Modelo de la Tabla users
	 */
	class Rentals
	{
		private $id;
		private $star_date;
		private $end_date;
		private $status_id;
		private $total;
		private $user_id;
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
				$strSql = "SELECT u.*, s.status as status,r.name as users FROM rentals u INNER JOIN statuses s ON s.id = u.status_id INNER JOIN users r ON r.id=u.user_id ORDER BY u.id ASC";
				//Llamado al metodo general que ejecuta un select a la BD
				$query = $this->pdo->select($strSql);
				//retorna el objeto del query
				return $query;
			} catch(PDOException $e) {
				die($e->getMessage());
			}
		}

		public function newRental($data)
		{
			try {
				$this->pdo->insert('rentals', $data);				
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}

		public function getRentalById($id)
		{
			try {
				$strSql = "SELECT * FROM rentals WHERE id = :id";
				$arrayData = ['id' => $id];
				$query = $this->pdo->select($strSql, $arrayData);
				return $query; 
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}

		public function editRentals($data)
		{
			try {
				$strWhere = 'id = '. $data['id'];
				$this->pdo->update('rentals', $data, $strWhere);				
			} catch(PDOException $e) {
				die($e->getMessage());
			}		
		}

		public function deleteRental($data)
		{
			try {
				$strWhere = 'id = '. $data['id'];
				$this->pdo->delete('rentals', $strWhere);
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}
	   public function saveCategoryRental($arrayMovies, $lastIdRental)
        {

        try {
        	//como son varios se hace un foreach 
  
            foreach ($arrayMovies as $movie) {
                $data = [
                	//datos que se necesitan para insertar en la tabla category_movie
                    'movie_id' => $movie['Id'],
                    'rental_id' => $lastIdRental,
                    'unit_price' =>1 

                ];

                $this->pdo->insert('movie_rental', $data);
            }
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }    
    }
		 public function getLastIdRental()
         {
        try {
            $strSql = "SELECT MAX(id) as id FROM rentals";
            $query = $this->pdo->select($strSql);
            //retorna la consulta
            return $query;
            //si no muestra error
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
  

      public function getMovieRentals($rental_id)
    {
        try {
        	//llamado a la base de dartos 	                     
            $strSql = "SELECT mr.*, m.name as name FROM movie_rental mr INNER JOIN movies m ON m.id = mr.movie_id WHERE mr.rental_id = '{$rental_id}' ";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
       public function deleteMovieRentals($id)
	    {
	        try {
	            $strWhere = 'rental_id =' . $id;
	            $this->pdo->delete('movie_rental', $strWhere);
	            return true;
	        } catch (PDOException $e) {
	            return $e->getMessage();
	        }
	    }

  

}