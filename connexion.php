<?php 
		function connexion(){
		$host = "localhost";
		$user = "christian";
		$pass = "Christian$1" ;
		$db = "boutique";
		$conn = mysqli_connect($host, $user, $pass, $db);
		if(!$conn) {
			return NULL;
		}else{
			return $conn;
		}
}
 ?>