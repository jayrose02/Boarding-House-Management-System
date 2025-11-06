<?php
include('../conn.php');

$room_id = $_POST['room_id'];

mysqli_query($conn, "DELETE FROM room WHERE room_id = '$room_id'");
?>
<script>
    window.alert("Room deleted successfully.");
    window.location = 'rooms.php';
</script>