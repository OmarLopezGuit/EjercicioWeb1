<?php
	
	class Conectar {
		
		public static function conexion(){
			
			$conexion = new mysqli("localhost", "root", "admin", "mvc");
			return $conexion;
			
		}
	}
?>