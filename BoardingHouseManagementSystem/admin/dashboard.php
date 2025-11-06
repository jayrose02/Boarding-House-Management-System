<?php
include '../conn.php';
// Get monthly payment totals for the current year
$result = mysqli_query($conn, "SELECT COUNT(*) AS active FROM tenant WHERE status='Active'");
$row = mysqli_fetch_assoc($result);
$active_tenants = $row['active'];
$result = mysqli_query($conn, "SELECT COUNT(*) AS inactive FROM tenant WHERE status='Inactive'");
$row = mysqli_fetch_assoc($result);
$inactive_tenants = $row['inactive'];
$labels = [];
$data = [];
$monthNames = array('January','February','March','April','May','June','July','August','September','October','November','December');
$year = date('Y');
for ($m = 1; $m <= 12; $m++) {
  $labels[] = $monthNames[$m-1];
  $result = mysqli_query($conn, "SELECT SUM(amount) as total FROM payments WHERE MONTH(payment_date) = $m AND YEAR(payment_date) = $year");
  $row = mysqli_fetch_assoc($result);
  $data[] = $row['total'] ? $row['total'] : 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Admin Dashboard - Boarding House Management System" />
  <title>Admin Dashboard - Boarding House Management System</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    
  </style>
  </style>
</head>

<body>
  <div class="d-flex">
    <nav class="sidebar" >
      <h3 class="text-dark" style="font-size: 1.1rem;"><a href="dashboard.php" style="text-decoration: none; color: inherit;"> <strong>
            <h6> <i class="bi bi-speedometer2">
                Admin Dashboard</i> </h6>
        </a></strong></h3>
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
    <div class="content" style="max-width: 100%;">
      <!-- Header -->
      <div class="header text-center py-4 mb-4 bg-light rounded shadow-sm">
        <h1 class="text-dark fw-bold mb-2">Welcome, Admin!</h1>
        <p class="mb-0 text-muted">Manage your boarding house</p>
      </div>

      <div class="container mt-4">
        <div class="row">
          <!-- Dashboard Overview Card -->
          <div class="col-12 mb-4">
            <div class="card">

            </div>
          </div>

          <!-- Tenant Count Card -->
          <div class="col-12 mb-4 ">
            <?php
            include '../conn.php';
            $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tenant");
            $row = mysqli_fetch_assoc($result);
            $total_tenants = $row['total'];
            ?>
           <div class="row mb-4">
  <div class="col-md-3"> <!-- Shrinks width to 25% -->
    <div class="card text-center shadow-sm" style="height: 150px; width: 100%;background-color:#dee2e6;"> <!-- Smaller height -->
      <div class="card-body d-flex flex-column justify-content-center p-2">
        <div class="mb-1" style="font-size:1.5rem; color:#0d6efd;"> <!-- Smaller icon -->
          <i class="bi bi-people"></i>
        </div>
        <h6 class="card-title mb-1" style="font-size:0.85rem;">Tenants</h6>
        <div class="fw-bold text-primary mb-1" style="font-size:1.25rem;"><?php echo $total_tenants; ?></div>
        <small class="text-muted" style="font-size:0.7rem;">Total Registered</small>
      </div>
    </div>
  </div>
  
  <!-- Payments Card -->
  <?php
  $result = mysqli_query($conn, "SELECT SUM(amount) AS total_payments FROM payments");
  $row = mysqli_fetch_assoc($result);
  $total_payments = $row['total_payments'] ?? 0;
  ?>
  <div class="col-md-3">
    <div class="card text-center shadow-sm" style="height: 150px; width: 100%; background-color:#dee2e6;">
      <div class="card-body d-flex flex-column justify-content-center p-2">
        <div class="mb-1" style="font-size:1.5rem; color:#198754;">
          <i class="bi bi-cash-stack"></i>
        </div>
        <h6 class="card-title mb-1" style="font-size:0.85rem;">Payments</h6>
        <div class="fw-bold text-success mb-1" style="font-size:1.25rem;">
          ₱<?php echo number_format($total_payments, 2); ?>
        </div>
        <small class="text-muted" style="font-size:0.7rem;">Total Collected</small>
      </div>
      
    </div>
  </div>
  <?php

$result = mysqli_query($conn, "SELECT SUM(amount) AS total_pending FROM billing WHERE status='Pending'");
$row = mysqli_fetch_assoc($result);
$total_pending = $row['total_pending'];
?>

<div class="col-md-3">
  <div class="card text-center shadow-sm" style="height: 150px; width: 100%;background-color:#dee2e6;">
    <div class="card-body d-flex flex-column justify-content-center p-2">
      <div class="mb-1" style="font-size:1.5rem; color:#dc3545;">
        <i class="bi bi-exclamation-circle"></i>
      </div>
      <h6 class="card-title mb-1" style="font-size:0.85rem;">Pending Bills</h6>
      <div class="fw-bold text-danger mb-1" style="font-size:1.25rem;">
        ₱<?php echo number_format($total_pending, 2); ?>
      </div>
      <small class="text-muted" style="font-size:0.7rem;">Total Pending</small>
    </div>
  </div>
</div>
<?php
// Get total available rooms
$result = mysqli_query($conn, "SELECT COUNT(*) AS total_available FROM room WHERE status='Available'");
$row = mysqli_fetch_assoc($result);
$total_available = $row['total_available'];
?>

<div class="col-md-3">
  <div class="card text-center shadow-sm" style="height: 150px; width: 100%;background-color:#dee2e6;">
    <div class="card-body d-flex flex-column justify-content-center p-2">
      <div class="mb-1" style="font-size:1.5rem; color:#28a745;">
        <i class="bi bi-house-door"></i>
      </div>
      <h6 class="card-title mb-1" style="font-size:0.85rem;">Available Rooms</h6>
      <div class="fw-bold text-success mb-1" style="font-size:1.25rem;">
        <?php echo $total_available; ?>
      </div>
      <small class="text-muted" style="font-size:0.7rem;">Rooms ready for rent</small>
    </div>
  </div>
</div>

</div>

</div>



        <!-- Payment Revenue Chart & Tenant Status Pie Chart -->
        <div class="container mb-4">
          <div class="row justify-content-center align-items-start">
            <div class="col-md-6">
              <h3 class="mb-3">Monthly Payment Revenue (<?php echo $year; ?>)</h3>
              <canvas id="paymentChart" width="500" height="160"></canvas>
            </div>
            <div class="col-md-6">
              <h3 class="mb-3">Tenant Status</h3>
              <canvas id="tenantPieChart" width="500" height="160"></canvas>
            </div>
          </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        const ctx1 = document.getElementById('paymentChart').getContext('2d');
        const paymentChart = new Chart(ctx1, {
          type: 'line',
          data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
              label: 'Revenue (₱)',
              data: <?php echo json_encode($data); ?>,
              backgroundColor: 'rgba(3, 249, 3, 0.6)',
              borderColor: 'rgba(0, 255, 26, 1)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });

        // Tenant Status Pie Chart
        const ctx2 = document.getElementById('tenantPieChart').getContext('2d');
        const tenantPieChart = new Chart(ctx2, {
          type: 'pie',
          data: {
            labels: ['Active', 'Inactive'],
            datasets: [{
              data: [<?php echo $active_tenants; ?>, <?php echo $inactive_tenants; ?>],
              backgroundColor: [
                'rgba(0, 255, 0, 1)',
                'rgba(255, 0, 0, 1)'
              ],
              borderColor: [
               'rgba(58, 232, 15, 1)',
                'rgba(255, 0, 0, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: false,
            plugins: {
              legend: {
                position: 'bottom',
              }
            }
          }
        });
        </script>
              
              

            </div>
            
           
    


          </div>
        </div>
      </div>