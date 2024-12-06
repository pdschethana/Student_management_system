<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif($_SESSION['usertype']=='student' )
{
    header("location:login.php");
}
$host="localhost";
$user="root";
$password="";
$db="schoolproject";
$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM user WHERE usertype='student'";
$result=mysqli_query($data,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
   
    <?php
    include 'admin_css.php';
    ?> 
    <style type="text/css">
    .table_th {
        padding: 20px;
        font-size: 20px;
        border: 1px solid black; /* Optional: Adds a visible border for clarity */
        text-align: left; /* Optional: Aligns text to the left */
    }

    .table_td {
        padding: 10px;
        font-size: 16px;
        border: 1px solid black; /* Adds a visible border */
    }
</style>
</head>
<body>
   <?php
   include 'admin_sidebar.php';
   ?>
   <center>
<div class="content">
    <h1>
        Student Data
    </h1>
    <br>
    
    <table>
        <tr>
            <th class="table_th">Username</th>
            <th class="table_th">Email</th>
            <th class="table_th">Phone</th>
            <th class="table_th">Password</th>
        </tr>
        <?php
        while($info=$result->fetch_assoc())
        {
        ?>
        
        <tr>
            <td class="table_td"><?php echo "{$info['username']}"; ?>
                
            </td>
            <td class="table_td"><?php echo "{$info['email']}"; ?></td>
            <td class="table_td"><?php echo "{$info['phone']}"; ?></td>
            <td class="table_td"><?php echo "{$info['password']}"; ?></td>
        </tr>
        <?php
        }
        ?>
        
    </table>
    </center>
</div>
</body>
</html>