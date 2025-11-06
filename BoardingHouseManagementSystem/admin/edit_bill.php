<?php
include('../conn.php');

$bill_id = $_POST['bill_id'];
$bill_date = $_POST['bill_date'];
$due_date = $_POST['due_date'];
$amount = $_POST['amount'];
$status = $_POST['status'];

$sql = "UPDATE billing SET bill_date='$bill_date', due_date='$due_date', amount='$amount', status='$status' WHERE bill_id='$bill_id'";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Bill updated successfully!'); window.location.href='bills_payment.php';</script>";
} else {
    echo "<script>alert('Failed to update bill.'); window.location.href='bills_payment.php';</script>";
}

?>