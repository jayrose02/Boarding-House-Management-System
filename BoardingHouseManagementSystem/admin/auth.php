<?php
include('../conn.php');

$username= $_POST['username'];
$password= $_POST['password'];

$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result)>0){
    echo "<script> window.alert('Login Successful');
            window.location.href = 'dashboard.php'; </script>";
} else {
    echo "<script> window.alert('Login Failed. Please check your username and password.');
            window.location.href = 'login.php'; </script>";
}
?>