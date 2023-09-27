<?php
	
	class Articulos_model {
		
		private $db;
		private $articulos;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->articulos = array();
		}
		
		public function get_articulos()
		{
			$sql = "SELECT t1.id_articulo,t1.nombre_articulo,t1.notas,CAST(t1.precio AS DECIMAL(10,4)) AS precio,CAST((t2.Iva/100) * t1.precio AS DECIMAL(10,4)) AS Iva FROM articulos t1 INNER JOIN configuracion t2";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->articulos[] = $row;
			}
			return $this->articulos;
		}

		public function insertar_articulo($nombre_articulo, $notas_articulo, $precio_articulo) {

			$resultado = $this->db->query("INSERT INTO articulos (nombre_articulo, notas, precio) VALUES ('$nombre_articulo', '$notas_articulo', '$precio_articulo')");
		}

		public function modificar_articulo($id, $nombre_articulo, $notas, $precio) {

			$resultado = $this->db->query("UPDATE articulos SET nombre_articulo='$nombre_articulo', notas='$notas', precio='$precio' WHERE id_articulo = '$id'");	
		}
		
		public function eliminar($id){
			
			$resultado = $this->db->query("DELETE FROM articulos WHERE id_articulo = '$id'");
			
		}
		
		public function get_articulo($id)
		{
			$sql = "SELECT * FROM articulos WHERE id_articulo='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}
	} 
?>