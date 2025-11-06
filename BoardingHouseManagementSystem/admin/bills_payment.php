<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Admin Dashboard - Boarding House Management System" />
  <title>Admin Dashboard - Boarding House Management System</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">


  <style>
    body {
      font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', sans-serif;
      background: #f0f4f8;
    }

    .sidebar {
      height: 100vh;
      width: 130px;
      /* Thinner sidebar */
      background-color: #f8f9fa;
      /* Light background */
      padding: 15px;
      /* Reduced padding */
      border-right: 5px solid rgba(0, 0, 0, 0.5);
      /* Black border */
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
      /* Black shadow effect */
    }

    .sidebar a {
      color: #343a40;
      /* Dark text color */
      text-decoration: none;
      padding: 8px 10px;
      /* Smaller padding */
      display: block;
      border-radius: 5px;
      font-size: 0.75rem;
      /* Even smaller font size for better visibility */
      transition: background-color 0.3s;
    }

    .sidebar a:hover {
      background-color: rgba(0, 123, 255, 0.1);
      /* Light blue hover effect */
    }

    .content {
      padding: 20px;
      flex-grow: 1;
      /* Allow content to grow */
    }

    .header {
      background-color: #ffffff;
      padding: 10px;
      /* Reduced padding */
      border-bottom: 1px solid #dee2e6;
    }

    .header h1 {
      margin: 0;
      font-size: 1.25rem;
      /* Smaller header font size */
      color: #343a40;
    }

    .d-flex .sidebar a {
      color: black;
    }

    .table-xs td,
    .table-xs th {
      padding: 0.2rem;
      /* tighter spacing */
      font-size: 0.8rem;
      /* smaller text */
    }

    .btn-xs {
      padding: 0.2rem;
      /* tighter spacing */
      font-size: 0.8rem;
      width: 50px;
      /* smaller text */
    }
  </style>
  </style>
</head>

