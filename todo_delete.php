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