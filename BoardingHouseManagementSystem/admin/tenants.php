<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Admin Dashboard - Boarding House Management System" />
  <title>Admin Dashboard - Boarding House Management System</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', sans-serif;
      background: #f0f4f8;
    }

    .sidebar {
      height: 100vh;
      width: 130px; /* Thinner sidebar */
      background-color: #f8f9fa; /* Light background */
      padding: 15px; /* Reduced padding */
      border-right: 5px solid rgba(0, 0, 0, 0.5); /* Black border */
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3); /* Black shadow effect */
    }

    .sidebar a {
      color: #343a40; /* Dark text color */
      text-decoration: none;
      padding: 8px 10px; /* Smaller padding */
      display: block;
      border-radius: 5px;
  font-size: 0.75rem; /* Even smaller font size for better visibility */
      transition: background-color 0.3s;
    }

    .sidebar a:hover {
      background-color: rgba(0, 123, 255, 0.1); /* Light blue hover effect */
    }

    .content {
      padding: 20px;
      flex-grow: 1; /* Allow content to grow */
    }

    .header {
      background-color: #ffffff;
      padding: 10px; /* Reduced padding */
      border-bottom: 1px solid #dee2e6;
    }

    .header h1 {
      margin: 0;
      font-size: 1.25rem; /* Smaller header font size */
      color: #343a40;
    }
    
    .d-flex .sidebar a{
        color: black;
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
      <a href="tenants.php" class="d-flex align-items-center gap-2 fw-bold text-info ">
        <i class="bi bi-people"></i> Tenants
      </a>
      <a href="tenantlist.php" class="d-flex align-items-center gap-2 fw-bold text-secondary" >
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
      <!-- Main Content -->
      <div class="content">
        <div class="header">
          <h1>Tenants</h1>
        </div>
        <div class="container mt-4">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0"><i class="fas fa-users me-2"></i>Tenants Information</h5>
                  <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addTenantModal">
                    <i class="bi bi-plus  me-1"></i>Add New Tenant
                  </button>
                </div>

                <div class="modal fade" id="addTenantModal" tabindex="-1" aria-labelledby="addTenantModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="add_tenant.php" method="POST">
                        <div class="modal-header">
                          <h5 class="modal-title" id="addTenantModalLabel">Add New Tenant</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                          <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Middle Initial</label>
                            <input type="text" name="mi" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" name="contactno" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Room</label>
                            <select name="room_id" class="form-select" required>
                              <option value="">Select Room</option>
                              <?php
                              include('../conn.php');
                              $data = mysqli_query($conn, "SELECT * FROM room WHERE status = 'Available'");
                              while ($room = mysqli_fetch_array($data)) {
                                echo '<option value="' . $room['room_id'] . '">' . $room['roomnumber'] . '</option>';
                              }
                              ?>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                              <option value="Active">Active</option>
                              <option value="Inactive">Inactive</option>
                            </select>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-danger " data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancel</button>
                          <button type="submit" name="save_tenant" class="btn btn-outline-dark"><i class="bi bi-save"></i> Save Tenant</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped text-center">
                    <thead class="table-secondary ">
                      <tr>

                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Room</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include('../conn.php');
                      $data = mysqli_query($conn, "SELECT  tenant.*, room.roomnumber FROM tenant LEFT JOIN room ON tenant.room_id = room.room_id");
                      while ($display = mysqli_fetch_array($data)) {
                      ?>  
                        <tr>
                          <td><?php echo $display['lastname'] . ', ' . $display['firstname'] . ' ' . $display['mi'] . '.'; ?></td>
                          <td><?php echo $display['email']; ?></td>
                          <td><?php echo $display['contactno']; ?></td>
                          <td><?php echo $display['roomnumber'] ? $display['roomnumber'] : 'No Room Assigned'; ?></td>
                          <td><?php echo $display['status']; ?></td>
                          <td>
                            <button
                              class="btn btn-sm btn-outline-dark me-1" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $display['tenant_id']; ?>">
                              <i class="bi bi-pencil"></i> Edit

                            </button>
                            <button
                              class="btn btn-sm btn-outline-dark me-1" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $display['tenant_id']; ?>">
                              <i class="bi bi-trash"></i> Delete

                            </button>

                            <div class="modal fade" id="editModal<?= $display['tenant_id']; ?>" tabindex="-1">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="editTenant.php" method="POST">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Edit Tenant</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                      <input type="hidden" name="tenant_id" value="<?= $display['tenant_id']; ?>">
                                      <div class="mb-3">
                                        <label class="text-bold">Last Name</label>
                                        <input type="text" name="lastname" class="form-control" value="<?= $display['lastname']; ?>" required>
                                      </div>
                                      <div class="mb-3">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" class="form-control" value="<?= $display['firstname']; ?>" required>
                                      </div>
                                      <div class="mb-3">
                                        <label>Middle Initial</label>
                                        <input type="text" name="mi" class="form-control" value="<?= $display['mi']; ?>" required>
                                      </div>
                                      <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= $display['email']; ?>" required>
                                      </div>
                                      <div class="mb-3">
                                        <label>Contact Number</label>
                                        <input type="text" name="contactno" class="form-control" value="<?= $display['contactno']; ?>" required>
                                      </div>
                                      <div class="mb-3">
                                        <label>Room</label>
                                        <select name="room_id" class="form-control">
                                          <option value="">No Room Assigned</option>
                                          <?php
                                          $room_query = mysqli_query($conn, "SELECT * FROM room WHERE status = 'Available' OR room_id = '".$display['room_id']."'");
                                          while ($room = mysqli_fetch_array($room_query)) {
                                            $selected = ($display['room_id'] == $room['room_id']) ? 'selected' : '';
                                            echo '<option value="'.$room['room_id'].'" '.$selected.'>'.$room['roomnumber'].'</option>';
                                          }
                                          ?>
                                        </select>
                                      </div>
                                      <div class="mb-3">  
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                          <option value="Active" <?= ($display['status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                                          <option value="Inactive" <?= ($display['status'] == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" name="updateTenant" class="btn btn-dark">Save Changes</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <!-- ================= Delete Modal ================= -->
                            <div class="modal fade" id="deleteModal<?= $display['tenant_id']; ?>" tabindex="-1">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="deleteTenant.php" method="POST">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Delete Tenant</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="tenant_id" value="<?= $display['tenant_id']; ?>">
                                      <p>Are you sure you want to delete <strong><?= $display['lastname'] . ',' . $display['firstname'] . ' ' . $display['mi'] . '.'; ?></strong>?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" name="deleteTenant" class="btn btn-danger">Delete</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </tr>
                      <?php
                      }
                      ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>

  </html>