<?php
echo $desc= $_POST['task'];

include "db_connection.php";

$sql= "INSERT INTO list (task, status) VALUES ('$desc', 'test')";


if ($connection->query($sql)) {
    echo "New record created successfully";
}


  header('location: index.php');
?>