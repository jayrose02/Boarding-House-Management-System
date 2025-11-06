<?php
include('../conn.php');

$bill_id = $_GET['bill_id'];

mysqli_query($conn, "DELETE FROM billing WHERE bill_id='$bill_id'");
?>

<script>

    window.alert('Bill deleted successfully!');
 window.location = 'bills_payment.php';
</script>