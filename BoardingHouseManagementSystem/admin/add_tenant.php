<?php
include('../conn.php');



$fn = $_POST['firstname'];
$ln = $_POST['lastname'];
$mi = $_POST['mi'];
$email = $_POST['email'];
$contact = $_POST['contactno'];
$room = $_POST['room_id'];
$status = $_POST['status'];

// Add tenant
mysqli_query($conn, "INSERT INTO tenant (firstname, lastname, mi, email, contactno, room_id, status) VALUES ('$fn', '$ln', '$mi', '$email', '$contact', '$room', '$status')") or die(mysqli_error($conn));

// Decrease room capacity by 1
mysqli_query($conn, "UPDATE room SET capacity = capacity - 1 WHERE room_id = '$room'");

?>
<script>
    window.alert('Tenant Added Successfully');
    window.location.href = 'tenants.php';
</script>