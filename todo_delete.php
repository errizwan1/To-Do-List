
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>

<?php
include "todo_connection.php";
$id= $_REQUEST['id'];

session_start();

$table=$_SESSION['username'];

$query= "delete from $table where id= '$id';";
$res= mysqli_query($connection, $query);

if($res){
    Header(
        'location: todo_view.php'
    );
}
?>
</html>