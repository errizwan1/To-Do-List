<?php
include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #c5fff8;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            background-color: #edf5ff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.2);
        }

        .header {
            background-color: #5fbdff;
            color: #332c16;
            padding: 10px;
           
            text-align: center;
            margin: -30px -30px 30px -30px; 
            border-radius: 10px 10px 0 0;
        }

        .header1 {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        .header1 h1 {
            margin: 0;
            text-align: left;
            
            font-family: san-serif;
      
        }

        .header1 .login-button,
        .header1 .register-button {
    border: none;
    float: right;
    margin-left: 20px;
    margin-top: -40px;
    background-color: #333;
    border-color: none; 
    color: #fff; 
    transition: background-color 0.3s ease;
}

.header1 .login-button:hover,
.header1 .register-button:hover {
    background-color: #218838; 
}

        h1 {
            text-align: center;
            padding-top: 10px;
            font-family: fantasy;
        }

        .form-group {
            margin-bottom: 20px;
            
        }
    </style>
</head>

<body>

<div class="header1">
        <h1>Daily Task Manager</h1>
        <a href="registration.php" class="btn btn-primary login-button"><button>Register</button></a>
        <a href="homepage.php" class="btn btn-secondary register-button"><button>Home</button></a>
        <a href="about.php" class="btn btn-secondary register-button"><button>About</button></a>

    </div>

    <div class="container">
        <div class="header">
        <h1><u>Log-In Here</u></h1>
    </div>
        <form action="" method="POST">
            <div class="form-group">
            <label for="username">Username :</label>
                <input type="text" class="form-control" id="username" name="user" placeholder="Enter Username/Phone" >
            </div>
            <div class="form-group">
            <label for="password">Password :</label>
                <input type="password" class="form-control" id="password" name="pass" placeholder="Enter Password" >
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="sbt">Log In</button>
        </form>
        <p class="text-center mt-3">New on our Website? <a href="registration.php">Register</a></p>
    </div>

    
</body>

</html>

<?php
if(isset($_POST['sbt'])){
    $user=$_REQUEST['user'];
    $pass=$_REQUEST['pass'];

    if ($user === "" || $pass === "") {
        echo "<center>Username and password must be filled out</center>";
    } 
    
    
    else {
        
        $query= "select username, name, phone, password, email from admin where (username='$user' OR phone='$user' OR email='$user') AND password='$pass';";
        $result= mysqli_query($connect, $query);
        $fetch= mysqli_fetch_assoc($result);
        

        if(mysqli_num_rows($result)>0){

        if(($fetch['username']==$user OR $fetch['phone']==$user OR $fetch['email']==$user) AND $fetch['password']==$pass){
            $name= $fetch['name'];
            $userr=$fetch['username'];
            session_start();
            $_SESSION['username']= $userr;
            $_SESSION['name']= $name;
                
                header('location: todo_view.php');
            } 

        }

        else{
            // echo "<script>alert('Incorrect username or password');</script>";

            echo "<center>incorrect username or password</center>";
            

            // header(
            //     'location: login.php?msg=incorrect'
            // );
        }
    }
}
?>
