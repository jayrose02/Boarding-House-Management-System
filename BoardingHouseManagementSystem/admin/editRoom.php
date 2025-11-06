<?php
include('../conn.php');

$room_id      = $_POST['room_id'];
$room_number  = $_POST['room_number'];
$capacity     = $_POST['capacity'];
$status       = $_POST['status'];
$price        = $_POST['price'];

// Check if a new photo was uploaded
if (!empty($_FILES['photo']['name'])) {
    $photo = $_FILES['photo']['name'];
    $tmp   = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp, "../uploads/" . $photo);

    $sql = "UPDATE room 
            SET photo='$photo', roomnumber='$room_number', capacity='$capacity', status='$status', price='$price' 
            WHERE room_id='$room_id'";
} else {
    $sql = "UPDATE room 
            SET roomnumber='$room_number', capacity='$capacity', status='$status', price='$price' 
            WHERE room_id='$room_id'";
}

mysqli_query($conn, $sql);

echo "<script>
        alert('Room updated successfully!');
       window.location.href = 'rooms.php';
      </script>";
?>