<body>

  <div class="d-flex">
    <!-- Sidebar -->
    <nav class="sidebar">
      <h3 class="text-dark" style="font-size: 1.1rem;"><a href="dashboard.php" style="text-decoration: none; color: inherit;"> <strong>
            <h6> <i class="bi bi-speedometer2">
              Admin Dashboard</i> </h6>
          </strong></a></h3>
      <a href="dashboard.php" class="d-flex align-items-center gap-2 fw-bold text-primary">
        <i class="bi bi-speedometer2"></i> Dashboard
      </a>
      <a href="revenue.php" class="d-flex align-items-center gap-2 fw-bold text-success">
        <i class="bi bi-cash-stack"></i> Revenue
      </a>
      <a href="tenants.php" class="d-flex align-items-center gap-2 fw-bold text-info">
        <i class="bi bi-people"></i> Tenants
      </a>
      <a href="tenantlist.php" class="d-flex align-items-center gap-2 fw-bold text-secondary">
        <i class="bi bi-list-ul"></i> List Of Tenants
      </a>
      <a href="rooms.php" class="d-flex align-items-center gap-2 fw-bold text-warning">
        <i class="bi bi-door-closed"></i> Rooms
      </a>
      <a href="rentalsched.php" class="d-flex align-items-center gap-2 fw-bold text-primary">
        <i class="bi bi-calendar-week"></i> Rental Schedules
      </a>
      <a href="bills_payment.php" class="d-flex align-items-center gap-2 fw-bold text-danger">
        <i class="bi bi-receipt"></i> Payments and Bills
      </a>
      <a href="payment_history.php" class="d-flex align-items-center gap-2 fw-bold text-dark">
        <i class="bi bi-clock-history"></i> Payment History
      </a>
      <a href="occupancy.php" class="d-flex align-items-center gap-2 fw-bold text-success">
        <i class="bi bi-bar-chart"></i> Occupancy Reports
      </a>
      <a href="logout.php" class="mt-5 btn btn-danger btn-sm d-flex align-items-center gap-2 fw-bold" onclick="return confirm('Are you sure you want to logout?')">
        <i class="bi bi-box-arrow-right"></i> Logout
      </a>
    </nav>


    <div class="content">
      <div class="header">
        <h3 class="">BILLING AND PAYMENTS</h3>
      </div>
      <div class="container mt-4">
        <div class="row">
          <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="text-dark mb-0"><i class="bi bi-receipt"></i> Billing</h3>
              <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addBillModal">
                 <i class="bi bi-file-earmark-plus"></i> Add Bill
              </button>
            </div>
            <table class="table table-xs table-bordered align-middle text-center" style="width: 100%; margin: 0;">
              <thead class="table-dark">
                <tr>
                  <th>Bill ID</th>
                  <th>Tenant Name</th>
                  <th>Bill Date</th>
                  <th>Due Date</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../conn.php'; // adjust path to your connection file
                $data = mysqli_query($conn, "SELECT billing.bill_id, tenant.lastname, tenant.firstname, tenant.mi, billing.bill_date, billing.due_date, billing.amount, billing.status FROM billing JOIN tenant ON billing.tenant_id = tenant.tenant_id");
                while ($display = mysqli_fetch_array($data)) {
                ?>
                  <tr>
                    <td><?php echo $display['bill_id'] ?></td>
                    <td><?php echo $display['lastname'] . ', ' . $display['firstname'] . ' ' . $display['mi']; ?></td>
                    <td><?php echo date("F d, Y", strtotime($display['bill_date'])); ?></td>
                    <td><?php echo date("F d, Y", strtotime($display['due_date'])); ?></td>
                    <td><?php echo $display['amount']; ?></td>
                    <td><?php echo $display['status']; ?></td>
                    <td>
                      <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-outline-dark btn-xs" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $display['bill_id']; ?>">
                          <i class="bi bi-pencil">Edit</i>
                        </button> 
                        <button class="btn btn-outline-dark btn-xs" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $display['bill_id']; ?>"><i class="bi bi-trash">Delete</i></button>
                        <button class="btn btn-outline-dark btn-xs w-100" data-bs-toggle="modal" data-bs-target="#addPaymentModal<?php echo $display['bill_id']; ?>"><i class = 'bi bi-credit-card'>Add Payment</i></button>
                      </div>

                     <!-- Add Payment Modal for this bill -->
<div class="modal fade text-start" id="addPaymentModal<?php echo $display['bill_id']; ?>" tabindex="-1" aria-labelledby="addPaymentModalLabel<?php echo $display['bill_id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPaymentModalLabel<?php echo $display['bill_id']; ?>">Add Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="add_payment.php" method="POST">
        <div class="modal-body">
          <!-- Hidden fields -->
          <input type="hidden" name="bill_id" value="<?php echo $display['bill_id']; ?>">
         

          <div class="mb-3">
            <label for="payment_date<?php echo $display['bill_id']; ?>" class="form-label">Payment Date</label>
            <input type="date" class="form-control" id="payment_date<?php echo $display['bill_id']; ?>" name="payment_date" required>
          </div>
          <div class="mb-3">
            <label for="amount<?php echo $display['bill_id']; ?>" class="form-label">Amount</label>
            <input type="number" step="0.01" class="form-control" id="amount<?php echo $display['bill_id']; ?>" name="amount" placeholder="Enter amount" required>
          </div>
          <div class="mb-3">
            <label for="method<?php echo $display['bill_id']; ?>" class="form-label">Payment Method</label>
            <select class="form-select" id="method<?php echo $display['bill_id']; ?>" name="method" required>
              <option value="" disabled selected>Select method</option>
              <option value="Cash">Cash</option>
              <option value="GCash">GCash</option>
              <option value="Bank Transfer">Bank Transfer</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="remarks<?php echo $display['bill_id']; ?>" class="form-label">Remarks</label>
            <textarea class="form-control" id="remarks<?php echo $display['bill_id']; ?>" name="remarks" rows="2" placeholder="Optional"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Payment</button>
        </div>
      </form>
    </div>
  </div>
</div>



                      <div class="modal fade" id="editModal<?php echo $display['bill_id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form action="edit_bill.php" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title ">Edit Bill</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body text-start">
                                <input type="hidden" name="bill_id" value="<?php echo $display['bill_id']; ?>">
                                <div class="mb-3">
                                  <label>Bill Date</label>
                                  <input type="date" class="form-control" name="bill_date" value="<?php echo $display['bill_date']; ?>">
                                </div>
                                <div class="mb-3">
                                  <label>Due Date</label>
                                  <input type="date" class="form-control" name="due_date" value="<?php echo $display['due_date']; ?>">
                                </div>
                                <div class="mb-3">
                                  <label>Amount</label>
                                  <input type="number" class="form-control" name="amount" value="<?php echo $display['amount']; ?>">
                                </div>
                                <div class="mb-3">
                                  <label for="status" class="form-label">Status</label>
                                  <select class="form-select" id="status" name="status" required>
                                    <option value="Pending">Pending</option>
                                    <option value="Paid">Paid</option>
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade text-start" id="deleteModal<?php echo $display['bill_id']; ?>" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                              <h5 class="modal-title">Delete Bill</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                              Are you sure you want to delete this bill?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <a href="delete_bill.php?bill_id=<?php echo $display['bill_id']; ?>" class="btn btn-danger">Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>




                    </td>
                  </tr>

                <?php
                }
                ?>

                </tr>
              </tbody>
            </table>
          </div>

          <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="text-dark mb-0"><i class="bi bi-wallet2"></i> Payments</h3>

            </div>
            <table class="table table-xs table-bordered align-middle text-center" style="width: 100%;">
              <thead class="table-dark">
                <tr>
                  
                  <th>Tenant Name</th>
                  <th>Amount</th>
                  <th>Payment Date</th>
                  <th>Method</th>
                  <th>Remarks</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $payments = mysqli_query($conn, "SELECT payments.*, tenant.lastname, tenant.firstname, tenant.mi FROM payments JOIN billing ON payments.bill_id = billing.bill_id JOIN tenant ON billing.tenant_id = tenant.tenant_id");
                while ($pay = mysqli_fetch_assoc($payments)) {
                ?>
                  <tr>
                    <td><?php echo $pay['lastname'] . ', ' . $pay['firstname'] . ' ' . $pay['mi']; ?></td>
                    <td><?php echo $pay['amount']; ?></td>
                    <td><?php echo date('F d, Y', strtotime($pay['payment_date'])); ?></td>
                    <td><?php echo $pay['payment_method']; ?></td>
                    <td><?php echo $pay['remarks']; ?></td>
                    <td>
                      <div class="d-flex justify-content-center gap-2">
  <button class="btn btn-outline-dark btn-xs " data-bs-toggle="modal" data-bs-target="#editPaymentModal<?php echo $pay['payment_id']; ?>">
    <i class="bi bi-pencil"></i> Edit
  </button>
  <button class="btn btn-outline-dark btn-xs" data-bs-toggle="modal" data-bs-target="#deletePay_<?php echo $pay['payment_id']; ?>">
    <i class="bi bi-trash"></i> Delete
  </button>
  <a href="view_receipt.php" class="btn btn-outline-dark btn-xs w-100 d-flex justify-content-center align-items-center">
    <i class="bi bi-eye"></i> View Receipt
  </a>
</div>


                  </tr>
                  
  <!-- HIGHLIGHT: Unique Delete Payment Modal for each payment -->
  <div class="modal fade" id="deletePay_<?php echo $pay['payment_id']; ?>" tabindex="-1" aria-labelledby="labelDeletePay_<?php echo $pay['payment_id']; ?>" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="delete_payment.php" method="POST">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="labelDeletePay_<?php echo $pay['payment_id']; ?>">Remove Payment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="payment_id" value="<?php echo $pay['payment_id']; ?>">
            <span>Do you want to remove this payment?</span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- END HIGHLIGHT -->


                  <!-- Edit Payment Modal -->
<div class="modal fade" id="editPaymentModal<?php echo $pay['payment_id']; ?>" tabindex="-1" aria-labelledby="editPaymentLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="editPaymentLabel">Edit Payment</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form action="edit_payment.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="payment_id" value="<?php echo $pay['payment_id']; ?>">
          
          <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="number" name="amount" value="<?php echo $pay['amount']; ?>" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="payment_date" value="<?php echo $pay['payment_date']; ?>" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">remarks</label>
            <input type="remarks" name="remarks" value="<?php echo $pay['remarks']; ?>" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-dark">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Add Bill Modal -->
  <div class="modal fade" id="addBillModal" tabindex="-1" aria-labelledby="addBillModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <form action="add_bill.php" method="POST">
          <div class="modal-header bg-white text-dark">
            <h5 class="modal-title" id="addBillModalLabel">Add New Bill</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <!-- Tenant Dropdown -->
            <div class="mb-3">
              <label for="tenant" class="form-label">Tenant</label>
              <select class="form-select" id="tenant" name="tenant_id" required>
                <option value="">-- Select Tenant --</option>
                <?php
                include '../conn.php'; // adjust path to your connection file

                $result = mysqli_query($conn, "SELECT tenant_id, lastname, firstname,mi FROM tenant");

                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='{$row['tenant_id']}'>{$row['lastname']}, {$row['firstname']} {$row['mi']}.</option>";
                }
                ?>
              </select>
            </div>

            <!-- Bill Date -->
            <div class="mb-3">
              <label for="billDate" class="form-label">Bill Date</label>
              <input type="date" class="form-control" id="billDate" name="bill_date" required>
            </div>

            <!-- Due Date -->
            <div class="mb-3">
              <label for="dueDate" class="form-label">Due Date</label>
              <input type="date" class="form-control" id="dueDate" name="due_date" required>
            </div>

            <!-- Amount -->
            <div class="mb-3">
              <label for="amount" class="form-label">Amount</label>
              <input type="number" class="form-control" id="amount" name="amount" required>
            </div>


            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" name="status" required>
                <option value="Pending">Pending</option>
                <option value="Paid">Paid</option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-dark btn-sm">Save Bill</button>

          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Add Payment Modal -->
