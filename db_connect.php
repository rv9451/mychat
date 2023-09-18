<?php
$servername = "localhost";
$username = "root";
$password = "";
$datbase = "mychat";

//creating datda connectin
$conn = mysqli_connect($servername, $username, $password, $datbase);

//check connection

if (!$conn) {
	die("Faild to connect".mysqli_connect_error());
}

?>