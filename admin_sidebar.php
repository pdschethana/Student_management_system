
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
   <header class="header1">
   <a href="">Admin Dashboard</a>
   <div class="logout">
    <a href="logout.php" class="btn btn-primary">Logout</a>
   </div>
</header>
<aside>
    <ul>
        <li>
            <a href="admission.php"> Admission</a>
        </li>
        <li>
            <a href="add_student.php"> Add Student</a>
        </li>
        <li>
            <a href="view_student.php"> View Student</a>
        </li>
        <li>
            <a href="admin_add_teacher.php"> Add Teacher</a>
        </li>
        <li>
            <a href="admin_view_teacher.php"> View teacher</a>
        </li>
        <li>
            <a href="admin_add_course.php"> Add courses</a>
        </li>
        <li>
            <a href="admin_view_course.php">View Courses </a>
        </li>

    </ul>
</aside>
</body>
</html>