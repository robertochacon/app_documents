<?php

class Conexion{

public static $objeto = null;
public $conn;	
 
	public function getConexion(){
		if (self::$objeto == null) {
			self::$objeto = new Conexion();
		}

		return self::$objeto->conn;
	}

	public function __construct(){
		$this->conn =  mysqli_connect("localhost","root","root","app_documentos") or die("Ninguna conexion");
	}

	public function ejecutar($sql){
		$cx = self::getConexion();
		$query = mysqli_query($cx, $sql);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function contar($sql){
		$cx = self::getConexion();
		$ResultSet = $cx->query($sql);
		$contar = mysqli_num_rows($ResultSet);
		if ($contar >= 1) {
			return true;
		}else{
			return false;
		}
	}

	public function mostrar_cantidad_contada($sql){
		$cx = self::getConexion();
		$ResultSet = $cx->query($sql);
		$contar = mysqli_num_rows($ResultSet);
		return $contar;
	}

	public function verificar_email($sql){
		$cx = self::getConexion();
		$query = mysqli_query($cx, $sql);
		$count = mysqli_num_rows($query);
		if ($count >= 1) {
			return true;
		}else{
			return false;
		}
	}

	public function consultar($sql){
		$cx = self::getConexion();
		$ResultSet = mysqli_query($cx, $sql);
		$resultado = array();
		while ($filas = mysqli_fetch_array($ResultSet)) {
			$resultado[] = $filas;
		}
		return $resultado;
	}

	public function una_consulta($sql){
		$cx = self::getConexion();
		$ResultSet = mysqli_query($cx, $sql);
		$resultado = mysqli_fetch_array($ResultSet);
		return $resultado;
	}

	public function login($username, $pass){
		$cx = self::getConexion();
		$sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$pass}'";
		$query = mysqli_query($cx, $sql);
		$count = mysqli_num_rows($query);

		if ($count >= 1) {

			$datos = mysqli_fetch_array($query);
			session_start();
			$_SESSION['id'] = $datos['id'];
			$_SESSION['username'] = $datos['username'];
			$_SESSION['status'] = $datos['status'];

			// header("Location: dentro.php");
			return true;
		}else{
			return false;
		}
	}

	public function __destruct(){
		mysqli_close($this->conn);
	}

}

?>