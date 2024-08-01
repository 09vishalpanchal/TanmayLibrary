<?php
$servername="localhost";
$username="root";
$password="";
$dbname="library";
$conn= new mysqli ($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
$usernameErr=$passwordErr="";
$username=$password="";
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(empty($_POST['username'])){
        $usernameErr="user name required";
    }
    else{
        $username=$_POST['username'];
    }
    // if(!preg_match("/^[a-z A-Z]*$/",$username)){
    //     $usernameErr="only number are allows";
    // }
    // password err
    if(empty($_POST['password'])){
        $passwordErr="password is required";
     } 
    else{
        $password= $_POST['password'];
        $pattern='/^(?=.\d)(?=.[@#\-$%^&+=§!\?])(?=.[a-z])(?=.[A-Z])[0-9A-Za-z@#\-$%^&+=§!\?]{8,20}$/';
     }
    if(!preg_match($pattern,$password)){
        $passwordErr="";
     } 
}
if(empty($usernameErr)&& empty($passwordErr)){
    if(!empty($_POST['username'])){
        $hash=($_POST['password']);
        $sql="INSERT INTO  loginrecord(username,password)
        VALUES('".$_POST['username']."','".$hash."')";
          if($conn->query($sql)==true){
                echo"submitted successfully";
            }
            else{
                echo"error".$sql. $conn->connect_error;
            }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="login.css">
    <style>
    </style>
</head>
<body>
    <div class="login">
        <form method="POST" enctype="multipart/form-data" action="<?php echo($_SERVER['PHP_SELF']);?>">
       User-Name:- <input type="text"  name="username" placeholder="User Name" value="<?=isset($_POST['username'])?$_POST['username']:"";?>" >
        <span class="error">*<?php echo $usernameErr;?></span>
    <br><br>
       Password:-<input type="password" name="password" placeholder="Password"  value="<?=isset($_POST['password'])?$_POST['password']:"";?>">
       <span class="error">*<?php echo $passwordErr;?></span>
       <br><br>
       <button type="submit">Login</button>
       </form>
    </div>
</body>
</html>