<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login - MASFO Digital Pro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap.min.css">
  <style>
    /* Custom styles for the login page */
    .login-form {
      background: white;
      border-radius: 15px;
      box-shadow: 0px 5px 30px rgba(0, 0, 0, 0.1);
      padding: 30px;
      max-width: 500px;
      margin: 50px auto;
    }

    .login-form h2 {
      color: #010851;
      margin-bottom: 20px;
    }

    .login-form .form-label {
      font-weight: bold;
    }

    .login-form .form-control {
      border-radius: 10px;
      margin-bottom: 15px;
      padding-left: 40px;
    }

    .login-form .btn-login {
      background-color: #df1eff;
      color: white;
      border-radius: 10px;
      width: 100%;
      padding: 12px;
    }

    .login-form .form-control:focus {
      box-shadow: none;
      border-color: #df1eff;
    }

    .login-form .forgot-password {
      text-align: right;
      font-size: 14px;
    }

    .login-form .forgot-password a {
      color: #df1eff;
    }

    .login-form .form-icon {
      position: absolute;
      top: 15px;
      left: 15px;
      color: #8c8c8c;
    }

  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light" style="color: #010851;">
  <div class="container-fluid">
    <a class="navbar-brand text-black" href="javascript:void(0)">MASFO DIGITAL PRO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link text-black" href="index.html">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black" href="about.html">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black" href="courses.html">COURSES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black" href="javascript:void(0)">EXPLORE</a>
        </li>
      </ul>
      <div class="form-buttons d-flex">
        <button type="button" class="btn btn-outline-dark rounded-4"><a href="login.html">LOG IN</a></button>
        <button type="button" class="btn btn-outline-dark"><a href="signup.html">SIGN UP</a></button>
      </div>
    </div>
  </div>
</nav>
<!-- end of nav -->

<!-- Login Form -->
<div class="container">
  <div class="login-form">
    <h2>Login</h2>
    <form id="loginForm">
    <div class="error alert-danger alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
      <!-- Email Input -->
      <div class="mb-3 position-relative">
        <label for="email" class="form-label">Email Address</label>
        <i class="form-icon fa fa-envelope"></i>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
      </div>
      
      <!-- Password Input -->
      <div class="mb-3 position-relative">
        <label for="loginPassword" class="form-label">Password</label>
        <i class="form-icon fa fa-lock"></i>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
      </div>
      
      <!-- Submit Button -->
      <button type="submit" id="submitBtn" class="btn btn-login">Login</button>
      
      <!-- Forgot Password Link -->
      <div class="forgot-password">
        <a href="forgot_password.php">Forgot Password?</a>
      </div>
      
      <!-- Signup Prompt -->
      <p class="text-center mt-3">Don't have an account? <a href="signup.php">Sign up</a></p>
    </form>
  </div>
</div>

<!-- Footer -->
<footer class="text-center p-4" style="background-color: #010851; color: white;">
  <p>&copy; 2025 MASFO Digital Pro. All rights reserved.</p>
</footer>

<!-- FontAwesome Icons (for form icons) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="./ClientSide/login.js"></script>
<script src="./assets/SweetAlert/sweetalert.js"></script>

</body>
</html>
