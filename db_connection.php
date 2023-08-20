<?php
//connect to the db
$servername= "localhost";
$username= "root";
$password= "";
$database= "tasks";

//$conn= mysqli_connect($servername, $username, $password, $database);

$connection= new mysqli($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . $connection -> connect_error);
  }
  
?>