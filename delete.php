<?php

include "db_connection.php";

echo $id= $_GET['ID'];

$delete_query = "DELETE FROM list WHERE id='$id'";

if ($connection->query($delete_query)) {
    echo "New task added successfully.";
    header('Location: index.php');
    exit;
}
else{
    echo("Error description: " . $connection -> error);
}
?>

