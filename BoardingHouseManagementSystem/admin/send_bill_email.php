<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
include '../conn.php';

if (!isset($_GET['bill_id'])) {
    exit("Bill ID missing.");
}
$bill_id = $_GET['bill_id'];

// Get bill and tenant info
$sql = "SELECT billing.*, tenant.firstname, tenant.lastname, tenant.email 
        FROM billing 
        JOIN tenant ON billing.tenant_id = tenant.tenant_id 
        WHERE billing.bill_id = '$bill_id'";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result) == 0) {
    exit("Bill not found.");
}
$row = mysqli_fetch_assoc($result);

$email   = $row['email'];
$name    = $row['firstname'].' '.$row['lastname'];
$amount  = $row['amount'];
$dueDate = date('F d, Y', strtotime($row['due_date']));

// Email content
$subject = "Your Boarding House Bill (Bill ID: $bill_id)";
$body    = "Hello $name,<br><br>
            You have a bill for this month.<br>
            Bill Reference: <strong>$bill_id</strong><br>
            Amount Due: <strong>₱$amount</strong><br>
            Due Date: <strong>$dueDate</strong><br><br>
            Please pay on or before the due date to avoid penalties.<br><br>
            Thank you!";

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'von.vergara.399@gmail.com';    // Your Gmail
    $mail->Password   = 'odcyapjopchwcfvy';             // Your App Password (no spaces)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port       = 587;

    $mail->setFrom('von.vergara.399@gmail.com', 'bhv2');
    $mail->addAddress($email, $name);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    echo "<script>alert('Bill email sent to $name!'); window.location='bills_payment.php';</script>";
} catch (Exception $e) {
    echo "<script>alert('Email could not be sent. Error: {$mail->ErrorInfo}'); window.location='bills_payment.php';</script>";
}
?>
