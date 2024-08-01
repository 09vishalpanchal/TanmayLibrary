<?php
SESSION_START();
if(isset($_SESSION['login'])){
    session_destroy();
    header("location:./loginpage.php");
}
?> 