<?php
session_start();
error_reporting(0);
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
$sql="SELECT * FROM course";
$result=mysqli_query($data,$sql);
if($_GET['course_id'])
{
    $t_id=$_GET['course_id'];
    $sql2="DELETE FROM course WHERE id='$t_id' ";
    $result2 = mysqli_query($data, $sql2);

    if($result2)
    {
        header('location:admin_view_course.php');
    }
}

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
        table {
    border-collapse: collapse;
    width: 80%;
    margin-top: 20px;
}

th, td {
    border: 1px solid black; /* Add visible borders */
    text-align: left;
}

.table_th {
    padding: 20px;
    font-size: 20px;
    background-color: #f0f0f0; /* Header background */
    color: black;
}

.table_td {
    padding: 20px;
    background-color: #add8e6; /* Sky blue for data rows */
    color: black;
}

        </style>
</head>
<body>
   <?php
   include 'admin_sidebar.php';
   ?>
<div class="content">
    <center>
    <h1>
        View All Course Data 
    </h1>
    <table border="1px">
        <tr>
            <th class="table_th">Course Name</th>
            <th class="table_th" >About Course</th>
            <th class="table_th">Image</th>
            <th class="table_th">Delete</th>
</tr>
<?php
while($info=$result->fetch_assoc())
{
?>
<tr>
    <td class="table_td"><?php echo "{$info['name']}" ?></td>
    <td class="table_td"><?php echo "{$info['description']}" ?></td>
    <td class="table_td"><img height="100px" width="100px" src="<?php echo "{$info['image']}" ?>"></td>
    <td class="table_td"> 
    <?php
    echo "
    <a onClick=\"javascript:return confirm('Are you sure to delete this');\" class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}'>Delete</a>";
    ?>
</td>

</tr>
<?php
}
?>
</table>
    </center>
</div>
</body>
</html>