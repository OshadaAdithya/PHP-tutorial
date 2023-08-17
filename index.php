<?php

//connect to the db
$servername= "localhost";
$username= "root";
$password= "";
$database= "tasks";

$conn= mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

/*$sql= "SELECT * from tasks";
$result = $conn->query($sql);

 $db= mysqli_connect()*/

 if (isset($_POST['submit'])) {
    $desc = $_POST['task'];
    $status= "In progress";

    $addQuery = "INSERT INTO list (task, status) VALUES ('$desc', '$status')";
    if (mysqli_query($conn, $addQuery)) {
        //echo "New task added successfully.";
        header('Location: index.php? added_task= true');
        exit;
    } else {
        echo "Error occured in adding data: " . mysqli_error($conn);
    }
}

  $task_read = mysqli_query($conn, "SELECT * FROM list");

  if (isset($_POST['delete_all'])) {
    $deleteQuery = "DELETE FROM list";
    if (mysqli_query($conn, $deleteQuery)) {
        header('Location: index.php?deleted_task=true');
        exit;
    } else {
        echo "Error deleting tasks: " . mysqli_error($conn);
    }
}

if(isset($_GET['added_task'])){
    echo "Task added successfully";
}
elseif (isset($_GET['deleted_task'])) {
    echo "All tasks deleted successfully";
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>dolist document</title>
</head>
<body>
    <h1>This is my To Do list</h1>

    <form method="POST" action="index.php">
        <input type="text" name="task" class="input_task">
        <button type="submit" class="add-btn" name = "submit">Add New Task</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Task description</th>
                <th>Status</th>
            </tr>
            
        </thead>
        
            <tbody>
            <?php
            $i=1;
            while ($row = mysqli_fetch_assoc($task_read)) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row['task'] . "</td>";
                echo "<td>" . $row['status'] . "</td>"; 
                echo "</tr>";
                $i++;
            }
            ?>
            
            
        </tbody>
        

    </table>
    <br>
    <br>
    <form method="POST" action="index.php">
        <button type="submit" class="delete-btn" name="delete_all">Delete All Tasks</button>
    </form>
    

</body>
