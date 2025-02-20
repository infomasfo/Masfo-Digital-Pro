<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up - MASFO Digital Pro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap.min.css">
  <style>
    /* Custom styles for the sign up page */
    .signup-form {
      background: white;
      border-radius: 15px;
      box-shadow: 0px 5px 30px rgba(0, 0, 0, 0.1);
      padding: 30px;
      max-width: 500px;
      margin: 50px auto;
    }

    .signup-form h2 {
      color: #010851;
      margin-bottom: 20px;
    }

    .signup-form .form-label {
      font-weight: bold;
    }

    .signup-form .form-control {
      border-radius: 10px;
      margin-bottom: 15px;
      padding-left: 40px;
    }

    .signup-form .btn-signup {
      background-color: #df1eff;
      color: white;
      border-radius: 10px;
      width: 100%;
      padding: 12px;
    }

    .signup-form .form-control:focus {
      box-shadow: none;
      border-color: #df1eff;
    }

    .signup-form .form-icon {
      position: absolute;
      top: 15px;
      left: 15px;
      color: #8c8c8c;
    }
    
    .signup-form .terms-text {
      font-size: 14px;
    }

    .container-fluid {
      background: linear-gradient(90deg, #2250c3, #e92dfd);
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-sm bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-black" href="#">MASFO DIGITAL PRO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link text-black" href="#">HOME</a></li>
        <li class="nav-item"><a class="nav-link text-black" href="#">ABOUT</a></li>
        <li class="nav-item"><a class="nav-link text-black" href="#">COURSES</a></li>
        <li class="nav-item"><a class="nav-link text-black" href="#">EXPLORE</a></li>
      </ul>
      <div class="d-flex">
        <button type="button" class="btn btn-outline-dark rounded-4">LOG IN</button>
        <button type="button" class="btn btn-outline-dark">SIGN UP</button>
      </div>
    </div>
  </div>
</nav>
<!-- End Navbar -->


<!-- Sign Up Form -->
<div class="container">
  <div class="signup-form">
    <h2>FORGOT PASSWORD</h2>
    <form id="forgotForm">
    <div class="error alert-danger alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
      <!-- Email Input -->
      <div class="mb-3 position-relative">
        <label for="signupEmail" class="form-label">Email Address</label>
        <i class="form-icon fa fa-envelope"></i>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
      </div>

      <!-- Terms & Conditions -->
      <div class="mb-3">
        <label class="form-check-label terms-text">
          <input type="checkbox" class="form-check-input" required>
          I agree to the <a href="#">Terms & Conditions</a>
        </label>
      </div>

      <!-- Submit Button -->
      <button type="submit" id="submitBtn" class="btn btn-signup">SEND OPT</button>

      <!-- Login Prompt -->
      <p class="text-center mt-3">Dont have an account? <a href="signup.php">Sign Up</a> <br >Already have an account? <a href="login.php">Log in</a></p>
    </form>
  </div>
</div>

<!-- Footer -->
<footer class="text-center p-4" style="background-color: #010851; color: white;">
  <p>&copy; 2025 MASFO Digital Pro. All rights reserved.</p>
</footer>

<!-- FontAwesome Icons (for form icons) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="./ClientSide/Handle_Send_Reset_Pass_Code.js"></script>
<script src="./assets/SweetAlert/sweetalert.js"></script>
</body>
</html>
