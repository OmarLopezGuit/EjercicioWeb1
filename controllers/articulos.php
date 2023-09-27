<?php
	
	class ArticulosController {
		
		public function __construct(){
			require_once "../../models/ArticulosModel.php";
		}
		
		public function index(){
			$articulos = new Articulos_model();
			$data["titulo"] = "Artículos";
			$data["articulos"] = $articulos->get_articulos();
			echo json_encode($data);			
		}
		
		public function guarda(){
			$nombre_articulo = $_POST['nombre_articulo'];
			$notas = $_POST['notas'];
			$precio = $_POST['precio'];
						
			$articulos = new Articulos_model();
			$data = $articulos->insertar_articulo($nombre_articulo, $notas, $precio);
			echo json_encode($data);			
		}
		
		public function modificar($id){
			
			$articulos = new Articulos_model();
			$data["id"] = $id;
			$data["articulos"] = $articulos->get_articulo($id);
			echo json_encode($data);			
		}
		
		public function actualizar(){

			$id = $_POST['id'];
			$nombre_articulo = $_POST['nombre_articulo'];
			$notas = $_POST['notas'];
			$precio = $_POST['precio'];

			$articulos = new Articulos_model();
			$data = $articulos->modificar_articulo($id, $nombre_articulo, $notas, $precio);
			echo json_encode($data);
		}
		
		public function eliminar($id){
			
			$articulos = new Articulos_model();
			$data = $articulos->eliminar($id);			
			$this->index();			
		}	
	}
?>