<?php
include '../conn.php'; // Your database connection

$payment_id = $_POST['payment_id'];
$amount = $_POST['amount'];
$date = $_POST['payment_date'];
$remarks = $_POST['remarks'];

mysqli_query($conn, "UPDATE payments 
          SET amount='$amount', payment_date='$date', remarks='$remarks' 
          WHERE payment_id='$payment_id'");
          ?>
<script>
    window.alert("Payment updated!");
    window.location = 'bills_payment.php';
</script>
