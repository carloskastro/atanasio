<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pubpdf"; //nombre de su base de datos
$charset = "utf8";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database;charset=$charset", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>