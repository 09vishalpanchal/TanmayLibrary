<?php
$servername="localhost";
$username="root";
$password="";
$dbname="library";
$conn= new mysqli ($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
$firstnameErr=$lastnameErr=$genderErr=$aadharcardErr=$emailErr=$mob_noErr=$qulificationErr=$dateErr=$exdateErr="";
$firstname=$lastname=$gender=$aadharcard=$email=$mob_no=$qulification=$date=$exdate=$photo="";
if($_SERVER['REQUEST_METHOD']=="POST"){
    //first name
    if(empty($_POST['firstname'])){
        $firstnameErr="firstname is required";
    }
    else{
        $firstname=$_POST['firstname'];
    }
    if(!preg_match("/^[a-z A-Z]*$/",$firstname)){
        $firstnameErr="only alphabets are allowed";  
    }
    
    //gender
    if(empty($_POST['gender'])){
        $genderErr="gender is required";
    }
    else{
        $gender=$_POST['gender'];
    } 

    // email 
    if(empty($_POST['email'])){
        $emailErr="email is required";
    }
    else{
        $gmail=$_POST['email'];
    }
    if(!preg_match("/^[a-zA-Z]*$/",$email)){
        $emailErr=-"only alphabets are allowed";
    }
    // Aadharcard
    if(empty($_POST['aadharcard'])){
        $aadharcardErr="mobile no. is required";

    }
    else{
        $aadharcard=$_POST['aadharcard'];
        if(strlen($aadharcard)!==12){
            $aadharcardErr="Aadhar no. must contain 12 digits only";

        }
        if(!preg_match("/^[0-9]*$/",$aadharcard)){
            $aadharcardErr="only number are allowed";
        }
    }
    // mob_no
    if(empty($_POST['mob_no'])){
        $mob_noErr="mobile no. is required";

    }
    else{
        $mob_no=$_POST['mob_no'];
        if(strlen($mob_no)!==10){
            $mob_noErr="mobile no. must contain 10 digits only";

        }
        if(!preg_match("/^[0-9]*$/",$mob_no)){
            $mob_noErr="only number are allowed";
        }
    } 
}
if(empty($firstnameErr)&& empty($lastnameErr)&&empty($emailErr)&&empty($aadharcardErr) && empty($passwordErr)&&empty($genderErr)&& empty($qulificationErr) &&empty($mob_noErr)&&empty($dateErr)&&empty($exdErr)){
 
    if(!empty($_POST['firstname'])){
        $path="pics/";
        $photo=$_FILES['image_profile']['name'];
        $image_extension=pathinfo($photo,PATHINFO_EXTENSION);
        $filename=time().'.' .$image_extension;

        if(move_uploaded_file($_FILES["image_profile"]["tmp_name"], $path.'/'.$filename)){
        // $uploadok=1;
            $sql="INSERT INTO regiter(firstname,lastname,email,aadharcard,gender,qulification,mob_no,date,exdate,image)
            VALUES('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['aadharcard']."','".$_POST['gender']."',
            '".implode(',',$_POST['qulification'])."','".$_POST['mob_no']."','".$_POST['date']."','".$_POST['exdate']."','".$filename."')";
            // print_r($sql);die;
            if($conn->query($sql)==true){
                echo"Registration Successfull";
            }
            else{
                echo"error".$sql. $conn->connect_error;
            }
        }
    }
}
?>
    
<!-- implode:- string convert to array from -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert page</title>
    <link rel="stylesheet" href="form.css">
    <style>
        .error{
            color: red;
        }
        .fn{
            margin-left:20rem;
        }
        .ln{
            margin-left:50rem;
            margin-top:-1.9rem;
        }
        .en{
            margin-left: 22rem;
            margin-top: 2rem;
        }
        .an{
            margin-left: 48rem;
            margin-top:-1.5rem;
        }
        .gn{
            margin-left: 22rem;
            margin-top: 1.5rem;
        }
        .gender{
            width: 1.5rem;
        }
        .tn{
            margin-left: 48rem;
        }
        .fun1{
            width: 1.3rem;
            margin-left: 0.2rem;
        }
        .fun{
            width: 1.3rem;
            
        }
        .time{
            margin-left:-32rem ;
            margin-top: -1.8rem;
        }
        .fun{
            margin-left: 3.4rem;
        }
        .mn{
            margin-left:20rem;
        }
        .date{
            margin-left: 50rem;
            margin-top: -1.2rem;
        }
        .ed{
            margin-left: 19rem;
            margin-top: 2rem;
        }
        .in{
            margin-left: 50rem;
            margin-top: -1.5rem;
        }
        .ps{
            font-size:2rem;
        }
    </style>
</head>
<body>
    <div class="form">
    <p class="ps">Student Registration</p>
    <br><br>
    <form method="POST" enctype="multipart/form-data" action="<?php echo($_SERVER['PHP_SELF']);?>" >
     <div class="fn"> 
        <label for="">First-Name</label>
    <input type="text" name="firstname" placeholder="Enter your firstname" value="<?=isset($_POST['firstname'])?$_POST['firstname']:"";?>" >
        <span class="error">*<?php echo $firstnameErr;?></span>
        </div>
        <div class="ln"> 
        <label for="">Last-Name</label>
        <input type="text" name="lastname" placeholder="Enter your lastname" value="<?=isset($_POST['lastname'])?$_POST['lastname']:"";?>">
        <span class="error">*<?php echo $lastnameErr;?></span>
    </div>
    <div class="en"> 
    <label for="">Email</label>
        <input type="email" name="email" placeholder="Enter your email" value="<?=isset($_POST['email'])?$_POST['email']:"";?>">
        <span class="error">*<?php echo $emailErr;?></span>
    </div>
    <div class="an"> 
        <label for="">Aadharcard No.</label>
        <input type="text" name="aadharcard" placeholder="Enter Aadhar Number" value="<?=isset($_POST['aadharcard'])?$_POST['aadharcard']:"";?>">
        <span class="error">*<?php echo $aadharcardErr;?></span>
    </div>
    <div class="gn"> 
        <label for="">Gender</label>
        <input class="gender" type="radio" name="gender" value='female' <?=isset($_POST['gender'])&& ($_POST['gender']=="female")?"checked":"";?> >female
                 <input class="gender" type="radio" name="gender" value='male' <?=isset($_POST['gender'])&& ($_POST['gender']=="male")?"checked":"";?>>male 
                 <span class="error">*<?php echo $genderErr;?></span>
    </div>
    <div class="tn"> 
        <label for="">Timing</label>                      
        <input class="fun1" type="checkbox" name="qulification[]" value='Halftime' <?=isset($_POST['qulification'])&&in_array('Halftime',$_POST['qulification'])?"checked":""?>><p class="time">Half-time</p>
        <input class="fun" type="checkbox" name="qulification[]" value='Fulltime'<?=isset($_POST['qulification'])&& in_array('Fulltime',$_POST['qulification'])?"checked":""?>><p class="time"> Full-time </p>
        <span class="error">*<?php echo $qulificationErr;?></span>
    </div>     
    <div class="mn">  
    <label for="">Mobile-No</label>
    <input type="text" placeholder="Enter Your Mobile Number "  name="mob_no" value="<?=isset($_POST['mob_no'])?$_POST['mob_no']:"";?>">
        <span class="error">*<?php echo $mob_noErr;?></span>
    </div>
    <div class="date">
        <label for="">Joining-Date</label>
        <input type="date" name="date" value="<?=isset($_POST['date'])?$_POST['date']:"";?>">
    </div>
    <div class="ed">
        <label for="">Expring-Date</label>
        <input type="date" name="exdate" value="<?=isset($_POST['exdate'])?$_POST['exdate']:"";?>">
    </div>
    <div class="in">
        <label for="">Image-Uplode</label>
        <input type="file" name="image_profile" accept=".jpg ,.jpeg, .png" value="<?php
        if (isset($filename)){echo $filename;}?>" >
    </div>
        <br><br>
        <button>Submit</button>
    </form>
    </div>
</body>
</html>