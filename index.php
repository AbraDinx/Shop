<?php
$conn = new mysqli('localhost', 'root', '', 'test');

/*
if ($conn->connect_error) {
    die("Conexión fallida: $conn->connect_error");
}*/
 if ($conn){
 	echo "Conectado";
 }
 else{
 	echo "No conectado";
 }
$conn->close();
?>
