
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Todolist document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel ="stylesheet" href ="style.css">
</head>
<body>
    <br>
    <!--------Add new Description of Task------------->
    <div class="container">
        <div class="row">
            <h1>This is my To Do list</h1>

            <form method="POST" action="create.php">
                <div class="col-8">
                <input type="text" name="task" class="form-control">
                </div>
                <div >
                <button type="submit" class="btn btn-primary" name="add">Add</button>
                </div>
            </form>
                
        </div>


    </div>
   

   
    <!----------read data------------>
    <?php
    include "db_connection.php";

    $sql= "SELECT * from list";
    $result = $connection->query($sql);

    ?>

    <div class="container">

        <table>
            <?php

            while($row= mysqli_fetch_array($result)){
            ?>
                <tr>                
                    <td style = "width: 50%"> <?php echo $row['task']; ?> </td>
                    <td style= "width: 8%;"><a class="btn btn-primary btn-sm" href="update.php?ID=<?php echo $row['id']; ?>" role="button">Edit</a></td>
                    <td style= "width: 8%;"><a class="btn btn-warning btn-sm" href="delete.php?ID=<?php echo $row['id']; ?> " role="button">Delete</a></td>
                </tr>
            <?php
            }
            ?>       

        </table>
    </div>
    <br>
    <br>
    

</body>
