<?php
	
	/**
	 * Clase HomeController para carga el home del proyecto
	 */
	class HomeController 
	{
	public function __construct(){
		if (!isset($_SESSION['user'])) //que sesion va a destruir si no existe
			header('Location: ?controller=login');
	}
	 	public function index()
		{
			if(isset($_SESSION['user'])){
				require 'views/layout.php';
	 		require 'views/home.php';
			} else {
				require 'views/login.php';
			}
		}
	}
?>
