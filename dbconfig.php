<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "nadsoft";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Connection Error : ". mysqli_connect_error());
}
?>