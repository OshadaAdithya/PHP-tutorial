<?php
include "db_connection.php";

echo $id= $_GET['ID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Update Record</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel ="stylesheet" href ="style.css">
</head>
<body>
    <?php
    $read_data= "SELECT * from list WHERE id ='$id' ";
    $result = $connection->query($read_data);
    $row = $result -> fetch_array(MYSQLI_ASSOC);
    ?>
    <div class="container">
        <h1>Update To Do List</h1>
            <form method="POST" action="index.php">
                <div class="col-8">
                <input type="text" name="task" class="form-control">
                </div>
                <div >
                <button type="submit" class="btn btn-primary" name="add">Update</button>
                </div>
            </form>
    </div>
</body>
</html>