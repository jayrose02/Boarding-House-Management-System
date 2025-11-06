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
    .table-xs th {
  padding: 0.2rem ; /* tighter spacing */
  font-size: 0.8rem;           /* smaller text */
}
.btn-xs {
  padding: 0.15rem 0.35rem ; /* override bootstrap */
  font-size: 0.7rem ;
  border-radius: 3px ;
  width: 50px;
  height: 30px;
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
      <!-- Main Content -->
      <div class="content">
        <div class="header">
          <h1>Rooms</h1>
        </div>
        <div class="container mt-4">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0"><i class="bi bi-door-closed-fill"></i> Tenants Room Information</h5>
                  <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addTenantModal">
                    <i class="bi bi-plus me-1"></i>Add Room
                  </button>
                </div>

                <div class="modal fade" id="addTenantModal" tabindex="-1" aria-labelledby="addTenantModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="add_room.php" method="POST" enctype="multipart/form-data">

                        <div class="modal-header">
                          <h5 class="modal-title" id="addTenantModalLabel">Add New Room</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                          <div class="mb-3">
                            <label class="form-label">Room Photo</label>
                            <input type="file" name="room_photo" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Room Number</label>
                            <input type="text" name="room_number" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Capacity</label>
                            <input type="text" name="capacity" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" id="" class="form-select" required>
                              <option value="Available">Available</option>
                              <option value="Occupied">Occupied</option>
                              <option value="Maintenance">Maintenance</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" required>
                          </div>


                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-danger data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancel</button>
                          <button type="submit" name="save_tenant" class="btn btn-outline-dark"><i class="bi bi-save"></i> Save Room Details</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                

              </div>
              <div class="card-body">
                <div class="table-responsive" >
                  <table class="table table-hover table-striped table-sm">
                    <thead class="table-secondary text-center">
                      <tr>

                        <th>Room Photo</th>
                        <th>Room Number</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include("../conn.php");
                      $data = mysqli_query($conn, "SELECT * FROM room");
                      while ($display = mysqli_fetch_assoc($data)) {
                      ?>
                        <tr class="align-middle">
                          <td class="text-center">
                            <img src="../uploads/<?= htmlspecialchars($display['photo']) ?>"
                              alt="Room Photo"
                              width="90"
                              class="img-thumbnail">
                          </td>
                          <td class="text-center text-end"><?= htmlspecialchars($display['roomnumber']) ?></td>
                          <td class="text-center"><?= htmlspecialchars($display['capacity']) ?></td>
                          <td class="text-center"><?= htmlspecialchars($display['status']) ?></td>
                          <td class="text-center"><?= htmlspecialchars($display['price']) . '.00' ?></td>
                          <td class="text-center">
                            <button
                              class="btn btn-sm btn-outline-dark me-1" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $display['room_id']; ?>">
                              <i class="bi bi-pencil">Edit</i>
                            </button>
                            <button
                              class="btn btn-sm btn-outline-dark me-1" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $display['room_id']; ?>">
                              <i class="bi bi-trash">Delete</i>

                            </button>

                          </td>
                          <div class="modal fade" id="editModal<?= $display['room_id']; ?>" tabindex="-1">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <form action="editRoom.php" method="POST" enctype="multipart/form-data">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Edit Room</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                  </div>
                                  <div class="modal-body">
                                    <input type="hidden" name="room_id" value="<?= $display['room_id']; ?>">
                                    <div class="mb-3">
                                      <label>Room Photo</label><br>
                                      <img src="../uploads/<?= htmlspecialchars($display['photo']) ?>"
                                        alt="Room Photo"
                                        width="90"
                                        class="img-thumbnail mb-2">
                                      <input type="file" name="photo" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                      <label>Room Number</label>
                                      <input type="text" name="room_number" class="form-control" value="<?= $display['roomnumber']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                      <label>Capacity</label>
                                      <input type="text" name="capacity" class="form-control" value="<?= $display['capacity']; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                      <label>Status</label>
                                      <select name="status" class="form-control">
                                        <option value="Available" <?= ($display['status'] == 'Available') ? 'selected' : ''; ?>>Available</option>
                                        <option value="Occupied" <?= ($display['status'] == 'Occupied') ? 'selected' : ''; ?>>Occupied</option>
                                      </select>`
                                      <div class="mb-3">
                                        <label>Price</label>
                                        <input type="number" name="price" class="form-control" value="<?= $display['price']; ?>" required>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" name="updateTenant" class="btn btn-dark">Save Changes</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>


                          <div class="modal fade" id="deleteModal<?= $display['room_id']; ?>" tabindex="-1">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <form action="deleteRoom.php" method="POST">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Delete Tenant</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                  </div>
                                  <div class="modal-body">
                                    <input type="hidden" name="room_id" value="<?= $display['room_id']; ?>">
                                    <p>Are you sure you want to delete Room Number <strong><?= $display['roomnumber'] ?></strong>?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" name="deletRoom" class="btn btn-danger">Delete</button>
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