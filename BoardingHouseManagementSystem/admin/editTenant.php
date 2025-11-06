<?php
include('../conn.php');

$id = $_POST['tenant_id'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$mi = $_POST['mi'];
$email = $_POST['email'];
$status = $_POST['status'];
$contactno = $_POST['contactno'];
$room_id = $_POST['room_id']; 

// Update query with room_id
mysqli_query($conn, "UPDATE tenant SET lastname='$lastname', firstname='$firstname', mi='$mi', email='$email', status='$status', contactno='$contactno', room_id='$room_id' WHERE tenant_id='$id'");
?>
<script>
    window.alert("Tenant information updated successfully.");
    window.location = 'tenants.php';
</script>
