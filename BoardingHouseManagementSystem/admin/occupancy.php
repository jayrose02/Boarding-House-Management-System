<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Admin Dashboard - Boarding House Management System" />
  <title>Admin Dashboard - Boarding House Management System</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

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

    @media print {
      body * {
        visibility: hidden;
      }

      .print-occupancy-table,
      .print-occupancy-table * {
        visibility: visible;
      }

      .print-occupancy-table {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
      }
    }
  </style>

</head>

<body>

  <div class="d-flex">
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
        <h1>Reports</h1>
      </div>

      <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h2 class="text-start bg-light p-2 mb-0"><i class="bi bi-bar-chart"></i> Occupancy Reports </h2>
          <button class="btn btn-outline-dark btn-sm" onclick="window.print()">
            <i class="bi bi-printer"></i> Print Table
          </button>
        </div>
        <table class="table responsive table-striped print-occupancy-table table-bordered">
          <thead class="text-center ">
            <tr>
              <th>Room Number</th>
              <th>Capacity</th>
              <th>Status</th>
              <th>Number of Tenants Room</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../conn.php';
            $data = mysqli_query($conn, "SELECT * FROM room");
            while ($display = mysqli_fetch_array($data)) {
              $num_tenants = mysqli_query($conn, "SELECT COUNT(*) as count FROM tenant WHERE room_id = '" . $display['room_id'] . "'");
              $count_result = mysqli_fetch_assoc($num_tenants);
            ?>
              <tr class="text-center">
                <td><?= $display['roomnumber'] ?></td>
                <td><?= $display['capacity'] ?></td>
                <td><?= $display['status'] ?></td>
                <td><?= $count_result['count'] ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
