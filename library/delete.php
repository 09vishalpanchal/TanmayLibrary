<?php
$servername="localhost";
$username="root";
$password="";
$dbname="library";
$conn= new mysqli ($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
$sql="DELETE FROM regiter where id=".$_GET['id'];
if($conn->query($sql)==TRUE){
    header("location:./Studentpennal.php");

}else{
    echo"error".$sql.$conn->connect_error;
}
?>