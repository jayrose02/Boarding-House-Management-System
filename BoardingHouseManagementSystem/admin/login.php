<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Admin Login - Boarding House Management System" />
  <title>Admin Login - Boarding House Management System</title>
  <link rel="icon" type="image/png" href="../favicon.png" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    html { scroll-behavior: smooth; }
    
    
    body::after {
      content: '';
      background: url('https://www.transparenttextures.com/patterns/symphony.png');
      opacity: 0.09;
      position: fixed;
      top: 0; left: 0; width: 100vw; height: 100vh;
      pointer-events: none;
      z-index: 0;
    }
    .login-container {
      max-width: 430px;
      padding: 48px 30px 36px 30px;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 32px 0 rgba(33,56,90,0.13), 0 1.5px 0 rgba(252,200,27,0.07);
      margin: 100px auto 40px auto;
      position: relative;
      z-index: 1;
      transition: box-shadow 0.25s;
    }
    .login-container:hover {
      box-shadow: 0 18px 64px 0 rgba(33,56,90,0.18);
    }
    .login-header {
      text-align: center;
      margin-bottom: 30px;
    }
    .login-header img {
      width: 62px;
      height: 62px;
      margin-bottom: 13px;
      border-radius: 14px;
      box-shadow: 0 1.5px 8px 0 rgba(247,184,1,0.12);
    }
    .login-header .fa-user-shield {
      color: #f7b801;
      margin-bottom: 8px;
    }
    .login-header h1 {
      font-size: 1.7rem;
      font-weight: bold;
      color: #1a2650;
    }
    .login-header p {
      color: #7e8aac;
    }
    .form-label {
      font-weight: 600;
      color: #23374d;
    }
    .form-control {
      background-color: #fff;
      border: 1.5px solid #ced4da;
      color: #23374d;
      transition: border 0.23s, box-shadow 0.23s;
      border-radius: 7px;
      box-shadow: 0 1px 2.5px 0 rgba(33,56,90,0.04) inset;
    }
    .form-control:focus {
      border-color: #f7b801;
      box-shadow: 0 0 0 0.18rem rgba(247,184,1,0.09);
      background: #fdfae9;
      outline: none;
    }
    .btn-warning {
      background-color: #f7b801;
      border: none;
      font-weight: bold;
      color: #23374d;
      box-shadow: 0 2px 8px 0 rgba(247,184,1,0.06);
      transition: background .2s, color .2s, box-shadow 0.2s;
    }
    .btn-warning:hover, .btn-warning:focus {
      background-color: #ffd857;
      color: #1a2650;
      box-shadow: 0 2px 20px 0 rgba(247,184,1,0.10);
    }
    .form-check-label {
      color: #6c7a99;
      font-size: 0.97rem;
    }
    .form-check-input:focus {
      border-color: #f7b801;
      box-shadow: 0 0 0 0.16rem rgba(247,184,1,0.11);
    }
    .text-center p.small a {
      color: #204781;
      font-weight: 500;
      text-decoration: none;
      transition: color 0.25s;
    }
    .text-center p.small a:hover {
      color: #f7b801;
      text-decoration: underline;
    }
    .login-message {
      color: #ff5252;
      background: #fff1f2;
      padding: 10px 16px;
      border-radius: 7px;
      margin-bottom: 18px;
      border: 1px solid #ffe2e2;
      font-weight: 500;
      display: none;  /* show via JS as needed */
    }
    footer {
      text-align: center;
      padding: 20px 0;
      background: none;
      color: #7e8aac;
      font-size: 0.99rem;
      border-top: 1px solid #f6f7fa;
      position: relative;
      z-index: 1;
    }
    @media (max-width: 576px) {
      .login-container {
        margin: 34px 5px;
        padding: 27px 10px 17px 10px;
      }
      .login-header img {
        width: 49px;
        height: 49px;
      }
    }
  </style>
</head>
<body>

  <div class="container d-flex justify-content-center align-items-center min-vh-100" style="background-image: url('../uploads/rent.jpg'); background-size: center; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
    <div class="login-container">
      <div class="login-header">
        <img src="../favicon.png" alt="Boarding House Admin Logo" onerror="this.style.display='none'">
        <div><i class="fas fa-user-shield fa-3x mt-2"></i></div>
        <h1>Admin Login</h1>
        <p>Please sign in to your admin account</p>
      </div>

      <!-- Placeholder for login error/status messages -->
      <div id="login-message" class="login-message" role="alert"></div>

      <form action="auth.php" method="POST" autocomplete="on">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <div class="input-group">
            <span class="input-group-text bg-white"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your Username" autofocus required>
          </div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <span class="input-group-text bg-white"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
          </div>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-warning btn-lg w-100 mb-3">Sign In</button>
      </form>

      <div class="text-center mt-2">
        <p class="small"><a href="../index.php">← Back to Home</a></p>
      </div>
    </div>
  </div>

  <footer>
    <p>&copy; <span id="copyright-year"></span> Boarding House Management System. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('copyright-year').textContent = new Date().getFullYear();
    // Demo JS for showing login error message (implement backend as needed)
    /* Example:
    var params = new URLSearchParams(window.location.search);
    if(params.has('error')) {
      var msg = params.get('error') === '1' ? 'Invalid username or password.' : params.get('error');
      var messageDiv = document.getElementById('login-message');
      messageDiv.textContent = msg;
      messageDiv.style.display = 'block';
    }
    */
  </script>
</body>
</html>