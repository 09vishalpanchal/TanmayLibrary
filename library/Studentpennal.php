<?php
SESSION_START();
if(!(isset($_SESSION['login'])&&($_SESSION['login']!=""))){
  header("location:./loginpage.php");
} 

$servername="localhost"; 
$username="root"; 
$password=""; 
$dbname="library"; 
$conn= new mysqli($servername,$username,$password,$dbname); 
if($conn->connect_error){ 
    die("connection failed:".$conn->connect_error); 
} 
 
$firstname=""; 
if(!empty($_REQUEST['firstname']) ){ 
    $firstname= $_REQUEST['firstname'];//0 
} 
 
if(empty($_POST) && isset($_GET['page'])){ 
  $page = $_GET['page'] ;//3 
   
} else { 
 
  $page= 1; 
} 
 
$result_per_page= 5; 
$result_first_page = ($page-1) * 5;//empty 
 
 
// $sql= "Select * from record"; 
// $result= $conn->query($sql); 
// $rows[]=""; 
// $rows= $result->FETCH_ALL(MYSQLI_ASSOC); 
 
$sql="select * from regiter" ;//to get record from db 
 
$result= $conn->query($sql); 
$result_rows= $result-> num_rows;//20 no. of rows 
$num_of_page=ceil($result_rows/$result_per_page);//to calculate pages 
 
$rows[]=""; 
 
$where= 'where 1=1';//to get true 
if($firstname!=""){//99 
    $where.= " and firstname like'%".$firstname."%'";//to match 
} 
 
$sql=" SELECT * FROM regiter " .$where. " LIMIT " .$result_first_page. ',' .$result_per_page;//pagination  
 
$result=$conn->query($sql); 
   
if($result->num_rows>0){ 
    $rows= $result->FETCH_ALL(MYSQLI_ASSOC); 
} 
 
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Dashboard</title>
  <link rel="stylesheet" href="record.css"> 
  <style> 
    
  </style> 
</head> 
<body> 
<form method="POST"> 
        Name:-<input type="text" name="firstname" > 
        <input type="submit" value="search"> 
</form> 
  <table width="100%" border=1px> 
        <tr> 
          <th>Firstname</th> 
          <th>Lastname</th> 
          <th>Gender</th> 
          <th>Email</th>
          <th>Aadharcard</th>
          <th>Timing</th> 
          <th>Mob_no.</th>
          <th>Joining-Date</th>
          <th>Expring-Date</th> 
          <th>Image</th> 
          <th>Delete</th>  
        </tr> 
        <?php if(!empty($rows)){ ?> 
          <?php foreach($rows as $key=>$val ) {?> 
 
        <tr> 
            <td><?=$val['firstname']?></td> 
            <td><?=$val['lastname']?></td> 
            <td><?=$val['gender']?></td> 
            <td><?=$val['email']?></td>
            <td><?=$val['aadharcard']?></td>
            <td><?=$val['qulification']?></td> 
            <td><?=$val['mob_no']?></td>
            <td><?=$val['date']?></td>
            <td><?=$val['exdate']?></td> 
            <?php  if(!empty($val['image'])){ ?> 
              <td><img src="pics/<?php echo $val['image'] ?>" width="30px" height="30px"></td> 
              <?php } ?> 
 

            <td><a href="delete.php?id=<?=$val['id']?>"><button type=delete onclick= "return confirm('Are u sure you want to delete')">Delete</button></a></td>  
 
        </tr> 
      <?php } 
        } else {?> 
        <td><span class="6">no record found...</span></td> 
        <?php }?> 
           
  </table> 
 
  <?php 
        for($page='1';$page<=$num_of_page;$page++){ 
          $link="Studentpennal.php?page=".$page. 'and firstname.='.$firstname; 
            echo' <a href="'.$link.'">'.$page.'</a>'; 
            // echo '<a href="new.php?page='.$page.'">'.$page.'</a>'; 
            
            
        } 
        ?>  
   <a href="loginpage.php">Logout</a>
</body> 
</html>