<div class="modal fade" id="addPaymentModal<?php echo $display['bill_id']; ?>" tabindex="-1" aria-labelledby="addPaymentModalLabel<?php echo $display['bill_id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addPaymentModalLabel<?php echo $display['bill_id']; ?>">Add Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="add_payment.php" method="POST">
        <div class="modal-body">
          <!-- Hidden Inputs -->
          <input type="hidden" name="bill_id" value="<?php echo $display['bill_id']; ?>">
          <input type="hidden" name="tenant_id" value="<?php echo $display['tenant_id']; ?>">

          <div class="mb-3">
            <label for="payment_date<?php echo $display['bill_id']; ?>" class="form-label">Payment Date</label>
            <input type="date" class="form-control" id="payment_date<?php echo $display['bill_id']; ?>" name="payment_date" required>
          </div>

          <div class="mb-3">
            <label for="amount<?php echo $display['bill_id']; ?>" class="form-label">Amount</label>
            <input type="number" step="0.01" class="form-control" id="amount<?php echo $display['bill_id']; ?>" name="amount" placeholder="Enter amount" required>
          </div>

          <div class="mb-3">
            <label for="method<?php echo $display['bill_id']; ?>" class="form-label">Payment Method</label>
            <select class="form-select" id="method<?php echo $display['bill_id']; ?>" name="payment_method" required>
              <option value="" disabled selected>Select method</option>
              <option value="Cash">Cash</option>
              <option value="GCash">GCash</option>
              <option value="Bank Transfer">Bank Transfer</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="remarks<?php echo $display['bill_id']; ?>" class="form-label">Remarks</label>
            <textarea class="form-control" id="remarks<?php echo $display['bill_id']; ?>" name="remarks" rows="2" placeholder="Optional"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Payment</button>
        </div>
      </form>
      

    </div>
  </div>
  
</div>







  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>