<?php
error_reporting(0);
session_start();
session_destroy();
if($_SESSION['message'])
{
    $message=$_SESSION['message'];
    echo "<script type='text/javascript'> 
    alert('$message');
    </script>";
}
$host="localhost";
$user="root";
$password="";
$db="schoolproject";
$data=mysqli_connect($host,$user,$password,$db);
$sql="SELECT * FROM teacher";
$result=mysqli_query($data,$sql);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav>
        <label class="logo">W-School</label>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="admission.php">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    <div class="section1">
        <label class="img_text">We teach students with care</label>
        <img class="main_img" src="classroom.jpeg" alt="Classroom">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="ground.jpeg" alt="School Ground">
            </div>
            <div class="col-md-8">
                <h1>Welcome to W-School</h1>
                <p>A school is an educational institution designed to provide learning environments and resources 
                   to educate students under the guidance of teachers. It fosters intellectual, social, and 
                   emotional growth, equipping learners with knowledge, skills, and values for personal and 
                   professional development. Schools often serve as community hubs, offering extracurricular 
                   activities, cultural events, and opportunities for social interaction, preparing students 
                   to become responsible and informed citizens.</p>
            </div>
        </div>
    </div>
    <center>
        <h1>Our Teachers</h1>
    </center>
    <div class="container">
        <div class="row">
            <?php
               while($info=$result->fetch_assoc())
              {
            ?>
            <div class="col-md-4 teacher-column">
                <img class="teacher" src="<?php echo "{$info['image']}" ?>">
                <h3><?php echo "{$info['name']}" ?></h3>
                <h5><?php echo "{$info['description']}" ?></h5>
                
            </div>
            <?php
              }
            ?>
            
        </div>
    </div>
    <center>
        <h1>Our courses</h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-4 teacher-column">
                <img class="teacher" src="graphic.jpeg" alt="Teacher 1">
                <p>Graphic Designinge</p>
            </div>
            <div class="col-md-4 teacher-column">
                <img class="teacher" src="digitalmarketting.jpeg" alt="Teacher 2">
                <p>Marketing</p>
            </div>
            <div class="col-md-4 teacher-column">
                <img class="teacher" src="imgphp.jpeg" alt="Teacher 3">
                <p>Web Development</p>
            </div>
        </div>
    </div>
    <center>
        <h1 class="adm">Admission Form</h1>
    </center>
    <!-- Contact Form -->
<div class="container contact-form">
    <h2>Contact Us</h2>
    <form action="data_check.php" method="post">  
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" value="apply" name="apply">Submit</button>
    </form>
</div>
<footer>
    <h3 class="footer_text">All @copyright reserved by web tech knowledge</h3>

</footer>

</body>
</html>
