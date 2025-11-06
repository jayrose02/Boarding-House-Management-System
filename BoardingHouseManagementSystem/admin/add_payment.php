<?php
// add_payment.php
include '../conn.php';

$bill_id = $_POST['bill_id'];
$payment_date = $_POST['payment_date'];
$amount = $_POST['amount'];
$method = $_POST['method'];
$remarks = $_POST['remarks'];


$tenantResult = mysqli_query($conn, "SELECT tenant_id FROM billing WHERE bill_id = '$bill_id'");
$tenantData = mysqli_fetch_assoc($tenantResult);
$tenant_id = $tenantData['tenant_id'];


$query = "INSERT INTO payments (bill_id, tenant_id, payment_date, amount, payment_method, remarks) 
          VALUES ('$bill_id', '$tenant_id', '$payment_date', '$amount', '$method', '$remarks')";

if (mysqli_query($conn, $query)) {
    // Mark bill as paid
    mysqli_query($conn, "UPDATE billing SET status='Paid' WHERE bill_id='$bill_id'");
    echo "<script>alert('Payment added successfully!'); window.location='bills_payment.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
