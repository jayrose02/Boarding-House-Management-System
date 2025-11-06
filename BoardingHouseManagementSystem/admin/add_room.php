<?php
include("../conn.php");

$photo = $_FILES['room_photo'];
$target = "../uploads/" . basename($photo['name']);

move_uploaded_file($photo['tmp_name'], $target);

$room_number = $_POST['room_number'];
$capacity = $_POST['capacity'];     
$status = $_POST['status'];
$price = $_POST['price'];

mysqli_query($conn, "INSERT INTO room (photo, roomnumber, capacity, status, price) 
    VALUES ('$photo[name]', '$room_number', '$capacity', '$status', '$price')");
?>
<script>
    alert("Room added successfully!");
    window.location = "rooms.php";
    
</script>
