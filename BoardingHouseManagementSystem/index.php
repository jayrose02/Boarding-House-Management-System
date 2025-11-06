<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Boarding House Management System - Efficiently manage tenants, billing, and room assignments." />
  <title>Boarding House Management System</title>
  <link rel="icon" type="image/png" href="favicon.png">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    html {
      scroll-behavior: smooth;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f5f7fa;
      color: #23374d;
    }
    .hero {
      background: linear-gradient(120deg, #e2eafc 0%, #f9f9fb 100%);
      padding: 120px 0 80px 0;
      text-align: center;
      box-shadow: 0 6px 24px 0 rgba(33,56,90,0.05);
      position: relative;
    }
    .hero::after {
      content: '';
      background: url('https://www.transparenttextures.com/patterns/symphony.png');
      opacity: 0.12;
      position: absolute;
      top: 0; left: 0; width: 100%; height: 100%;
      z-index: 0;
    }
    .hero > .container { position: relative; z-index: 1; }
    .hero .display-4 { color: #1a2650; }
    .hero .btn-warning {
      background: #ffd857;
      color: #23374d;
      font-weight: bold;
      border: none;
      transition: box-shadow .2s, background .2s;
      box-shadow: 0 2px 12px 0 rgba(254,200,27,0.10);
    }
    .hero .btn-warning:hover, .btn-warning:focus {
      background: #f7b801;
      color: #fff;
    }
    .hero .btn-outline-primary {
      color: #1a2650;
      border-color: #1a2650;
      background: none;
      font-weight: bold;
      transition: background .2s, color .2s;
    }
    .hero .btn-outline-primary:hover, .hero .btn-outline-primary:focus {
      background: #1a2650;
      color: #fff;
    }
    .feature {
      background-color: #fff;
      border-radius: 14px;
      box-shadow: 0 2px 15px 0 rgba(33, 56, 90, 0.05);
      padding: 32px 24px 28px 24px;
      transition: transform .3s, box-shadow .3s;
      min-height: 295px;
    }
    .feature:hover {
      transform: translateY(-6px) scale(1.03);
      box-shadow: 0 8px 32px 0 rgba(33,56,90,0.14);
    }
    .feature i {
      color: #f7b801;
    }
    .feature h5 {
      color: #204781;
    }
    .feature p {
      color: #425077;
    }
    section.cta {
      background: #fff8e1;
      box-shadow: 0 2px 12px 0 rgba(253,216,53,0.10);
    }
    .cta h2 {
      color: #f7b801;
    }
    .cta .btn-warning {
      background: #f7b801;
      color: #23374d;
    }
    footer {
      background-color: #f2f4f9;
      padding: 28px 0 18px 0;
      color: #54638c;
      box-shadow: 0 -2px 10px 0 rgba(33,56,90,0.04);
    }
    footer a {
      color: #204781;
      text-decoration: none;
    }
    footer a:hover {
      text-decoration: underline;
      color: #f7b801;
    }
    .visually-hidden {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      border: 0;
    }
    
  </style>
</head>
<body>

  <!-- Hero Section -->
  <header class="hero" aria-label="Welcome section">
    <div class="container">
      <span class="visually-hidden">Boarding House System Home</span>
      <h1 class="display-4 fw-bold mb-3">Welcome to the Boarding House Management System</h1>
      <p class="lead mb-4">Efficiently manage tenants, billing, and room assignments with ease.</p>
      <div class="mt-2 mb-1">
        <a href="#features", class="btn btn-warning btn-lg me-3" aria-label="Learn more about features">Learn More</a>
        <a href="#aboutus", class="btn btn-warning btn-lg me-3" aria-label="Learn more about features">About Us</a>
        <a href="admin/login.php" class="btn btn-outline-primary btn-lg" aria-label="Staff/Admin login">Login</a>
      </div>
    </div>
  </header>

  <!-- Features Section -->
  <section id="features" class="py-5" aria-label="Features">
    <div class="container text-center">
      <h2 class="fw-bold mb-4" style="color:#204781;">Key Features</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="feature h-100">
            <i class="fas fa-user-friends fa-3x mb-3" aria-hidden="true"></i>
            <h5 class="fw-bold mb-2">Tenant Management</h5>
            <p>Effortlessly store and update tenant information, personal details, and rental agreements in one place.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature h-100">
            <i class="fas fa-money-bill-wave fa-3x mb-3" aria-hidden="true"></i>
            <h5 class="fw-bold mb-2">Billing System</h5>
            <p>Automate billing, track payments, set reminders, and generate invoices for tenants in just a few clicks.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature h-100">
            <i class="fas fa-door-open fa-3x mb-3" aria-hidden="true"></i>
            <h5 class="fw-bold mb-2">Room Assignments</h5>
            <p>Manage room assignments, view current occupancy, and optimize boarding house utilization efficiently.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="cta py-5 text-center" aria-label="Call to Action">
    <div class="container">
      <h2 class="fw-bold mb-4">Get Started Today!</h2>
      <p class="lead">Ready to streamline your boarding house management? <br class="d-none d-md-inline">Contact us today for more information. <br class="d-none d-md-inline">choichoidanbigornia@gmail.com</p>
    </div>
  </section>
  <section id="aboutus" class="py-5" aria-label="About Us">
    <div class="container text-center">
      <h2 class="fw-bold mb-4" style="color:#204781;">About Us</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="feature h-100">
            <img src="uploads/rose.jpg" alt="rose" class="img-fluid rounded mb-3"
     width="300" height="300"
     loading="lazy"
     style="object-fit:cover;">
            <h5 class="fw-bold mb-2">Rosemarie Bigornia</h5>
            <p>Developer</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature h-100">
            <img src="uploads/rhyza.jpg" alt="rose" class="img-fluid rounded mb-3"
     width="300" height="300"
     loading="lazy"
     style="object-fit:cover;">
            <h5 class="fw-bold mb-2">Rhyza Gonzales</h5>
            <p>Developer</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature h-100">
             <img src="uploads/daniel2.jpg" alt="rose" class="img-fluid rounded mb-3"
     width="300" height="300"
     loading="lazy"
     style="object-fit:cover;">
            <h5 class="fw-bold mb-2">Daniel Suboc</h5>
            <p>Developer</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Section -->
  <footer class="text-center" aria-label="Contact & Copyright">
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('copyright-year').textContent = new Date().getFullYear();
  </script>
</body>
</html>
