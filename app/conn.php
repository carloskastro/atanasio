<?php
$servername="localhost";
$username="root";
$password="";
$dbname="sena";

try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	echo "Conexión OK";
}catch(PDOException $e){
	echo "Conexión Falló".$e->getMessage();
}
?>