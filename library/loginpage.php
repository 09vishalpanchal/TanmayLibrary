<?php
$servername="localhost";
$username="root";
$password="";
$dbname="library";
$conn= new mysqli ($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
if(!empty($_POST['username']) && !empty($_POST['password'])){
    $hash=$_POST['password'];
    $sql="SELECT * FROM loginrecord WHERE username='".$_POST['username']."' and password='".$hash."'";
    $result=$conn->query($sql);

    if($result->num_rows>0){
        SESSION_START();
            $_SESSION['sid']= session_id();
            $_SESSION['login']=['login'];
            header("location:./Studentpennal.php");
    }else{
        echo "credential Error";
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <style>
        h1{
            color:red;
        }
        input{
            font-size:30px;
            border-radius:50px;
        }
        p{
            font-size:3 0px;
        }
        button{
            border-radius:30px;
            font-size:30px;
        }
    </style>
</head>
<body>
    <div class="form">
    <form method="POST">
        <h1>Login_Page</h1>
        <br><br><br><br><br><br><br><br><br>
        <p> Mobile_No:- </p> <input type="text"placeholder="Enter Mobile No" name="username">
        <br><br>
        <p> password:- </p> <input type="password" placeholder="Password" name="password">
        <br><br>
        <button>Login</button>
    </form>
    </div>
</body>
</html>