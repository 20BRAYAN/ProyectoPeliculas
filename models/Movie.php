<?php

/**
 * 
 */
class Movie
{
    private $Id;
    private $name;
    private $description;
    private $user_id;
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
                $strSql = "SELECT u.*, s.status as status,r.name as users FROM movies u INNER JOIN statuses s ON s.id = u.status_id INNER JOIN users r ON r.id=u.user_id ORDER BY u.id ASC";

            //$strSql = "SELECT u.*, s.status as status FROM movies u INNER JOIN statuses s ON s.Id = u.status_id ORDER BY u.Id ASC";
            $query =$this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }   
    public function newMovie($data)
    {
        try {
            $this->pdo->insert('movies', $data);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getMovieById($id)
        {
            try {
                $strSql = "SELECT * FROM movies WHERE Id = :Id";
                $arrayData = ['Id' => $id];
                $query = $this->pdo->select($strSql, $arrayData);
                return $query; 
            } catch(PDOException $e) {
                die($e->getMessage());
            }   
        }

        public function editMovie($data)
        {
            try {
                $strWhere = 'Id = '. $data['Id'];
                $this->pdo->update('movies', $data, $strWhere);             
            } catch(PDOException $e) {
                die($e->getMessage());
            }       
        }

        public function deleteMovie($data)
        {
            try {
                $strWhere = 'Id = '. $data['Id'];
                $this->pdo->delete('movies', $strWhere);
            } catch(PDOException $e) {
                die($e->getMessage());
            }   
        }
        //es similar al new
         public function saveCategoryMovie($arrayCategories, $lastIdMovie)
    {

        try {
            //como son varios se hace un foreach 
            foreach ($arrayCategories as $category) {
                $data = [
                    //datos que se necesitan para insertar en la tabla category_movie
                    'movie_id' => $lastIdMovie,
                    'category_id' => $category['Id'],
                    'status_id' => 1
                ];

                $this->pdo->insert('category_movie', $data);
            }
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }    
    }
    public function getLastId()
    {
        try {
            $strSql = "SELECT MAX(Id) as Id FROM movies";
            $query = $this->pdo->select($strSql);
            //retorna la consulta
            return $query;
            //si no muestra error
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    //metodo para traer los d categoatos dery_movie y category
      public function getCategoriesMovie($movie_id)
    {
        try {
            //llamado a la base de dartos                        
            $strSql = "SELECT cm.*, c.name as name FROM category_movie cm INNER JOIN categories c ON c.id = cm.category_id WHERE cm.movie_id = '{$movie_id}' ";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
      public function deleteCategoryMovie($id)
    {
        try {
            $strWhere = 'movie_id =' . $id;
            $this->pdo->delete('category_movie', $strWhere);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

        public function getActiveMovie()
        {
            try {
                $strSql = "SELECT m.* FROM movies AS m WHERE status_id = 1";                 
                $query = $this->pdo->select($strSql);
                return $query;              
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
}