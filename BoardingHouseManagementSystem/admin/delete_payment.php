<?php
include("../conn.php");

$payment_id = $_POST['payment_id'];

mysqli_query($conn, "DELETE FROM payments WHERE payment_id='$payment_id'");

?>
<script>
    window.alert("Payment deleted successfully!");
    window.location = 'bills_payment.php';
</script>