<?php
session_start(); // Ensure the session is started before setting $_SESSION
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    // Prevent SQL injection using prepared statements
    $stmt = $data->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $name, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        if ($row["usertype"] == "student")
         {

            $_SESSION['username']=$name;
            $_SESSION['usertype']="student";
            header("Location: studenthome.php");
            exit();
        } elseif ($row["usertype"] == "admin") {
            $_SESSION['username']=$name;
            $_SESSION['usertype']="admin";
            header("Location: adminhome.php");
            exit();
        }
    } else {
        $_SESSION['loginMessage'] = "Username or password does not match.";
        header("Location: login.php");
        exit();
    }
}
?>
