<?php

	class Conexion {

			private $host = "localhost";
			private $user = 'root';
			private $pass = '';
			private $db  = 'banco';
			private $connect;

		function __construct(){

			$stringConexion =  "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
			try {
				$this->connect = new PDO($stringConexion,$this->user,$this->pass);
				$this->connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				//echo 'conexion exitosa';
			} catch (Exception $e) {
				 $this->connect = "ERROR";
				 echo "ERROR".$e->getMessage();
			}
		}

		public function connect(){

			return $this->connect;
		}

		
	}




 ?>