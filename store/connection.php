<?php
$host ="localhost";
$user ="root";
$password ="";
$database ="gertes_website";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn){
	die("Connection Failed: ". mysql_connect_error());
}
?>