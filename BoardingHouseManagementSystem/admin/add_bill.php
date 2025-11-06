<?php
include('../conn.php');

$tenant_id = $_POST['tenant_id'];
$bill_date = $_POST['bill_date'];
$due_date = $_POST['due_date'];
$amount = $_POST['amount'];
$status = $_POST['status'];

mysqli_query($conn, "INSERT INTO billing (tenant_id, bill_date, due_date, amount, status) VALUES ('$tenant_id', '$bill_date', '$due_date', '$amount', '$status')");

?>

<script>
    window.location.href = 'bills_payment.php';
    window.alert('Bill added successfully!');
</script>