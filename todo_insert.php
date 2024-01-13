<?php
include 'todo_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Task Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: silver;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #edf5ff;
            padding: 50px;
            border-radius: 30px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.2);
        }

        .header {
            background-color: #2d6b8c;
            color: #f5f4eb;
            padding: 10px;
            text-align: center;
            margin: -50px -50px 30px -50px; /* Add negative margins to extend to the edges */
            border-radius: 10px 10px 0 0;
            
        }

        h1 {
            text-align: center;
            margin-bottom: 15px;
            font-family: serif;
        }

        input[type="text"],
        input[type="datetime-local"] {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        button {

            background-color: #32CD32;
            color: #ffffff; 
            border: 0;
            padding: 15px 25px;
            border-radius: 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
        <h1>Add Task</h1>
    </div>
        <form action="" method="post">
            <input type="text" name="task" placeholder="Task" required><br>
            <input type="text" name="desc" placeholder="Description"><br>
            <input type="datetime-local" name="time" required><br>
            <button type="submit" class="btn btn-success btn-block" name="sbt">Add Task</button><br>
        </form>
        <br>
        <a href="todo_view.php"><button class="btn btn-primary btn-block">View Tasks</button></a>
    </div>

</body>

</html>

<?php
if(isset($_POST['sbt'])){
    session_start();
    $table=$_SESSION['username'];
    
    $task= $_REQUEST['task'];
    $desc= $_REQUEST['desc'];
    $time= $_REQUEST['time'];

    $query= "insert into $table(task, description, time)values('$task', '$desc', '$time');";

    $result= mysqli_query($connection, $query);

    if(isset($result)){
        header(
            'location: todo_view.php'
        );
    }

  
}
?>