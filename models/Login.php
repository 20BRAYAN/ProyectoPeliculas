<?php

/**
 * modelo de Login
 */
class Login
{
    //variable pdo
    private $pdo;

    //metodo constructor
    public function __construct()
    {
        try {
            $this->pdo = new Database;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    //como llegan todos los datos lo llamamos data
    public function validateUser($data)
    {

        try {
            //consulta para validar si el usuario existe o no
            //vamos a traer el estado actual email
            $strSql = "SELECT u.*, s.status as status, r.name as role FROM users u INNER JOIN statuses s ON s.id = u.status_id INNER JOIN roles r ON r.id = u.roles_id WHERE u.email = '{$data['email']}' AND u.password = '{$data['password']}' ";
            
            //se ejecuta la consulta   se pasa como parametro la consulta
            $query = $this->pdo->select($strSql);
            
            //validacion
            //si existe el id 
            if(isset($query[0]->id)) {
              if ($query[0]->status_id == 1) {
 
                $_SESSION['user'] = $query[0];
                //si lo encuentra me retorna un verdadero
                return true;
                }else{
                 
                return 'Error al Iniciar Sesión. Su Usuario esta inactivo';
                }
                //se crea el atributo user y me guarda todo el objeto 
            } else{
                return 'Error al Iniciar Sesión. Verifique sus Credenciales';
            } //si es falso reorna error
        
        } catch (PDOException $e) {
            return $e->getMessage();
        }    
    }
    
}