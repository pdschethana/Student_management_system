<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
    elseif($_SESSION['usertype']=='admin')
    {
        header("location:login.php");
        exit();
    }
$host="localhost";
$user="root";
$password="";
$db="schoolproject";
$data=mysqli_connect($host,$user,$password,$db);
$name=$_SESSION['username'];
$sql="SELECT * FROM user WHERE username='$name' ";
$result=mysqli_query($data,$sql);
$info = mysqli_fetch_assoc($result);

if(isset($_POST['update_profile']))
{
    $_email=$_POST['email'];
    $_phone=$_POST['phone'];
    $_password=$_POST['password'];
  $sql2="UPDATE user SET email='$_email',phone='$_phone' ,password='$_password' WHERE username='$name' ";
  $result2=mysqli_query($data,$sql2);
  if($result2)
  {
    header("location:login.php");
exit();

  }



    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php
    include 'student_css.php'
    ?>
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top:10px;
            padding-bottom:10px;
        }
        .div_deg{
            background-color:skyblue;
            width:500px;
            padding-top:70px;
            padding-bottom:70px;
        }
    </style>
</head>
<body>
    <?php
    include 'student_sidebar.php'
    ?>
   <center>
  
    <h1> Update Profile</h1>
    <br>
    <br>
    <form action="#" method="POST">
        <div class="div_deg">
        
<div>
            <label>Email</label>
            <input type="text" name="email"
            value="<?php echo $info['email']; ?>"

</div>
<div>
            <label>Phone</label>
            <input type="text" name="phone"
            value="<?php echo $info['phone']; ?>"

</div>
<div>
            <label>Password</label>
            <input type="text" name="password"
            value="<?php echo $info['password']; ?>"

</div>
<div><center>
            
            <input type="submit" class="btn btn-primary" name="update_profile">
    </center>
</div>
</form>

    
    

</div>
    </center>
</body>
</html>