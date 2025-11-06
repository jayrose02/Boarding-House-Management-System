<?php
// view_receipt.php
include '../conn.php';
// Get all payment IDs from the payments table
$payments = mysqli_query($conn, "SELECT payments.*, tenant.lastname, tenant.firstname, tenant.mi FROM payments JOIN billing ON payments.bill_id = billing.bill_id JOIN tenant ON billing.tenant_id = tenant.tenant_id ORDER BY payments.payment_id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Payment Receipts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: #f0f4f8;
        }
        .receipt-board {
            background: #fff;
            border-radius: 0px; /* Square corners */
            border: 3px solid #222; /* Square border for the whole receipt */
            box-shadow: 0 4px 24px rgba(0,0,0,0.12);
            max-width: 500px;
            margin: 60px auto;
            padding: 40px 32px;
            text-align: center;
        }
        .receipt-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 16px;
        }
        .receipt-details {
            font-size: 1rem;
            margin-bottom: 8px;
        }
        .print-btn {
            margin-top: 24px;
        }
        @media print {
            body, html {
                background: #fff !important;
                margin: 0;
                padding: 0;
                height: auto;
            }
            .container {
                margin: 0 !important;
                padding: 0 !important;
            }
            .receipt-board {
                box-shadow: none;
                border: 2px solid #222;
                margin: 0 auto !important;
                padding: 20px !important;
                max-width: 400px !important;
                width: 400px !important;
                page-break-after: always;
            }
            .print-btn, h2.receipt-title {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="receipt-board">
            <h2 class="receipt-title">All Payment Receipts</h2>
            <?php while ($pay = mysqli_fetch_assoc($payments)) { ?>
                <div class="receipt-container" style="border:none;box-shadow:none;padding:0;margin-bottom:32px;">
                    <div class="receipt-title">Payment Receipt</div>
                    <div class="receipt-details"><strong>Payment ID:</strong> <?php echo $pay['payment_id']; ?></div>
                    <div class="receipt-details"><strong>Tenant:</strong> <?php echo $pay['lastname'] . ', ' . $pay['firstname'] . ' ' . $pay['mi']; ?></div>
                    <div class="receipt-details"><strong>Amount:</strong> ₱<?php echo number_format($pay['amount'], 2); ?></div>
                    <div class="receipt-details"><strong>Date:</strong> <?php echo date('F d, Y', strtotime($pay['payment_date'])); ?></div>
                    <div class="receipt-details"><strong>Method:</strong> <?php echo $pay['payment_method']; ?></div>
                    <div class="receipt-details"><strong>Remarks:</strong> <?php echo $pay['remarks']; ?></div>
                    <hr>
                    <div class="receipt-details">Thank you for your payment!</div>
                    <button class="btn btn-dark print-btn" onclick="window.print()">Print Receipt</button>
                </div>
            <?php } ?>   
            <div>
                 <a href="bills_payment.php" class="btn btn-dark back-btn">Back</a>
            </div>
        </div>
    </div>
</body>
</html>
